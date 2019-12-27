<?php

namespace App\Http\Controllers\AddQuestion;

use App\Content;
use App\Question;
use App\Http\Controllers\AddQuestion\AddController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AddContent extends Controller
{
//    public function __construct()
//    {
//        $question_id = $id;
//        $this->middleware('owner:'.$question_id);
//    }

    public function update($id)
    {
        $data = AddController::show_update($id);

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
}
