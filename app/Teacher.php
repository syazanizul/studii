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
            $question = Question::where('creator', $teacher_id)->get();
            $accumulated_earning = 0;

            foreach($question as $m)   {
                $accumulated_earning += $m->earning_per_question();
            }

            return $accumulated_earning;
        }
        return 1;
    }
}
