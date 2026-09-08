<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    /**
     * Display a paginated listing of system audit trail activity logs.
     */
    public function index(Request $request)
    {
        $query = ActivityLog::with('user');

        // Search Filters
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('action', 'like', "%{$search}%")
                  ->orWhere('user_name', 'like', "%{$search}%")
                  ->orWhere('user_email', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('ip_address', 'like', "%{$search}%");
            });
        }

        // Action Filter Option
        if ($request->filled('action_filter')) {
            $query->where('action', $request->input('action_filter'));
        }

        // Fetch paginated records (ordered by newest first)
        $logs = $query->latest()->paginate(20)->withQueryString();

        // Fetch distinct actions to populate filtering drop elements
        $distinctActions = ActivityLog::distinct()->pluck('action');

        return view('admin.activity-logs.index', compact('logs', 'distinctActions'));
    }
}
