<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddquestionController extends Controller
{
    // -------------------------------------------------------------
    // -------- For Upload With Help

    public function index_with_help()   {
        return view('dashboard.teacher.add-question.addWithHelp');
    }

    public function upload_question_set(Request $request)   {

        $file = $request->file('question_set');

        echo $request->file('question_set')->move('storage/question_set', $file->getClientOriginalName());
    }

    // ------- End Upload With Help
}
