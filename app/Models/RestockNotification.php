<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestockNotification extends Model
{
    protected $fillable = ['product_id', 'email', 'notified_at'];

    protected $casts = ['notified_at' => 'datetime'];
}
