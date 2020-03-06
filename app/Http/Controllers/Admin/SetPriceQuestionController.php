<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SetPriceQuestionController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.set_price');
    }
}
