<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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


        $user = User::where('id', $userId)->first();
        $posts = Post::where('user_id', $userId)->get();

        return view('posts-user', compact('user', 'posts'));
    }
}
