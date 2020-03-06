<?php

namespace App\Http\Controllers\Teacher;

use App\Attempt;
use App\Http\Controllers\Controller;
use App\Question;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerformanceController extends Controller
{
    public function index() {
        $question = Question::where('creator', Auth::user()->id);

        $attempts = Attempt::where('creator', Auth::user()->id);

        $total_earning = Teacher::total_earning(1);

        return view('dashboard.teacher.performance', compact('question', 'attempts', 'total_earning'));
    }
}
