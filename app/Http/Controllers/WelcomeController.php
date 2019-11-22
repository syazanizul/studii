<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function index()   {
        $property['subjects'] = DB::table('subjects_list')->get();
        $property['levels'] = DB::table('levels_list')->get();
        $property['chapters'] = DB::table('chapters_list')->get();
        $property['sources'] = DB::table('sources_list')->get();

        $noti['feedback_form'] = session('feedback');

        return view('Welcome', compact('property' , 'noti'));
    }
}
