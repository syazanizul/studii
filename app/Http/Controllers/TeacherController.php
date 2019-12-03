<?php

namespace App\Http\Controllers;

use App\Question;
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

        //Attempt today
        $data_attempt_today = 0;
        $data_attempt_month = 0;

            //Check teacher has submitted which question, and loop through each of them one by one to find its id
            foreach($question_submitted as $x)  {
                $q_id = $x->id;
                $y_day = DB::table('count_total_attempt') -> where('question_id', $q_id) -> where('updated_at', '>=', Carbon::today()) -> first();
                if ($y_day!=null)   {
                    $x_day = $y_day -> total_attempt;
                }   else    {
                    $x_day = 0;
                }
                $data_attempt_today += $x_day;
                $y_month = DB::table('count_total_attempt') -> where('question_id', $q_id) -> where('updated_at', '>=', Carbon::now()-> month) -> first();

                if (!$y_month -> isEmpty())   {
                    $y_month = $y_month -> total_attempt;
                    $data_attempt_month += $y_month;
                }   else    {
                    $data_attempt_month += 0;
                }

            }
        //End Attempt today

        //Gather all the data in one variable
        $data['question_submitted'] = $data_question_submitted;
        $data['attempt_today'] = $data_attempt_today;
        $data['attempt_month'] = $data_attempt_month;

        return view('dashboard.teacher.teacher', compact('noti','data'));
    }

    public function index_details() {
        return view('dashboard.teacher.details');
    }

    public function index_performance() {
        return view('dashboard.teacher.performance');
    }
}
