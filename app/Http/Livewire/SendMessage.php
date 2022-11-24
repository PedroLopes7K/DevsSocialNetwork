<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SendMessage extends Component
{
    public $message, $chatID;

    public function render()
    {
        return view('livewire.send-message');
    }

    public function store($chatId)
    {
        if (!empty($this->message)) {
            Message::create([
                'user_id' => Auth::id(),
                'chat_id' => $chatId,
                'message' => $this->message
            ]);
        }

        $this->message = '';
    }
}
