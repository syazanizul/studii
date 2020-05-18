<?php

namespace App\Http\Controllers\AddQuestion;

use App\AnswerParent;
use App\Http\Controllers\Controller;
use App\Question;
use App\WorkingImage;
use App\WorkingParent;
use App\WorkingText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AddWorking extends Controller
{
    public function index(int $id, Request $request)
    {
        $question = Question::query()->findOrFail($id);

        $answer_parent = AnswerParent::query()->findOrFail($request -> answer_parent_id);

        foreach ($question->contents as $n) {
            if($n->answer_parent != null)    {
                foreach($n->answer_parent as $o)   {
                    if($o->id == $answer_parent->id)    {
                        $symbol = $n->symbol();
                    }

                }
            }

        }

        return view('addquestion.working', compact('question', 'answer_parent', 'symbol'));
    }

    public function insert_text(Request $request)
    {

        $count = AnswerParent::query()->findOrFail($request->post('answer_parent_id'))->working_parent->count();

        if ($count == 0)    {
            $count = 1;
        }   else    {
            $count++;
        }

        $m = new WorkingParent;
        $m->answer_parent_id = $request->post('answer_parent_id');
        $m->type = 1;
        $m->order = $count++;
        $m->submitter_id = Auth::user()->id;
        $m->save();

        $k = new WorkingText;
        $k-> working_parent_id = $m->id;
        $k-> content = $request->post('content');
        $k->save();

        return redirect()->back();
    }

    public function insert_image(Request $request)
    {
        $file = $request->file('question_image');

        if ($file == true) {

            $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'-'.rand(1,1000) . '.jpg';
            if ($file-> move('images/working_images', $name)) {
                $count = AnswerParent::query()->findOrFail($request->post('answer_parent_id'))->working_parent->count();

                if ($count == 0)    {
                    $count = 1;
                }   else    {
                    $count++;
                }

                $m = new WorkingParent;
                $m->answer_parent_id = $request->post('answer_parent_id');
                $m->type = 2;
                $m->order = $count++;
                $m->submitter_id = Auth::user()->id;
                $m->save();

                $k = new WorkingImage;
                $k->working_parent_id = $m->id;
                $k->image_name = $name;
                $k->save();


                return redirect()->back();
            }
        }

        return 1;
    }

    public function delete(Request $request)    {

        WorkingParent::find($request-> working_parent_id)->delete();

        if ($request->type == 1)   {

            WorkingText::find($request->working_text_id)->delete();

        }   else if ($request->type == 2)   {

            WorkingImage::find($request->working_image_id)->delete();

            Storage::disk('public')->delete('images/working_images/'.$request->working_image_name);

        }

        return redirect()->back();
    }
}
