<?php

namespace App\Http\Livewire\Section;

use Livewire\Component;
use App\Models\Section;

class ListSection extends Component
{
    public $sections;

    public function mount()
    {
        $this->sections = Section::all();
        info($this->sections);
    }
    public function render()
    {
        return view('livewire.section.list-section');
    }
}
