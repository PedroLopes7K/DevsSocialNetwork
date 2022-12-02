<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Friendship;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OtherUsers extends Component
{

    public $search;
    public $outherUsers;
    public $friends;



    protected $listeners = ['inputUpdate' => 'updateSearch'];


    public function mount()
    {
        $friendships1 = Friendship::where('user_receive',  Auth()->user()->id)->where('friends', true)->get()->pluck('user_id');
        $friendships2 = Friendship::where('user_id',  Auth()->user()->id)->where('friends', true)->get()->pluck('user_receive');

        $this->friends = array_merge($friendships1->toArray(), $friendships2->toArray());

        $this->outherUsers = User::whereNotIn('id', $this->friends)->where('id', "!=", Auth()->user()->id)->get();
    }
    public function updateSearch($value)
    {

        $this->outherUsers = User::whereNotIn('id', $this->friends)->where(DB::raw('lower(name)'), 'like', '%' . strtolower($value) . '%')->where('id', "!=", Auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.other-users');
    }
}
