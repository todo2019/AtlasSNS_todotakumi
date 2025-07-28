<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function show(){
  // Postモデル経由でpostsテーブルのレコードを取得
  $posts = Post::get();
  return view('index', compact('posts'));
}
}
