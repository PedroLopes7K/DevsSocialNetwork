<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Friendship;
use App\Models\User;

class OtherUserProfile extends Component
{
    public $user;
    public $posts;
    public $friends;
    public function mount($user)
    {
        $this->user = $user;
        $this->posts = Post::where('user_id', $this->user->id)->get();

        $friendships1 = Friendship::where('user_receive',  $this->user->id)->where('friends', true)->get()->pluck('user_id');
        $friendships2 = Friendship::where('user_id', $this->user->id)->where('friends', true)->get()->pluck('user_receive');

        $friends = array_merge($friendships1->toArray(), $friendships2->toArray());

        $users = User::whereIn('id', $friends)->get();
        $this->friends = $users;
    }

    public function render()
    {
        return view('livewire.other-user-profile');
    }
}
