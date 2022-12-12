<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class MyPosts extends Component
{


    public $posts;
    public $modal = false;

    public function mount()
    {
        $this->posts =  Post::where('user_id', Auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.my-posts');
    }
}
