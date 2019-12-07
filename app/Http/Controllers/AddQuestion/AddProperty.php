<?php

namespace App\Http\Controllers\AddQuestion;

use App\Http\Controllers\Controller;
use App\Chapter;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddProperty extends Controller
{
    //   ----------------- FIRST METHOD
    public function property()
    {
        $subjects = DB::table('subjects_list')->get();
        $levels = DB::table('levels_list')->get();
        $chapters = DB::table('chapters_list')->get();
        $sources = DB::table('sources_list')->get();

        return view('addquestion/property', compact('subjects' , 'levels' , 'chapters', 'sources'));
    }

//   ----------------- SECOND METHOD
    public function newsubject()
    {
        $request = request() -> get('thing');
        //dd($request);

        $subject = new Subject;
        $subject -> name = $request;
        $subject -> exam = 1;
        $subject -> save();
        //dd($subject);

        return redirect('question/add');
    }

//   ----------------- THIRD METHOD
    public function newchapter()
    {
        $request = request() -> get('thing');
        $level = request() -> get('level');
        $subject = request() -> get('subject');
        //dd($request);

        $chapter = new chapter;
        $chapter -> name = $request;
        $chapter -> subject = 1;
        $chapter -> level = $level;
        $chapter -> save();
        //dd($chapter);

        return redirect('question/add');
    }

//   ----------------- FOURTH METHOD
    public function store1()    {
        //dd(request()-> all());
        $subject = request() -> get('s_subject');
        $level = request() -> get('s_level');
        $chapter = request() -> get('s_chapter');
//        $source = request() -> get('s_source');
        $paper = request() -> get('s_paper');
//        $year = request() -> get('s_year');
        $difficulty = request() -> get('s_difficulty');
        $question = new \App\Question;
        $question -> exam = 1;
        $question -> level = $level;
        $question -> subject = $subject;
        $question -> chapter = $chapter;
        $question -> year = 2019;
        $question -> paper = $paper;
        $question -> source = 1;
        $question -> question_number = 1;
        $question -> difficulty = $difficulty;
        $question -> finished = false;
        $question -> verified = false;
        $question -> submitted_by1 = auth()->user()->id;
        $question -> submitted_by2 = 0;
        $question -> question_image = 0;
        $question -> created_at = now();
        $question -> updated_at = now();

        $question -> save();

        $id = $question -> id;

        return redirect('question/update/'.$id);

    }
}
