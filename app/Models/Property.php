<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Property extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'property_type',
        'status',
        'bedrooms',
        'bathrooms',
        'floor_area',
        'is_featured',
        'category_id',
        'location_id'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'price' => 'decimal:2'
    ];

    /**
     * Get the category that this property belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(PropertyCategory::class, 'category_id');
    }

    /**
     * Get the location that this property belongs to.
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * Get the amenities associated with this property.
     */
    public function amenities(): BelongsToMany
    {
        return $this->belongsToMany(Amenity::class, 'property_amenity');
    }

    /**
     * Get all media files (images/videos) associated with this property.
     */
    public function media(): HasMany
    {
        return $this->hasMany(PropertyMedia::class, 'property_id');
    }

    /**
     * Get the primary cover image of this property.
     */
    public function coverImage(): HasOne
    {
        return $this->hasOne(PropertyMedia::class, 'property_id')->where('is_cover', true);
    }

    /**
     * Get the virtual 3D tour associated with this property.
     */
    public function virtualTour(): HasOne
    {
        return $this->hasOne(VirtualTour::class, 'property_id');
    }

    /**
     * Get the enquiries associated with this property.
     */
    public function enquiries(): HasMany
    {
        return $this->hasMany(PropertyEnquiry::class, 'property_id');
    }

    /**
     * Get the physical inspection requests associated with this property.
     */
    public function inspectionRequests(): HasMany
    {
        return $this->hasMany(InspectionRequest::class, 'property_id');
    }
}
