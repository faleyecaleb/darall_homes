<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyEnquiry;
use App\Models\InspectionRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display the dynamic property catalog with search and filtering.
     */
    public function index(Request $request): View
    {
        $query = Property::with(['category', 'location', 'coverImage', 'virtualTour']);

        // 1. Filter by Location ID
        if ($request->filled('location')) {
            $query->where('location_id', $request->location);
        }

        // 2. Filter by Property Category ID
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // 3. Filter by Transaction Type (Sale, Rent, Shortlet)
        if ($request->filled('type')) {
            $query->where('property_type', $request->type);
        }

        // 4. Filter by Price Budgets Tiers
        if ($request->filled('price_range')) {
            switch ($request->price_range) {
                case 'under-150m':
                    $query->where('price', '<', 150000000);
                    break;
                case '150m-300m':
                    $query->whereBetween('price', [150000000, 300000000]);
                    break;
                case '300m-500m':
                    $query->whereBetween('price', [300000000, 500000000]);
                    break;
                case 'above-500m':
                    $query->where('price', '>', 500000000);
                    break;
            }
        }

        // 5. Custom Sorting Options
        $sortBy = $request->get('sort', 'newest');
        if ($sortBy === 'price-low') {
            $query->orderBy('price', 'asc');
        } elseif ($sortBy === 'price-high') {
            $query->orderBy('price', 'desc');
        } else {
            $query->orderBy('created_at', 'desc');
        }

        // Paginate listings (9 properties per page)
        $properties = $query->paginate(9)->withQueryString();

        // Retrieve dropdown select values for the filters
        $locations = Location::where('type', 'Area')->get();
        $categories = PropertyCategory::all();

        return view('properties.index', compact('properties', 'locations', 'categories'));
    }

    /**
     * Display a premium dynamic property showroom detail page.
     */
    public function show(string $slug): View
    {
        // Load the property with all necessary media and relationships
        $property = Property::with(['category', 'location', 'amenities', 'media', 'virtualTour'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Fetch similar properties within the same category for recommendations
        $similarProperties = Property::with(['category', 'location', 'coverImage'])
            ->where('id', '!=', $property->id)
            ->where('category_id', $property->category_id)
            ->take(3)
            ->get();

        return view('properties.show', compact('property', 'similarProperties'));
    }

    /**
     * Submit an enquiry for a specific property.
     */
    public function enquire(Request $request, string $slug): RedirectResponse
    {
        $property = Property::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'message' => 'required|string',
        ]);

        PropertyEnquiry::create([
            'property_id' => $property->id,
            'user_id' => auth()->id(), // null if guest
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['message'],
            'status' => 'New',
        ]);

        return back()->with('success', 'Your corporate enquiry was successfully sent! An elite agent will contact you shortly.');
    }

    /**
     * Book a physical inspection for a specific property.
     */
    public function book(Request $request, string $slug): RedirectResponse
    {
        $property = Property::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'requested_date' => 'required|date|after:today',
            'requested_time' => 'required|string|in:Morning,Afternoon,Evening',
            'notes' => 'nullable|string',
        ]);

        // Auto-create PropertyEnquiry for unified CRM lead tracking
        PropertyEnquiry::create([
            'property_id' => $property->id,
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => 'Requested Private Inspection on ' . $validated['requested_date'] . ' during ' . $validated['requested_time'] . '. Notes: ' . ($validated['notes'] ?? 'None'),
            'status' => 'New',
        ]);

        // Create the actual Inspection request
        InspectionRequest::create([
            'property_id' => $property->id,
            'user_id' => auth()->id(),
            'requested_date' => $validated['requested_date'],
            'requested_time' => $validated['requested_time'],
            'status' => 'Pending',
            'notes' => $validated['notes'],
        ]);

        return back()->with('success', 'Private inspection request received! We are coordinating schedules and will confirm via email shortly.');
    }
}
