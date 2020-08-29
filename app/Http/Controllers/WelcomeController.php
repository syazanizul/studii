<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function index(Request $request)   {
        SEOMeta::setTitle('Study SPM Subjects For Free');
        SEOMeta::setDescription('Study and practice exercise questions for free | Add Math, Physics - SPM | A Malaysian-made study platform');
        SEOMeta::setCanonical('https://www.studii.my');
        SEOMeta::addKeyword(['studii', 'study', 'spm' , 'practice', 'question' , 'exercise question', 'add math', 'additional mathematics',
            'math', 'mathematics', 'free', 'bank soalan spm']);

        $property['subjects'] = DB::table('subjects_list')->get();
        $property['levels'] = DB::table('levels_list')->get();
        $property['chapters'] = DB::table('chapters_list')->get();
        $property['sources'] = DB::table('sources_list')->get();

        $noti['feedback_form'] = session('feedback');

        // === For first impression modal
     
        if ($request->hasCookie('first_impression_modal')) {

            // hide modal
            $first_impression_modal = 0;
        }   else    {

            // show modal
            $first_impression_modal = 1;
        }

        return view('welcome', compact('property' , 'noti', 'first_impression_modal'));
    }
}
