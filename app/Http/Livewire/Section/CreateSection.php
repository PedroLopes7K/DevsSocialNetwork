<?php

namespace App\Http\Livewire\Section;

use Livewire\Component;
use App\Models\Section;

class CreateSection extends Component
{
    public $name;
    public function store()
    {
        Section::create(['name' => $this->name]);
        session()->flash('success', 'Tópico Criado!');
        return redirect()->route('section.index');
    }
    public function render()
    {
        return view('livewire.section.create-section');
    }
}
