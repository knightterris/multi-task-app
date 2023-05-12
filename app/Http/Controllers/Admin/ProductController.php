<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Reaction;
use App\Models\MyWishList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;

class ProductController extends Controller
{
    use MediaUploadingTrait;
    // public function createFood(Request $request){
    //     $this->foodValidation($request);
    //     $data = $this->getProductData($request);
    //     if ($request->hasFile('product_image')) {
    //         $image_name = uniqid().$request->file('product_image')->getClientOriginalName();
    //         $request->file('product_image')->storeAs('public/product_images',$image_name);
    //         $data['image'] = $image_name;
    //     }
    //     Product::create($data);
    //     if ($request->input('photo', false)) {
    //         $data->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
    //     }

    //     if ($media = $request->input('ck-media', false)) {
    //         Media::whereIn('id', $media)->update(['model_id' => $data->id]);
    //     }
    //     // $this->getMultipleImages($request);
    //     return "You have created your product successfully.";
    // }

    public function createFood(Request $request)
    {
        $this->foodValidation($request);
        $data = $this->getProductData($request);
        $product = Product::create($data); // Create a new product

        if ($request->input('photo', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

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
        // dd($request->all());
        $this->foodValidation($request);
        $data = $this->getProductData($request);
        if($request->hasFile('product_image')){
            $image_name = uniqid().$request->file('product_image')->getClientOriginalName();
            $request->file('product_image')->storeAs('public/product_images',$image_name);
            $data['image'] = $image_name;
        }
        // $this->getMultipleImages($request);
        Product::where('id',$request->product_id)->update($data);
        if ($request->hasFile('productImages')) {
            // $product = Product::get();
            $product = Product::where('id',$request->product_id)->get();
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
        $wishlist_status = [ 'wishlist_status'=>1 ];
        MyWishList::create($data);
        Product::where('id',$request->product_id)->update($wishlist_status);
        return "You have added this product to wishlist.";
    }
    public function removeWishlist($id){
        MyWishList::where('product_id',$id)->delete();
        $data = [ 'wishlist_status'=>0 ];
        Product::where('id',$id)->update($data);
        return back()->with(['remove_success'=>'You have removed an item from your wishlist.']);
    }
    public function addLike(Request $request){
        $product = Product::where('id',$request->each_id)->first();
        $data = [
            'like'=>$product->like + 1,
        ];
        Product::where('id',$request->each_id)->update($data);
        $reaction_data = [
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->each_id,
        ];
        Reaction::create($reaction_data);

        $data['id'] = Product::where('id',$request->each_id)->pluck('id');
        $data['like_status'] = 'liked';
        return response()->json($data, 200);
    }
    public function dislike(Request $request){
        $product = Product::where('id',$request->each_id)->first();
        $data = [
            'like'=>$product->like - 1,
        ];
        Product::where('id',$request->each_id)->update($data);

        Reaction::where('user_id',Auth::user()->id)
                ->where('product_id',$request->each_id)->delete();

        $data['id'] = Product::where('id',$request->each_id)->pluck('id');
        $data['like_status'] = 'unliked';
        return response()->json($data, 200,['Unliked']);
    }
    public function addComment(Request $request){
        $data = [
            'user_id'=>Auth::user()->id,
            'product_id'=>$request->product_id,
            'message'=>$request->message
        ];
        $product = Product::where('id',$request->product_id)->first();
        $cmt = [
            'comment'=>$product->comment + 1
        ];
        Comment::create($data);
        Product::where('id',$request->product_id)->update($cmt);
        return"You added a comment";
    }


    public function storeCKEditorImages(Request $request)
    {

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
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
            'created_by_id'=>Auth::user()->id,
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