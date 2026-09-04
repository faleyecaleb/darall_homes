<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    protected $fillable = ['name', 'type', 'parent_id'];

    /**
     * Get the parent location (e.g., Area belongs to City).
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    /**
     * Get the child locations (e.g., City has many Areas).
     */
    public function children(): HasMany
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    /**
     * Get the properties located in this location.
     */
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'location_id');
    }
}
