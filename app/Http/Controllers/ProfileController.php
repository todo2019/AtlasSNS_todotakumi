<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function update(Request $request){
        $id=$request->input('id');
        $username=$request->input('username');
        $email=$request->input('email');
        $password=$request->input('password');
        $bio=$request->input('bio');

        User::where('id',$id)->update([
            'username'=>$username,
            'email'=>$email,
            'password'=>Hash::make($request->password),
            'bio'=>$bio,

        ]);
          return redirect()->route('profile.update')->with('success', 'プロフィールを更新しました');
    }
}
