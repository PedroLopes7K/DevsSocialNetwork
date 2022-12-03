<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Friendship;

class MyFriends extends Component
{

    public $myFriends;
    public $users = array();


    protected $listeners = ['inputUpdate' => 'updateSearch'];

    public function mount()
    {

        $friendships1 = Friendship::where('user_receive', Auth()->user()->id)->where('friends', true)->get()->pluck('user_id');
        $friendships2 = Friendship::where('user_id', Auth()->user()->id)->where('friends', true)->get()->pluck('user_receive');

        $friends = array_merge($friendships1->toArray(), $friendships2->toArray());

        $this->myFriends = User::whereIn('id', $friends)->get();
        $this->users = $this->myFriends;
    }

    public function updateSearch($value)
    {
        $filter = array();

        foreach ($this->myFriends as $v) {
            if (stristr($v->name, $value))
                $filter[] = $v;
        }
        $this->users = $filter;
    }

    public function render()
    {
        return view('livewire.my-friends');
    }
}
