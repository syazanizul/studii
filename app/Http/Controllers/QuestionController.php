<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Content;
use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $input_subject = request() -> get('s_subject');
        $input_level = request() -> get('s_level');
        $input_chapter = request() -> get('s_chapter');
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

        $questions = $questions->inRandomOrder()->get();

        session() -> pull('qid');
        foreach ($questions as $question) {
            session() -> push('qid', $question->id);
        }

        //dd(session('qid'));
        //return view('practice' , compact('question', 'difficulty'));
        return redirect('/practice?num=0');

    }

    public function show_update($id)    {
        $symbol = array();
        $symbol_finished = array();
        $question = Question::findOrFail($id);
        $contents = DB::table('contents') -> where('question_id', $id) ->orderBy('order')-> get();
        $image = $question -> question_image;

        $j=2;

//        $symbol_finished = Content::find($id) -> symbol($id);
        //dd($symbol_finished);

        foreach ($contents as $n) {
            $symbol[$j] = $n -> numbering;

            switch ($symbol[$j])    {
                case 0:
                    $symbol_finished[$j-2] = ' ';
                    break;
                case 1:
                    $symbol_finished[$j-2] = 'a)';
                    break;
                case 2:
                    $symbol_finished[$j-2] = 'b)';
                    break;
                case 3:
                    $symbol_finished[$j-2] = 'c)';
                    break;
                case 4:
                    $symbol_finished[$j-2] = 'd)';
                    break;
                case 5:
                    $symbol_finished[$j-2] = 'e)';
                    break;
            }
            $j++;
        }

        $data['contents'] = $contents;
        $data['image'] = $image;
        $data['id'] = $id;
        $data['symbol_finished'] = $symbol_finished;

        return $data;
    }

    public function index(Request $request)
    {
        //----------------------------------------------------------------------------
        //FOR GENERIC STUFF BERKAITAN SOALAN -----------------------------------------
        //Get num from GET of url
        $num = request() -> get('num');

        //Get qid from session
        if (isset(session('qid')[$num])) {
            $qid = session('qid')[$num];
        }   else    {
            $qid = -1;
        }

        //Get difficulty from other table
        $difficulty = "";
        $question = Question::query()->findOrFail($qid);

        switch ($question -> difficulty) {
            case 1:
                $difficulty = 'Easy (1)';
                break;
            case 2:
                $difficulty = 'Fair (2)';
                break;
            case 3:
                $difficulty = 'Moderate (3)';
                break;
            case 4:
                $difficulty = 'Hard (4)';
                break;
            case 5:
                $difficulty = 'Harder (5)';
                break;
        }

        $data = $this->show_update($qid);

        $contents = $data['contents'];
        $image = $data['image'];
        $symbol_finished = $data['symbol_finished'];
        $answer_size = 0;

        for($i=0; $i<7; $i++) {
            if (isset($contents[$i]))   {
                if (Answer::where('content_id', $contents[$i] -> id) -> first() != null)   {
                    $answers[$i] = Answer::where('content_id', $contents[$i]-> id) -> get();
                    $answer_size++;
                }
            }
        }


        //-------------------------------------------------------------------------
        //FOR NOTIFICATIONS OR MODAL ----------------------------------------------
        //Put session to track if student needs pop up modal for instructions
        if ($request->session()->has('need_instructions')) {
            $need_instruction = 0;
        }   else    {
            $need_instruction = 1;
        }

        //For feedback form modal - to make feedback form only pop out once
        if ($num==3 && $request->session()->has('feedback_form') == 0)  {
            $noti['feedback_form'] = 1;
            $request->session()->put('feedback_form', 1);
        }


        //-------------------------------------------------------------------------
        //FOR SUBMITTER CARD ----------------------------------------------
        //Put session to track if student needs pop up modal for instructions


        if ($question -> source_name -> id == 1)   {
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

            $data['difficulty'] = $difficulty;
            $data['num'] = $num;
            $data['id'] = $qid;
            $data['answer_size'] = $answer_size;

        return view('practice' , compact('question','contents', 'image', 'symbol_finished' , 'answers', 'data', 'noti' ));

    }
}
