<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Friendship;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class InfoProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $username;
    public $user;
    public $editData = false;
    public $posts;
    public $comments;
    public $myFriends;
    public $editPhoto;
    public $profileImage;


    protected $rules = [

        'profileImage.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ];

    public function mount($user)
    {
        $this->user = Auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->username = $user->username;
        $this->posts = Post::where('user_id', $user->id)->get()->count();
        $this->comments = Comment::where('user_id', $user->id)->get()->count();


        $friendships1 = Friendship::where('user_receive', Auth()->user()->id)->where('friends', true)->get()->pluck('user_id');
        $friendships2 = Friendship::where('user_id', Auth()->user()->id)->where('friends', true)->get()->pluck('user_receive');

        $friends = array_merge($friendships1->toArray(), $friendships2->toArray());

        $this->myFriends = User::whereIn('id', $friends)->get();
    }

    public function changeEditData()
    {
        $this->editData = !$this->editData;
    }
    public function updatePhoto()
    {
        $this->editPhoto = !$this->editPhoto;
    }

    public function sendImage()
    {
        User::where('id', Auth()->user()->id)->update([
            'photo' => $this->profileImage->store('images', 'public')
        ]);
        $this->reset();
        session()->flash('success', 'Post Criado');

        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view('livewire.info-profile');
    }
}
