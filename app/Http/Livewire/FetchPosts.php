<?php

namespace App\Http\Livewire;

use App\Models\Friendship;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class FetchPosts extends Component
{
    use WithPagination;
    public $posts;
    public $allPosts;
    public $postsFriendsF;

    public function mount($posts = null)
    {
        // $this->posts = $posts;
        // if (Auth()->user()) {
        //     if (!$this->posts) {
        //         $currentUser = Auth()->user();
        //         $friendships1 = Friendship::where('user_receive', $currentUser->id)->where('friends', true)->get()->pluck('user_id');
        //         $friendships2 = Friendship::where('user_id', $currentUser->id)->where('friends', true)->get()->pluck('user_receive');

        //         $friends = array_merge($friendships1->toArray(), $friendships2->toArray());
        //         $this->postsFriends = Post::whereIn('user_id', $friends)->with('user')->with('likes')->latest()->get();
        //     } else {
        //         $this->postsFriends = $this->posts;
        //     }
        // } else {
        // $this->allPosts = Post::all();
        // }
    }
    public function render()
    {

        if (Auth()->user()) {
            if (!$this->posts) {
                $currentUser = Auth()->user();
                $friendships1 = Friendship::where('user_receive', $currentUser->id)->where('friends', true)->get()->pluck('user_id');
                $friendships2 = Friendship::where('user_id', $currentUser->id)->where('friends', true)->get()->pluck('user_receive');

                $friends = array_merge($friendships1->toArray(), $friendships2->toArray());
                $postsFriends = Post::whereIn('user_id', $friends)->with('user', 'likes')->paginate(5);

                return view('livewire.fetch-posts', ['postsFriends' => $postsFriends]);
            } else {
                $postsFriends = $this->posts->with('user', 'likes')->paginate(5);
                return view('livewire.fetch-posts', ['postsFriends' => $postsFriends]);
            }
        }
        return view('livewire.fetch-posts', ['testPosts' => Post::paginate(5)]);
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
