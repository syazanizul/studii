<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ProfileTracker;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {

        $users = User::where('role', 2)->get();

        return view('dashboard.admin.user', compact('users'));
    }


    public function see($id)   {

        $user = User::find($id);

        $i = 4;

        // -------------------------------------------------------------------------------------------------
        // === Check for Edit Profile
        $edit_profile = ProfileTracker::where('role', 2)->where('user_id', $user->id)->where('event', 1)->get();

        if($edit_profile->isNotEmpty())    {
            $data['profile'] = DB::table('teacher_details')->where('user_teacher_id', $user->id)->first();

            // --- Cikgu, Sir, Miss, etc...
            $data['profile_title'] = ProfileTracker::title_int_to_string($data['profile']->title);

            // --- WhatsApp, email, sms, etc...
            $data['profile_mode_comm'] = ProfileTracker::profile_mode_communication($data['profile']->preferred_mode_communication);

            // --- for functionality of next page
            $completed['edit_profile'] = 1 ;
            $i--;

        }   else    {
            $completed['edit_profile'] = 0 ;

        }

        // -------------------------------------------------------------------------------------------------
        // === Check for Teaching Details

        $teaching_details = ProfileTracker::where('role', 2)->where('user_id', $user->id)->where('event', 2)->get();

        if ($teaching_details->isNotEmpty())  {

            // --- for functionality of next page
            $completed['teaching_details'] = 1 ;
            $i--;
        }   else    {

            $completed['teaching_details'] = 0 ;
        }

        // === Other things
        $data['exam_chosen'] = DB::table('teacher_teaching_details_exam')->where('user_teacher_id', $user->id)->get();
        $data['subject_chosen'] = DB::table('teacher_teaching_details_subject')->where('user_teacher_id', $user->id)->get();

        $data['exam'] = DB::table('exams_list')->get();
        $data['subject'] = DB::table('subjects_list')->get();

        $data['school_list'] = DB::table('schools_list')->get();

        // -------------------------------------------------------------------------------------------------
        // === Check for Add Image

        $add_image = ProfileTracker::where('role', 2)->where('user_id', $user->id)->where('event', 3)->get();

        if ($add_image->isNotEmpty())  {

            // --- for functionality of next page
            $completed['add_image'] = 1 ;
            $i--;
        }   else    {

            $completed['add_image'] = 0 ;
            $data['profile_pic'] = 0;
        }

        // -------------------------------------------------------------------------------------------------
        // === Check for Add Resume

        $resume = ProfileTracker::where('role', 2)->where('user_id', $user->id)->where('event', 4)->get();

        if ($resume->isNotEmpty())  {

            // --- for functionality of next page
            $completed['resume'] = 1 ;
            $i--;
        }   else    {

            $completed['resume'] = 0 ;
        }

        return redirect()->back()->with('i', $i)->with('completed', $completed)->with('data', $data)->with('user', $user);
    }
}
