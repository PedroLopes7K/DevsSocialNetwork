<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class MyPosts extends Component
{


    public $posts;
    public $deleteModal = false;
    public Post $postDelete;

    public function mount()
    {
        $this->posts =  Post::where('user_id', Auth()->user()->id)->get();
    }


    public function openModal($postId)
    {
        $this->deleteModal = true;
        $this->postDelete = Post::find($postId);
    }

    public function closeModal()
    {
        $this->deleteModal = false;
    }

    public function deletePost()
    {
        Post::where('id', $this->postDelete->id)->delete();
        session()->flash('success', 'Post Deletado!');
        return redirect(route('my.posts'));
    }


    public function render()
    {
        return view('livewire.my-posts');
    }
}
