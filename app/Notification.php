<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notification extends Model
{

    protected $table = 'notification';

    public function insert($role, $notification_id)    {
        $m = new $this;

        $m -> role = $role;
        $m -> user_id = Auth::user()-> id;
        $m -> notification_id = $notification_id;
        $m -> save();
    }
}
