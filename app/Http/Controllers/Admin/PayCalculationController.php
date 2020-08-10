<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Teacher;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PayCalculationController extends Controller
{
    public function index() {

        for($i=1; $i<31; $i++)   {
            $data['attempt'][$i] = 0;
            $data['to_pay'][$i] = 0;

            $teacher = User::where('role', 2)-> get();

            foreach($teacher as $m)   {
                $data['attempt'][$i] += Teacher::attempt_for_date(1, $m->id, $i);
                $data['to_pay'][$i] += Teacher::earning_for_date(1, $m->id, $i, 1);
            }

            if(Carbon::now() -> day == $i)    {
                $data['attempt_today'] = $data['attempt'][$i];
                $data['to_pay_today'] = $data['to_pay'][$i];
            }

        }

//        foreach($teacher as $m)   {
//            $data['attempt_today'] += Teacher::attempt_for_date(1, $m->id, Carbon::today());
//            $data['to_pay_today'] += Teacher::earning_for_date(1, $m->id, Carbon::today(), 1);
//            $data['attempt_yesterday'] += Teacher::attempt_for_date(1, $m->id, Carbon::yesterday());
//            $data['to_pay_yesterday'] += Teacher::earning_for_date(1, $m->id, Carbon::yesterday(), 1);
//        }

        return view('dashboard.admin.pay_calculation', compact('teacher', 'data'));
    }
}
