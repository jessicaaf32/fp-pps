<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product',
        'ket1',
        'heigt',
        'ket3',
        'gambar',
        'price',
        'category_id',
        'stock'
    ];


    protected $table = 'products';

}
 