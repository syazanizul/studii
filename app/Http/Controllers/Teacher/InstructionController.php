<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    public function index() {
        return view('dashboard.teacher.instruction.index');
    }

    public function process_upload_questions()  {
        return view('dashboard.teacher.instruction.uploadQuestion');
    }

    public function disclaimer()  {
        return view('dashboard.teacher.instruction.disclaimer');
    }
}
