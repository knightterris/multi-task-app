<?php

namespace App\Http\Controllers\API;

use App\Models\User;
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
                return 'same';
            }else{
                return 'not same';
            }
        }
    }
}