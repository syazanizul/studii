<?php

namespace App\Http\Controllers\Ajax;

use App\Attempt;
use App\DifficultyRating;
use App\Http\Controllers\Controller;
use App\Mail\event;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PracticeController extends Controller
{

//--------------------------------------------------------------------------------------------------------------
    public function count_attempt() {

        $question_id = request() -> get('question_id');
        $correct = request() -> get('correct');

//        //Increment or insert in count_total_attempt table
//        $check_if_exist = DB::table('count_total_attempt') -> where('question_id', $question_id)->whereDate('created_at', Carbon::today()) -> get();
//
//        if ($check_if_exist -> isEmpty())   {
//            DB::table('count_total_attempt')-> insert(
//                ['question_id' => $question_id, 'total_attempt' => 1 , 'created_at' => now() , 'updated_at' => now()]
//            );
//        }   else    {
//            DB::table('count_total_attempt')->where('question_id', $question_id)->whereDate('created_at', Carbon::today())->increment('total_attempt');
//        }
//
//        //Increment or insert in count_teacher_attempt table
//        $check_if_exist2 = DB::table('count_teacher_attempt') -> where('user_teacher_id', $teacher_id)->whereDate('created_at', Carbon::today()) -> get();
//
//        if ($check_if_exist2 -> isEmpty())   {
//            DB::table('count_teacher_attempt')-> insert(
//                ['user_teacher_id' => $teacher_id, 'total_attempt' => 1 , 'created_at' => now() , 'updated_at' => now()]
//            );
//        }   else    {
//            DB::table('count_teacher_attempt')->where('user_teacher_id', $teacher_id)->whereDate('created_at', Carbon::today())->increment('total_attempt');
//        }

//        -------------------------------------------------------------------------------------------------------------------------------
//        ---------------------------------------------------------
//        BASED ON NEW STRUCTURE (3.1.2020)

        $x = Question::find($question_id);

        if($x->verified_by_1 == null)   {
            $x->verified_by_1 = 0;
        }

        if($x->verified_by_2 == null)   {
            $x->verified_by_2 = 0;
        }

        $m = new Attempt();
        $m->question_id = $question_id;
        $m->creator = $x->creator;
        $m->uploader = $x->uploader;
        $m->working = $x->working;
        $m->correct = $correct;
        $m->save();

//        dd($x);

    }

    public function difficulty_rating()    {
        $question_id = request() -> get('question_id');
        $rating = request() -> get('rating');

        if (Auth::check()) {
            $user = Auth::user() -> id;
        }   else    {
            $user = 0;
        }

        $m = new DifficultyRating();
        $m->user_id = $user;
        $m->question_id = $question_id;
        $m->rating = $rating;
        $m->save();

        //Get new average
        $average = DifficultyRating::where('question_id', $question_id) -> avg('rating');

        //Save into 'question' table
        $update = Question::find($question_id);
        $update->difficulty = (int)$average;
        $update->save();
    }

    public function session_for_new(Request $request)  {
//        $request->session()->push('need_instructions', 1);

        return response(1) ->cookie(
            'need_instruction','0', 525600
        );
    }

    public function feedback_form_quick_rating(Request $request)   {
        $like = request() -> get('like');

        $db = DB::table('feedback_form_quick_rating') -> insert(
            ['like' => $like, 'created_at' => now(), 'updated_at' => now()]
        );

        $request->session()->put('feedback_form', 1);

        return 1;
    }

    public function feedback_form_quick_improvement(Request $request)   {
        $suggestion = request() -> get('suggestion');

        $db = DB::table('feedback_form_quick_improvement') -> insert(
            ['suggestion' => $suggestion, 'created_at' => now(), 'updated_at' => now()]
        );

        $request->session()->put('feedback_form', 1);

        Mail::to('syazanizul@gmail.com')->send(new event('Feedback'));

        return 1;
    }

//    public function feedback(Request $request)  {
//        $like = request() -> get('like');
//        $suggestion = request() -> get('suggestion');
//
//        $db = DB::table('feedback_form') -> insert(
//            ['like' => $like, 'suggestion' => $suggestion, 'created_at' => now(), 'updated_at' => now()]
//        );
//
//        $request->session()->put('feedback_form', 1);
//
//        Mail::to('syazanizul@gmail.com')->send(new event('Feedback'));
//
//        return 1;
//    }
}
