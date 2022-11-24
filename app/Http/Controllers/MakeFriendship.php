<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Friendship;

class MakeFriendship extends Controller
{
    public function makeFriendship($userId)
    {

        $currentUser = Auth()->user();

        $friendship = Friendship::where('user_id', $currentUser->id)->where('user_receive', $userId)->first();
        $friendshipTwo = Friendship::where('user_id', $userId)->where('user_receive', $currentUser->id)->first();

        if ($friendship == false && $friendshipTwo == false) {
            Friendship::create([
                'user_id' => $currentUser->id,
                'user_receive' => $userId
            ]);
        } elseif ($friendshipTwo) {
            session()->flash('danger', 'Já existe uma solicitação pendente entre você e esse usuário!');

            return  to_route('other-users.index');
        } else {
            session()->flash('danger', 'Solicitação já enviada para esse usuário!');

            return  to_route('other-users.index');
        }


        session()->flash('success', 'Solicitação enviada!');

        return  to_route('other-users.index');
    }

    public function confirmFriendship($idUser)
    {

        $friendship = Friendship::where('user_receive', Auth()->user()->id)->where('user_id', $idUser)->first();

        $friendship->update(['friends' => true]);

        session()->flash('success', 'Solicitação de amizade aceita!');
        return back();
    }

    public function MyFriendships()
    {
        $currentUser = Auth()->user();

        $friendships = Friendship::where('user_receive', $currentUser->id)->where('friends', false)->get();
        return view('my-friendships', compact('friendships'));
    }
}
