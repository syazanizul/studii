<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

class Teacher extends Model
{
    public static function get_total_attempt($teacher_id) {
       $i = 0;

       $attempt_table = DB::table('count_teacher_attempt')->where('user_teacher_id', $teacher_id)->get();

       foreach($attempt_table as $m)    {
            $total_attempt_one_day= $m->total_attempt;
            $i+=$total_attempt_one_day;
       }
       
        return $i;
    }
}
