<?php

namespace App\Http\Controllers\Tutor;

use App\Chapter;
use App\Http\Controllers\Controller;
use App\Level;
use App\QuestionSetElement;
use App\QuestionSetParent;
use App\Source;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddquestionController extends Controller
{
    public function index(int $set_id) {
        $subjects = Subject::all()->where('exam', 1);
        $chapters = Chapter::all();
        $levels = Level::all();
        $sources = Source::all();

        return view('dashboard.tutor.contribute.addproperty', compact('subjects' , 'levels' , 'chapters', 'sources', 'set_id'));
    }

    public function store(Request $request)    {
        $subject = request() -> get('s_subject');
        $level = request() -> get('s_level');
        $chapter = request() -> get('s_chapter');
        $subtopic = request() -> get('s_subtopic');
        $paper = request() -> get('s_paper');
        $difficulty = request() -> get('s_difficulty');

        $question = new \App\Question;
        $question -> exam = 1;
        $question -> level = $level;
        $question -> subject = $subject;
        $question -> chapter = $chapter;
        $question -> subtopic = $subtopic;
        $question -> year = 2020;
        $question -> paper = $paper;
        $question -> source = 1;
        $question -> question_number = 0;
        $question -> difficulty = $difficulty;
        $question -> finished = false;
        $question -> verified = false;
        $question -> creator = QuestionSetParent::find(request() -> get('set_id'))->submitter_id;
        $question -> uploader = Auth::user()->id;
        $question -> question_image = 0;
        $question -> created_at = now();
        $question -> updated_at = now();

        $question -> save();

        $id = $question -> id;

//        ------------for add property -> no need to select again
        $request->session()->put('recent_add_property', request()->all());
//        -----------------------------------------------------------------

//        ----------- for if upload for someone else
        $m = new QuestionSetElement;
        $m -> question_id = $id;
        $m -> question_set_id = QuestionSetParent::find(request() -> get('set_id'))->id;
        $m -> upload_status = 0;
        $m -> verified_by_submitter = 0;
        $m->save();

//        ----------------------------------------------------------

//        if (request() -> get('submitter1') == null)   {
//            DB::table('question_allocation')->insert(['question_id' => $id, 'creator' =>  Auth::user()->id, 'uploader' => 0]);
//        }   else    {
//            DB::table('question_allocation')->insert(['question_id' => $id, 'creator' =>  request() -> get('submitter1'), 'uploader' => Auth::user()->id]);
//        }

        return redirect('question/update/'.$id);

    }
}
