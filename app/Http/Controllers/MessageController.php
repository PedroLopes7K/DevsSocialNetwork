<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function index($userId)
    {
        if ($userId == auth()->id()) {
            return back();
        }
        $receiver = User::find($userId);
        return view('messages', compact('receiver'));
    }

    public function createChat($userId)
    {
        if ($userId == Auth()->user()->id) {
            session()->flash('danger', 'Não é possivél entrar em um chat com seu proprio usuário!');
            return back();
        }
        $situationOne = Chat::where('user_one_id', Auth()->user()->id)->where('user_two_id', $userId)->first();
        $situationTwo = Chat::where('user_one_id', $userId)->where('user_two_id', Auth()->user()->id)->first();

        if ($situationOne || $situationTwo) {

            if ($situationOne) {
                $chat = Chat::where('id', $situationOne->id)->first();
                return view('messages', compact('chat'));
            }
            $chat = Chat::where('id', $situationTwo->id)->first();
            return view('messages', compact('chat'));
        } else {
            $chat = Chat::create([
                'user_one_id' => Auth()->user()->id,
                'user_two_id' => $userId
            ]);
            return view('messages', compact('chat'));
        }
    }
}
