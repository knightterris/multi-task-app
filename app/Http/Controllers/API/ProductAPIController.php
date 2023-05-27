<?php

namespace App\Http\Controllers\API;

use App\Models\Image;
use App\Models\Product;
use App\Models\Reaction;
use App\Models\MyWishList;
use App\Models\FoodCategory;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductAPIController extends Controller
{
    public function getAllProducts(){
        $data = Product::with('reactions')->get();

        return response()->json($data, 200);
    }
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
        // $data = Product::where('id',$id)->first();
        // $image_path = public_path().'/storage/product_images/'.$data->image;
        // if(file_exists($image_path)){
        //     unlink($image_path);
        // }
        // $data = Image::where('product_id',$id)->pluck('image');
        // foreach ($data as $item) {
        //     $image_path = public_path().'/storage/product_images/'.$item;
        //     if(file_exists($image_path)){
        //         unlink($image_path);
        //     }
        // }
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
            // $product = Product::get();
            $product = Product::where('id',$id)->get();
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

    public function getMyWishList($id){
        $data = DB::table('my_wish_lists')
                    ->join('products','my_wish_lists.product_id','products.id')
                    ->where('my_wish_lists.user_id',$id)->where('products.wishlist_status',1)->get();
        // $data = MyWishList::where('user_id',$id)->get();
        return response()->json($data, 200);
    }
    public function addBookmark(Request $request,$id){
        $product = Product::where('id',$id)->first();
        // dd($product);
        $auth_user_id = $request->auth_user_id;
        $product_id = $product->id;
        $wishlist = [
            'user_id'=>$auth_user_id,
            'product_id'=>$product_id,
        ];
        MyWishList::create($wishlist);
        $wishlist_status = ['wishlist_status'=>1];
        Product::where('id',$id)->update($wishlist_status);
        $data = Product::find($id);
        // return "Bookmark added.";
        return response()->json($data, 200);
    }
    public function removeBookmark($id){
        MyWishList::where('product_id',$id)->delete();
        $wishlist_status = ['wishlist_status'=>0];
        Product::where('id',$id)->update($wishlist_status);
        $data = Product::find($id);
        // dd($data);
        // return "Bookmark removed.";
        return response()->json($data, 200);
    }

    public function addLike(Request $request){
        // return $request->product_id;
        $product = Product::where('id',$request->product_id)->first();
        $like = [
            'like'=>$product->like + 1,
        ];
        Product::where('id',$request->product_id)->update($like);
        $reaction = [
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id
        ];
        Reaction::create($reaction);

        $likes = Product::with(['reactions' => function ($query) use ($request) {
            $query->where('product_id', $request->product_id);
        }])->where('id', $request->product_id)->get();

        return response()->json($likes, 200);
    }

    public function dislike(Request $request){
        // product_id,user_id
        $product = Product::where('id',$request->product_id)->first();
        $data = [
            'like'=>$product->like - 1,
        ];
        Product::where('id',$request->product_id)->update($data);

        Reaction::where('user_id',$request->user_id)
                ->where('product_id',$request->product_id)->delete();

        // $likes = Product::with('reactions')->get();
        // return response()->json($likes, 200);
        $likeCount = Product::where('id', $request->product_id)->value('like');
        return response()->json(['like' => $likeCount], 200);
    }

}