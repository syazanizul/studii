<?php

namespace App\Http\Controllers\Admin;

use App\DifficultyRating;
use App\Http\Controllers\Controller;
use App\ProfileTracker;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $question = Question::where('verified' , 1)->get();

        foreach($question as $m)   {

            $j = rand(4,7);

            for($i = 0; $i<$j ; $i++)   {

                $h = new DifficultyRating();
                $h -> user_id = 1;
                $h -> question_id = $m->id;
                $h -> rating = $m->difficulty;
                $h -> save();
            }
        }

        return view('dashboard.admin.admin');
    }

}
