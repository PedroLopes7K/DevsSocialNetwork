<?php

namespace App\Http\Livewire\Section;

use Livewire\Component;

class PostsSection extends Component
{
    public $section;
    public function mount($section)
    {
        $this->section = $section;
    }
    public function render()
    {
        return view('livewire.section.posts-section');
    }
}
