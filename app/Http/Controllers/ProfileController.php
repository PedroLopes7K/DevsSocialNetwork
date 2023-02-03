<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {

        $user = User::where('id', Auth()->user()->id)->first();

        return view('profile', compact('user'));
    }

    public function otherUserProfile(Request $request, $id)
    {
        $user = User::find($id);
        return view('other-user-profile', compact('user'));
    }
}
