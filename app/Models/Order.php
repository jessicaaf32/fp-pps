<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'receiver_name',
        'receiver_phone',
        'receiver_address',
        'payment_method',
        'va_number',
        'qris_image',
        'total',
        'status',
    ];

    // Relasi: 1 order punya banyak item
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    // Relasi: order dimiliki oleh user (opsional)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
