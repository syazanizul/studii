<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;


class SetPriceQuestionController extends Controller
{
    public function index()
    {
        $a = request() -> get('a');

        if ($a == null)   {
            $question_list = Question::where('finished', 1)->where('price', null)->get();

            return view('dashboard.admin.set_price',compact('question_list'));

        }   else    {
            $question = Question::find($a);

            return view('dashboard.admin.set_price',compact('question'));

        }

    }

    public function save()  {
        $price = request()->post('price');
        $id = request()->post('qid');

        $question = Question::find($id);
        $question-> price = $price;
        $question -> save();

        return redirect('/admin/set-price');
    }
}
