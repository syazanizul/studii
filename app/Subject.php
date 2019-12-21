<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects_list';

    public static function subject_name($id)   {
        return Subject::find($id)->name;
    }
}
