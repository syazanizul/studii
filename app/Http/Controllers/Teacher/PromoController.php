<?php

namespace App\Http\Controllers\Teacher;

use App\BankDetails;
use App\Http\Controllers\Controller;
use App\ProfileTracker;
use App\PromoTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromoController extends Controller
{
    public function index() {
        $stage = PromoTracking::where('user_id', Auth::user()->id)->count();

        return view('dashboard.teacher.promo', compact('stage'));
    }

    public function bank(Request $request)  {
        $m = BankDetails::where('user_id', Auth::user()->id)->first();

        if($m == null)    {
            $m = new BankDetails();
            $m -> user_id = Auth::user()->id;
            $m -> bank_name = $request->post('bank_name');
            $m -> account_number = $request->post('account_number');
            $m -> save();

            PromoTracking::add_stage(Auth::user()->id, 4);
        }

        return redirect()->back()->with('success', 'Your bank details is saved.');
    }
}
