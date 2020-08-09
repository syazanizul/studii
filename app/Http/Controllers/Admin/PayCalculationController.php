<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PayCalculationController extends Controller
{
    public function index() {
        $teacher = User::where('role', 2)-> get();

        return view('dashboard.admin.pay_calculation', compact('teacher'));
    }
}
