<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Mail\event;
use App\Question;
use App\QuestionAllocation;
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

        DB::table('count_attempt')-> insert(
                ['question_id' => $question_id, 'creator' => $x->creator , 'uploader' => $x->uploader, 'working' => $x->working ,
                    'verified_by_1' => $x->verified_by_1, 'verified_by_2' => $x->verified_by_2, 'correct' => $correct,
                    'created_at' => now() , 'updated_at' => now()]
            );

//        dd($x);

    }

    public function rating()    {
        $question_id = request() -> get('question_id');
        $rating = request() -> get('rating');

        if (Auth::check()) {
            $user = Auth::user() -> id;
        }   else    {
            $user = 0;
        }

        $db = DB::table('difficulty_rating') -> insert(
            ['user_id' => $user, 'question_id' => $question_id, 'rating' => $rating, 'created_at' => now(), 'updated_at' => now()]
        );

        //Get new average
        $average = DB::table('difficulty_rating')-> where('question_id', $question_id) -> avg('rating');

        //Save into 'question' table
        $update = DB::table('questions') -> where('id', $question_id) -> update(['difficulty' => (int)$average]);
    }

    public function session_for_new(Request $request)  {
        $request->session()->push('need_instructions', 1);

        return 1;
    }
}
