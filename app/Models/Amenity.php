<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Amenity extends Model
{
    protected $fillable = ['name', 'icon'];

    /**
     * Get the properties associated with this amenity.
     */
    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class, 'property_amenity');
    }

    /**
     * Booted event listener for automatic operations auditing.
     */
    protected static function booted()
    {
        static::created(function ($amenity) {
            \App\Models\ActivityLog::log('Amenity Created', 'Created a new premium amenity named "' . $amenity->name . '" (Icon: ' . $amenity->icon . ').');
        });

        static::updated(function ($amenity) {
            \App\Models\ActivityLog::log('Amenity Updated', 'Updated details for premium amenity "' . $amenity->name . '" (ID: ' . $amenity->id . ').');
        });

        static::deleted(function ($amenity) {
            \App\Models\ActivityLog::log('Amenity Deleted', 'Permanently deleted premium amenity "' . $amenity->name . '" (ID: ' . $amenity->id . ').');
        });
    }
}
