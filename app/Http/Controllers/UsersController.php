<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    //
    public function index(){
        return view('users.search');
    }

    public function human(){
        $users = User::where('id', '!=', Auth::id())->get();
        return view('users.search',['users'=>$users]);
    }
}
