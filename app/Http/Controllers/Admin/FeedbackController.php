<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index() {
        $suggestions = DB::table('feedback_form_quick_improvement')->get();

        $feedback = DB::table('feedback_form_quick_rating')->get();
        $feedback_accumulate = 0;

        foreach($feedback as $m)   {
            $feedback_accumulate += $m->like;
        }

        if ($feedback->count() != 0)   {
            $feedback_average = $feedback_accumulate/$feedback->count();
        }   else    {
            $feedback_average = 0;
        }

        return view('dashboard.admin.feedback', compact('suggestions', 'feedback_average'));
    }
}
