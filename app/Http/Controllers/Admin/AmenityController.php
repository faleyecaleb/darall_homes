<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AmenityController extends Controller
{
    /**
     * Display a listing of amenities.
     */
    public function index(): View
    {
        $amenities = Amenity::withCount('properties')->get();
        return view('admin.amenities.index', compact('amenities'));
    }

    /**
     * Store a newly created amenity in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:amenities,name',
            'icon' => 'nullable|string|max:255',
        ]);

        Amenity::create([
            'name' => $validated['name'],
            'icon' => $validated['icon'] ?? 'star',
        ]);

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity successfully created!');
    }

    /**
     * Update the specified amenity in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $amenity = Amenity::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:amenities,name,' . $amenity->id,
            'icon' => 'nullable|string|max:255',
        ]);

        $amenity->update([
            'name' => $validated['name'],
            'icon' => $validated['icon'] ?? 'star',
        ]);

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity successfully updated!');
    }

    /**
     * Remove the specified amenity from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $amenity = Amenity::findOrFail($id);

        // Detach properties and delete
        $amenity->properties()->detach();
        $amenity->delete();

        return redirect()->route('admin.amenities.index')->with('success', 'Amenity successfully removed!');
    }
}
