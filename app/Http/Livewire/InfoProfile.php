<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Friendship;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Exception;

class InfoProfile extends Component
{
    use WithFileUploads;

    public $user;
    public $editData = false;
    public $posts;
    public $myFriends;
    public $editPhoto;
    public $profileImage;
    // userData
    public $name;
    public $last_name;
    public $gender;
    public $username;
    public $contact;
    public $city;
    public $birth;
    public $description;



    protected $rules = [

        'profileImage.*' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
    ];

    protected $listeners = ['refreshComponent' => '$refresh'];
    public function mount($user)
    {
        $this->user = Auth()->user();
        $this->name = $this->user->name;
        $this->last_name = $this->user->last_name;
        $this->gender = $this->user->gender;
        $this->username = $this->user->username;
        $this->contact = $this->user->contact;
        $this->city = $this->user->city;
        $this->birth = $this->user->birth;
        $this->description = $this->user->description;
        /////////////////
        $this->posts = Post::where('user_id', $user->id)->get();


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

    public function updateData()
    {

        try {
            $data = [
                'name'        =>   $this->name,
                'last_name'   =>   $this->last_name,
                'gender'     =>  $this->gender,
                'username'   =>  $this->username,
                'contact'    =>  $this->contact,
                'city'       =>  $this->city,
                'birth'       =>   $this->birth,
                'description' =>   $this->description,
            ];
            User::where('id', $this->user->id)->update($data);

            session()->flash('success', 'Dados Atualizados');

            $this->emit('refreshComponent');
            $this->editData = false;

            // return redirect()->route('dashboard');
        } catch (Exception $e) {

            info($e);
            $this->reset();
            session()->flash('danger', 'Erro ao atualizar dados!');
            // return redirect()->route('dashboard');
        }
    }
    public function render()
    {
        return view('livewire.info-profile');
    }
}
