<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataSearchingController extends Controller
{
    public function generalSearch(){
        $data = Product::leftJoin('food_categories','products.category_id','food_categories.id')
                        ->leftJoin('item_categories','products.category_id','item_categories.id')
                        ->leftJoin('users','products.created_by_id','users.id')
                        ->select('food_categories.*','item_categories.*','users.*')
                        ->when(request('key'),function($query){
                            $query->orWhere('food_categories.name','like','%'.request('key').'&')
                                  ->orWhere('food_categories.description','like','%'.request('key').'&')
                                  ->orWhere('item_categories.name','like','%'.request('key').'&')
                                  ->orWhere('item_categories.description','like','%'.request('key').'&')
                                  ->orWhere('users.name','like','%'.request('key').'&')
                                  ->orWhere('users.email','like','%'.request('key').'&')
                                  ->orWhere('users.address','like','%'.request('key').'&')
                                  ->orWhere('users.gender','like','%'.request('key').'&')
                                  ->orWhere('products.name', 'like', '%' . request('key') . '%')
                                  ->orWhere('products.description', 'like', '%' . request('key') . '%')
                                  ->orWhere('products.price', 'like', '%' . request('key') . '%')
                                  ->orWhere('products.created_by', 'like', '%' . request('key') . '%')
                                  ->orWhere('products.product_type', 'like', '%' . request('key') . '%');
        })->get();
        return response()->json($data, 200);
    }
}
