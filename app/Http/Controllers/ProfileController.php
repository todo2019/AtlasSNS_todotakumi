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

        $updateData = [
        'username' => $username,
        'email'    => $email,
        'password' => Hash::make($password),
        'bio'      => $bio,
        ];

        if (!empty($password)) {
        $updateData['password'] = Hash::make($password);
        }


        $iconPath = null;
        if ($request->hasFile('icon_image')) {

          $filename = $request->file('icon_image')->getClientOriginalName();

          $iconPath = $request->file('icon_image')->storeAs(
            '',
            $filename,
            'public',
            'images'
           );

          $updateData['icon_image'] = $iconPath;
        }

          User::where('id',$id)->update($updateData);

          return redirect()->route('profile.update')->with('success', 'プロフィールを更新しました');
    }

      public function userdata()
    {
        $users = User::with('posts')->get();

        return view('user.profile', compact('users'));
    }

};
