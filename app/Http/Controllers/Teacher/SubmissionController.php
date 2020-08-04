<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionSetParent;
use App\QuestionSetElement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index() {
        $question_set = QuestionSetParent::where('submitter_id', Auth::user()->id);
        $statement1 = 0;

        foreach($question_set->get() as $m) {
            if($m->question_set_element->where('upload_status', 1)->where('verified_by_submitter', 0)->isNotEmpty())  {
                $statement1 = 1;
            }
        }

        return view('dashboard.teacher.submissionStatus.index', compact('question_set', 'statement1'));
    }

    public function verify_index($set_id) {
        $qid = request()->get('qid');
        $question_set_element = QuestionSetElement::where('question_set_id', $set_id);

        if($qid == null)    {
            return view('dashboard.teacher.submissionStatus.verify', compact('question_set_element'));
        }   else    {
            $question = Question::find($qid);
            return view('dashboard.teacher.submissionStatus.verify', compact('question_set_element', 'question'));
        }
    }

//    Currently not used
    public function verify_set_element($id)  {
        $question_set_element = QuestionSetElement::find($id);
        $question_set_element -> verified_by_submitter = 1;
        $question_set_element -> save();

        return redirect()->back();
    }

    public function verify_set_parent($id)  {
        $question_set_parent = QuestionSetParent::find($id);
        $question_set_parent -> verified_by_submitter = 1;
        $question_set_parent -> save();

        foreach($question_set_parent->question_set_element as $m)   {
            $h = Question::find($m->question_id);
            $h -> finished = 1;
            $h -> save();
        }

        return redirect()->back();
    }

}
