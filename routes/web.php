<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



require __DIR__. '/auth.php';

Route::get('/dashboard',function(){
    return view('dashboard');
})->middleware('auth');


  Route::middleware(['auth'])->group(function(){
    Route::get('top', [PostsController::class, 'index'])->name('top');

    Route::get('profile', [ProfileController::class, 'profile']);
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('search', [UsersController::class, 'index']);
    Route::get('search', [UsersController::class, 'human']);
    Route::post('search', [UsersController::class, 'search']);

    Route::get('follow-list', [PostsController::class, 'index']);
    Route::get('follower-list', [PostsController::class, 'index']);

    Route::get('followList', [FollowsController::class, 'followList']);
    Route::get('followerList', [FollowsController::class, 'followerList']);

});
