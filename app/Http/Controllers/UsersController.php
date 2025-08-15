<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('users.search', compact('users'));
    }

    public function human(){
        $users = User::where('id', '!=', Auth::id())->get();
        return view('users.search',['users'=>$users]);
    }


    public function search(Request $request)
    {
        $keyword=$request->input('keyword');

        if(!empty($keyword)){
            $users=User::where('username','like','%'.$keyword.'%')
            ->where('id', '!=', Auth::id())
            ->get();
        }else{
             $users = User::where('id', '!=', Auth::id())->get();
        }
        return view('users.search', compact('users','keyword'));

    }
}
