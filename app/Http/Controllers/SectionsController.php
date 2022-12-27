<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {

        return view('posts-user', compact('user', 'posts'));

        return view('sections.index');
    }
}
