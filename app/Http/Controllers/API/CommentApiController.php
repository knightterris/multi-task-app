<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentApiController extends Controller
{
    public function postComment(Request $request){
        $comment = [
            'user_id'=>$request->user_id,
            'product_id'=>$request->product_id,
            'message'=>$request->comment,
        ];
        Comment::create($comment);
        $product = Product::where('id',$request->product_id)->first();
        $cmt = [
            'comment'=>$product->comment + 1
        ];
        Product::where('id',$request->product_id)->update($cmt);

        $comments = Comment::where('product_id',$request->product_id)
                            ->with('user')->get();
        return response()->json($comments, 200);
    }
    public function getComments(Request $request){
        $product_id = $request->query('product_id');
        $user_id = $request->query('user_id');
        $comments = Comment::where('product_id',$product_id)
                            ->with('user')->get();
        return response()->json($comments, 200);
    }
}
