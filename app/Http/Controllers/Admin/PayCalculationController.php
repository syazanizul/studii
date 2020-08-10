<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Teacher;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PayCalculationController extends Controller
{
    public function index(Request $request) {

        if ($request->get('day') == null)   {
            return view('dashboard.admin.pay_calculation');
        }

        $data['attempt'] = 0;
        $data['to_pay'] = 0;

        $teacher = User::where('role', 2)-> get();

        foreach($teacher as $m)   {
            $data['attempt'] += Teacher::attempt_for_date(1, $m->id, $request->get('day'));
            $data['to_pay'] += Teacher::earning_for_date(1, $m->id, $request->get('day'), 1);
        }

//        foreach($teacher as $m)   {
//            $data['attempt_today'] += Teacher::attempt_for_date(1, $m->id, Carbon::today());
//            $data['to_pay_today'] += Teacher::earning_for_date(1, $m->id, Carbon::today(), 1);
//            $data['attempt_yesterday'] += Teacher::attempt_for_date(1, $m->id, Carbon::yesterday());
//            $data['to_pay_yesterday'] += Teacher::earning_for_date(1, $m->id, Carbon::yesterday(), 1);
//        }

        return view('dashboard.admin.pay_calculation', compact('data'));
    }
}
