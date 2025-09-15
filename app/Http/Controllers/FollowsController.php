<?php

namespace App\Http\Controllers;

use Illuminate\Database\Migrations\MIgration;
use ILluminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Auth;


class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

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
}
