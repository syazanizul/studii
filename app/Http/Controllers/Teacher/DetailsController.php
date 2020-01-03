<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Traits\uploadTrait;

class DetailsController extends Controller
{
    use UploadTrait;

    public function index() {

        //To see how many requirements havent settled yet
        $i = 3;

//        ------------------------------------------------------------------------------
        //Check for edit profile
        $edit_profile = DB::table('teacher_profile_tracker')->where('user_teacher_id', Auth::user()->id)
            ->where('edit_profile',1)
            ->get();

        if ($edit_profile->isNotEmpty())  {
            $data['profile'] = DB::table('teacher_details')->where('user_teacher_id', Auth::user()-> id)->first();

            switch($data['profile']->title)    {
                case 1:
                    $data['profile_title'] = 'Cikgu';
                    break;
                case 2:
                    $data['profile_title'] = 'Tuan';
                    break;
                case 3:
                    $data['profile_title'] = 'Puan';
                    break;
                case 4:
                    $data['profile_title'] = 'Mr';
                    break;
                case 5:
                    $data['profile_title'] = 'Miss';
                    break;
                case 6:
                    $data['profile_title'] = 'Bro';
                    break;
                case 7:
                    $data['profile_title'] = 'Sis';
                    break;
            }

            switch($data['profile']->preferred_mode_communication)    {
                case 1:
                    $data['profile_mode_comm'] = 'Whatsapp';
                    break;
                case 2:
                    $data['profile_mode_comm'] = 'Call & SMS';
                    break;
                case 3:
                    $data['profile_mode_comm'] = 'Email';
                    break;
            }

            $completed['edit_profile'] = 1 ;
            $i--;
        }   else    {

            $completed['edit_profile'] = 0 ;
        }

        ///---------------------------------------------------------------------
        //        --------------------------------------- for teaching details

        $teaching_details = DB::table('teacher_profile_tracker')->where('user_teacher_id', Auth::user()->id)
            ->where('teaching_details',1)
            ->get();

        if ($teaching_details->isNotEmpty())  {
            //Settle the counter
            $completed['teaching_details'] = 1 ;
            $i--;
        }   else    {
            $completed['teaching_details'] = 0 ;

        }

        //Other things
        $data['exam_chosen'] = DB::table('teacher_teaching_details_exam')->where('user_teacher_id', Auth::user()->id)->get();
        $data['subject_chosen'] = DB::table('teacher_teaching_details_subject')->where('user_teacher_id', Auth::user()->id)->get();

        $data['exam'] = DB::table('exams_list')->get();
        $data['subject'] = DB::table('subjects_list')->get();

        $data['school_list'] = DB::table('schools_list')->get();

        //---------------------------------------------------------------------
        //        --------------------------------------- for add image
        $add_image = DB::table('teacher_profile_tracker')->where('user_teacher_id', Auth::user()->id)
            ->where('add_image',1)
            ->get();

        if ($add_image->isNotEmpty())  {
            $completed['add_image'] = 1 ;
            $i--;
        }   else    {
            $completed['add_image'] = 0 ;
            $data['profile_pic'] = 0;
        }

//        dd(\App\Exam::exam_name(1));

        return view('dashboard.teacher.details', compact('i','completed', 'data'));
    }


    public function edit_profile()  {
        $d = request() -> all();

//        dd($d);
        $check = DB::table('teacher_details') -> where('user_teacher_id', Auth::user() -> id)->get();

        //Update First and Last name first in USERS table
        DB::table('users') -> where('id', Auth::user()->id) ->update(['firstname' => $d['firstname'], 'lastname' => $d['lastname']]);

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
        $check_tracker = DB::table('teacher_profile_tracker') -> where('user_teacher_id', Auth::user() -> id)->get();

        if (!$check_tracker-> isEmpty())   {
            DB::table('teacher_profile_tracker') -> where('user_teacher_id', Auth::user() -> id)
                -> update(
                    ['edit_profile' => true, 'updated_at' => now()]
                );
        }   else    {
            DB::table('teacher_profile_tracker')
                -> insert(
                    ['user_teacher_id' => Auth::user()->id, 'edit_profile'=> true, 'created_at' => now(), 'updated_at' => now()]
                );
        }

        return redirect()->back();
    }


//    ---------------------------------------------------------------------------------------------------------------------------
//    TEACHING DETAILS
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
        $check_tracker = DB::table('teacher_profile_tracker') -> where('user_teacher_id', Auth::user() -> id)->get();

        if (!$check_tracker-> isEmpty())   {
            DB::table('teacher_profile_tracker') -> where('user_teacher_id', Auth::user() -> id)
                -> update(
                    ['teaching_details' => true, 'updated_at' => now()]
                );
        }   else    {
            DB::table('teacher_profile_tracker')
                -> insert(
                    ['user_teacher_id' => Auth::user()->id, 'teaching_details'=> true, 'created_at' => now(), 'updated_at' => now()]
                );
        }


        return redirect() -> back();
    }


    public function add_image(Request $request) {
        // Form validation
        $request->validate([
            'avatar'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

//        // Get image file
//        $image = $request->file('avatar');
//        // Make a image name based on user name and current timestamp
//        $name = Str::slug($request->input('name')).'_'.time();
//        // Define folder path
//        $folder = '/images/user_images';
//        // Make a file path where image will be stored [ folder path + file name + file extension]
//        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
//        // Upload image
//        $this->uploadOne($image, $folder, 'public', $name);



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
                $check_tracker = DB::table('teacher_profile_tracker') -> where('user_teacher_id', Auth::user() -> id)->get();

                if (!$check_tracker-> isEmpty())   {
                    DB::table('teacher_profile_tracker') -> where('user_teacher_id', Auth::user() -> id)
                        -> update(
                            ['add_image' => true, 'updated_at' => now()]
                        );
                }   else    {
                    DB::table('teacher_profile_tracker')
                        -> insert(
                            ['user_teacher_id' => Auth::user()->id, 'add_image'=> true, 'created_at' => now(), 'updated_at' => now()]
                        );
                }

                return redirect() -> back();
            }
        }
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
        $check_tracker = DB::table('teacher_profile_tracker') -> where('user_teacher_id', Auth::user() -> id)->get();

        if (!$check_tracker-> isEmpty())   {
            DB::table('teacher_profile_tracker') -> where('user_teacher_id', Auth::user() -> id)
                -> update(
                    ['add_image' => true, 'updated_at' => now()]
                );
        }   else    {
            DB::table('teacher_profile_tracker')
                -> insert(
                    ['user_teacher_id' => Auth::user()->id, 'add_image'=> true, 'created_at' => now(), 'updated_at' => now()]
                );
        }

        return redirect() -> back();
    }
}
