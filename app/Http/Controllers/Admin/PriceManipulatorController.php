<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class PriceManipulatorController extends Controller
{
    public function index(Request $request) {
        $changes = $request->get('changes');

        if($changes != null)    {
            $success = 1;

            $question = Question::all();

            foreach($question as $m)   {
                if($m->price != null)    {
                    $m->price += $changes;
                    $m->save();
                }
            }

        }   else    {
            $success = 0;

        }

        return view('dashboard.admin.price_manipulator', compact('success'));
    }
}
