<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VirtualTour extends Model
{
    protected $fillable = ['property_id', 'provider', 'tour_url', 'embed_url', 'thumbnail', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get the property associated with this virtual tour.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
