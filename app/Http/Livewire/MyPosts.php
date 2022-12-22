<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Exception;

class MyPosts extends Component
{


    public $posts;
    public $deleteModal = false;
    public $updateModal = false;
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

        try {
            Post::where('id', $this->postDelete->id)->delete();
            // $this->posts =  Post::where('user_id', Auth()->user()->id)->get();
            // $this->deleteModal = false;


            session()->flash('success', 'Post Deletado!');
            return redirect(route('my.posts'));
        } catch (Exception $e) {
            session()->flash('danger', 'Falha ao deletar post!');
            return redirect(route('my.posts'));
        }
    }


    public function render()
    {
        return view('livewire.my-posts');
    }
}
