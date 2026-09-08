<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyEnquiry extends Model
{
    protected $table = 'property_enquiries';

    protected $fillable = ['property_id', 'user_id', 'name', 'email', 'phone', 'message', 'status'];

    /**
     * Get the property associated with this enquiry.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    /**
     * Get the authenticated user associated with this enquiry, if any.
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
        static::created(function ($enquiry) {
            \App\Models\ActivityLog::log('Enquiry Received', 'Received new customer lead/enquiry from "' . $enquiry->name . '" (' . $enquiry->email . ') regarding listing "' . ($enquiry->property->title ?? 'N/A') . '".');
        });

        static::updated(function ($enquiry) {
            \App\Models\ActivityLog::log('Enquiry Updated', 'Updated pipeline status to "' . $enquiry->status . '" for customer enquiry from "' . $enquiry->name . '" (ID: ' . $enquiry->id . ').');
        });

        static::deleted(function ($enquiry) {
            \App\Models\ActivityLog::log('Enquiry Deleted', 'Deleted customer enquiry record from "' . $enquiry->name . '" (ID: ' . $enquiry->id . ').');
        });
    }
}
