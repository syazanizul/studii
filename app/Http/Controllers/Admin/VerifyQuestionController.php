<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class VerifyQuestionController extends Controller
{
    public function index(Request $request) {
        $all_question = Question::where('finished',1)-> where('verified', 0)->get();

        if($request -> get('qid') == null)    {
            return view('dashboard.admin.verify_question', compact('all_question'));

        }   else    {
            $question = Question::find($request->get('qid'));
            return view('dashboard.admin.verify_question', compact('all_question','question'));

        }
    }

    public function verify($id)    {
        $m = Question::find($id);
        $m->verified = 1;
        $m->save();

        return redirect()->back();
    }
}
