<?php

namespace App\Http\Controllers\API;

use App\Models\FoodCategory;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryAPIController extends Controller
{
    public function createFoodCategory(Request $request){
        $data = [
            'name'=>$request->name,
        ];
        FoodCategory::create($data);
        return response()->json([$data,'msg' => "Category Created"]);
    }
    public function createItemCategory(Request $request){
        $data = [
            'name'=>$request->name,
        ];
        ItemCategory::create($data);
        return response()->json([$data,'msg' => "Category Created"]);
    }
    public function deleteFoodCategory(Request $request){
        FoodCategory::where('id',$request->input('categoryId'))->delete();
        return response()->json(['msg'=>'Delete Success']);
    }
    public function deleteItemCategory(Request $request){
        ItemCategory::where('id',$request->input('categoryId'))->delete();
        return response()->json(['msg'=>'Delete Success']);
    }
}
