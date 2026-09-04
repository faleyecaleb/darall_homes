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
}
