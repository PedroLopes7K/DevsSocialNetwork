<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Friendship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OtherUsers extends Component
{
    public function render()
    {
        $currentUser = Auth()->user();
        $friendships1 = Friendship::where('user_receive', $currentUser->id)->where('friends', true)->get()->pluck('user_id');
        $friendships2 = Friendship::where('user_id', $currentUser->id)->where('friends', true)->get()->pluck('user_receive');

        $friends = array_merge($friendships1->toArray(), $friendships2->toArray());

        $usersFriends = User::whereIn('id', $friends)->get();
        $outherUsers = User::whereNotIn('id', $friends)->where('id', "!=", $currentUser->id)->get();

        // $currentUser = Auth()->user();
        // $allUsers = User::where('id', '!=', $currentUser->id)->get();

        return view('livewire.other-users', compact('usersFriends', 'outherUsers'));
    }
}
