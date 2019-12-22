<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class School extends Model
{
        protected $table = 'schools_list';

        public static function school_name($id)    {
            $check = DB::table('user_school_role')->where('user_id', $id)->first();

            if ($check != null)   {
                $x = School::find($check->school_id);

                return $x -> name;
            }   else    {
                return '';
            }
        }
}
