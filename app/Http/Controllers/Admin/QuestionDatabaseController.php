<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class QuestionDatabaseController extends Controller
{
    public function index() {
        $question = Question::where('finished', 1)->first();

        return view('dashboard.admin.question_database', compact('question'));
    }
}
