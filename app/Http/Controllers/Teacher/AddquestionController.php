<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddquestionController extends Controller
{
    public function index_with_help()   {
        return view('dashboard.teacher.add-question.addWithHelp');
    }
}
