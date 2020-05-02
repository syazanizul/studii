<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NotificationTeacher extends Model
{
    //1. hide modal
    //2. alert -> Do note that this Dashboard is best viewed on a computer

    protected $table = 'notification_teacher';

    public function insert(int $noti_id)    {
        $m = new $this;

        $m -> noti_id = $noti_id;
        $m -> user_id = Auth::user()-> id;
        $m -> save();
    }
}
