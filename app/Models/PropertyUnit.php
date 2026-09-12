<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyUnit extends Model
{
    protected $fillable = [
        'property_id',
        'name',
        'badge',
        'image_path',
        'description',
        'bedrooms',
        'bathrooms',
        'floor_area',
        'outright_price',
        'has_installment',
        'installment_duration',
        'installment_total_price',
        'installment_deposit_percent',
        'installment_monthly_payment',
        'hotspots',
    ];

    protected $casts = [
        'has_installment' => 'boolean',
        'outright_price' => 'decimal:2',
        'installment_total_price' => 'decimal:2',
        'installment_deposit_percent' => 'decimal:2',
        'installment_monthly_payment' => 'decimal:2',
        'hotspots' => 'array', // automatically serialize/deserialize JSON arrays
    ];

    /**
     * Get the property that this unit belongs to.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
