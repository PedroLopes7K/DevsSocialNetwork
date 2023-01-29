<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Friendship;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class InfoProfile extends Component
{

    public $name;
    public $email;
    public $username;
    public $posts;
    public $comments;
    public $myFriends;
    public $editPhoto;


    public function mount($user)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->posts = Post::where('user_id', $user->id)->get()->count();
        $this->comments = Comment::where('user_id', $user->id)->get()->count();


        $friendships1 = Friendship::where('user_receive', Auth()->user()->id)->where('friends', true)->get()->pluck('user_id');
        $friendships2 = Friendship::where('user_id', Auth()->user()->id)->where('friends', true)->get()->pluck('user_receive');

        $friends = array_merge($friendships1->toArray(), $friendships2->toArray());

        $this->myFriends = User::whereIn('id', $friends)->get()->count();
    }

    public function updatePhoto()
    {
        $this->editPhoto = !$this->editPhoto;
    }
    public function render()
    {
        return view('livewire.info-profile');
    }
}
