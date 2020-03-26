<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\QuestionSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index() {
        $question_set = QuestionSet::where('submitter_id', Auth::user()->id);

        return view('dashboard.teacher.submissionStatus', compact('question_set'));
    }
}
