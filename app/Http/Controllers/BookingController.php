<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Store a new shortlet reservation.
     */
    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:30',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
            'guests_count' => 'required|integer|min:1|max:15',
            'notes' => 'nullable|string|max:1000',
        ]);

        $property = Property::findOrFail($request->property_id);

        // 1. Ensure property is indeed configured for Shortlets
        if ($property->property_type !== 'Shortlet') {
            return back()->with('error', 'This property is not configured for shortlet residential stays.');
        }

        $checkIn = Carbon::parse($request->check_in_date);
        $checkOut = Carbon::parse($request->check_out_date);

        // 2. Strict Overlapping Checking Algorithm (Prevent Double Booking)
        // Checks if any active reservation is occupied during the selected date range
        $overlapping = Booking::where('property_id', $property->id)
            ->where('status', '!=', 'Cancelled')
            ->where(function ($query) use ($checkIn, $checkOut) {
                $query->where('check_in_date', '<', $checkOut)
                      ->where('check_out_date', '>', $checkIn);
            })
            ->exists();

        if ($overlapping) {
            return back()->withInput()->with('error', 'This property is already booked or occupied during your selected date range. Please review our booking calendar below and select vacant dates.');
        }

        // 3. Calculate dynamic pricing based on nights count
        $nights = $checkIn->diffInDays($checkOut);
        if ($nights <= 0) {
            return back()->withInput()->with('error', 'A shortlet stay must consist of at least 1 night.');
        }

        $totalPrice = $property->price * $nights;

        // 4. Record Reservation
        Booking::create([
            'property_id' => $property->id,
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'guests_count' => $request->guests_count,
            'total_price' => $totalPrice,
            'status' => 'Pending',
            'payment_status' => 'Unpaid',
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Your reservation request for ' . $property->title . ' has been logged successfully! Our hospitality team has reserved your dates (' . $checkIn->format('M d') . ' to ' . $checkOut->format('M d') . ') and will contact you shortly to coordinate payment and check-in key handovers.');
    }
}
