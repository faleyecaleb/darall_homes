<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings and a monthly calendar visualization.
     */
    public function index(Request $request)
    {
        // 1. Fetch bookings grid list (latest first)
        $bookings = Booking::with('property')->latest()->get();

        // 2. Fetch all shortlet properties to populate calendar filters
        $shortlets = Property::where('property_type', 'Shortlet')->get();

        // 3. Resolve active calendar year & month
        $month = intval($request->input('month', date('n')));
        $year = intval($request->input('year', date('Y')));
        
        // Safety bound constraints
        if ($month < 1 || $month > 12) $month = date('n');
        if ($year < 2020 || $year > 2050) $year = date('Y');

        $currentMonth = Carbon::createFromDate($year, $month, 1);
        
        // 4. Fetch all active bookings intersecting with this active month
        $monthStart = $currentMonth->copy()->startOfMonth()->format('Y-m-d');
        $monthEnd = $currentMonth->copy()->endOfMonth()->format('Y-m-d');

        $activeReservations = Booking::with('property')
            ->where('status', '!=', 'Cancelled')
            ->where('check_in_date', '<=', $monthEnd)
            ->where('check_out_date', '>=', $monthStart)
            ->get();

        return view('admin.bookings.index', compact(
            'bookings', 
            'shortlets',
            'month', 
            'year', 
            'currentMonth', 
            'activeReservations'
        ));
    }

    /**
     * Update status and payment details of a reservation.
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Cancelled,Completed',
            'payment_status' => 'required|in:Unpaid,Paid,Refunded',
        ]);

        $booking->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
        ]);

        return back()->with('success', 'Reservation status and payment details updated successfully!');
    }

    /**
     * Delete a booking entirely from the system.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return back()->with('success', 'Reservation record successfully removed from portal database.');
    }
}
