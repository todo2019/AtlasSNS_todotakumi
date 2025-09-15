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

        $posts = Post::with('user')
        ->whereIn('user_id', $followUserIds)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('posts.index', compact('posts'));
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


    public function update(Request $request, $post)
  {

    $request->validate([
        'post' => 'required|string|min:1|max:150',
    ]);

    $post = Post::findOrFail($post);
    $post->update([
        'post' => $request->post,
    ]);

    return redirect()->route('top');
  }

  public function delete($id)
  {
     Post::where('id', $id)->delete();
     return redirect('/top');
  }
}
