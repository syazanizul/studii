<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Mail\event;
use App\Question;
use App\QuestionSetElement;
use App\QuestionSetParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AddquestionController extends Controller
{

    public function index() {

//        $draft = Question::where('creator', Auth::user()->id)->where('finished', 0);
//        $question_done = Question::where('creator', Auth::user()->id)->where('finished', 1)->count();

        $question_set = QuestionSetParent::where('submitter_id', Auth::user()->id)->latest()->get();

//        return view('dashboard.teacher.add-question.addQuestion2', compact('draft', 'question_done'));
        return view('dashboard.teacher.add-question.addQuestion2', compact('question_set'));
    }

    public function contribute_set_template()    {
        return view('dashboard.teacher.add-set.template');
    }

    public function contribute_set_submit()    {
        return view('dashboard.teacher.add-set.submit');
    }

    public function upload_set(Request $request)    {
        $file = $request->file('question_set');

        $name = rand(10000, 99999).'-' . $file->getClientOriginalName();
        $status = 0;

        if($file->move('storage/question_set', $name))    {
            $m = new QuestionSetParent;
            $m -> file_name_actual = $name;
            $m -> submitter_id = Auth::user()->id;
            $m -> taken_by = 0;
            $m -> upload_status = false;
            $m -> verified_by_submitter = 0;
            $m -> save();

            Mail::to('syazanizul@gmail.com')->send(new event('New Question Set'));

//            return redirect(url()->previous().'#upload')->with('upload_status', '1');

            $status = 1;

            return view('dashboard.teacher.add-set.status', compact('status'));

        }   else    {
            return view('dashboard.teacher.add-set.status', compact('status'));
        }
    }

    public function contribute_set_status() {
        return view('dashboard.teacher.add-set.status', compact('status'));
    }

    public function contribute_set_see($id)    {
        $question_set_element = QuestionSetElement::where('question_set_id', $id);

        $question_set = QuestionSetParent::find($id);

        return view('dashboard.teacher.add-set.see', compact('question_set_element','question_set'));
    }

    public function see_set_choose($id) {

        $qid = request()->get('qid');
        $question_set_element = QuestionSetElement::where('question_set_id', $id);

        $question_set = QuestionSetParent::find($id);

        if($qid == null)    {
            return view('dashboard.teacher.add-set.see', compact('question_set_element','question_set'));
        }   else    {
            $question = Question::find($qid);
            return view('dashboard.teacher.add-set.see', compact('question_set_element', 'question','question_set'));
        }
    }

    public function verify_set_finish($id) {
        $set = QuestionSetParent::find($id);

        $set->verified_by_submitter = 1;
        $set->save();

        return redirect('/teacher/set');
    }


    // --------------------------------------------------------- UNUSED
    // -------- For Upload With Help

//    public function index_with_help()   {
//        return view('dashboard.teacher.add-question.addWithHelp.index');
//    }
//
//    public function index_with_help_2()   {
//        $subjects = DB::table('subjects_list')->where('exam', 1)->get();
//        $levels = DB::table('levels_list')->get();
//
//
//        return view('dashboard.teacher.add-question.addWithHelp.index2', compact('subjects' , 'levels'));
//    }
//
//    public function index_with_help_3()   {
//        return view('dashboard.teacher.add-question.addWithHelp.index3');
//    }
//
//    public function upload_question_set(Request $request)   {
////        dd($request -> all());
//        $file = $request->file('question_set');
//        $exam = $request->get('s_exam');
//        $subject = $request->get('s_subject');
//        $chapter = $request->get('s_chapter');
//        $subtopic = $request->get('s_subtopic');
//        $paper = $request->get('s_paper');
//        $total_question = $request -> get('total_question');
//
////        $name = Auth::user()->id .'-'. rand(10000, 99999).'.docx';
//        $name = Auth::user()->id .'-'. rand(10000, 99999).'.'.$file->clientExtension();
//
//        if($file->move('storage/question_set', $name))    {
//            $m = new QuestionSetParent;
//            $m -> file_name_actual = $file->getClientOriginalName();
//            $m-> file_name_studii = $name;
//            $m -> exam_id = $exam;
//            $m -> subject_id = $subject;
//            $m -> chapter_id = $chapter;
//            $m -> subtopic_id = $subtopic;
//            $m -> paper = $paper;
//            $m -> total_question = $total_question;
//            $m -> submitter_id = Auth::user()->id;
//            $m -> taken_by = 0;
//            $m -> upload_status = false;
//            $m -> verified_by_submitter = 0;
//            $m -> save();
//
//            Mail::to('syazanizul@gmail.com')->send(new event('New Question Set'));
//
////            return redirect(url()->previous().'#upload')->with('upload_status', '1');
//            return redirect('/teacher/upload/with-help-3')->with('upload_status', '1');
//
//        }   else    {
//            return redirect('/teacher/upload/with-help-3')->with('upload_status', '1');
//        }
//    }

    // ------- End Upload With Help
}
