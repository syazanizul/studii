<?php

namespace App\Http\Controllers\Teacher;

use App\Attempt;
use App\NotificationTeacher;
use App\ProfileTracker;
use App\Question;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class TeacherController extends Controller
{

    public function index()
    {
        //--------------------------------------------------------------------
        // === Checkings for notifications ----------------------------------------

            // --- Check if user profile is complete
                $check_user_profile1 = ProfileTracker::where('user_id', Auth::user()->id) -> where('event', 1) ->get();
                $check_user_profile2 = ProfileTracker::where('user_id', Auth::user()->id) -> where('event', 2) ->get();
                $check_user_profile3 = ProfileTracker::where('user_id', Auth::user()->id) -> where('event', 3) ->get();

                if ($check_user_profile1 -> isNotEmpty() && $check_user_profile2 -> isNotEmpty() && $check_user_profile3 -> isNotEmpty())   {
                    $notification[0] = 0;
                }   else {
                    $notification[0] = 1;
                }


            // --- Check if user enters the first time for modal instruction (if they need instructions)
            $check_1 = NotificationTeacher::where('noti_id' , 1) -> where('user_id', Auth::user()->id) -> get();
            if ($check_1 -> isEmpty())    {
                $notification_2 = 1;
            }   else    {
                $notification_2 = 0;
            }


            //Check second noti
                $check_2 = NotificationTeacher::where('noti_id' , 2) -> where('user_id', Auth::user()->id) -> get();
                if ($check_2 -> isEmpty())    {
                    $notification_3 = 1;
                }   else    {
                    $notification_3 = 0;
                }
            //End check second noti

            //Check ==> Feedback (not used)
                $check_3 = NotificationTeacher::where('noti_id' , 3) -> where('user_id', Auth::user()->id) -> get();
                if ($check_3 -> isEmpty())    {
                    $notification_4 = 1;
                }   else    {
                    $notification_4 = 0;
                }
            //End check third noti

        for($i=0; $i<4; $i++)   {
            $check[$i] = NotificationTeacher::where('noti_id' , $i+1) -> where('user_id', Auth::user()->id) -> get();
            if ($check[$i] -> isEmpty())    {
                $notification[$i+1] = 1;
            }   else    {
                $notification[$i+1] = 0;
                $notification[$i+1] = 0;
            }
        }

        //--------------------------------------------------------------------
        //Statistics ---------------------------------------------------------
        if(Attempt::where('creator', Auth::user()->id)->whereMonth('created_at', Carbon::now()->month)->get() -> isNotEmpty())    {
            $data_attempt_today = Attempt::where('creator', Auth::user()->id)->whereDate('created_at', Carbon::today())->count();
            $data_attempt_month = Attempt::where('creator', Auth::user()->id)->whereMonth('created_at', Carbon::now()->month)->count();
            $data_question_uploaded = Question::where('creator', Auth::user()->id)->where('finished',1)->where('verified',1)-> count();
        }   else    {
            $data_attempt_today = 0;
            $data_attempt_month = 0;
            $data_question_uploaded = 0;
        }

        //Gather all the data in one variable
        $data['question_uploaded'] = $data_question_uploaded;
        $data['attempt_today'] = $data_attempt_today;
        $data['attempt_month'] = $data_attempt_month;

        for($i=1; $i<31; $i++)   {
            $data['attempt_daily'][$i] =  Attempt::where('creator', Auth::user()->id)->whereMonth('created_at', Carbon::now()->month)->whereDay('created_at', $i)->count();
        }

        //----------------------------------------------------------------------
        // CHECK IF THIS TEACHER HAS SUBMITTED ANYTHING ------------------------

        $need_nav_performance = Teacher::need_nav_performance(Auth::user()->id);

        session(['need_nav_performance' => $need_nav_performance]);

        return view('dashboard.teacher.teacher', compact('notification','data'));
    }

}
