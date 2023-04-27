<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Storage;

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
    public function getUserDatawithID(Request $request){
        // return $request->userID;
        $user = User::where('id',$request->userID)->first();
        return response()->json($user, 200);
    }
    public function updateProfile(Request $request){
        // return json_decode($request->input('userData'))->name;
        // return $request->input('user_id');
        // return $request->file('photo')->getClientOriginalName();
        $data = [
            'name'=>json_decode($request->input('userData'))->name,
            'email'=>json_decode($request->input('userData'))->email,
            'address'=>json_decode($request->input('userData'))->address,
            'gender'=>json_decode($request->input('userData'))->gender,
            'phone'=>json_decode($request->input('userData'))->phone,
            'works_at'=>json_decode($request->input('userData'))->works_at,
        ];
        if ($request->hasFile('photo')) {
            $oldData = User::where('id',$request->input('user_id'))->first();
            $oldPhoto = $oldData->photo;
            if($oldPhoto){
                $image_path = public_path().'/storage/'.$oldPhoto;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            if($oldPhoto != null){
                Storage::delete('public/'.$oldPhoto);
            }
            $fileName = uniqid().$request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('public/',$fileName);
            $data['photo'] = $fileName;
        }
        User::where('id',$request->input('user_id'))->update($data);
        return response()->json($data, 200);
    }
}