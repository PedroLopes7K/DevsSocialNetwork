<?php

namespace App\Http\Livewire\Section;

use Livewire\Component;

class Section extends Component
{
    public bool $list = true;

    public function updateListState()
    {
        $this->list = !$this->list;
    }

    public function render()
    {
        return view('livewire.section.section');
    }
}
