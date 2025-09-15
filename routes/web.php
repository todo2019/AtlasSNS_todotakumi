<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FollowsController;
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
    Route::post('top', [PostsController::class, 'post'])->name('post');
    Route::put('top/{id}', [PostsController::class, 'update'])->name('post.update');
    Route::get('top/{id}/delete', [PostsController::class, 'delete'])->name('post.delete');






    Route::get('profile', [ProfileController::class, 'profile']);
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('search', [UsersController::class, 'index']);
    Route::get('search/human', [UsersController::class, 'human']);
    Route::post('search', [UsersController::class, 'search'])->name('search');

    Route::get('followList', [FollowsController::class, 'followPost'])->name('follow.posts');
    Route::get('followerList', [FollowsController::class, 'followerPost'])->name('follower.posts');




    Route::prefix('search')->group(function () {
    Route::post('/follow/{user}', [FollowsController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [FollowsController::class, 'unfollow'])->name('unfollow');
    Route::post('/toggle-follow/{user}', [FollowsController::class, 'toggleFollow'])->name('toggleFollow');
  });

});
