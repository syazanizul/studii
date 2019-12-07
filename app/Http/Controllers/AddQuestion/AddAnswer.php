<?php

namespace App\Http\Controllers\AddQuestion;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AddAnswer extends Controller
{
    //  ---------------------NINTH METHOD
    public function answer($id) {

        $data = AddController::show_update($id);

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
