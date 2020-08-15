<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)  {

        $role = $request -> get('role');
        $notification_id = $request -> get('notification_id');

        (new \App\Notification())->insert($role, $notification_id);
    }
}
