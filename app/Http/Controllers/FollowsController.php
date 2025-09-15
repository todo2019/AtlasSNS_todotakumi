<?php

namespace App\Http\Controllers;

use Illuminate\Database\Migrations\MIgration;
use ILluminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;



class FollowsController extends Controller
{


    public function follow(User $user){
        $follower = Auth::user();
        $is_following = $follower -> isFollowing($user -> id);
        if ($is_following) {
            $follower -> unfollow($user->id);
            return back();
        }
    }

    public function unfollow(User $user){
        $follower = Auth::user();
        $is_following = $follower -> isFollowing($user -> id);
        if($is_following) {
            $follower -> unfollow($user -> id);
        }
            return back();
         $followerCount = count(FollowUser::where('followed_user_id', $user->id)->get());
        }


    public function toggleFollow(User $user)
    {
        $follower = Auth::user();
        $is_following = $follower -> isFollowing($user -> id);
        if ($is_following){
            $follower -> unfollow($user -> id);
        } else {
            $follower -> follow($user -> id);
        }
        return back();
    }


    public function followPost(){

        $authUser = Auth::user();

        $followUserIds = $authUser->followings()->pluck('users.id')->toArray();

        $posts = Post::with('user')
        ->whereIn('user_id', $followUserIds)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('follows.followList', compact('posts'));
    }

     public function followerPost(){

        $authUser = Auth::user();

        $followerUserIds = $authUser->followers()->pluck('users.id')->toArray();

        $posts = Post::with('user')
        ->whereIn('user_id', $followerUserIds)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('follows.followerList', compact('posts'));
    }
}
