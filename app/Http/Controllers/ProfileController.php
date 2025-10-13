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

    $id = Auth::id();

    $request->validate([
      'username'   => 'nullable|string|min:2|max:12',
      'email'      => 'nullable|string|email|min:5|max:40|unique:users,email,'. Auth::id(),
      'password'   => 'nullable|string|alpha_num|min:8|max:20|confirmed',
      'bio'        => 'nullable|string|max:150',
      'icon_image' => 'nullable|image|mimes:jpg,png,bmp,gif,svg',
    ]);

        $hasAnyChange =
        $request->filled('username') ||
        $request->filled('email') ||
        $request->filled('password') ||
        $request->filled('bio') ||
        $request->hasFile('icon_image');

        if (!$hasAnyChange) {
        return back()->with('error', '変更内容がありません。');
        }

        $updateData = [];

        if ($request->filled('username')) $updateData['username'] = $request->input('username');
        if ($request->filled('email'))    $updateData['email'] = $request->input('email');
        if ($request->has('bio'))      $updateData['bio'] = $request->input('bio');

        if ($request->filled('password')) {
        $updateData['password'] = Hash::make($request->input('password'));
        }

        if ($request->hasFile('icon_image')) {
        $filename = $request->file('icon_image')->getClientOriginalName();
        $iconPath = $request->file('icon_image')->storeAs('', $filename, 'public');
        $updateData['icon_image'] = $iconPath;
        }


          User::where('id',$id)->update($updateData);

          return redirect('/top')->with('success', 'プロフィールを更新しました');
    }

      public function userdata()
    {
        $users = User::with('posts')->get();

        return view('user.profile', compact('users'));
    }

};
