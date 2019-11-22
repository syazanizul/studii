<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class AjaxController extends Controller
{
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

    public function count()
    {
        $subject = request() -> get('subject');
        $level = request() -> get('level');
        $chapter = request() -> get('chapter');
        $source = request() -> get('source');
        $paper = request() -> get('paper');
        $year = request() -> get('year');
        $difficulty = request() -> get('difficulty');

        $count = DB::table('questions')-> where('subject', $subject);

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

    public function session_for_new(Request $request)  {
        $request->session()->push('need_instructions', 1);

        return 1;
    }

//    public function school_name()   {
////        $str = request() -> get('str');
////
////        $school =
////    }

    public function count_attempt() {
        $question_id = request() -> get('question_id');

        $check_if_exist = DB::table('count_total_attempt') -> where('question_id', $question_id)->whereDate('created_at', Carbon::today()) -> get();

        if ($check_if_exist -> isEmpty())   {
            DB::table('count_total_attempt')-> insert(
                ['question_id' => $question_id, 'total_attempt' => 1 , 'created_at' => now() , 'updated_at' => now()]
            );
        }   else    {
            DB::table('count_total_attempt')->where('question_id', $question_id)->increment('total_attempt');
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
}
