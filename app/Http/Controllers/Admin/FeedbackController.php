<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index() {
        $feedback = DB::table('feedback_form_quick_improvement')->get();

        return view('dashboard.admin.feedback', compact('feedback'));
    }
}
