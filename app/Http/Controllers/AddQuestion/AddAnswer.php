<?php

namespace App\Http\Controllers\AddQuestion;

use App\Answer;
use App\AnswerElement;
use App\AnswerParent;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AddAnswer extends Controller
{
    //  ---------------------NINTH METHOD
    public function answer($id) {

        $question = Question::query()->findOrFail($id);

        return view('/addquestion/answer', compact('question'));
    }

    public function index($id, Request $request) {

        $question = Question::query()->findOrFail($id);

        return view('/addquestion/answer2', compact('question', 'data'));
    }

//    //  ----------------------TENTH METHOD
    public function check_answer($id, Request $request)  {
        $content_id = request('contentid');

//        $content = DB::table('answers')->where('content_id', $content_id) -> get();
        $content = AnswerElement::where('content_id', $content_id)->get();
//        dd($content);

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

    public function set_up_update($id,Request $request) {

        $answer_parent = AnswerParent::query()->findOrFail($request->answer_parent_id);

        return back()->with(compact('answer_parent'));
    }

    public function store_insert(Request $request) {
//        dd($request->all());

        $order = AnswerParent::where('content_id', $request->contentid)->count();

        $n = new AnswerParent;
        $n->content_id =  $request->contentid;
        $n->order =  $order+1;
        $n->type =  1;
        $n->created_at =  now();
        $n->updated_at =  now();
        $n->save();

        $i=1;
//        dd($request->answer);
        foreach($request->answer as $m)   {
            $k = new AnswerElement;
            $k->answer_parent_id = $n->id;
            $k->answer = $m;
            if ($request->correct == $i)    {
                $k->correct = 1;
            }   else    {
                $k->correct = 0;
            }
            $k->created_at =  now();
            $k->updated_at =  now();
            $k->save();

            $i++;
        }

        return redirect()->back();
    }

    public function store_update(Request $request) {
//        dd($request->all());

        $n = AnswerParent::query()->find($request->get('answer_parent_id'));

        $answer_elements = AnswerElement::query()->where('answer_parent_id', $n->id)->get();


        $i=0;

        foreach($answer_elements as $m)   {

            $m->answer = $request->get('answer')[$i];
            if ($request->correct == $i+1)    {
                $m->correct = 1;
            }   else    {
                $m->correct = 0;
            }
            $m->updated_at =  now();
            $m->save();

            $i++;
        }

        return redirect()->back();
    }

    public function store3($id, Request $request)    {
//        dd($request -> all());

        $new = $request -> get('new');
        $correct = $request -> get('correct');
        $answer1 = $request -> get('answer1');
        $answer2 = $request -> get('answer2');
        $answer3 = $request -> get('answer3');
        $answer4 = $request -> get('answer4');
        $content_id = $request -> get('contentid');

//        dd($new);

        if ($new == 1)  {
            //Answer 1
            $this->store_answer_insert($content_id, 1 ,$answer1
                , $correct);

            //Answer 2
            $this->store_answer_insert($content_id, 2 ,$answer2, $correct);

            //Answer 3
            if ($answer3 != '')   {
                $this->store_answer_insert($content_id, 3 ,$answer3, $correct);
            }

            //Answer 3
            if ($answer4 != '')   {
                $this->store_answer_insert($content_id, 4 ,$answer4, $correct);
            }


        }   else    {
            $update = Answer::where('content_id', $content_id) -> get();
//            dd($answer1);

//            Answer 1
            $this ->store_answer_update($content_id ,1 ,$answer1, $correct);


//            Answer 2
            $this ->store_answer_update($content_id ,2 ,$answer2, $correct);


//            Answer 3
            if ($answer3 != "" && isset($update[2]))   {

                $this ->store_answer_update($content_id ,3 ,$answer3, $correct);

            }   else if ($answer3 != "")   {

                $this->store_answer_insert($content_id, 3 ,$answer3, $correct);
            }

//            Answer 3
            if ($answer4 != "" && isset($update[3]))   {

                $this ->store_answer_update($content_id ,4 ,$answer4, $correct);

            }   else if ($answer4 != "")   {

                $this->store_answer_insert($content_id, 4 ,$answer4, $correct);
            }
        }
        return redirect('/question/update/answer/'. $id);
    }

    public function store_answer_insert($content_id, $num, $answer, $correct)   {
        $m = new Answer;
        $m -> content_id = $content_id;
        $m -> answer = $answer;
        if ((int)$correct == $num)  {
            $m -> correct = 1;
        }   else    {
            $m -> correct = 0;
        }
        $m -> created_at = now();
        $m -> updated_at = now();

        $m -> save();
    }

    public function store_answer_update($content_id ,int $num ,$answer, $correct)   {
        $update = Answer::where('content_id', $content_id) -> get();

        $update[$num-1] -> answer = $answer;
//        dd($update[$num]);
        if ((int)$correct == $num)  {
            $update[$num-1] -> correct = 1;
//            dd('yes');
        }   else    {
            $update[$num-1] -> correct = 0;
        }

        $update[$num-1] -> updated_at = now();
        $update[$num-1] -> save();
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
