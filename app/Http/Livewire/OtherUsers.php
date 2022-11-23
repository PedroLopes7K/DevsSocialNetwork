<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OtherUsers extends Component
{
    public function render()
    {
        $currentUser = Auth()->user();
        $allUsers = User::where('id', '!=', $currentUser->id)->get();
        return view('livewire.other-users', compact('allUsers'));
    }
}
