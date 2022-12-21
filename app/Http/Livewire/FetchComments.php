<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\CommentAnswer;
use App\Models\LikeComment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FetchComments extends Component
{

    public $postId;
    public $answer;
    public $answersComment;
    public $modalComment = false;
    public $comment;
    public $commentId;
    public $textComment  = '';

    public function render()
    {
        $comments = Comment::with('user')->where('post_id', $this->postId)->get();
        return view('livewire.fetch-comments', compact('comments'));
    }

    public function addLikeToComment($comment_id)
    {

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

    public function sendAnswer()
    {

        CommentAnswer::create([
            'user_id' =>  Auth()->user()->id,
            'comment_id' => $this->commentId,
            'body' => $this->answer
        ]);

        $this->answer = '';
        $this->answersComment = CommentAnswer::where('comment_id',  $this->commentId)->get();

        // $this->modalComment = false;
    }

    public function deleteAnswer($answerId)
    {
        CommentAnswer::where('id', $answerId)->delete();
        $this->answersComment = CommentAnswer::where('comment_id',  $this->commentId)->get();
    }
    public function openModal($commentId)
    {
        $this->comment = Comment::where('id', $commentId)->first();
        $this->answersComment = CommentAnswer::where('comment_id', $commentId)->get();
        $this->commentId = $this->comment->id;
        $this->textComment = $this->comment->body;
        $this->modalComment = true;
    }

    public function closeModal()
    {
        $this->textComment = '';
        $this->modalComment = false;
    }
}
