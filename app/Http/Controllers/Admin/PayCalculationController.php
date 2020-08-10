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
        $data['attempt_today'] = 0;
        $data['to_pay_today'] = 0;
        $data['attempt_yesterday'] = 0;
        $data['to_pay_yesterday'] = 0;

        $teacher = User::where('role', 2)-> get();

        foreach($teacher as $m)   {
            $data['attempt_today'] += Teacher::attempt_for_date(1, $m->id, Carbon::today(), Carbon::tomorrow());
            $data['to_pay_today'] += Teacher::earning_for_date(1, $m->id, Carbon::today(), Carbon::tomorrow(), 1);
            $data['attempt_yesterday'] += Teacher::attempt_for_date(1, $m->id, Carbon::yesterday(), Carbon::today());
            $data['to_pay_yesterday'] += Teacher::earning_for_date(1, $m->id, Carbon::yesterday(), Carbon::today(), 1);
        }

        return view('dashboard.admin.pay_calculation', compact('teacher', 'data'));
    }
}
