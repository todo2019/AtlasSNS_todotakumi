<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PostsController extends Controller
{
    public function index(){

        $authUser = Auth::user();


        $followUserIds = $authUser->followings()->pluck('users.id')->toArray();
        $followUserIds[] = $authUser->id;

        $posts = Post::with('user')
        ->whereIn('user_id', $followUserIds)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('posts.index', compact('posts'));
    }


    public function post(Request $request)
    {

      $massage = [
        'post.required' => '投稿内容は必須です',
        'post.min' => '投稿内容は１文字以上入力してください',
        'post.max' => '投稿内容は１５０字未満で入力してください',
      ];

      $request->validate([
        'post'=>'required|string|min:1|max:150',
      ], $massage);

      $post=new Post;
      $post->user_id=Auth::id();
      $post->post=$request->post;
      $post->save();

       return redirect()->route('top');
    }


    public function update(Request $request, $post)
  {

    $messages = [
      'post.required' => '修正の内容は必須です',
      'post.min' => '投稿の修正は１文字以上入力してください',
      'post.max' => '投稿の修正は１５０字未満で入力してください',
    ];

      $validator = Validator::make($request->all(), [
        'post' => 'required|string|min:1|max:150',
    ], $messages);

    if ($validator->fails()) {
        return back()
            ->withErrors($validator)
            ->withInput();
    }

    $post = Post::findOrFail($post);
    $post->update([
        'post' => $request->post,
    ]);

    return redirect()->route('top')->with('success', '投稿を更新しました。');
}

  public function delete($id)
  {
     Post::where('id', $id)->delete();
     return redirect('/top');
  }



}
