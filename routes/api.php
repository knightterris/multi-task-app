<?php

use App\Http\Controllers\API\CategoryAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\APIController;
use App\Http\Controllers\API\UserAPIController;

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


//CRUDS
Route::post('createFoodCategory',[CategoryAPIController::class,'createFoodCategory']);
Route::post('createItemCategory',[CategoryAPIController::class,'createItemCategory']);
Route::post('delete/foodCategory',[CategoryAPIController::class,'deleteFoodCategory']);
Route::post('delete/itemCategory',[CategoryAPIController::class,'deleteItemCategory']);
