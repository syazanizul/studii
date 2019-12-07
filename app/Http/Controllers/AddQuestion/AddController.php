<?php

namespace App\Http\Controllers\AddQuestion;

use App\Answer;
use App\Question;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use \App\Subject;
use \App\Chapter;
use \App\Content;
use \App\Http\Controllers\Controller;


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

    //   ----------------- FIFTH METHOD
    public static function show_update($id)    {
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


}
