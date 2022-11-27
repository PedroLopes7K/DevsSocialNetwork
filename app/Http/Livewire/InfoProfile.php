<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InfoProfile extends Component
{

    public $name;
    public $email;
    public $username;


    public function mount($user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
    }
    public function render()
    {
        return view('livewire.info-profile');
    }
}
