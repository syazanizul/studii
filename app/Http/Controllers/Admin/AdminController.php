<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {

        $feedback = DB::table('feedback_form_quick_rating')->get();

        $feedback_accumulate = 0;

        foreach($feedback as $m)   {
            $feedback_accumulate += $m->like;
        }

        $feedback_average = $feedback_accumulate/$feedback->count();

        return view('dashboard.admin.admin', compact('feedback_average'));
    }
}
