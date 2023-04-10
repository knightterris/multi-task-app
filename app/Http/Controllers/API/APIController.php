<?php

namespace App\Http\Controllers\API;

use App\Models\FoodCategory;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function getFoodCategory(){
        $foodCategory = FoodCategory::get();
        return response()->json($foodCategory, 200);
    }
    public function getItemCategory(){
        $itemCategory = ItemCategory::get();
        return response()->json($itemCategory, 200);
    }
}