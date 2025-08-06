<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index(){
        return view('users.search');
    }

    public function human(){
        $users=User::get();
        return view('users.search',['users'=>$users]);
    }
}
