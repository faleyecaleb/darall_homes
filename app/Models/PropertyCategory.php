<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PropertyCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    /**
     * Get the properties associated with this category.
     */
    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'category_id');
    }

    /**
     * Booted event listener for automatic operations auditing.
     */
    protected static function booted()
    {
        static::created(function ($category) {
            \App\Models\ActivityLog::log('Category Created', 'Created a new property category named "' . $category->name . '" (Slug: ' . $category->slug . ').');
        });

        static::updated(function ($category) {
            \App\Models\ActivityLog::log('Category Updated', 'Updated details for property category "' . $category->name . '" (ID: ' . $category->id . ').');
        });

        static::deleted(function ($category) {
            \App\Models\ActivityLog::log('Category Deleted', 'Permanently deleted property category "' . $category->name . '" (ID: ' . $category->id . ').');
        });
    }
}
