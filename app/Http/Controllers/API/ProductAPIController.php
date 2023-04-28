<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use App\Models\Product;
use App\Models\FoodCategory;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAPIController extends Controller
{
    public function getCategories(){
        $foodCategories = FoodCategory::get();
        $itemCategories = ItemCategory::get();
        $categories = [
            'food_categories' => $foodCategories,
            'item_categories' => $itemCategories
        ];
        return response()->json($categories, 200);
    }
    public function createProduct(Request $request){
        // return $request->file('productImages[]');
        $data = [
            'name'=>$request->input('productName'),
            'description'=>$request->input('productDescription'),
            'price'=>$request->input('productPrice'),
            'category_id'=>$request->input('productCategory'),
            'count'=>$request->input('productCount'),
            'status'=>$request->input('productStatus'),
            'product_type'=>$request->input('productType'),
            'created_by'=>$request->input('created_by'),
            'created_by_id'=>$request->input('created_by_id'),
        ];
        if($request->hasFile('productImage')){
            $fileName = uniqid().$request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->storeAs('public/product_images',$fileName);
            $data['image'] = $fileName;
        }
        Product::create($data);

        if ($request->hasFile('productImages')) {
            $product = Product::get();
            for ($i=0; $i < count($product); $i++) {
                $product_id = $product[$i]['id'];
            }
            $files = $request->file('productImages');
            foreach($files as $file){
                $fileName = uniqid().$file->getClientOriginalName();
                $file->storeAs('public/product_images',$fileName);
                $gallery = new Image();
                $gallery->image = $fileName;
                $gallery->product_id = $product_id;
                $gallery->save();
            }
        }
        return 'Product Created';
    }
}
