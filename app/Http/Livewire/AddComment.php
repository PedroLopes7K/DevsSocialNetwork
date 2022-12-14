<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Exception;

class AddComment extends Component
{

    public $postId;
    public $body;

    protected $rules = [
        'body' => 'required'
    ];

    public function render()
    {
        return view('livewire.add-comment');
    }

    public function store($postId)
    {
        $this->validate();
        try {
            Comment::create([
                'user_id' => Auth::id(),
                'post_id' => $postId,
                'body' => $this->body,
            ]);

            $this->reset();
        } catch (Exception $e) {
            session()->flash('danger', 'Erro ao adicionar comentario!');

            return redirect()->route('single.post', ['postID' => $postId]);
        }
    }
}
