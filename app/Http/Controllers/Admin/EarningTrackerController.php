<?php

namespace App\Http\Controllers\Admin;

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
}
