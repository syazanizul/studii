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
            //Check if user enters the first time for modal instruction (if they need instructions)
                $check_first = DB::table('teacher_notification') -> where('user_teacher_id' , Auth::user()-> id)-> where('welcome', 1) -> get();
                if ($check_first -> isEmpty())    {
                    $noti_first = 1;
                }   else    {
                    $noti_first = 0;
                }
            //End check if user enters the first time for modal instruction (if they need instructions)

            //Check if user profile is complete
                $check_user_profile = DB::table('teacher_profile_tracker')->where('user_teacher_id',Auth::user()->id)
                    ->where('edit_profile',1)
                    ->where('teaching_details',1)
                    ->where('add_image',1)
                    ->get();
                if ($check_user_profile -> isEmpty())   {
                        $noti_user_profile = 1;
                }   else    {
                    $noti_user_profile = 0;
                }

            //End check if user profile is complete

            //Check second noti
                $check_2 = DB::table('teacher_notification') -> where('user_teacher_id' , Auth::user()-> id)-> where('noti_two', 1) -> get();
                if ($check_2 -> isEmpty())    {
                    $noti_2 = 1;
                }   else    {
                    $noti_2 = 0;
                }
            //End check second noti

            //Check third noti
                $check_3 = DB::table('teacher_notification') -> where('user_teacher_id' , Auth::user()-> id)-> where('noti_three', 1) -> get();
                if ($check_3 -> isEmpty())    {
                    $noti_3 = 1;
                }   else    {
                    $noti_3 = 0;
                }
            //End check third noti

        //Gather all the checkings in one variable
        $noti[0] = $noti_user_profile;
        $noti[1] = $noti_first;
        $noti[2] = $noti_2;
        $noti[3] = $noti_3;


        //Count all the statistics ---------------------------------------------
        //Count total questions submitted
//        $question_submitted = DB::table('count_attempt')->where('creator', Auth::user()->id) -> where('finished', 1)-> get();
//        $data_question_submitted = $question_submitted->count();
        //End count total questions submitted

        //Attempt today and this month
//        if (!DB::table('count_teacher_attempt')-> where('user_teacher_id', Auth::user()-> id)->whereDate('created_at', Carbon::today())->get() -> isEmpty())   {
//            $data_attempt_today = DB::table('count_teacher_attempt')-> where('user_teacher_id', Auth::user()-> id)->whereDate('created_at', Carbon::today())->first()->total_attempt;
//            $data_attempt_month = DB::table('count_teacher_attempt')-> where('user_teacher_id', Auth::user()-> id)->whereMonth('created_at', Carbon::now()->month)->get();
//
//            $total_monthly = 0;
//
//            foreach($data_attempt_month as $m)    {
//                $total_monthly += $m->total_attempt;
//            }
//
//        }   else    {
//            $data_attempt_today = 0;
//            $total_monthly = 0;
//        }

        if(DB::table('count_attempt')->where('creator', Auth::user()->id)->whereDate('created_at', Carbon::today())->get() -> isNotEmpty())    {
            $data_attempt_today = DB::table('count_attempt')->where('creator', Auth::user()->id)->whereDate('created_at', Carbon::today())->count();
            $data_attempt_month = DB::table('count_attempt')->where('creator', Auth::user()->id)->whereMonth('created_at', Carbon::now()->month)->count();
            $data_question_submitted = Question::where('creator', Auth::user()->id)-> count();
        }   else    {
            $data_attempt_today = 0;
            $data_attempt_month = 0;
            $data_question_submitted = 0;
        }

        //Gather all the data in one variable
        $data['question_submitted'] = $data_question_submitted;
        $data['attempt_today'] = $data_attempt_today;
        $data['attempt_month'] = $data_attempt_month;

        return view('dashboard.teacher.teacher', compact('noti','data'));
    }

    public function index_performance() {
        return view('dashboard.teacher.performance');
    }
}
