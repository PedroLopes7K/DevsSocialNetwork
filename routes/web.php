<?php

use App\Http\Controllers\MakeFriendship;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OtherUsersController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post/{postID}', [PostController::class, 'single'])->middleware(['auth', 'verified'])->name('single.post');
Route::get('/posts/{userId}', [PostController::class, 'postsUser'])->middleware(['auth', 'verified'])->name('user.posts');

Route::get('/messages/{userID}', [MessageController::class, 'createChat'])->middleware(['auth', 'verified'])->name('messages');
Route::get('/make-friendship/{user_id}', [MakeFriendship::class, 'makeFriendship'])->middleware(['auth', 'verified'])->name('make-friendship');
Route::get('/my-friendships', [MakeFriendship::class, 'MyFriendships'])->middleware(['auth', 'verified'])->name('sends-friendship');

Route::get('/other-users', [OtherUsersController::class, 'index'])->middleware(['auth', 'verified'])->name('other-users.index');

require __DIR__ . '/auth.php';
