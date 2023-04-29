<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use App\Models\Product;
use App\Models\FoodCategory;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function deleteProduct(Request $request){
        $id = $request->product_id;
        $data = Product::where('id',$id)->first();
        $image_path = public_path().'/storage/product_images/'.$data->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data = Image::where('product_id',$id)->pluck('image');
        foreach ($data as $item) {
            $image_path = public_path().'/storage/product_images/'.$item;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }
        Product::where('id',$id)->delete();
        Image::where('product_id',$id)->delete();
        return 'Product Deleted';
    }
    public function getProduct($id){
        $products = DB::table('products')
                    ->join('users','products.created_by_id','users.id')
                    ->select('products.*', 'users.phone as creator_phone','users.email as creator_email','users.name as creator_name')
                    ->where('products.id',$id)->first();
        $images = Image::where('product_id',$id)->get();
        $itemCategory = ItemCategory::where('id',$products->category_id)->first();
        $foodCategory = FoodCategory::where('id',$products->category_id)->first();
        return response()->json([
            'products'=>$products,
            'images'=>$images,
            'itemCategory'=>$itemCategory,
            'foodCategory'=>$foodCategory,
        ]);
    }
    public function getEditProductData($id){
        $products = DB::table('products')
                    ->join('users','products.created_by_id','users.id')
                    ->select('products.*', 'users.phone as creator_phone','users.email as creator_email','users.name as creator_name')
                    ->where('products.id',$id)->first();
        $images = Image::where('product_id',$id)->get();
        $itemCategory = ItemCategory::get();
        $foodCategory = FoodCategory::get();
        return response()->json([
            'products'=>$products,
            'images'=>$images,
            'itemCategory'=>$itemCategory,
            'foodCategory'=>$foodCategory,
        ]);
    }
    public function deleteCoverImage($id){
        $data = Product::where('id',$id)->first();
        $image_path = public_path().'/storage/product_images/'.$data->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data->image = NULL;
        $data->save();
        return response()->json($data, 200);
    }

    public function deleteEachImage($id){
        $data = Image::where('id',$id)->first();
        $image_path = public_path().'/storage/product_images/'.$data->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        Image::where('id',$id)->delete();
        return response()->json($data, 200);
    }

    public function updateProduct(Request $request,$id){
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
        Product::where('id',$id)->update($data);

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
        return 'Product Updated';
    }
}
