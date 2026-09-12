<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyMedia;
use App\Models\VirtualTour;
use App\Models\PropertyPerspective;
use App\Models\PropertyUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PropertyController extends Controller
{
    /**
     * Display the registry of all properties.
     */
    public function index(): View
    {
        $properties = Property::with(['category', 'location', 'coverImage', 'virtualTour'])->get();
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new property.
     */
    public function create(): View
    {
        $categories = PropertyCategory::all();
        $locations = Location::where('type', 'Area')->get();
        $amenities = Amenity::all(); // Fetch all available amenities
        return view('admin.properties.create', compact('categories', 'locations', 'amenities'));
    }

    /**
     * Store a newly created property in the database.
     */
    public function store(Request $request): RedirectResponse
    {
        // Mutex check: Can only provide file OR url, not both
        if ($request->hasFile('cover_image_file') && $request->filled('cover_image_url')) {
            return back()->withErrors([
                'cover_image_file' => 'You cannot upload an image file AND provide a URL link at the same time. Please choose only one option.'
            ])->withInput();
        }

        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'property_type' => 'required|string|in:Sale,Rent,Shortlet',
            'status' => 'required|string|in:Draft,Available,Under Offer,Sold,Rented,Archived',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'floor_area' => 'nullable|integer|min:0',
            'category_id' => 'required|exists:property_categories,id',
            'location_id' => 'required|exists:locations,id',
            'is_featured' => 'boolean',
            'has_luxury_layout' => 'boolean',
            'hero_video_url' => 'nullable|string|max:500',
            'hero_video_file' => 'nullable|file|mimes:mp4,mov,avi,webm|max:20480',
            'cover_image_url' => 'nullable|url',
            'virtual_tour_url' => 'nullable|url',
            'amenities' => 'nullable|array', // Validate amenities array
            'amenities.*' => 'exists:amenities,id',
        ];

        // Only validate as an image if a file is actually uploaded
        if ($request->hasFile('cover_image_file')) {
            $rules['cover_image_file'] = 'image|max:4096';
        }

        $validated = $request->validate($rules);

        // Generate dynamic unique slug
        $validated['slug'] = Str::slug($request->title);
        $validated['is_featured'] = $request->has('is_featured');
        $validated['has_luxury_layout'] = $request->has('has_luxury_layout');

        // Handle luxury background video upload
        if ($request->hasFile('hero_video_file')) {
            $videoPath = $request->file('hero_video_file')->store('properties/videos', 'public');
            $validated['hero_video_url'] = '/storage/' . $videoPath;
        }

        // Create the Property
        $property = Property::create($validated);

        // Sync Many-to-Many Amenities
        $property->amenities()->sync($request->input('amenities', []));

        // Process Cover Image Path (either uploaded file or pasted URL)
        $coverPath = null;
        if ($request->hasFile('cover_image_file')) {
            $path = $request->file('cover_image_file')->store('properties', 'public');
            $coverPath = '/storage/' . $path;
        } elseif ($request->filled('cover_image_url')) {
            $coverPath = $request->cover_image_url;
        }

        // Store Cover Image inside PropertyMedia if set
        if ($coverPath) {
            PropertyMedia::create([
                'property_id' => $property->id,
                'file_path' => $coverPath,
                'type' => 'image',
                'is_cover' => true,
                'sort_order' => 1,
            ]);
        }

        // Store Virtual Tour if provided
        if ($request->filled('virtual_tour_url')) {
            VirtualTour::create([
                'property_id' => $property->id,
                'provider' => 'Matterport',
                'tour_url' => $request->virtual_tour_url,
                'embed_url' => $request->virtual_tour_url,
                'is_active' => true,
            ]);
        }

        // Save perspectives and units if luxury layout is active
        if ($property->has_luxury_layout) {
            $this->saveLuxuryLayoutRelations($request, $property);
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property successfully added to registry!');
    }

    /**
     * Show the form for editing an existing property.
     */
    public function edit(string $id): View
    {
        $property = Property::with(['category', 'location', 'coverImage', 'virtualTour', 'amenities', 'perspectives', 'units'])->findOrFail($id);
        $categories = PropertyCategory::all();
        $locations = Location::where('type', 'Area')->get();
        $amenities = Amenity::all(); // Fetch all available amenities
        return view('admin.properties.edit', compact('property', 'categories', 'locations', 'amenities'));
    }

    /**
     * Update an existing property in the database.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $property = Property::findOrFail($id);

        // Mutex check: Can only provide file OR url, not both
        if ($request->hasFile('cover_image_file') && $request->filled('cover_image_url')) {
            return back()->withErrors([
                'cover_image_file' => 'You cannot upload an image file AND provide a URL link at the same time. Please choose only one option.'
            ])->withInput();
        }

        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'property_type' => 'required|string|in:Sale,Rent,Shortlet',
            'status' => 'required|string|in:Draft,Available,Under Offer,Sold,Rented,Archived',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'floor_area' => 'nullable|integer|min:0',
            'category_id' => 'required|exists:property_categories,id',
            'location_id' => 'required|exists:locations,id',
            'is_featured' => 'boolean',
            'has_luxury_layout' => 'boolean',
            'hero_video_url' => 'nullable|string|max:500',
            'hero_video_file' => 'nullable|file|mimes:mp4,mov,avi,webm|max:20480',
            'cover_image_url' => 'nullable|url',
            'virtual_tour_url' => 'nullable|url',
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',
        ];

        // Only validate as an image if a file is actually uploaded
        if ($request->hasFile('cover_image_file')) {
            $rules['cover_image_file'] = 'image|max:4096';
        }

        $validated = $request->validate($rules);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['has_luxury_layout'] = $request->has('has_luxury_layout');
        $validated['slug'] = Str::slug($request->title);

        // Handle luxury background video upload
        if ($request->hasFile('hero_video_file')) {
            $videoPath = $request->file('hero_video_file')->store('properties/videos', 'public');
            $validated['hero_video_url'] = '/storage/' . $videoPath;
        }

        $property->update($validated);

        // Sync many-to-many amenities pivot
        $property->amenities()->sync($request->input('amenities', []));

        // Process Cover Image Path (either uploaded file or pasted URL)
        $coverPath = null;
        if ($request->hasFile('cover_image_file')) {
            $path = $request->file('cover_image_file')->store('properties', 'public');
            $coverPath = '/storage/' . $path;
        } elseif ($request->filled('cover_image_url')) {
            $coverPath = $request->cover_image_url;
        }

        // Update cover image
        if ($coverPath) {
            PropertyMedia::updateOrCreate(
                ['property_id' => $property->id, 'is_cover' => true],
                ['file_path' => $coverPath, 'type' => 'image', 'sort_order' => 1]
            );
        }

        // Update virtual tour
        if ($request->filled('virtual_tour_url')) {
            VirtualTour::updateOrCreate(
                ['property_id' => $property->id],
                ['provider' => 'Matterport', 'tour_url' => $request->virtual_tour_url, 'embed_url' => $request->virtual_tour_url, 'is_active' => true]
            );
        }

        // Save perspectives and units if luxury layout is active
        if ($property->has_luxury_layout) {
            $this->saveLuxuryLayoutRelations($request, $property);
        }

        return redirect()->route('admin.properties.index')->with('success', 'Property successfully updated in registry!');
    }

    /**
     * Remove a property from the database.
     */
    public function destroy(string $id): RedirectResponse
    {
        $property = Property::findOrFail($id);
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Property successfully removed from registry!');
    }

    /**
     * Save the extra relations for properties using the luxury layout option.
     */
    protected function saveLuxuryLayoutRelations(Request $request, Property $property): void
    {
        // 1. Save Perspectives
        $keys = ['front', 'left', 'right', 'back'];
        foreach ($keys as $key) {
            $pData = $request->input("perspectives.{$key}");
            if (!$pData) continue;

            $existing = PropertyPerspective::where('property_id', $property->id)
                ->where('perspective_key', $key)->first();
            
            $imagePath = $existing ? $existing->image_path : null;
            if ($request->hasFile("perspective_files.{$key}")) {
                $path = $request->file("perspective_files.{$key}")->store('properties/perspectives', 'public');
                $imagePath = '/storage/' . $path;
            } elseif (!empty($pData['image_url'])) {
                $imagePath = $pData['image_url'];
            }

            if ($imagePath || !empty($pData['title'])) {
                PropertyPerspective::updateOrCreate(
                    ['property_id' => $property->id, 'perspective_key' => $key],
                    [
                        'title' => $pData['title'] ?? ucfirst($key) . ' View',
                        'subtitle' => $pData['subtitle'] ?? '',
                        'image_path' => $imagePath ?? '/lumiere/' . $key . '-view-night.png',
                        'description' => $pData['description'] ?? '',
                    ]
                );
            }
        }

        // 2. Save Units (Suites)
        if ($request->has('units')) {
            $submittedUnitIds = [];
            foreach ($request->input('units') as $index => $uData) {
                if (empty($uData['name'])) continue;

                $unitId = $uData['id'] ?? null;
                $existingUnit = $unitId ? PropertyUnit::find($unitId) : null;

                $unitImagePath = $existingUnit ? $existingUnit->image_path : '/lumiere/int-1.png'; // fallback
                if ($request->hasFile("unit_files.{$index}")) {
                    $path = $request->file("unit_files.{$index}")->store('properties/units', 'public');
                    $unitImagePath = '/storage/' . $path;
                } elseif (!empty($uData['image_url'])) {
                    $unitImagePath = $uData['image_url'];
                }

                // Decode hotspots if they are submitted as JSON or build them from structured inputs
                $hotspots = [];
                if (!empty($uData['hotspots_json'])) {
                    $hotspots = json_decode($uData['hotspots_json'], true) ?? [];
                } elseif (!empty($uData['hotspots'])) {
                    $hotspots = $uData['hotspots'];
                }

                $unit = PropertyUnit::updateOrCreate(
                    ['id' => $unitId, 'property_id' => $property->id],
                    [
                        'name' => $uData['name'],
                        'badge' => $uData['badge'] ?? null,
                        'image_path' => $unitImagePath,
                        'description' => $uData['description'] ?? '',
                        'bedrooms' => (int)($uData['bedrooms'] ?? 0),
                        'bathrooms' => (int)($uData['bathrooms'] ?? 0),
                        'floor_area' => !empty($uData['floor_area']) ? (int)$uData['floor_area'] : null,
                        'outright_price' => (float)($uData['outright_price'] ?? 0),
                        'has_installment' => isset($uData['has_installment']) && $uData['has_installment'] == '1',
                        'installment_duration' => !empty($uData['installment_duration']) ? (int)$uData['installment_duration'] : null,
                        'installment_total_price' => !empty($uData['installment_total_price']) ? (float)$uData['installment_total_price'] : null,
                        'installment_deposit_percent' => !empty($uData['installment_deposit_percent']) ? (float)$uData['installment_deposit_percent'] : 30.00,
                        'installment_monthly_payment' => !empty($uData['installment_monthly_payment']) ? (float)$uData['installment_monthly_payment'] : null,
                        'hotspots' => $hotspots,
                    ]
                );

                $submittedUnitIds[] = $unit->id;
            }

            // Clean up deleted units
            PropertyUnit::where('property_id', $property->id)
                ->whereNotIn('id', $submittedUnitIds)
                ->delete();
        }
    }
}
