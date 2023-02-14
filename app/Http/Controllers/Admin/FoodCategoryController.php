<?php

namespace App\Http\Controllers\Admin;

use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodCategoryController extends Controller
{
    public function createFoodCategory(Request $request){
        $data = [
            'name'=>$request->food_category_name,
            'description'=>$request->food_category_description
        ];
        FoodCategory::create($data);
        return "Food category has been created successfully";
    }
    public function readFoodCategory($id){
        $data = FoodCategory::where('id',$id)->first();
        return view('admin.categories.show',compact('data'));
    }
    public function deleteFoodCategory($id){
        FoodCategory::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Food category has been deleted.']);
    }
    public function updateFoodCategory($id,Request $request){
        $data = [
            'name'=>$request->food_category_name_update,
            'description'=>$request->food_category_description_update
        ];
        FoodCategory::where('id',$id)->update($data);
        return "Food category has been updated successfully.";
    }
}
