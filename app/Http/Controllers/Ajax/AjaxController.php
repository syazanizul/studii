<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Mail\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class AjaxController extends Controller
{

//    ---------------------------------------------------------------------------------------------------
//    Function used in Dashboard.Teacher
    public function feedback(Request $request)  {
        $like = request() -> get('like');
        $suggestion = request() -> get('suggestion');

        $db = DB::table('feedback_form') -> insert(
            ['like' => $like, 'suggestion' => $suggestion, 'created_at' => now(), 'updated_at' => now()]
        );

        $request->session()->put('feedback_form', 1);

        Mail::to('syazanizul@gmail.com')->send(new event('Feedback'));

        return 1;
    }
}
