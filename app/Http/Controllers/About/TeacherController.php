<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function JoinUs()
    {
        return view('about.teacher.about_teachers');
    }

    public function compensation()
    {
        return view('about.teacher.compensation');
    }
}
