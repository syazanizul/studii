<?php

namespace App\Http\Controllers\Teacher;

use App\Attempt;
use App\Notification;
use App\ProfileTracker;
use App\PromoTracking;
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
                $check_user_profile4 = ProfileTracker::where('user_id', Auth::user()->id) -> where('event', 4) ->get();

                if ($check_user_profile1 -> isNotEmpty() && $check_user_profile2 -> isNotEmpty() && $check_user_profile3 -> isNotEmpty() && $check_user_profile4 -> isNotEmpty())   {
                    $notification[0] = 0;
                }   else {
                    $notification[0] = 1;
                }


        for($i=0; $i<4; $i++)   {
            $check[$i] = Notification::where('notification_id' , $i+1) -> where('user_id', Auth::user()->id) -> get();
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
        // === check if teacher need navigation help  ------------------------

        $need_nav_performance = Teacher::need_nav_performance(Auth::user()->id);

        session(['need_nav_performance' => $need_nav_performance]);

        //--------------------------------------------------------------------
        // === temporary --- 30 questions = RM50 promo ------------------------------------------
        $promo1 = PromoTracking::where('user_id', Auth::user()->id)->where('event' , 4)->first();
        $promo2 = PromoTracking::where('user_id', Auth::user()->id)->where('event' , 5)->first();

        if ($promo1 != null && $promo2 == null)   {

            $data['promo'] = 1;
        }   else    {

            $data['promo'] = 0;
        }

        return view('dashboard.teacher.teacher', compact('notification','data'));
    }



}
