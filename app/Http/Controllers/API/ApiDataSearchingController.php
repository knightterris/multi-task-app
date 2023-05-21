<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiDataSearchingController extends Controller
{
    public function generalSearch(Request $request){
        // return($request->name);
        $name = $request->name;
        $data = Product::
        join('food_categories','products.category_id','food_categories.id')
                        ->join('item_categories','products.category_id','item_categories.id')
                        ->join('users','products.created_by_id','users.id')
                        ->select('food_categories.*','item_categories.*','users.*')
                        ->where(function ($query) use ($name) {
                            $query->orWhere('food_categories.name','like','%'.$name.'&')
                                  ->orWhere('food_categories.description','like','%'.$name.'&')
                                  ->orWhere('item_categories.name','like','%'.$name.'&')
                                  ->orWhere('item_categories.description','like','%'.$name.'&')
                                  ->orWhere('users.name','like','%'.$name.'&')
                                  ->orWhere('users.email','like','%'.$name.'&')
                                  ->orWhere('users.address','like','%'.$name.'&')
                                  ->orWhere('users.gender','like','%'.$name.'&')
                                  ->orWhere('products.name', 'like', '%'.$name.'%')

                                  ->orWhere('products.description', 'like','%'.$name.'%')
                                  ->orWhere('products.price', 'like','%'.$name.'%')
                                  ->orWhere('products.created_by', 'like','%'.$name.'%')
                                  ->orWhere('products.product_type', 'like','%'.$name.'%');
        })->get();
        return response()->json($data, 200);
    }
}