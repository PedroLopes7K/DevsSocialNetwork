<?php

namespace App\Http\Livewire\Section;

use Livewire\Component;
use App\Models\Post;

class PostsSection extends Component
{
    public $section;
    public $posts;
    public function mount($section)
    {
        $this->section = $section;
        $this->posts = Post::where('section', $section->id)->get();
    }
    public function render()
    {
        return view('livewire.section.posts-section');
    }
}
