<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InspectionRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class InspectionController extends Controller
{
    /**
     * Display a listing of inspection requests.
     */
    public function index(): View
    {
        $inspections = InspectionRequest::with(['property', 'user', 'agent'])->latest()->get();
        // Fetch all users who have the role of Agent (role_id = 3) or Admin (role_id = 2) for assignment options
        $agents = User::whereIn('role_id', [2, 3])->get();

        return view('admin.inspections.index', compact('inspections', 'agents'));
    }

    /**
     * Update the specified inspection request (status and agent assignment).
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $inspection = InspectionRequest::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|in:Pending,Confirmed,Completed,Cancelled,Rescheduled',
            'assigned_agent_id' => 'nullable|exists:users,id',
            'notes' => 'nullable|string',
        ]);

        $inspection->update($validated);

        return redirect()->route('admin.inspections.index')->with('success', 'Inspection request successfully updated!');
    }

    /**
     * Remove the specified inspection request from database.
     */
    public function destroy(string $id): RedirectResponse
    {
        $inspection = InspectionRequest::findOrFail($id);
        $inspection->delete();

        return redirect()->route('admin.inspections.index')->with('success', 'Inspection request successfully removed!');
    }
}
