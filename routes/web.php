<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\MakeFriendship;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MyFriendsController;
use App\Http\Controllers\OtherUsersController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;
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

Route::get('/')->middleware(['root']);

Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/post/{postID}', [PostController::class, 'single'])->name('single.post');
Route::get('/post/edit/{postID}', [PostController::class, 'updatePost'])->middleware(['auth', 'verified'])->name('update.post');
Route::get('/posts/{userId}', [PostController::class, 'postsUser'])->middleware(['auth', 'verified'])->name('user.posts');
Route::get('/my-posts', [PostController::class, 'myPosts'])->middleware(['auth', 'verified'])->name('my.posts');

Route::get('/make-friendship/{user_id}', [MakeFriendship::class, 'makeFriendship'])->middleware(['auth', 'verified'])->name('make-friendship');
Route::get('/confirm-friendship/{user_id}', [MakeFriendship::class, 'confirmFriendship'])->middleware(['auth', 'verified'])->name('confirm-friendship');
Route::get('/my-friendships', [MakeFriendship::class, 'MyFriendships'])->middleware(['auth', 'verified'])->name('sends-friendship');

Route::get('/messages/{userID}', [MessageController::class, 'createChat'])->middleware(['auth', 'verified'])->name('messages');

Route::get('/other-users', [OtherUsersController::class, 'index'])->middleware(['auth', 'verified'])->name('other-users.index');

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('profile.index');

Route::get('/my-friends', [MyFriendsController::class, 'index'])->middleware(['auth', 'verified'])->name('myfriends.index');

Route::get('/chats', [ChatController::class, 'index'])->middleware(['auth', 'verified'])->name('chats.index');

require __DIR__ . '/auth.php';
