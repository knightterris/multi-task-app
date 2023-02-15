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
        'product_type',
        'like'
    ];
    //status=> 0 -> instock, 1 -> outofStock
}
