<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InspectionRequest extends Model
{
    protected $fillable = [
        'property_id',
        'user_id',
        'requested_date',
        'requested_time',
        'status',
        'assigned_agent_id',
        'notes'
    ];

    protected $casts = [
        'requested_date' => 'date'
    ];

    /**
     * Get the property associated with this inspection request.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    /**
     * Get the customer user who requested this inspection.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the agent assigned to this inspection.
     */
    public function agent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_agent_id');
    }

    /**
     * Booted event listener for automatic operations auditing.
     */
    protected static function booted()
    {
        static::created(function ($inspection) {
            \App\Models\ActivityLog::log('Tour Scheduled', 'A new physical showing tour was scheduled for "' . ($inspection->property->title ?? 'N/A') . '" on ' . $inspection->requested_date->format('Y-m-d') . ' during ' . $inspection->requested_time . '.');
        });

        static::updated(function ($inspection) {
            \App\Models\ActivityLog::log('Tour Updated', 'Updated showing status to "' . $inspection->status . '" for listing "' . ($inspection->property->title ?? 'N/A') . '" (Tour ID: ' . $inspection->id . ').');
        });

        static::deleted(function ($inspection) {
            \App\Models\ActivityLog::log('Tour Cancelled', 'Removed physical showing tour record for listing "' . ($inspection->property->title ?? 'N/A') . '" (Tour ID: ' . $inspection->id . ').');
        });
    }
}
