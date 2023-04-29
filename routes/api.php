<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\CategoryAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('foodCategory',[APIController::class,'getFoodCategory']);
Route::get('itemCategory',[APIController::class,'getItemCategory']);
Route::get('allProducts',[APIController::class,'getAllProducts']);

//user login
Route::post('user/login',[UserAPIController::class,'accountLogin']);
//get user data with ID
Route::post('get/user/data',[UserAPIController::class,'getUserDatawithID']);
//update profile
Route::post('update/profile',[UserAPIController::class,'updateProfile']);
//change password
Route::post('change/password',[UserAPIController::class,'changePassword']);


//CRUDS
Route::post('createFoodCategory',[CategoryAPIController::class,'createFoodCategory']);
Route::post('createItemCategory',[CategoryAPIController::class,'createItemCategory']);
Route::post('delete/foodCategory',[CategoryAPIController::class,'deleteFoodCategory']);
Route::post('delete/itemCategory',[CategoryAPIController::class,'deleteItemCategory']);

//product CRUDs
Route::get('get/categories',[ProductAPIController::class,'getCategories']);
Route::post('create/product',[ProductAPIController::class,'createProduct']);
Route::post('delete/product',[ProductAPIController::class,'deleteProduct']);
Route::get('get/product/{id}',[ProductAPIController::class,'getProduct']);
Route::get('get/edit/product/data/{id}',[ProductAPIController::class,'getEditProductData']);
Route::post('delete/cover/image/{id}',[ProductAPIController::class,'deleteCoverImage']);
Route::post('delete/each/image/{id}',[ProductAPIController::class,'deleteEachImage']);
Route::post('update/product/{id}',[ProductAPIController::class,'updateProduct']);
