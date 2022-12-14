<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Exception;

class SendMessage extends Component
{
    public $message, $chatID;

    public function render()
    {
        return view('livewire.send-message');
    }

    public function store($chatId)
    {

        try {
            if (!empty($this->message)) {
                Message::create([
                    'user_id' => Auth::id(),
                    'chat_id' => $chatId,
                    'message' => $this->message
                ]);
            }
            $this->reset();
        } catch (Exception $e) {
            session()->flash('danger', 'Erro ao enviar mensagem!');
            return redirect()->route('chats.index');
        }
    }
}
