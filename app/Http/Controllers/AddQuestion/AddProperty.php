<?php

namespace App\Http\Controllers\AddQuestion;

use App\Http\Controllers\Controller;
use App\Chapter;
use App\QuestionSetElement;
use App\Subject;
use App\Subtopic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddProperty extends Controller
{
    //   ----------------- FIRST METHOD
    public function index()
    {
        $subjects = DB::table('subjects_list')->where('exam', 1)->get();
        $chapters = DB::table('chapters_list')->get();
        $levels = DB::table('levels_list')->get();
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

        return redirect()->back();
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
        $chapter -> subject = $subject;
        $chapter -> level = $level;
        $chapter -> save();
        //dd($chapter);

        return redirect()->back();
    }

//    ---------------- 3.5 METHOD
    public function newsubtopic()   {
        $chapter = request() -> get('chapter');
        $subtopic_name = request() -> get('thing');

        $subtopic = new subtopic;
        $subtopic -> name = $subtopic_name;
        $subtopic -> chapter_id = $chapter;
        $subtopic -> order = $chapter;
        $subtopic -> save();

        return redirect() -> back();

    }

//   ----------------- FOURTH METHOD
    public function store1(Request $request)    {
        $subject = request() -> get('s_subject');
        $level = request() -> get('s_level');
        $chapter = request() -> get('s_chapter');
        $subtopic = request() -> get('s_subtopic');
        $paper = request() -> get('s_paper');
        $difficulty = request() -> get('s_difficulty');
        $source = request() -> get('s_source');

        //This is supposed to be redundant from now on
        if (request() -> get('submitter1') == null)   {
            $submitter1 = Auth::user()->id;
            $submitter2 = Auth::user()->id;
        }   else    {
            $submitter1 = request() -> get('submitter1');
            $submitter2 = Auth::user()->id;
        }


//        if (request() -> get('subtopic') == null)   {
//            $subtopic = 0;
//        }   else    {
//            $subtopic = request() -> get('subtopic');
//        }

//        $year = request() -> get('s_year');


        $question = new \App\Question;
        $question -> exam = 1;
        $question -> level = $level;
        $question -> subject = $subject;
        $question -> chapter = $chapter;
        $question -> subtopic = $subtopic;
        $question -> year = 2020;
        $question -> paper = $paper;
        $question -> source = $source;
        $question -> question_number = 0;
        $question -> difficulty = $difficulty;
        $question -> finished = 0;
        $question -> verified = 0;
        $question -> creator = $submitter1;
        $question -> uploader = $submitter2;
        $question -> question_image = 0;
        $question -> created_at = now();
        $question -> updated_at = now();

        $question -> save();

        $id = $question -> id;

//        ------------for add property -> no need to select again
        $request->session()->put('recent_add_property', request()->all());
//        -----------------------------------------------------------------

//        ----------- for if upload for someone else
        if (request() -> get('submitter1') != null)   {
            $submitter1 = request() -> get('submitter1');

            $m = new QuestionSetElement;
            $m -> question_id = $id;
            $m -> question_set_id = request() -> get('question_set');
            $m -> upload_status = 0;
            $m -> verified_by_submitter = 0;
            $m->save();
        }
//        ----------------------------------------------------------

//        if (request() -> get('submitter1') == null)   {
//            DB::table('question_allocation')->insert(['question_id' => $id, 'creator' =>  Auth::user()->id, 'uploader' => 0]);
//        }   else    {
//            DB::table('question_allocation')->insert(['question_id' => $id, 'creator' =>  request() -> get('submitter1'), 'uploader' => Auth::user()->id]);
//        }

        return redirect('question/update/'.$id);

    }
}
