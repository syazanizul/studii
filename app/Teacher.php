<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class Teacher extends Model
{
//    public static function total_earning(int $type, $teacher_id) {
//        if($type==1)    {
//
//            //Type 1 means earning for Creator
//            $question = Question::where('creator', $teacher_id)->get();
//
//            $accumulated_earning = 0;
//
//            foreach($question as $m)   {
////                dd($m->total_attempt());
//                $accumulated_earning += $m->earning_per_question();
//            }
////
//            return round($accumulated_earning,3);
//        }
//        return 1;
//    }
//
//    public static function total_attempt(int $type, $teacher_id) {
//        if($type==1)    {
//
//            $question = Question::where('creator', $teacher_id)->get();
//
//            $accumulated_attempt = 0;
//
//            foreach($question as $m)   {
////                dd($m->total_attempt());
//                $accumulated_attempt += $m->total_attempt();
//            }
////
//                return round($accumulated_attempt,3);
//        }
//        return 1;
//    }

//  --------------Total Earning------------------------------------------------------------
//---------------------------------------------------------------------------------------

    public static function total_earning_cumulative(int $type, $teacher_id) {

//        $g = ContributionEarningTracker::where('user_id', $teacher_id)->orderBy('end_date', 'desc')->first();

        if($type==1)    {

            //Type 1 means earning for Creator
            $question = Question::where('creator', $teacher_id)->get();

            $accumulated_earning = 0;

            foreach($question as $m)   {
//                dd($m->total_attempt());
                $accumulated_earning += $m->earning_per_question(0, 0);
            }
//
            return round($accumulated_earning,3);
        }
        return 1;
    }

    public static function total_earning_fresh(int $type, $teacher_id) {

        $g = ContributionEarningTracker::where('user_id', $teacher_id)->orderBy('end_date', 'desc')->first();

        if ($g != null)   {
            $end_date = $g->end_date;
        }   else    {
            $end_date = 0;
        }

        if($type==1)    {

            //Type 1 means earning for Creator
            $question = Question::where('creator', $teacher_id)->get();

            $accumulated_earning = 0;

            foreach($question as $m)   {
//                dd($m->total_attempt());
                $accumulated_earning += $m->earning_per_question($end_date, 0)*11/14;
            }

            return round($accumulated_earning,3);
        }
        return 1;
    }


    public static function improved_earning_fresh(int $type, $teacher_id, $promo) {

        $g = ContributionEarningTracker::where('user_id', $teacher_id)->orderBy('end_date', 'desc')->first();

        if ($g != null)   {
            $end_date = $g->end_date;
        }   else    {
            $end_date = 0;
        }

        if($type==1)    {

            //Type 1 means earning for Creator
            $question = Question::where('creator', $teacher_id)->get();

            $accumulated_earning = 0;

            foreach($question as $m)   {
//                dd($m->total_attempt());
                $accumulated_earning += $m->improved_earning_per_question($teacher_id, $end_date, 0, $promo)['total'];
            }

            return round($accumulated_earning,3);
        }
        return 1;
    }

    public static function improved_earning_cumulative(int $type, $teacher_id, $promo)   {
        $contribution_earning = ContributionEarningTracker::where('user_id', $teacher_id)->where('paid',0)->orderBy('end_date', 'desc')->get();

        $balance = Teacher::improved_earning_fresh($type, $teacher_id, $promo);

        $accumulative_value = 0;

        foreach($contribution_earning as $g)   {
            $accumulative_value += $g->amount;
        }

        return($accumulative_value + $balance);
    }

//    -------------------- Total Attempt -------------------------------------------------------
//  ----------------------------------------------------------------------------------

    public static function total_attempt_cumulative(int $type, $teacher_id) {
        if($type==1)    {

            $question = Question::where('creator', $teacher_id)->get();

            $accumulated_attempt = 0;

            foreach($question as $m)   {
//                dd($m->total_attempt());
                $accumulated_attempt += $m->total_attempt();
            }
//
            return round($accumulated_attempt,3);
        }
        return 1;
    }

    public static function total_attempt_fresh(int $type, $teacher_id) {

        $g = ContributionEarningTracker::where('user_id', $teacher_id)->orderBy('end_date', 'desc')->first();

        if ($g != null)   {
            $end_date = $g->end_date;
        }   else    {
            $end_date = 0;
        }

        if($type==1)    {

            $question = Question::where('creator', $teacher_id)->get();

            $accumulated_attempt = 0;

            foreach($question as $m)   {
//                dd($m->total_attempt());
                $accumulated_attempt += $m->total_attempt($end_date, 0);
            }
//
            return round($accumulated_attempt,3);
        }
        return 1;
    }



//    -------------------- Others -------------------------------------------------------
//  ----------------------------------------------------------------------------------

    public static function need_nav_performance(int $teacher_id)    {
        $has_question = Question::where('creator', $teacher_id)->where('finished',1)->get();

        if($has_question->isNotEmpty())    {
            $need_nav_performance = 1;
        }   else    {
            $need_nav_performance = 0;
        }

        return $need_nav_performance;
    }

    public static function profile_image(int $teacher_id)
    {
        $check = DB::table('teacher_details') -> where('user_teacher_id', $teacher_id) ->get();

        if ($check -> isNotEmpty()) {
            return $check->first()->profile_pic;

        }   else    {
            return 0;
        }
    }
}
