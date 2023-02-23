<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
        'count',
        'status',
        'created_by',
        'created_by_id',
        'product_type',
        'like',
        'wishlist_status',
        'like_status'
    ];
    //status=> 0 -> instock, 1 -> outofStock
}
