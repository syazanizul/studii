<?php

namespace App\Http\Controllers\Admin;

use App\ContributionEarningTracker;
use App\Http\Controllers\Controller;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordNewEarningController extends Controller
{
    public function index() {

        $id = Auth::user()->id;
//
        dd(Teacher::total_earning_fresh(1, $id));

//        $m = new ContributionEarningTracker;
//
//        $m->user_id = $id;
//        $m->start_date = '2020-04-09';
//        $m->end_date = '2020-04-11';
//        $m->amount = 100.01;
//
//        $m->save();


        dd('hai');

//        return view('dashboard.admin.feedback');
    }
}
