<?php

namespace App\Http\Controllers\Teacher;

use App\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TeacherController extends Controller
{

    public function index()
    {
        //Checkings for notifications ----------------------------------------
        //Check if user enters the first time (if they need instructions)
        $user_id = Auth::user()-> id;
        $check_first = DB::table('teacher_notification') -> where('user_teacher_id' , $user_id)-> where('welcome', 1) -> get();

        if ($check_first -> isEmpty())    {
            $noti_first = 0;
        }   else    {
            $noti_first = 1;
        }
        //End check if user enters the first time (if they need instructions)

        //Gather all the checkings in one variable
        $noti['first'] = $noti_first;


        //Count all the statistics ---------------------------------------------
        //Count total questions submitted
        $question_submitted = Question::where('submitted_by1', $user_id) -> where('finished', 1)-> get();
        $data_question_submitted = $question_submitted->count();
        //End count total questions submitted

        //Attempt today and this month
        if (!DB::table('count_teacher_attempt')-> where('user_teacher_id', $user_id)->whereDate('created_at', Carbon::today())->get() -> isEmpty())   {
            $data_attempt_today = DB::table('count_teacher_attempt')-> where('user_teacher_id', $user_id)->whereDate('created_at', Carbon::today())->first()->total_attempt;
            $data_attempt_month = DB::table('count_teacher_attempt')-> where('user_teacher_id', $user_id)->whereMonth('created_at', Carbon::now()->month)->get();

            $total_monthly = 0;

            foreach($data_attempt_month as $m)    {
                $total_monthly += $m->total_attempt;
            }

        }   else    {
            $data_attempt_today = 0;
            $total_monthly = 0;
        }

//        dd($total_monthly);

        //Gather all the data in one variable
        $data['question_submitted'] = $data_question_submitted;
        $data['attempt_today'] = $data_attempt_today;
        $data['attempt_month'] = $total_monthly;

        return view('dashboard.teacher.teacher', compact('noti','data'));
    }

    public function index_performance() {
        return view('dashboard.teacher.performance');
    }
}
