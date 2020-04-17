<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Integer;

class Teacher extends Model
{
    public static function total_earning(int $type, $teacher_id) {
        if($type==1)    {

            //Type 1 means earning for Creator
            $question = Question::where('creator', $teacher_id)->get();

            $accumulated_earning = 0;

            foreach($question as $m)   {
//                dd($m->total_attempt());
                $accumulated_earning += $m->earning_per_question();
            }
//
            return round($accumulated_earning,3);
        }
        return 1;
    }

    public static function total_attempt(int $type, $teacher_id) {
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
}
