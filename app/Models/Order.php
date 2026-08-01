<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $with = ['address', 'items'];

    protected $fillable = [
        'user_id', 'guest_email', 'order_number', 'status',
        'subtotal', 'shipping_fee', 'discount', 'total',
        'payment_method', 'payment_status', 'tracking_number',
        'notes', 'gift_wrap',
    ];

    protected $casts = ['gift_wrap' => 'boolean'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
