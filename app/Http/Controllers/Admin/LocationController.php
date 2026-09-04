<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class LocationController extends Controller
{
    /**
     * Display a listing of locations.
     */
    public function index(): View
    {
        $locations = Location::withCount('properties')->where('type', 'Area')->get();
        return view('admin.locations.index', compact('locations'));
    }

    /**
     * Store a newly created location.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:locations,name',
        ]);

        // Automatically associate parent_id to Lagos City (which has ID 3) for initial Nigeria/Lagos area scope
        Location::create([
            'name' => $validated['name'],
            'type' => 'Area',
            'parent_id' => 3, // Lagos City ID
        ]);

        return redirect()->route('admin.locations.index')->with('success', 'Location Area successfully created!');
    }

    /**
     * Update the specified location.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $location = Location::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:locations,name,' . $location->id,
        ]);

        $location->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('admin.locations.index')->with('success', 'Location Area successfully updated!');
    }

    /**
     * Remove the specified location.
     */
    public function destroy(string $id): RedirectResponse
    {
        $location = Location::findOrFail($id);

        if ($location->properties()->count() > 0) {
            return redirect()->route('admin.locations.index')->with('error', 'Cannot delete location. It has active properties linked to it!');
        }

        $location->delete();
        return redirect()->route('admin.locations.index')->with('success', 'Location Area successfully removed!');
    }
}
