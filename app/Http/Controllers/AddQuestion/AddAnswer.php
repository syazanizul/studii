<?php

namespace App\Http\Controllers\AddQuestion;

use App\Answer;
use App\AnswerElement;
use App\AnswerParent;
use App\Question;
use App\QuestionSetElement;
use App\WorkingImage;
use App\WorkingText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AddAnswer extends Controller
{
    // === Index
    public function index($id, Request $request) {

        $question = Question::query()->findOrFail($id);

        return view('/addquestion/answer2', compact('question'));
    }

    // ===  For Edit Answer Element
    public function set_up_update($id,Request $request) {

        $answer_parent = AnswerParent::query()->findOrFail($request->answer_parent_id);

        return back()->with(compact('answer_parent'));
    }

    // ===  For storing new answer element
    public function store_insert(Request $request) {

        $order = AnswerParent::where('content_id', $request->contentid)->count();

        $n = new AnswerParent;
        $n->content_id =  $request->contentid;
        $n->order =  $order+1;
        $n->type =  1;
        $n->created_at =  now();
        $n->updated_at =  now();
        $n->save();

        $i=1;

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

    // ===  To update answer element
    public function store_update(Request $request) {

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

    // === Delete answer parents, including its working and answer element
    public function delete(Request $request)    {
        $answer_parent = AnswerParent::query()->find($request->get('answer_parent_id'));

        // 1. Delete all working_parent and its working_children
        foreach($answer_parent->working_parent as $m)  {
            if($m->type == 1)    {
                $working_text = WorkingText::where('working_parent_id', $m->id)->first();
                $working_text->delete();

            }   else if ($m->type == 2)  {
                $working_image = WorkingImage::where('working_parent_id', $m->id)->first();
                $s = Storage::disk('public')->delete('images/working_images/'. $working_image->image_name);
                $working_image->delete();
            }

            $m->delete();
        }

        // 2. Delete all answer element
        foreach($answer_parent->answer_element as $b)   {
            $b->delete();
        }

        // 3. Delete answer parent
        $answer_parent->delete();

        return redirect()->back();
    }

    public function publish($id)   {
        $m = QuestionSetElement::where('question_id', $id)->first();
        if ($m != null) {
            $m->upload_status = 1;
            $m -> save();
        }

        $n = Question::find($id);
        $n -> finished = 1;
        $n -> save();

        session(['qid' => [$id, -1]]);
        return redirect('/practice?num=0')->with('adding_question',1);
    }
}
