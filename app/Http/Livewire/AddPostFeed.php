<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Image;
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
        'coverImage.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
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

        $post = Post::create([
            'image' => '...',
            'body' => $this->body,
            'user_id' => Auth()->user()->id
        ]);

        foreach ($this->coverImage as  $image) {
            $path = $image->store('images', 'public');
            Image::create([
                'image' => $path,
                'post_id' => $post->id
            ]);
        }

        // $imagePath =  $this->coverImage->store('images', 'public');



        // Post::create([
        //     'image' => '...',
        //     'body' => $this->body,
        //     'user_id' => Auth()->user()->id
        // ]);
        session()->flash('success', 'Post Criado');

        $this->body = '';
        $this->coverImage = '';
    }
}
