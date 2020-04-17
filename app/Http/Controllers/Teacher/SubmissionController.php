<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Question;
use App\QuestionSet;
use App\QuestionSetElement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index() {
        $question_set = QuestionSet::where('submitter_id', Auth::user()->id);
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

    public function verify_set_element($id)  {
        $question_set_element = QuestionSetElement::find($id);
        $question_set_element -> verified_by_submitter = 1;
        $question_set_element -> save();

        return redirect()->back();
    }

    public function verify_set_parent($id)  {
        $question_set_element = QuestionSet::find($id);
        $question_set_element -> verified_by_submitter = 1;
        $question_set_element -> save();

        return redirect()->back();
    }

}
