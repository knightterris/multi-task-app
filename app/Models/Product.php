<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'comment',
        'wishlist_status',
        // 'like_status'
    ];
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
