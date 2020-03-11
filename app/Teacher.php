<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class Teacher extends Model
{
    public static function total_earning(int $type, $teacher_id) {
        if($type==1)    {
            $attempt_count = Attempt::where('creator', $teacher_id)->count();
//            $accumulated_earning = 0;
//            dd($question);
//            foreach($question as $m)   {
//                $accumulated_earning += $m->earning_per_question();
//            }

            return $attempt_count;
        }
        return 1;
    }
}
