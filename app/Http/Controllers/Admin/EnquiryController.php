<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyEnquiry;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EnquiryController extends Controller
{
    /**
     * Display a listing of enquiries.
     */
    public function index(): View
    {
        $enquiries = PropertyEnquiry::with('property')->latest()->get();
        return view('admin.enquiries.index', compact('enquiries'));
    }

    /**
     * Update the status of an enquiry.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $enquiry = PropertyEnquiry::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|in:New,Contacted,Qualified,Closed',
        ]);

        $enquiry->update([
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry status successfully updated!');
    }

    /**
     * Remove an enquiry from the database.
     */
    public function destroy(string $id): RedirectResponse
    {
        $enquiry = PropertyEnquiry::findOrFail($id);
        $enquiry->delete();

        return redirect()->route('admin.enquiries.index')->with('success', 'Enquiry successfully removed!');
    }
}
