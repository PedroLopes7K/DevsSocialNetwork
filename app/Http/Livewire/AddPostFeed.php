<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Image;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Exception;

class AddPostFeed extends Component
{
    use WithFileUploads;

    public $body, $coverImage, $title, $section, $sections;
    // 'coverImage' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'

    protected $rules = [
        'body' => 'required',
        'title' => 'required',
        'coverImage.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        $this->sections = Section::all();

        return view('livewire.add-post-feed');
    }

    public function store()
    {
        $this->validate();

        try {
            $request =    [
                // 'image' =>  $this->coverImage->store('images', 'public'),
                'image'       =>  '..',
                'body'        => $this->body,
                'title'       => $this->title,
                'user_id'     => Auth()->user()->id,
                'section'     => $this->section
            ];
            $post = Post::create($request);


            foreach ($this->coverImage as  $image) {
                Image::create([
                    'image' => $image->store('images', 'public'),
                    'post_id' => $post->id
                ]);
            }

            $this->reset();
            session()->flash('success', 'Post Criado');

            return redirect()->route('dashboard');
        } catch (Exception $e) {

            info($e);
            $this->reset();
            session()->flash('danger', 'Erro ao adicionar post!');
            return redirect()->route('dashboard');
        }
    }
}
