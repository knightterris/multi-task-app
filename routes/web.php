<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserPageController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\ItemCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
});

Route::get('/loginPage',[AuthController::class,'loginPage'])->name('auth.loginPage');
Route::get('/registerPage',[AuthController::class,'registerPage'])->name('auth.registerPage');

Route::prefix('admin')->group(function () {
    Route::get('homePage',[AdminPageController::class,'homePage'])->name('admin.homepage');
    //profile
    Route::get('/profile',[AdminPageController::class,'profilePage'])->name('admin.profilePage');
    Route::get('edit/profile',[AdminPageController::class,'editProfile'])->name('admin.editProfile');
    Route::post('update/profile/{id}',[AdminController::class,'updateProfile'])->name('admin.updateProfile');
    Route::get('change/password/page',[AdminPageController::class,'changePasswordPage'])->name('admin.changePasswordPage');
    Route::post('change/password',[AdminController::class,'changePassword'])->name('admin.changePassword');
    //wishlist
    Route::get('wishlist/page',[AdminPageController::class,'wishListPage'])->name('admin.wishlist.wishlistPage');
    //user management
    Route::prefix('management')->group(function(){
        Route::get('users/list',[AdminPageController::class,'userLists'])->name('admin.users.list');
        Route::get('users/show/{id}',[AdminPageController::class,'showUser'])->name('admin.users.show');
        Route::get('users/edit/{id}',[AdminPageController::class,'editUser'])->name('admin.users.edit');
        Route::post('users/update/{id}',[AdminController::class,'updateUser'])->name('admin.users.update');
        Route::get('users/delete/{id}',[AdminController::class,'deleteUser'])->name('admin.users.delete');
    });
    Route::prefix('category')->group(function(){
        //food category
        Route::get('category/page',[AdminPageController::class,'categoryPage'])->name('admin.category.page');
        Route::post('create/food/category',[FoodCategoryController::class,'createFoodCategory'])->name('admin.category.createFoodCategory');
        Route::get('read/food/category/{id}',[FoodCategoryController::class,'readFoodCategory'])->name('admin.category.readFoodCategory');
        Route::get('delete/food/category/{id}',[FoodCategoryController::class,'deleteFoodCategory'])->name('admin.category.deleteFoodCategory');
        Route::get('edit/page/food/category/{id}',[AdminPageController::class,'editFoodCategory'])->name('admin.category.editFoodCategory');
        Route::post('update/food/category/{id}',[FoodCategoryController::class,'updateFoodCategory'])->name('admin.category.updateFoodCategory');
        //item category
        Route::post('create/item/category',[ItemCategoryController::class,'createItemCategory'])->name('admin.item.createItemCategory');
        Route::get('read/item/category/{id}',[AdminPageController::class,'readItemCategory'])->name('admin.item.readItemCategory');
        Route::get('delete/item/category/{id}',[ItemCategoryController::class,'deleteItemCategory'])->name('admin.item.deleteItemCategory');
        Route::get('edit/item/category/page/{id}',[AdminPageController::class,'editItemCategory'])->name('admin.item.editItemCategory');
        Route::post('update/item/category/{id}',[ItemCategoryController::class,'updateItemCategory'])->name('admin.item.updateItemCategory');
    });
    Route::prefix('product')->group(function(){
        Route::get('product/page',[AdminPageController::class,'productPage'])->name('admin.product.productListPage');
        Route::get('product/create/food/page',[AdminPageController::class,'createFoodPage'])->name('admin.product.createFoodPage');
        Route::get('product/create/item/page',[AdminPageController::class,'createItemPage'])->name('admin.product.createItemPage');
        Route::post('product/create/food',[ProductController::class,'createFood'])->name('admin.product.createFood');
        Route::get('product/show/{id}',[AdminPageController::class,'showProductPage'])->name('admin.product.show');
        Route::get('product/edit/page/{id}',[AdminPageController::class,'productEditPage'])->name('admin.product.edit');
        Route::post('product/update',[ProductController::class,'updateProduct'])->name('admin.product.update');
        Route::get('product/delete/cover_image/{id}',[ProductController::class,'deleteCoverimage'])->name('admin.product.deleteCoverImage');
        Route::get('product/delete/each_image/{id}',[ProductController::class,'deleteEachImage'])->name('admin.product.deleteEachImage');
        Route::get('product/delete/product',[ProductController::class,'deleteProduct'])->name('admin.product.delete');
        Route::post('product/create/wishList',[ProductController::class,'addWishList'])->name('admin.product.addWishList');
        Route::get('product/delete/wishlist/{id}',[ProductController::class,'removeWishlist'])->name('admin.product.removeWishList');
        Route::post('product/add/like',[ProductController::class,'addLike'])->name('admin.product.addLike');
        Route::post('product/add/dislike',[ProductController::class,'dislike'])->name('admin.product.dislike');
        Route::get('product/comment/list/{id}',[AdminPageController::class,'commentList'])->name('admin.product.commentList');
        Route::post('product/add/comment',[ProductController::class,'addComment'])->name('admin.product.addComment');
    });
    Route::prefix('myWall')->group(function(){
        Route::get('index',[AdminPageController::class,'myWall'])->name('admin.myWall.index');
        Route::post('change/profileDetails',[AdminController::class,'changeProfileDetails'])->name('admin.myWall.changeProfileDetails');
    });

});
Route::prefix('user')->group(function () {
    Route::get('homePage',[UserPageController::class,'homePage'])->name('user.homepage');
});