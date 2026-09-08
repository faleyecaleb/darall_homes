<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Property;
use App\Models\PropertyEnquiry;
use App\Models\InspectionRequest;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display the Revenue & Hospitality Financials Report.
     */
    public function revenue()
    {
        // 1. Core financial stats (sum of all Confirmed/Completed bookings)
        $totalRevenue = Booking::whereIn('status', ['Confirmed', 'Completed'])->sum('total_price');
        $averageBookingValue = Booking::whereIn('status', ['Confirmed', 'Completed'])->avg('total_price') ?? 0;
        
        $totalNightsBooked = Booking::whereIn('status', ['Confirmed', 'Completed'])->get()->sum(function ($b) {
            return $b->check_in_date->diffInDays($b->check_out_date);
        });

        // 2. Earnings breakdown per Shortlet Unit
        $propertyEarnings = Property::where('property_type', 'Shortlet')
            ->withCount(['bookings' => function ($q) {
                $q->whereIn('status', ['Confirmed', 'Completed']);
            }])
            ->get()
            ->map(function ($prop) {
                $revenue = $prop->bookings()
                    ->whereIn('status', ['Confirmed', 'Completed'])
                    ->sum('total_price');
                $prop->total_revenue = $revenue;
                return $prop;
            })->sortByDesc('total_revenue');

        // 3. Payment Status Distribution Ratios
        $paymentPaid = Booking::where('payment_status', 'Paid')->count();
        $paymentUnpaid = Booking::where('payment_status', 'Unpaid')->count();
        $paymentRefunded = Booking::where('payment_status', 'Refunded')->count();
        $totalPaymentRecords = max(1, $paymentPaid + $paymentUnpaid + $paymentRefunded);

        $paymentRatios = [
            'Paid' => round(($paymentPaid / $totalPaymentRecords) * 100, 1),
            'Unpaid' => round(($paymentUnpaid / $totalPaymentRecords) * 100, 1),
            'Refunded' => round(($paymentRefunded / $totalPaymentRecords) * 100, 1),
        ];

        return view('admin.reports.revenue', compact(
            'totalRevenue', 
            'averageBookingValue', 
            'totalNightsBooked', 
            'propertyEarnings',
            'paymentRatios',
            'paymentPaid',
            'paymentUnpaid',
            'paymentRefunded'
        ));
    }

    /**
     * Display the Operations & Lead Intake Funnel Report.
     */
    public function operations()
    {
        // 1. Lead intake totals
        $totalEnquiries = PropertyEnquiry::count();
        $totalInspections = InspectionRequest::count();
        $totalLeads = $totalEnquiries + $totalInspections;

        // 2. Enquiry Pipeline Stages counts
        $enquiryNew = PropertyEnquiry::where('status', 'New')->count();
        $enquiryContacted = PropertyEnquiry::where('status', 'Contacted')->count();
        $enquiryQualified = PropertyEnquiry::where('status', 'Qualified')->count();
        $enquiryClosed = PropertyEnquiry::where('status', 'Closed')->count();

        // 3. Tour Status counts
        $tourPending = InspectionRequest::where('status', 'Pending')->count();
        $tourConfirmed = InspectionRequest::where('status', 'Confirmed')->count();
        $tourCompleted = InspectionRequest::where('status', 'Completed')->count();
        $tourCancelled = InspectionRequest::where('status', 'Cancelled')->count();

        // 4. Property Interest Heatmap (Sum of tours + enquiries per listing)
        $propertyHeatmap = Property::withCount(['enquiries', 'inspectionRequests'])
            ->get()
            ->map(function ($prop) {
                $prop->total_leads = $prop->enquiries_count + $prop->inspection_requests_count;
                return $prop;
            })->sortByDesc('total_leads')->take(5);

        return view('admin.reports.operations', compact(
            'totalEnquiries',
            'totalInspections',
            'totalLeads',
            'enquiryNew',
            'enquiryContacted',
            'enquiryQualified',
            'enquiryClosed',
            'tourPending',
            'tourConfirmed',
            'tourCompleted',
            'tourCancelled',
            'propertyHeatmap'
        ));
    }

    /**
     * Display the Compliance & System Telemetry Report (Strictly Super Admin Only).
     */
    public function compliance()
    {
        // Inline safety gate matching SuperAdmin check
        if (!auth()->check() || !auth()->user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action. Only the Super Admin is authorized to view system compliance analytics.');
        }

        // 1. General telemetry stats
        $totalLogs = ActivityLog::count();
        $uniqueUsersCount = ActivityLog::distinct()->count('user_email');
        $uniqueIpsCount = ActivityLog::distinct()->count('ip_address');

        // 2. Activity events grouped by Category divisions
        $actionCounts = ActivityLog::select('action', DB::raw('count(*) as count'))
            ->groupBy('action')
            ->orderByDesc('count')
            ->get();

        // 3. Top IP addresses footprints logged
        $topIps = ActivityLog::select('ip_address', DB::raw('count(*) as count'))
            ->groupBy('ip_address')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        return view('admin.reports.compliance', compact(
            'totalLogs',
            'uniqueUsersCount',
            'uniqueIpsCount',
            'actionCounts',
            'topIps'
        ));
    }
}
