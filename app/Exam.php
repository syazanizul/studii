<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams_list';

    public static function exam_name($id) {
        return Exam::find($id)->name_shortened;
    }
}
