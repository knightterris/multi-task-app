<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function updateProfile($id,Request $request){
        $this->profileValidation($request);
        $data = $this->getUpdateProfileData($request);
        if ($request->hasFile('image')) {
            $oldData = User::where('id',$id)->first();
            $oldPhoto = $oldData->photo;
            if($oldPhoto != null){
                Storage::delete('public/'.$oldPhoto);
            }
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/',$fileName);
            $data['photo'] = $fileName;
        }
        User::where('id',$id)->update($data);
        return redirect()->route('admin.profilePage');

    }
    private function getUpdateProfileData($request){
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'phone'=>$request->phone,
        ];
    }
    private function profileValidation($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ])->validate();
    }
    public function changePassword(Request $request){
        // $this->changePasswordValidation($request);
        $currentUserId = Auth::user()->id;
        $user = User::select('password')->where('id',$currentUserId)->first();
        $dbHashValue = $user->password;
        if (Hash::check($request->oldPassword,$dbHashValue)) {
            $data = ['password'=>Hash::make($request->newPassword)];
            User::where('id',$currentUserId)->update($data);
            return back()->with(['passwordChanged'=>'Password Has Changed.']);
        } else {
            return back()->with(['notMatch'=>'Credentials do not match.']);
        }

    }
    private function changePasswordValidation($request){
        Validator::make($request->all(),[
            'oldPassword'=>'required|max:15',
            'newPassword'=>'required|max:15',
            'passwordConfirmation'=>'required|max:15|same:newPassword'
        ])->validate();
    }

    public function changeProfileDetails(Request $request){
        $data = [
            'works_at'=>$request->worksAt,
            'study_at'=>$request->studyAt,
            'bio'=>$request->bio
        ];
        User::where('id',Auth::user()->id)->update($data);
        return "Profile Updated.";
    }
}