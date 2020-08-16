<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PromoTracking;
use App\User;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index() {
        $teacher = User::where('role', 2)->get();
        return view('dashboard.admin.promo', compact('teacher'));
    }

    public function stage(Request $request)   {
        $teacher_id = $request->get('teacher_id');
        $stage = $request->get('stage');

        PromoTracking::add_stage($teacher_id, $stage);

        return redirect()->back();
    }
}
