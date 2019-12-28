<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AjaxController extends Controller
{
    //Function 1 used in Welcome Page
    public function fetch()
    {
        $input = request()->get('input');
        $table = request()->get('table');
        $column = request()->get('column');

        $results = DB::table($table)->where($column, $input)->get();

        echo '<option value="0">All</option>';
        foreach ($results as $result) {
            echo '<option value="', $result->id, '">', $result->name, '</option>';
        }
    }

    //Function 2 used in Welcome Page
    public function count()
    {
        $subject = request() -> get('subject');
        $level = request() -> get('level');
        $chapter = request() -> get('chapter');
        $source = request() -> get('source');
        $paper = request() -> get('paper');
        $year = request() -> get('year');
        $difficulty = request() -> get('difficulty');

        $count = DB::table('questions')-> where('subject', $subject) -> where('finished', 1);

        if ($chapter != 0) {
            $count = $count -> where('chapter', $chapter);
        }

        if ($level != 0) {
            $count = $count -> where('level', $level);
        }

        if ($source != 0) {
            $count = $count -> where('source', $source);
        }

        if ($paper != 0) {
            $count = $count -> where('paper', $paper);
        }

        if ($year != null) {
            $count = $count -> where('year', $year);
        }

        if ($difficulty != 0) {
            $count = $count -> where('difficulty', $difficulty);
        }

        $count = $count -> count();
        echo $count;
    }

    public function hide_modal()    {
        $id = Auth::user() -> id;

        DB::table('teacher_notification') -> updateOrInsert(
            ['user_teacher_id' => $id],
            ['welcome' => 1]
        );

        return 1;
    }

    public function subject_based_on_exam() {
        $exam = request() -> get('exam');

        $subjects = DB::table('subjects_list')->where('exam', $exam)-> get();

        echo '<select name="subject" class="form-control m-1">';
        foreach($subjects as $n)   {
            echo '<option value="',$n->id,'">',$n->name,'</option>';
        }
        echo '</select>';
    }


    public function session_for_new(Request $request)  {
        $request->session()->push('need_instructions', 1);

        return 1;
    }

//    public function school_name()   {
////        $str = request() -> get('str');
////
////        $school =
////    }

    //Function used in Practice Page
    public function count_attempt() {
        $question_id = request() -> get('question_id');
        $teacher_id = request() -> get('teacher_id');

        //Increment or insert in count_total_attempt table
        $check_if_exist = DB::table('count_total_attempt') -> where('question_id', $question_id)->whereDate('created_at', Carbon::today()) -> get();

        if ($check_if_exist -> isEmpty())   {
            DB::table('count_total_attempt')-> insert(
                ['question_id' => $question_id, 'total_attempt' => 1 , 'created_at' => now() , 'updated_at' => now()]
            );
        }   else    {
            DB::table('count_total_attempt')->where('question_id', $question_id)->whereDate('created_at', Carbon::today())->increment('total_attempt');
        }

        //Increment or insert in count_teacher_attempt table
        $check_if_exist2 = DB::table('count_teacher_attempt') -> where('user_teacher_id', $teacher_id)->whereDate('created_at', Carbon::today()) -> get();

        if ($check_if_exist2 -> isEmpty())   {
            DB::table('count_teacher_attempt')-> insert(
                ['user_teacher_id' => $teacher_id, 'total_attempt' => 1 , 'created_at' => now() , 'updated_at' => now()]
            );
        }   else    {
            DB::table('count_teacher_attempt')->where('user_teacher_id', $teacher_id)->whereDate('created_at', Carbon::today())->increment('total_attempt');
        }
    }

    public function feedback()  {
        $like = request() -> get('like');
        $suggestion = request() -> get('suggestion');

        $db = DB::table('feedback_form') -> insert(
            ['like' => $like, 'suggestion' => $suggestion, 'created_at' => now(), 'updated_at' => now()]
        );

        return 1;
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
}
