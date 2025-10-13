<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request){

        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'email'    => 'required|string|email|min:5|max:40|unique:users,email',
            'password' => 'required|string|alpha_num|min:8|max:20|confirmed',
        ]);

        User::create([
        'username' => $request->username,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        ]);

        session()->flash('username', $request->username);

        return redirect('added');
    }

    public function added(): View
    {
        return view('auth.added');
    }

}
