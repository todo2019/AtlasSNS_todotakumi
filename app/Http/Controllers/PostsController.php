<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){

        $authUser = Auth::user();


        $followUserIds = $authUser->followings()->pluck('users.id')->toArray();
        $followUserIds[] = $authUser->id;

        $post = \DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->whereIn('posts.user_id', $followUserIds)
            ->orderBy('posts.created_at', 'desc')
            ->select(
                'posts.id as post_id',
                'posts.post',
                'posts.created_at',
                'users.id as user_id',
                'users.username',
                'users.icon_image'
            )
            ->get();


        return view('posts.index', compact('post'));
    }

    public function show($id){
      $post = Post::findOrFail($id);
      return view('posts.show', compact('post'));
    }

    public function post(Request $request)
    {
      $request->validate([
        'post'=>'required|string|min:1|max:150',
      ]);

      $post=new Post;
      $post->user_id=Auth::id();
      $post->post=$request->post;
      $post->save();

       return redirect()->route('top');
    }

    public function edit($id)
    {
    $post = Post::findOrFail($id);
    return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
  {
    $request->validate([
        'post' => 'required|string|min:1|max:150',
    ]);

    $post = Post::findOrFail($id);
    $post->update([
        'post' => $request->input('post'),
    ]);

    return redirect()->route('top');
  }

  public function delete($id)
  {
     Post::where('id', $id)->delete();
     return redirect('/top');
  }
}
