<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_name',
        'price',
        'qty',
    ];

    // Relasi: item milik 1 order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
