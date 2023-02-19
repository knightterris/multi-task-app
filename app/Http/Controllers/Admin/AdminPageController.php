<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\Product;
use App\Models\MyWishList;
use App\Models\FoodCategory;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    public function homePage(){
        $data = Product::get();
        return view('admin.home.index',compact('data'));
    }
    public function profilePage(){
        return view('admin.profile.index');
    }
    public function editProfile(){
        return view('admin.profile.edit');
    }
    public function changePasswordPage(){
        return view('admin.profile.password');
    }
    public function categoryPage(){
        $foodCategories = FoodCategory::paginate(10);
        $itemCategories = ItemCategory::paginate(10);
        return view('admin.categories.index',compact('foodCategories','itemCategories'));
    }
    public function editFoodCategory($id){
        $data = FoodCategory::where('id',$id)->first();
        return view('admin.categories.edit',compact('data'));
    }
    public function readItemCategory($id){
        $data = ItemCategory::where('id',$id)->first();
        return view('admin.item.show',compact('data'));
    }
    public function editItemCategory($id){
        $data = ItemCategory::where('id',$id)->first();
        return view('admin.item.edit',compact('data'));
    }
    public function productPage(){
        $data = Product::get();
        return view('admin.product.index',compact('data'));
    }
    public function createFoodPage(){
        $data = FoodCategory::get();
        return view('admin.product.food',compact('data'));
    }
    public function createItemPage(){
        $data = ItemCategory::get();
        return view('admin.product.food',compact('data'));
    }
    public function productEditPage($id){
        $data = Product::where('id',$id)->first();
        $images = Image::where('product_id',$id)->get();
        $itemCategory = ItemCategory::get();
        $foodCategory = FoodCategory::get();
        return view('admin.product.edit',compact('data','images','itemCategory','foodCategory'));
    }
    public function showProductPage($id){
        $data = Product::where('id',$id)->first();
        $images = Image::where('product_id',$id)->get();
        $itemCategory = ItemCategory::where('id',$data->category_id)->first();
        $foodCategory = FoodCategory::where('id',$data->category_id)->first();
        return view('admin.product.show',compact('data','images','itemCategory','foodCategory'));
    }
    public function wishListPage(){
        $data = DB::table('my_wish_lists')
                    ->join('products','my_wish_lists.product_id','products.id')
                    ->where('my_wish_lists.user_id',Auth::user()->id)->get();
        return view('admin.wishlist.index',compact('data'));
    }
}
