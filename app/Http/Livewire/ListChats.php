<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ListChats extends Component
{

    public $chats;
    public function mount()
    {
        $chats = Chat::where('user_one_id', Auth()->user()->id)->orWhere('user_two_id', Auth()->user()->id)->get();
        $this->chats = $chats;
    }
    public function render()
    {
        return view('livewire.list-chats');
    }
}
