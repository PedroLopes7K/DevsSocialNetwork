<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\LikeComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FetchComments extends Component
{

    public $postId;

    public function render()
    {
        $comments = Comment::with('user')->where('post_id', $this->postId)->get();
        return view('livewire.fetch-comments', compact('comments'));
    }

    public function addLikeToComment($comment_id)
    {
        $commentOwn = Comment::where('id', $comment_id)->where('user_id', Auth()->user()->id)->first();
        if ($commentOwn) {
        } else {
            $checkLiked = LikeComment::where('user_id', Auth()->user()->id)->where('comment_id', $comment_id)->first();
            if ($checkLiked) {
                LikeComment::where('user_id', Auth()->user()->id)->where('comment_id', $comment_id)->delete();
            } else {
                LikeComment::create([
                    'user_id' => Auth()->user()->id,
                    'comment_id' => $comment_id
                ]);
            }
        }
    }
}
