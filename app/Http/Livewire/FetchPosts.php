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

    public $posts;
    public $postsFriends;

    public function mount($posts = null)
    {
        $this->posts = $posts;

        if (!$this->posts) {
            $currentUser = Auth()->user();
            $friendships1 = Friendship::where('user_receive', $currentUser->id)->where('friends', true)->get()->pluck('user_id');
            $friendships2 = Friendship::where('user_id', $currentUser->id)->where('friends', true)->get()->pluck('user_receive');

            $friends = array_merge($friendships1->toArray(), $friendships2->toArray());
            $this->postsFriends = Post::whereIn('user_id', $friends)->with('user')->with('likes')->latest()->get();
        } else {
            $this->postsFriends = $this->posts;
        }
    }
    public function render()
    {
        return view('livewire.fetch-posts');
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
