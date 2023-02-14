<?php

namespace App\Http\Controllers\Admin;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemCategoryController extends Controller
{
    public function createItemCategory(Request $request){
        $data = [
            'name'=>$request->item_category_name,
            'description'=>$request->item_category_description
        ];
        ItemCategory::create($data);
        return "Item category has been created successfully.";
    }
    public function deleteItemCategory($id){
        ItemCategory::where('id',$id)->delete();
        return back()->with(['ItemdeleteSuccess'=>'Item category has been deleted successfully.']);
    }
    public function updateItemCategory($id,Request $request){
        $data = [
            'name'=>$request->item_category_name_update,
            'description'=>$request->item_category_description_update
        ];
        ItemCategory::where('id',$id)->update($data);
        return "Item category has been updated successfully.";
    }
}
