<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikedPosts extends Component
{
    public $postsLiked;

    public function render()
    {
        $likes = Like::where('user_id', Auth()->user()->id)->get()->pluck('post_id');
        $this->postsLiked = Post::whereIn('id', $likes)->with('user', 'likes')->get();
        return view('livewire.liked-posts');
    }
}
