<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PropertyEnquiry extends Model
{
    protected $table = 'property_enquiries';

    protected $fillable = ['property_id', 'user_id', 'name', 'email', 'phone', 'message', 'status'];

    /**
     * Get the property associated with this enquiry.
     */
    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    /**
     * Get the authenticated user associated with this enquiry, if any.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
