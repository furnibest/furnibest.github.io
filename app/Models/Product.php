<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'stock', 'image', 'category_id', 'featured', 'promo', 'promo_price'
    ];

    protected $casts = [
        'featured' => 'boolean',
        'promo' => 'boolean',
        'promo_price' => 'integer',
    ];
}
