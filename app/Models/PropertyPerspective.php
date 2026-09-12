<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyPerspective extends Model
{
    protected $fillable = [
        'property_id',
        'perspective_key',
        'title',
        'subtitle',
        'image_path',
        'description',
    ];

    /**
     * Get the property that this perspective belongs to.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
