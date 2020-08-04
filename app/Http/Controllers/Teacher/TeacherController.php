<?php

namespace App\Http\Controllers\Teacher;

use App\NotificationTeacher;
use App\ProfileTracker;
use App\Question;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TeacherController extends Controller
{

    public function index()
    {
        //--------------------------------------------------------------------
        //Checkings for notifications ----------------------------------------
            //Check if user enters the first time for modal instruction (if they need instructions)
                $check_first = NotificationTeacher::where('noti_id' , 1) -> where('user_id', Auth::user()->id) -> get();

                if ($check_first -> isEmpty())    {
                    $noti_first = 1;
                }   else    {
                    $noti_first = 0;
                }
            //End check if user enters the first time for modal instruction (if they need instructions)

            //Check if user profile is complete
                $check_user_profile = ProfileTracker::where('user_id', Auth::user()->id);

                if ($check_user_profile -> where('event', 1) ->get() -> isNotEmpty() && $check_user_profile -> where('event', 2) ->get() -> isNotEmpty() && $check_user_profile -> where('event', 3) ->get() -> isNotEmpty())   {
                    $noti_user_profile = 0;
                }   else {
                    $noti_user_profile = 1;
                }
            //End check if user profile is complete

            //Check second noti
                $check_2 = NotificationTeacher::where('noti_id' , 2) -> where('user_id', Auth::user()->id) -> get();
                if ($check_2 -> isEmpty())    {
                    $noti_2 = 1;
                }   else    {
                    $noti_2 = 0;
                }
            //End check second noti

            //Check third noti
                $check_3 = NotificationTeacher::where('noti_id' , 3) -> where('user_id', Auth::user()->id) -> get();
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

        //--------------------------------------------------------------------
        //Statistics ---------------------------------------------------------
        if(DB::table('count_attempt')->where('creator', Auth::user()->id)->whereMonth('created_at', Carbon::now()->month)->get() -> isNotEmpty())    {
            $data_attempt_today = DB::table('count_attempt')->where('creator', Auth::user()->id)->whereDate('created_at', Carbon::today())->count();
            $data_attempt_month = DB::table('count_attempt')->where('creator', Auth::user()->id)->whereMonth('created_at', Carbon::now()->month)->count();
            $data_question_submitted = Question::where('creator', Auth::user()->id)->where('finished',1)-> count();
        }   else    {
            $data_attempt_today = 0;
            $data_attempt_month = 0;
            $data_question_submitted = 0;
        }

        //Gather all the data in one variable
        $data['question_submitted'] = $data_question_submitted;
        $data['attempt_today'] = $data_attempt_today;
        $data['attempt_month'] = $data_attempt_month;


        //----------------------------------------------------------------------
        // CHECK IF THIS TEACHER HAS SUBMITTED ANYTHING ------------------------

        $need_nav_performance = Teacher::need_nav_performance(Auth::user()->id);

        session(['need_nav_performance' => $need_nav_performance]);

        return view('dashboard.teacher.teacher', compact('noti','data'));
    }

}
