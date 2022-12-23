<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Friendship;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function single($id)
    {
        $post = Post::with('user')->find($id);
        return view('single', compact('post'));
    }

    public function postsUser($userId)
    {

        $currentUser = Auth()->user();
        $friendship = Friendship::where('user_id', $currentUser->id)->where('user_receive', $userId)->where('friends', true)->first();
        $friendshipTwo = Friendship::where('user_id', $userId)->where('user_receive', $currentUser->id)->where('friends', true)->first();
        if (!$friendship && !$friendshipTwo) {
            session()->flash('warning', 'Vocês ainda não são amigos!');
            return back();
        }

        $user = User::where('id', $userId)->first();
        $posts = Post::where('user_id', $userId)->get();

        return view('posts-user', compact('user', 'posts'));
    }

    public function myPosts()
    {
        $posts =  Post::where('user_id', Auth()->user()->id)->get();
        return view('my-posts', compact('posts'));
    }

    public function postsLiked()
    {
        return view('liked-posts',);
    }
    public function updatePost($postID)
    {
        $post = Post::find($postID);
        return view('edit-post', compact('post'));
    }
}
