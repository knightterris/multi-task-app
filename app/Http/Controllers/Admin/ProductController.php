<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Image;
use App\Models\Product;
use App\Models\MyWishList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function createFood(Request $request){
        $this->foodValidation($request);
        $data = $this->getProductData($request);
        if ($request->hasFile('product_image')) {
            $image_name = uniqid().$request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/product_images',$image_name);
            $data['image'] = $image_name;
        }
        Product::create($data);
        $this->getMultipleImages($request);
        return "You have created your product successfully.";
    }
    public function deleteCoverimage($id){
        $data = Product::where('id',$id)->first();
        $image_path = public_path().'/storage/product_images/'.$data->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data->image = NULL;
        $data->save();
        return "You have removed cover image.";
    }
    public function deleteEachImage(Request $request,$id){
        $data = Image::where('id',$request->image_id)->first();
        $image_path = public_path().'/storage/product_images/'.$data->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        Image::where('id',$request->image_id)->delete();
        return "You have removed an image.";
    }
    public function updateProduct(Request $request){
        $this->foodValidation($request);
        $data = $this->getProductData($request);
        if($request->hasFile('product_image')){
            $image_name = uniqid().$request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/product_images',$image_name);
            $data['image'] = $image_name;
        }
        Product::where('id',$request->product_id)->update($data);
        $this->getMultipleImages($request);
        return "You have updated your product successfully.";
    }
    public function deleteProduct(Request $request){
        $data = Product::where('id',$request->product_id)->first();
        $image_path = public_path().'/storage/product_images/'.$data->image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data = Image::where('product_id',$request->product_id)->pluck('image');
        foreach ($data as $item) {
            $image_path = public_path().'/storage/product_images/'.$item;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }
        Product::where('id',$request->product_id)->delete();
        Image::where('product_id',$request->product_id)->delete();
        return"A product has been deleted.";
    }
    public function addWishList(Request $request){
        $data = [
            'product_id'=>$request->product_id,
            'user_id'=>Auth::user()->id,
        ];
        MyWishList::create($data);
        return "You have added this product to wishlist.";
    }

    private function foodValidation($request){
        Validator::make($request->all(),[
            'product_name'=>'required',
            'product_description'=>'required',
            'product_price'=>'required',
            'product_category'=>'required',
            'product_count'=>'required',
            'product_status'=>'required',
        ])->validate();
    }
    private function getProductData($request){
        return[
            'name'=>$request->product_name,
            'description'=>$request->product_description,
            'price'=>$request->product_price,
            'category_id'=>$request->product_category,
            'count'=>$request->product_count,
            'status'=>$request->product_status,
            'created_by'=>Auth::user()->name,
            'product_type'=>$request->product_type,
        ];
    }
    private function getMultipleImages($request){
        if ($request->hasFile('product_images')) {
            $product = Product::get();
            for ($i=0; $i < count($product); $i++) {
                $product_id = $product[$i]['id'];
            }
            $files = $request->file('product_images');
            foreach($files as $file){
                $fileName = uniqid().$file->getClientOriginalName();
                $file->storeAs('public/product_images',$fileName);
                $gallery = new Image();
                $gallery->image = $fileName;
                $gallery->product_id = $product_id;
                $gallery->save();
            }
        }
    }
}

