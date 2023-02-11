<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class OtherUserProfile extends Component
{
    public $user;
    public $posts;
    public function mount($user)
    {
        $this->user = $user;
        $this->posts = Post::where('user_id', $this->user->id)->get();
    }
    public function render()
    {
        return view('livewire.other-user-profile');
    }
}
