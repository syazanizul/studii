<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProfileTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.admin');
    }

    public function earning_tracker()   {

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

        return view('dashboard.admin.earning_tracker', compact('feedback_average'));
    }
}
