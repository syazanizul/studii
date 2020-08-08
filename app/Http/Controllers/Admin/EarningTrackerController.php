<?php

namespace App\Http\Controllers\Admin;

use App\ContributionEarningTracker;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EarningTrackerController extends Controller
{
    public function index(Request $request) {
        $user_id = $request -> get('user_id');

        if($user_id == null)    {
            $index = 0;
            return view('dashboard.admin.earning_tracker', compact('index'));

        }   else if ($user_id == 0)    {
            $index = 1;
            $user = User::where('role', 2)->get();

        }   else    {
            $index = 2;
            $user = User::findOrFail($user_id);

        }

        return view('dashboard.admin.earning_tracker', compact('index','user'));

    }

    public function save_new_contribution_earning_tracker(Request $request) {
        $user_id = $request -> get('user_id');
        $amount = $request -> get('amount');
        $until_date = $request -> get('until_date');

        $existing = ContributionEarningTracker::where('user_id', $user_id) ->latest('end_date')->first();

        if ($existing != null)    {
            $start_date = $existing -> end_date;
        }   else    {
            $start_date = '2020-03-05';
        }

        $m = new ContributionEarningTracker();
        $m -> user_id = $user_id;
        $m -> start_date = $start_date;
        $m -> end_date = $until_date;
        $m -> amount = $amount;
        $m -> paid = 0;
        $m -> save();

        return redirect()->back()->with('success',1);
    }
}
