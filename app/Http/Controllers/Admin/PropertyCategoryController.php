<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PropertyCategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index(): View
    {
        $categories = PropertyCategory::withCount('properties')->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_categories,name',
        ]);

        PropertyCategory::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category successfully created!');
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $category = PropertyCategory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:property_categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return redirect()->route('admin.categories.index')->with('success', 'Category successfully updated!');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = PropertyCategory::findOrFail($id);

        if ($category->properties()->count() > 0) {
            return redirect()->route('admin.categories.index')->with('error', 'Cannot delete category. It has active properties linked to it!');
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category successfully removed!');
    }
}
