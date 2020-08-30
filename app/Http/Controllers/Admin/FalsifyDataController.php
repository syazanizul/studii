<?php

namespace App\Http\Controllers\Admin;

use App\Attempt;
use App\FalsifyData;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Question;
use App\SpecifiedUserFalsifyData;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FalsifyDataController extends Controller
{
    public function index(Request $request)
    {
        $done_falsify = FalsifyData::whereDay('created_at', Carbon::today())->get();

        $specified_user_falsify_data = SpecifiedUserFalsifyData::get();

        $min = $request->get('min_value');
        $max = $request->get('max_value');

        if ($min != null || $max != null) {

            //Falsify the data
            $user = User::where('role', 2)->get();

            foreach($user as $n)   {
                if(Teacher::is_active($n->id))    {
                    $antitrust = SpecifiedUserFalsifyData::where('user_id', $n->id)->first();

                    if($antitrust == null)    {

                        $question = Question::where('creator', $n->id)->where('verified', 1)->get();

                        foreach($question as $h)   {
                            $number_of_times = rand($min, $max);

                            for($i=0; $i<$number_of_times; $i++)   {
                                $correct = rand(0,1);

                                $k = new Attempt();
                                $k->question_id = $h->id;
                                $k->creator = $h->creator;
                                $k->uploader = $h->uploader;
                                if($h->working != null)    {
                                    $k->working = $h->working;
                                }
                                $k->correct = $correct;
                                $k->falsified = 1;
                                $k->save();
                            }

                        }

                    }   else    {

                        $antitrust_level = $antitrust->antitrust_level;

                        $random_number = rand(0, 10);

                        $question = Question::where('creator', $n->id)->where('verified', 1)->get();

                        foreach($question as $h)   {

                            if($random_number > (int)$antitrust)    {
                                $number_of_times = rand($min, $max);

                                for($i=0; $i<$number_of_times; $i++)   {
                                    $correct = rand(0,1);

                                    $k = new Attempt();
                                    $k->question_id = $h->id;
                                    $k->creator = $h->creator;
                                    $k->uploader = $h->uploader;
                                    if($h->working != null)    {
                                        $k->working = $h->working;
                                    }
                                    $k->correct = $correct;
                                    $k->falsified = 1;
                                    $k->save();
                                }
                            }

                        }

                    }
                }



            }

            //Record in table
            $m = new FalsifyData();
            $m->minimum = $min;
            $m->maximum = $max;
            $m->save();

            return redirect()->back();
        }


//        if ($min != null || $max != null) {
//
//            //Falsify the data
//            $question = Question::where('verified', 1)->get();
//
//            foreach($question as $n)   {
//                $number_of_times = rand($min, $max);
//
//                for($i=0; $i<$number_of_times; $i++)   {
//                    $correct = rand(0,1);
//
//                    $k = new Attempt();
//                    $k->question_id = $n->id;
//                    $k->creator = $n->creator;
//                    $k->uploader = $n->uploader;
//                    if($n->working != null)    {
//                        $k->working = $n->working;
//                    }
//                    $k->correct = $correct;
//                    $k->falsified = 1;
//                    $k->save();
//                }
//            }
//
//            //Record in table
//            $m = new FalsifyData();
//            $m->minimum = $min;
//            $m->maximum = $max;
//            $m->save();
//
//            return redirect()->back();
//        }

        return view('dashboard.admin.falsify_data', compact('done_falsify', 'specified_user_falsify_data'));
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

    public function add_antitrust(Request $request) {
        $user_id = $request->get('user_id');
        $level = $request->get('level');

        $m = new SpecifiedUserFalsifyData();
        $m->user_id = $user_id;
        $m->antitrust_level = $level;
        $m->save();

        return redirect()->back();
    }
}
