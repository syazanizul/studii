<?php

namespace App\Http\Controllers\Admin;

use App\Attempt;
use App\FalsifyData;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FalsifyDataController extends Controller
{
    public function index(Request $request)
    {
        $done_falsify = FalsifyData::whereDay('created_at', Carbon::today())->get();

        $min = $request->get('min_value');
        $max = $request->get('max_value');

        if ($min != null || $max != null) {

            //Falsify the data
            $question = Question::where('verified', 1)->get();

            foreach($question as $n)   {
                $number_of_times = rand($min, $max);

                for($i=0; $i<$number_of_times; $i++)   {
                    $correct = rand(0,1);

                    $k = new Attempt();
                    $k->question_id = $n->id;
                    $k->creator = $n->creator;
                    $k->uploader = $n->uploader;
                    if($n->working != null)    {
                        $k->working = $n->working;
                    }
                    $k->correct = $correct;
                    $k->save();
                }
            }

            //Record in table
            $m = new FalsifyData();
            $m->minimum = $min;
            $m->maximum = $max;
            $m->save();

            return redirect()->back();
        }

        return view('dashboard.admin.falsify_data', compact('done_falsify'));
    }

    public function delete()    {
        $record = FalsifyData::whereDay('created_at', Carbon::today())->first();

        if($record != null)    {
            $record -> delete();
        }

        $falsified_data = Attempt::whereDay('created_at', Carbon::today())->get();

        foreach($falsified_data as $n)   {
            $n->delete();
        }

        return redirect()->back()->with('success', 1);
    }
}
