<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'property_id',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'check_in_date',
        'check_out_date',
        'guests_count',
        'total_price',
        'status',
        'payment_status',
        'notes'
    ];

    protected $casts = [
        'check_in_date' => 'date',
        'check_out_date' => 'date',
        'total_price' => 'decimal:2'
    ];

    /**
     * Get the property associated with this booking.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    /**
     * Get the registered member associated with this booking, if any.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Booted event listener for automatic operations auditing.
     */
    protected static function booted()
    {
        static::created(function ($booking) {
            \App\Models\ActivityLog::log('Booking Created', 'A new shortlet reservation was created for "' . $booking->property->title . '" by guest ' . $booking->customer_name . ' from ' . $booking->check_in_date->format('Y-m-d') . ' to ' . $booking->check_out_date->format('Y-m-d') . ' valued at ₦' . number_format($booking->total_price) . '.');
        });

        static::updated(function ($booking) {
            \App\Models\ActivityLog::log('Booking Updated', 'Updated reservation status to "' . $booking->status . '" and payment status to "' . $booking->payment_status . '" for guest ' . $booking->customer_name . ' (Booking ID: ' . $booking->id . ').');
        });

        static::deleted(function ($booking) {
            \App\Models\ActivityLog::log('Booking Removed', 'Permanently removed shortlet reservation record for guest ' . $booking->customer_name . ' (Booking ID: ' . $booking->id . ').');
        });
    }
}
