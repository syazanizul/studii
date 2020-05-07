<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Content;
use App\Mail\event;
use App\Question;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quick()
    {
        // First type !!!
        $subject = request()->get('subject');
        $questions = Question::where('subject', $subject)->where('finished', 1)->inRandomOrder()->get();

        session() -> pull('qid');
        foreach ($questions as $question) {
            session() -> push('qid', $question->id);
        }

        //dd(session('qid'));

        return redirect('/practice?num=0');
    }

    public function detailed()
    {
         // Second type !!!
        $random_order = request() -> get('random-order');

        $input_subject = request() -> get('s_subject');
        $input_level = request() -> get('s_level');
        $input_chapter = request() -> get('s_chapter');
        $input_subtopic = request() -> get('s_subtopic');
        $input_source = request() -> get('s_source');
        $input_paper = request() -> get('s_paper');
        $input_year = request() -> get('s_year');
        $input_difficulty = request() -> get('s_difficulty');

        $questions = Question::where('subject', $input_subject)->where('finished', 1);

        if ($input_level != 0) {
            $questions = $questions -> where('level', $input_level);
        }

        if ($input_chapter != 0) {
            $questions = $questions -> where('chapter', $input_chapter);
        }

        if ($input_chapter != 0) {
            $questions = $questions -> where('chapter', $input_chapter);
        }

        if ($input_subtopic != 0) {
            $questions = $questions -> where('subtopic', $input_subtopic);
        }

        if ($input_source != 0) {
            $questions = $questions -> where('source', $input_source);
        }

        if ($input_paper != 0) {
            $questions = $questions -> where('paper', $input_paper);
        }

        if ($input_year != null) {
            $questions = $questions -> where('year', $input_year);
        }

        if ($input_difficulty != 0) {
            $questions = $questions -> where('difficulty', $input_difficulty);
        }

        if($random_order != null)    {
            $questions = $questions->inRandomOrder()->get();
        }   else    {
            $questions = $questions->get();
        }

        session() -> pull('qid');
        foreach ($questions as $question) {
            session() -> push('qid', $question->id);
        }

        //dd(session('qid'));
        //return view('practice' , compact('question', 'difficulty'));
        return redirect('/practice?num=0');

    }

    public function index(Request $request)
    {
        //SEO
        SEOMeta::setTitle('Practice Page');
        SEOMeta::setDescription('Practice exercise questions as much as you want here. it is totally free and forever will be.');
        SEOMeta::setCanonical('https://www.studii.my');

        //----------------------------------------------------------------------------
        //Get num from GET of url
        $num = request() -> get('num');

        //Get qid from session
        if (isset(session('qid')[$num])) {
            $qid = session('qid')[$num];
        }   else    {
            $qid = -1;
        }

        $question = Question::query()->findOrFail($qid);

        $answer_size = 0;
        $j=0;

        foreach($question->contents as $n)
        {
            if($n->answer_parent != null)
            {
                foreach($n->answer_parent as $o)   {
                    $i=1;
                    foreach($o->answer_element as $m)
                    {
                        if ($m -> correct == 1) {
                            $answer_correct[$j] = $i;
                        }

                        $i++;
                    }
                    $answer_size++;
                    $j++;
                }
            }
        }
//        dd($answer_correct);

        //-------------------------------------------------------------------------
        //FOR NOTIFICATIONS OR MODAL ----------------------------------------------
        //Put session to track if student needs pop up modal for instructions
        if ($request->hasCookie('need_instruction')) {
            $need_instruction = 0;
        }   else    {
            $need_instruction = 1;
        }

        //For feedback form modal - to make feedback form only pop out once
        if ($num==3 && $request->session()->has('feedback_form') == 0)  {
            $noti['feedback_form'] = 1;
        }


        //-------------------------------------------------------------------------
        //FOR SUBMITTER CARD ----------------------------------------------
        //Put session to track if student needs pop up modal for instructions


        if ($question -> source_name -> id != 2)   {
            $check = DB::table('teacher_details') -> where('user_teacher_id', $question -> submitted_by1) ->get();

            if ($check -> isNotEmpty()) {
                $profile_pic = $check->first()->profile_pic;

               $data['profile_pic'] = $profile_pic;

            }   else    {
                $data['profile_pic'] = 0;
            }
        }



        //-------------------------------------------------------------------------
        //-------------------------------------------------------------------------
        // Gather all the shits together
        $noti['need_instruction'] = $need_instruction;

        $data['num'] = $num;
        $data['answer_size'] = $answer_size;
        $data['answer_correct'] = $answer_correct;

        return view('practice' , compact('question','data', 'noti' ));
    }

    public function report()    {
        $report = request()->get('report');
        $qid = request()->get('qid');

        DB::table('practice_report')->insert(
            ['question_id' => $qid, 'report' => $report, 'created_at' => now(), 'updated_at' => now()]
        );

        Mail::to('syazanizul@gmail.com')->send(new event('report to question id : '. $qid . ' --- report : '. $report));

        return back()->with('report','report is submitted');
    }

    public function go_to_practicelink($id)    {

        $question = Question::query()->findOrFail($id);
        $answer_size=0;
        $i=0;
        $j=0;

        foreach($question->contents as $n)
        {
            if($n->answer_parent != null)
            {
                foreach($n->answer_parent as $o)   {
                    $i=1;
                    foreach($o->answer_element as $m)
                    {
                        if ($m -> correct == 1) {
                            $answer_correct[$j] = $i;
                        }

                        $i++;
                    }
                    $answer_size++;
                    $j++;
                }
            }
        }

        $noti['need_instruction'] = 0;

        $data['num'] = 0;
        $data['answer_size'] = $answer_size;
        $data['answer_correct'] = $answer_correct;

        return view('practice' , compact('question','data', 'noti' ));
    }
}
