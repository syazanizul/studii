<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\ProfileTracker;
use App\PromoTracking;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DetailsController extends Controller
{
    public function index() {

        // === To see how many requirements haven't settled yet
        $i = 4;

        // -------------------------------------------------------------------------------------------------
        // === Check for Edit Profile
        $edit_profile = ProfileTracker::where('role', 2)->where('user_id', Auth::user()->id)->where('event', 1)->get();

        if($edit_profile->isNotEmpty())    {
            $data['profile'] = DB::table('teacher_details')->where('user_teacher_id', Auth::user()-> id)->first();

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

        $teaching_details = ProfileTracker::where('role', 2)->where('user_id', Auth::user()->id)->where('event', 2)->get();

        if ($teaching_details->isNotEmpty())  {

            // --- for functionality of next page
            $completed['teaching_details'] = 1 ;
            $i--;
        }   else    {

            $completed['teaching_details'] = 0 ;
        }

        // === Other things
        $data['exam_chosen'] = DB::table('teacher_teaching_details_exam')->where('user_teacher_id', Auth::user()->id)->get();
        $data['subject_chosen'] = DB::table('teacher_teaching_details_subject')->where('user_teacher_id', Auth::user()->id)->get();

        $data['exam'] = DB::table('exams_list')->get();
        $data['subject'] = DB::table('subjects_list')->get();

        $data['school_list'] = DB::table('schools_list')->get();

        // -------------------------------------------------------------------------------------------------
        // === Check for Add Image

        $add_image = ProfileTracker::where('role', 2)->where('user_id', Auth::user()->id)->where('event', 3)->get();

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

        $resume = ProfileTracker::where('role', 2)->where('user_id', Auth::user()->id)->where('event', 4)->get();

        if ($resume->isNotEmpty())  {

            // --- for functionality of next page
            $completed['resume'] = 1 ;
            $i--;
        }   else    {

            $completed['resume'] = 0 ;
        }

        // -------------------------------------------------------------------------------------------------
        // === for Promo Table --- this is temporary
        if($i == 0)    {
            PromoTracking::add_stage(Auth::user()->id, 1);
        }

        return view('dashboard.teacher.details', compact('i','completed', 'data'));
    }


    public function edit_profile()  {
        $d = request() -> all();

        $check = DB::table('teacher_details') -> where('user_teacher_id', Auth::user() -> id)->get();

        //Update First and Last name in USERS table first.
        $user = User::find(Auth::user()->id);
        $user->firstname = $d['firstname'];
        $user->lastname = $d['lastname'];
        $user->save();

        //Insert or Update in TEACHERS DETAILS table
        if (!$check-> isEmpty())   {
            DB::table('teacher_details') -> where('user_teacher_id', Auth::user() -> id)
                ->update(
                    ['title' => $d['title'], 'gender' => $d['gender'], 'ic' => $d['ic'], 'phone' => $d['phone'], 'preferred_mode_communication' => $d['preferred_communication'], 'updated_at' => now()]
                );
        }   else    {
            DB::table('teacher_details')
                ->insert(
                    ['user_teacher_id' => Auth::user()->id,'title' => $d['title'], 'gender' => $d['gender'], 'ic' => $d['ic'], 'phone' => $d['phone'], 'preferred_mode_communication' => $d['preferred_communication'], 'created_at' => now(), 'updated_at' => now()]
                );
        }

        //Now go to TEACHER PROFILE TRACKER table to update this save
        $m = new ProfileTracker();
        $m -> role = 2;
        $m -> user_id = Auth::user()->id;
        $m -> event = 1;
        $m -> save();

        return redirect()->back();
    }


    public function teaching_details_exam() {
        $x = request()->post('exam');

        if(DB::table('teacher_teaching_details_exam') -> where('exam_id', $x) -> where('user_teacher_id', Auth::user() -> id) -> get() -> isEmpty())    {
            DB::table('teacher_teaching_details_exam')->insert(
                ['user_teacher_id' => Auth::user()->id , 'exam_id' => $x, 'created_at' => now(), 'updated_at' => now()]
            );
        }

        return redirect()->back();
    }


    public function teaching_details_subject()  {
        $exam = request()->post('exam');
        $subject = request()->post('subject');

        if(DB::table('teacher_teaching_details_subject') -> where('subject_id', $subject) -> where('user_teacher_id', Auth::user() -> id) -> get() -> isEmpty())    {
            DB::table('teacher_teaching_details_subject')->insert(
                ['user_teacher_id' => Auth::user()->id , 'exam_id' => $exam, 'subject_id' => $subject, 'created_at' => now(), 'updated_at' => now()]
            );
        }

        return redirect()->back();
    }


    public function teaching_details()  {
        $x = request()->post();

        if ($x['schoolname2'] == null)   {

            if(DB::table('user_school_role')  -> where('user_id', Auth::user() -> id) -> get() -> isEmpty())    {
                DB::table('user_school_role')->insert(
                    ['user_id' => Auth::user()->id , 'school_id' => $x['schoolname1'], 'role' => 2, 'created_at' => now(), 'updated_at' => now()]
                );
            }

        }   else    {

            if(DB::table('schools_list') -> where('name', $x['schoolname2']) -> get() -> isEmpty())    {
                DB::table('schools_list')->insert(
                    ['user_id' => Auth::user()->id , 'name' => $x['schoolname2'], 'created_at' => now(), 'updated_at' => now()]
                );
            }

            $school_id = DB::table('schools_list') -> where('name', $x['schoolname2']) -> first() -> id;

            if(DB::table('user_school_role')  -> where('user_id', Auth::user() -> id) -> get() -> isEmpty())    {
                DB::table('user_school_role')->insert(
                    ['user_id' => Auth::user()->id , 'school_id' => $school_id, 'role' => 2, 'created_at' => now(), 'updated_at' => now()]
                );
            }
        }

        //Now go to TEACHER PROFILE TRACKER table to update this save
        $m = new ProfileTracker();
        $m -> role = 2;
        $m -> user_id = Auth::user()->id;
        $m -> event = 2;
        $m -> save();

        return redirect() -> back();
    }


    public function add_image(Request $request) {
        // Form validation
        $request->validate([
            'avatar'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = $request->file('avatar');

        if ($image == true) {
            $name = 'id-'.Auth::user()->id.'.jpg';
            if ($image-> move('images/user_images', $name)) {


                //Update to teacher details table
                $check = DB::table('teacher_details') -> where('user_teacher_id', Auth::user() -> id)->get();

                //Insert or Update in TEACHERS DETAILS table
                if (!$check-> isEmpty())   {
                    DB::table('teacher_details') -> where('user_teacher_id', Auth::user() -> id)
                        ->update(
                            ['profile_pic' => 1, 'updated_at' => now()]);
                }   else    {
                    DB::table('teacher_details')
                        ->insert(
                            ['user_teacher_id' => Auth::user()->id, 'profile_pic' => 1, 'updated_at' => now()]
                        );
                }

                //Now go to TEACHER PROFILE TRACKER table to update this save
                $m = new ProfileTracker();
                $m -> role = 2;
                $m -> user_id = Auth::user()->id;
                $m -> event = 3;
                $m -> save();

                return redirect() -> back();
            }
        }

        return false;
    }


    public function no_image()  {

        //Update to teacher details table
        $check = DB::table('teacher_details') -> where('user_teacher_id', Auth::user() -> id)->get();

        //Insert or Update in TEACHERS DETAILS table
        if (!$check-> isEmpty())   {
            DB::table('teacher_details') -> where('user_teacher_id', Auth::user() -> id)
                ->update(
                    ['profile_pic' => 2, 'updated_at' => now()]);
        }   else    {
            DB::table('teacher_details')
                ->insert(
                    ['user_teacher_id' => Auth::user()->id, 'profile_pic' => 2, 'updated_at' => now()]
                );
        }

        //Now go to TEACHER PROFILE TRACKER table to update this save
        $m = new ProfileTracker();
        $m -> role = 2;
        $m -> user_id = Auth::user()->id;
        $m -> event = 3;
        $m -> save();

        return redirect() -> back();
    }


    public function resume(Request $request)    {
        $request->validate([
            'resume' => 'required|mimes:pdf',
        ]);

        $fileName = Auth::user()->id.'.'.$request->file('resume')->extension();

        $store = $request->file('resume')->move('storage/resume_upload', $fileName);

        if($store)    {
            $m = new ProfileTracker();
            $m->role = 2;
            $m->user_id = Auth::user()->id;
            $m->event = 4;
            $m->save();

            return redirect()->back()->with('success', 'Your resume is successfully uploaded.');

        }   else    {
            return redirect()->back()->with('success', 'Failed');

        }
    }
}
