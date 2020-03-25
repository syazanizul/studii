<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Mail\event;
use App\QuestionSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AddquestionController extends Controller
{
    // -------------------------------------------------------------
    // -------- For Upload With Help

    public function index_with_help()   {
        return view('dashboard.teacher.add-question.addWithHelp.index');
    }

    public function index_with_help_2()   {
        $subjects = DB::table('subjects_list')->where('exam', 1)->get();
        $levels = DB::table('levels_list')->get();


        return view('dashboard.teacher.add-question.addWithHelp.index2', compact('subjects' , 'levels'));
    }

    public function index_with_help_3()   {
        return view('dashboard.teacher.add-question.addWithHelp.index3');
    }

    public function upload_question_set(Request $request)   {
//        dd($request -> all());
        $file = $request->file('question_set');
        $exam = $request->get('s_exam');
        $subject = $request->get('s_subject');
        $chapter = $request->get('s_chapter');
        $subtopic = $request->get('s_subtopic');
        $paper = $request->get('s_paper');

//        $name = Auth::user()->id .'-'. rand(10000, 99999).'.docx';
        $name = Auth::user()->id .'-'. rand(10000, 99999).'.'.$file->clientExtension();

        if($file->move('storage/question_set', $name))    {
            $m = new QuestionSet;
            $m -> file_name_actual = $file->getClientOriginalName();
            $m-> file_name_studii = $name;
            $m -> exam_id = $exam;
            $m -> subject_id = $subject;
            $m -> chapter_id = $chapter;
            $m -> subtopic_id = $subtopic;
            $m -> paper = $paper;
            $m -> submitter_id = Auth::user()->id;
            $m -> upload_status = false;
            $m -> save();

            Mail::to('syazanizul@gmail.com')->send(new event('New Question Set'));

//            return redirect(url()->previous().'#upload')->with('upload_status', '1');
            return redirect('/teacher/upload/with-help-3')->with('upload_status', '1');

        }   else    {
            return redirect('/teacher/upload/with-help-3')->with('upload_status', '1');
        }
    }

    // ------- End Upload With Help
}
