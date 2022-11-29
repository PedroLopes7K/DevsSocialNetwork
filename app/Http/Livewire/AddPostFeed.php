<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddPostFeed extends Component
{
    use WithFileUploads;

    public $body, $coverImage;
    // 'coverImage' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'

    protected $rules = [
        'body' => 'required',
        'coverImage' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.add-post-feed');
    }

    public function store()
    {
        $this->validate();

        // $imagePath = uniqid() . '-' . 'image' . '.' . $this->coverImage->extension();

        // $this->coverImage->move(public_path('storage\livewire-tmp'), $imagePath);
        $imagePath =  $this->coverImage->store('images', 'public');


        // auth()->user()->posts()->create([
        //     'image' => $imagePath,
        //     'body' => $this->body,
        // ]);

        Post::create([
            'image' => $imagePath,
            'body' => $this->body,
            'user_id' => Auth()->user()->id
        ]);
        session()->flash('success', 'Post created');

        $this->body = '';
        $this->coverImage = '';
    }
}
