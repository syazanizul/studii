<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index() {
        $question= Question::where('finished', 1)-> where('verified', 1)->count();

        return view('dashboard.admin.question', compact('question'));
    }
}
