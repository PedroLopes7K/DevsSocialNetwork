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

        if ($friendship == false) {
            Friendship::create([
                'user_id' => $currentUser->id,
                'user_receive' => $userId
            ]);
        } else {
            session()->flash('danger', 'Solicitação já enviada para esse usuário!');

            return  to_route('other-users.index');
        }


        session()->flash('success', 'Solicitação enviada!');

        return  to_route('other-users.index');
    }

    public function MyFriendships()
    {
        $currentUser = Auth()->user();

        $friendships = Friendship::where('user_receive', $currentUser->id)->where('friends', false)->get();
        return view('my-friendships', compact('friendships'));
    }
}
