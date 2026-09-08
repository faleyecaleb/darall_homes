<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $table = 'activity_logs';

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'action',
        'description',
        'ip_address',
        'user_agent',
    ];

    /**
     * Get the user who performed this action.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Helper static method to instantly write to the system audit ledger from anywhere in the codebase.
     */
    public static function log(string $action, string $description): self
    {
        return self::create([
            'user_id' => auth()->id(),
            'user_name' => auth()->user()->name ?? 'Guest User',
            'user_email' => auth()->user()->email ?? 'guest@darallhomes.com',
            'action' => $action,
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
