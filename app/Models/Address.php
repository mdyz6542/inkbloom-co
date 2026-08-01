<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    protected $fillable = [
        'user_id', 'order_id', 'name', 'phone',
        'line1', 'line2', 'city', 'province', 'postal_code', 'is_default',
    ];

    protected $casts = ['is_default' => 'boolean'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
