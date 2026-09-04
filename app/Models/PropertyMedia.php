<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyMedia extends Model
{
    protected $table = 'property_media';

    protected $fillable = ['property_id', 'file_path', 'type', 'is_cover', 'sort_order'];

    protected $casts = [
        'is_cover' => 'boolean'
    ];

    /**
     * Get the property associated with this media file.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
