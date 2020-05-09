<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function index()   {
        SEOMeta::setTitle('Studii - Study SPM Subjects For Free');
        SEOMeta::setDescription('Study and practice exercise questions for free | Add Math, Physics - SPM | A Malaysian-made study platform');
        SEOMeta::setCanonical('https://www.studii.my');
        SEOMeta::addKeyword(['studii', 'study', 'spm' , 'practice', 'question' , 'exercise question', 'add math', 'additional mathematics',
            'math', 'mathematics', 'free', 'bank soalan spm']);

        $property['subjects'] = DB::table('subjects_list')->get();
        $property['levels'] = DB::table('levels_list')->get();
        $property['chapters'] = DB::table('chapters_list')->get();
        $property['sources'] = DB::table('sources_list')->get();

        $noti['feedback_form'] = session('feedback');

        return view('welcome', compact('property' , 'noti'));
    }
}
