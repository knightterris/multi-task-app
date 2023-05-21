<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
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
        return response()->json($comment, 200);
    }
}