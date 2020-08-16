<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use App\PromoTracking;
use App\Question;
use App\QuestionSetElement;
use App\QuestionSetParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributeController extends Controller
{
    public function index() {

        $have_set = QuestionSetParent::where('taken_by', Auth::user()->id)->where('upload_status', 0)->get();

//        dd($have_set);
        if($have_set->isEmpty())    {
            $question_set_1 = QuestionSetParent::where('taken_by', 0)->get();

            return view('dashboard.tutor.contribute.index', compact('question_set_1'));
        }
        else    {
            $set_element_done = QuestionSetElement::where('question_set_id', $have_set->first()->id);

            return view('dashboard.tutor.contribute.index', compact('have_set','set_element_done'));
        }
    }

    public function choose_set(int $id)    {

        $question_set = QuestionSetParent::find($id);

        $question_set -> taken_by = Auth::user()->id;
        $question_set->save();

        return redirect()->back();
    }

    // To see set page------------------------------------------------------------

    public function see_set(int $id)   {

        $question_set_element = QuestionSetElement::where('question_set_id', $id);

        return view('dashboard.tutor.contribute.seeset', compact('question_set_element'));
    }

    // To choose and show the question

    public function see_set_choose($set_id) {
        $qid = request()->get('qid');
        $question_set_element = QuestionSetElement::where('question_set_id', $set_id);

        if($qid == null)    {
            return view('dashboard.tutor.contribute.seeset', compact('question_set_element'));
        }   else    {
            $question = Question::find($qid);
            return view('dashboard.tutor.contribute.seeset', compact('question_set_element', 'question'));
        }
    }

    // === To declare set finished uploaded
    public function declare_set_uploaded($id) {
        $set = QuestionSetParent::find($id);

        $set->upload_status = 1;
        $set->save();

        // --- for 30 question = RM50 promo - this is temporary
        PromoTracking::add_stage($set->submitter_id, 2);

        return redirect('/tutor/contribute');
    }
}
