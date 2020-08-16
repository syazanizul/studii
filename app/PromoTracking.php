<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoTracking extends Model
{
    protected $table = "promo_tracking";

    public static function is_stage($teacher_id)   {
        $data = PromoTracking::where('user_id', $teacher_id) -> where('promo_id', 1)->count();

        return $data;
    }

    public static function add_stage($teacher_id, $stage)  {
        $n = PromoTracking::where('user_id', $teacher_id)->where('event', $stage)->get();

        if($n->isEmpty())    {
            $n = new PromoTracking();
            $n -> user_id = $teacher_id;
            $n -> promo_id = 1;
            $n -> event = $stage;
            $n -> save();
        }
    }
}
