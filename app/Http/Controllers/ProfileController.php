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

      $user = Auth::user();

      return view('profiles.profile', compact('user'));
    }

    public function update(Request $request){

    $message = [
      'username.required' => 'ユーザー名は必須です。',
      'username.min' => 'ユーザー名は2文字以上で入力してください。',
      'username.max' => 'ユーザー名は12文字以内で入力してください。',
      'email.required' => 'メールアドレスは必須です。',
      'email.email' => '有効なメールアドレスを入力してください。',
      'email.min' => 'メールアドレスは5文字以上で入力してください',
      'email.max' => 'メールアドレスは40文字以内で入力してください',
      'email.unique' => 'このメールアドレスは既に使用されています。',
      'password.required' => 'パスワードは必須です。',
      'password.alpha_num' => 'パスワードは英数字のみで入力してください。',
      'password.min' => 'パスワードは8文字以上で入力してください。',
      'password.max' => 'パスワードは20文字以内で入力してください。',
      'password.confirmed' => 'パスワード確認用が一致していません。',
      'bio' => '自己紹介は150文字以内で入力してください',
      'icon_image' => 'アイコンは画像ファイルを選択ください',
    ];

    $id = Auth::id();

    $request->validate([
      'username'   => 'required|string|min:2|max:12',
      'email'      => 'required|string|email|min:5|max:40|unique:users,email,'. Auth::id(),
      'password'   => 'required|string|alpha_num|min:8|max:20|confirmed',
      'bio'        => 'nullable|string|max:150',
      'icon_image' => 'nullable|image|mimes:jpg,png,bmp,gif,svg',
    ], $message);

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
