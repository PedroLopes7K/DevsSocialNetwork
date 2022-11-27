<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ButtonPreviousPage extends Component
{

    public $currentRoute;
    public function mount($currentRoute)
    {

        $this->currentRoute = $currentRoute;
    }
    public function render()
    {
        return view('livewire.button-previous-page');
    }
}
