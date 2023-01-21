<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function index()
    {
        return view('sections.index');
    }

    public function postsOfSection($sectionId)
    {
        $section = Section::find($sectionId);
        return view('posts-section', compact('section'));
    }
}
