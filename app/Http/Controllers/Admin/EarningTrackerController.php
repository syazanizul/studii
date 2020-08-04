<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EarningTrackerController extends Controller
{
    public function index() {
        $user = User::where('role', 2)->get();

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

        return view('dashboard.admin.earning_tracker', compact('user','feedback_average'));
    }
}
