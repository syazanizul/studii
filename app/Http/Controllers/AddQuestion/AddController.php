<?php

namespace App\Http\Controllers\AddQuestion;

use App\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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

//        First -> Get TOTAL how many questions submitted by this teacher
        $x1 = DB::table('questions')->where('submitted_by1', Auth::id())->count();

        //Second -> Get ARRAYS of the unfinished questions submitted by this teacher
        $x2 = DB::table('questions')->where('submitted_by1', Auth::id())-> where('finished',0)->get();

        //Third -> Get ARRAYS of the finished questions
        $x3 = DB::table('questions')->where('submitted_by1', Auth::id())-> where('finished',1)->get();


        //---------------------------------------------------------------------------------
        //GATHER all data

        $data['total_question'] = $x1;
        $data['list_draft_question'] = $x2;
        $data['list_finished_question'] = $x3;

        return view('addquestion/contributeQuestion', compact('data'));
    }

    //   ----------------- GENERAL METHOD USED BY ADD_CONTENT AND ADD_ANSWER
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

    public function go_to_practicelink($id)    {
        session(['qid' => [$id, -1]]);
        return redirect('/practice?num=0');
    }

}
