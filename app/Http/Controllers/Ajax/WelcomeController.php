<?php

namespace App\Http\Controllers\Ajax;

use App\Chapter;
use App\Http\Controllers\Controller;
use App\Subtopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
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

    public function fetch_subject_change_chapter()
    {
        $subject = request()->get('subject');

        $results = Chapter::where('subject', $subject)->orderBy('order','asc')->get();

        echo '<option value="0">All</option>';
        foreach ($results as $result) {
            echo '<option value="', $result->id, '">', $result->name, '</option>';
        }
    }

    public function fetch_subject_level_change_chapter()
    {
        $subject = request()->get('subject');
        $level = request()->get('level');

        $results = Chapter::where('subject', $subject) -> where('level', $level)->orderBy('order','asc')->get();

        echo '<option value="0">All</option>';
        foreach ($results as $result) {
            echo '<option value="', $result->id, '">', $result->name, '</option>';
        }
    }

    public function fetch_chapter_change_subtopic()
    {
        $chapter = request()->get('chapter');

        $results = Subtopic::where('chapter_id', $chapter)->orderBy('order','asc')->get();

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
        $subtopic = request() -> get('subtopic');
        $source = request() -> get('source');
        $paper = request() -> get('paper');
        $year = request() -> get('year');
        $difficulty = request() -> get('difficulty');

        $count = DB::table('questions')-> where('subject', $subject) -> where('finished', 1);

        if ($chapter != 0) {
            $count = $count -> where('chapter', $chapter);
        }

        if ($subtopic != 0) {
            $count = $count -> where('subtopic', $subtopic);
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
}
