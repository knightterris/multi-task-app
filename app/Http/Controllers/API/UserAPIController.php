<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserAPIController extends Controller
{
    public function accountLogin(Request $request){
        // return($request->password);
        $user = User::where('email',$request->email)->first();
        if(isset($user)){
            if(Hash::check($request->password,$user->password)){
                return response()->json([
                    'userData'=>$user,
                    'loginStatus'=>true,
                    'loginToken'=>$user->createToken(Str::random(60))->plainTextToken
                ]);;
            }else{
                return response()->json([
                    'userData'=>NULL,
                    'loginStatus'=>false,
                    'loginToken'=>NULL,
                    'msg'=>'The credentials do not match with our records.'
                ]);
            }
        }else{
            return response()->json([
                'msg'=>'The credentials do not match with our records.'
            ]);
        }
    }
}
