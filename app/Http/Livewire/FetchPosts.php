<?php

namespace App\Http\Livewire;

use App\Models\Friendship;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class FetchPosts extends Component
{



    public function render()
    {
        $currentUser = Auth()->user();
        $friendships1 = Friendship::where('user_receive', $currentUser->id)->where('friends', true)->get()->pluck('user_id');
        $friendships2 = Friendship::where('user_id', $currentUser->id)->where('friends', true)->get()->pluck('user_receive');

        // Log::info($friendships1);
        // Log::info($friendships2);
        $friends = array_merge($friendships1->toArray(), $friendships2->toArray());
        $posts =
            Post::whereIn('user_id', $friends)->with('user')->with('likes')->latest()->get();
        // dd($posts);
        return view('livewire.fetch-posts', compact('posts'));
    }

    public function addLikeToPost($post_id)
    {
        $user_id = auth()->id();
        $checkLiked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if ($checkLiked) {
            Like::where('user_id', $user_id)->where('post_id', $post_id)->delete();
        } else {
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post_id
            ]);
        }
    }
}
