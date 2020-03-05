<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
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

    public function fetch1()
    {
        $subject = request()->get('subject');

        $results = DB::table('chapters_list')->where('subject', $subject)->orderBy('order','asc')->get();

        echo '<option value="0">All</option>';
        foreach ($results as $result) {
            echo '<option value="', $result->id, '">', $result->name, '</option>';
        }
    }

    public function fetch2()
    {
        $subject = request()->get('subject');
        $level = request()->get('level');

        $results = DB::table('chapters_list')->where('subject', $subject) -> where('level', $level)->orderBy('order','asc')->get();

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
}
