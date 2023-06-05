<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class AllMessage extends Component
{

    public $chatID;

    public function render()
    {
        $messages = Message::where('chat_id', $this->chatID)->get();
        return view('livewire.all-message', compact('messages'));
    }
}
