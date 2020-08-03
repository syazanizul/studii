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
        $teacher_profile_tracker = DB::table('teacher_profile_tracker')->get();

        foreach($teacher_profile_tracker as $m)   {
            if($m->edit_profile == 1)    {
                $p = new ProfileTracker();
                $p -> role = 2;
                $p -> user_id = $m->user_teacher_id;
                $p -> event = 1;
                $p -> save();
            }

            if($m->teaching_details == 1)    {
                $p = new ProfileTracker();
                $p -> role = 2;
                $p -> user_id = $m->user_teacher_id;
                $p -> event = 2;
                $p -> save();
            }

            if($m->add_image == 1)    {
                $p = new ProfileTracker();
                $p -> role = 2;
                $p -> user_id = $m->user_teacher_id;
                $p -> event = 3;
                $p -> save();
            }

        }


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
