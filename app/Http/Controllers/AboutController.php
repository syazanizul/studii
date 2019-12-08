<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.about');
    }

    public function teacherJoinUs()
    {
        return view('about.about_teachers');
    }

    public function disclaimer()
    {
        return view('about.disclaimer');
    }
}
