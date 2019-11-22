<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use \App\Subject;
use \App\Chapter;
use \App\Content;

class AddController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('teacher');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

//    ---------------- INDEX
    public function index() {
        return view('addquestion/contributeQuestion');
    }

//   ----------------- FIRST METHOD
    public function property()
    {
        $subjects = DB::table('subjects_list')->get();
        $levels = DB::table('levels_list')->get();
        $chapters = DB::table('chapters_list')->get();
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

        return redirect('question/add');
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
        $chapter -> subject = 1;
        $chapter -> level = $level;
        $chapter -> save();
        //dd($chapter);

        return redirect('question/add');
    }

//   ----------------- FOURTH METHOD
    public function store1()    {
        //dd(request()-> all());
        $subject = request() -> get('s_subject');
        $level = request() -> get('s_level');
        $chapter = request() -> get('s_chapter');
//        $source = request() -> get('s_source');
        $paper = request() -> get('s_paper');
//        $year = request() -> get('s_year');
        $difficulty = request() -> get('s_difficulty');
        $question = new \App\Question;
        $question -> exam = 1;
        $question -> level = $level;
        $question -> subject = $subject;
        $question -> chapter = $chapter;
        $question -> year = 2019;
        $question -> paper = $paper;
        $question -> source = 1;
        $question -> question_number = 1;
        $question -> difficulty = $difficulty;
        $question -> finished = false;
        $question -> verified = false;
        $question -> submitted_by1 = auth()->user()->id;
        $question -> submitted_by2 = 0;
        $question -> question_image = 0;
        $question -> created_at = now();
        $question -> updated_at = now();

        $question -> save();

        $id = $question -> id;

        return redirect('question/update/'.$id);

    }

    //   ----------------- FIFTH METHOD
    public function show_update($id)    {
        $symbol = array();
        $symbol_finished = array();
        $question = Question::findOrFail($id);
        $contents = DB::table('contents') -> where('question_id', $id) ->orderBy('order')-> get();
        $image = $question -> question_image;

        $j=2;

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
                    $symbol_finished[$j-2]
                        = 'c)';
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

//        if (Content::find($id) != null)   {
//            $symbol_finished = Content::find($id) -> symbol($id);
//            //dd($symbol_finished);
//        }   else    {
//            $symbol_finished = ["",""];
//        }

        $data['contents'] = $contents;
        $data['image'] = $image;
        $data['id'] = $id;
        $data['symbol_finished'] = $symbol_finished;

//        dd($data);
        return $data;
    }

    public function update($id)
    {
        $data = $this->show_update($id);

        $contents = $data['contents'];
        $image = $data['image'];
        $symbol_finished = $data['symbol_finished'];

        if ($contents -> isEmpty()) {
            return view('/addquestion/content', compact('image', 'id', 'exist'));
        }

        return view('/addquestion/content', compact('contents', 'image', 'id', 'symbol_finished'));
    }

    //   ----------------- SIXTHS METHOD
    public function store2($id, Request $request)  {
        $j = 0;
        $image = $request->file('question_image');

        if ($image == true) {
            $name = 'id-'.$id.'.jpg';
            if ($image-> move('images/question_images', $name)) {
                $update = DB::table('questions')
                    ->where('id', $id)
                    ->update(['question_image' => true]);
            }
        }

        $content[0] = request() -> get('text_main_1');
        $content[1] = request() -> get('text_sub_1');
        $content[2] = request() -> get('text_sub_2');
        $content[3] = request() -> get('text_sub_3');
        $content[4] = request() -> get('text_sub_4');
        $content[5] = request() -> get('text_sub_5');
        $content[6] = request() -> get('text_sub_6');

        $numbering[0] = 0;
        $numbering[1] = 0;
        $numbering[2] = request() -> get('select1');
        $numbering[3] = request() -> get('select2');
        $numbering[4] = request() -> get('select3');
        $numbering[5] = request() -> get('select4');
        $numbering[6] = request() -> get('select5');
        //dd($numbering);

        if ($content[0] == null) {
            $j = 0;
        }   else if ($content[1] == null) {
            $j = 1;
        }   else if ($content[2] == null) {
            $j = 2;
        }   else if ($content[3] == null) {
            $j = 3;
        }   else if ($content[4] == null) {
            $j = 4;
        }   else if ($content[5] == null) {
            $j = 5;
        }   else if ($content[6] == null) {
            $j = 6;
        }   else    {
            $j = 7;
        }

        //dd($j);

        for ($i=0; $i< $j; $i++)    {
            $check = Content::where('question_id', $id) -> where('order', $i+1)-> first();

            //dd($check == null);

            if ($check == null) {
                $new = new Content;
                $new -> question_id = $id;
                $new -> order = $i+1;
                $new -> numbering = $numbering[$i];
                $new -> content = $content[$i];
                $new -> created_at = now();
                $new -> updated_at = now();
                $new -> save();
            }   else    {
                $update = Content::where('question_id', $id) -> where('order', $i+1)->first();
                $update -> numbering = $numbering[$i];
                $update -> content = $content[$i];
                $update -> updated_at = now();
                $update -> save();
            }

        }

        //dd($new);

       return redirect('question/update/'.$id);
    }

    //   ----------------- SEVENTH METHOD

    public function removeimage($id)   {
        $update = DB::table('questions')
            ->where('id', $id)
            ->update(['question_image' => false]);

        return redirect('/question/update/'.$id);
    }

    //    ----------------- EIGHT METHOD
    public function removecontent($id, $order)  {
        $n = Content::where('question_id', $id)-> where('order', $order+1)-> first() -> delete();
        //dd($n);
        return redirect('question/update/'.$id);
    }

    //  ---------------------NINTH METHOD
    public function answer($id) {

        $data = $this->show_update($id);

//        dd($data);

        $contents = $data['contents'];
        $image = $data['image'];
        $symbol_finished = $data['symbol_finished'];

//        dd($contents);

        for($i=0; $i<7; $i++) {
            if (isset($contents[$i]))   {
                if (Answer::where('content_id', $contents[$i] -> id) -> first() != null)   {
                    $answers[$i] = Answer::where('content_id', $contents[$i]-> id) -> get();
                }
            }
        }

//        dd($answers);
//        dd($contents);

        if ($contents -> isEmpty()) {
            return view('/addquestion/answer', compact('image', 'id'));
        }

        return view('/addquestion/answer', compact('contents', 'image', 'id', 'symbol_finished','answers'));
    }

    //  ----------------------TENTH METHOD
    public function check_answer($id, Request $request)  {
        $content_id = request('contentid');

        $content = DB::table('answers')->where('content_id', $content_id) -> get();

        if ($content -> isEmpty())    {
            $exist = 0;
            $data = [
                'content1' => null,
                'content2' => null,
                'correct' => null,
                'contentid' => $content_id,
                'new' => 1
            ];

        }   else    {

            if ($content[0] -> correct == 1)    {
                $correct = 1;
            }   else    {
                $correct = 2;
            }

            $exist = 1;
            $data = [
                'content1' => $content[0]-> answer,
                'content2' => $content[1]-> answer,
                'correct' => $correct,
                'contentid' => $content_id,
                'new' => 0
            ];
        }

//        dd($data['new']);

        $request->flash();
        return redirect('/question/update/answer/'.$id)-> with('exist', $exist) -> with($data);
    }

    public function store3($id, Request $request)    {
//        dd($request -> all());

        $new = $request -> get('new');
        $correct = $request -> get('correct');
        $answer1 = $request -> get('answer1');
        $answer2 = $request -> get('answer2');
        $content_id = $request -> get('contentid');

//        dd($new);

        if ($new == 1)  {
//Answer 1
            $n = new Answer;
            $n -> content_id = $content_id;
            $n -> answer = $answer1;
            if ($correct == 1)  {
                $n -> correct = 1;
            }   else    {
                $n -> correct = 0;
            }

            $n -> created_at = now();
            $n -> updated_at = now();

            $n -> save();

            //Answer 2
            $m = new Answer;
            $m -> content_id = $content_id;
            $m -> answer = $answer2;
            if ($correct == 2)  {
                $m -> correct = 1;
            }   else    {
                $m -> correct = 0;
            }
            $m -> created_at = now();
            $m -> updated_at = now();

            $m -> save();

        }   else    {
            $update = Answer::where('content_id', $content_id) -> get();
//            dd($update);

//            Answer 1
            $update[0] -> answer = $answer1;
            if ($correct == 1)  {
                $update[0] -> correct = 1;
            }   else    {
                $update[0] -> correct = 0;
            }

            $update[0] -> updated_at = now();
            $update[0] -> save();

//            Answer 2
            $update[1] -> answer = $answer2;
            if ($correct == 2)  {
                $update[1] -> correct = 1;
            }   else    {
                $update[1] -> correct = 0;
            }

            $update[1] -> updated_at = now();
            $update[1] -> save();
        }

        return redirect('/question/update/answer/'. $id);
    }

    public function publish($id)   {
        $n = Question::find($id);
        $n -> finished = 1;
        $n -> save();
//        dd($id);

        session(['qid' => [$id, -1]]);
        return redirect('/practice?num=0');
    }
}
