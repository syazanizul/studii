<?php

namespace App\Http\Controllers\Ajax\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Not;

class TeacherController extends Controller
{
//    public function hide_modal()    {
//        DB::table('teacher_notification') -> updateOrInsert(
//            ['user_teacher_id' => Auth::user() -> id],
//            ['welcome' => 1]
//        );
//    }
//
//    public function noti2() {
////        DB::table('teacher_notification') -> updateOrInsert(
////            ['user_teacher_id' => Auth::user() -> id],
////            ['noti_two' => 1]
////        );
//
//        $check = DB::table('teacher_notification') -> where('user_teacher_id', Auth::user() -> id)->get();
//
//        //Insert or Update in TEACHERS noti table
//        if (!$check-> isEmpty())   {
//            DB::table('teacher_notification') -> where('user_teacher_id', Auth::user() -> id)
//                ->update(
//                    ['noti_two' => 1]
//                );
//        }   else    {
//            DB::table('teacher_notification')
//                ->insert(
//                    ['user_teacher_id' => Auth::user()->id, 'noti_two' => 1]
//                );
//        }
//    }
//
//    public function noti3() {
////        DB::table('teacher_notification') -> updateOrInsert(
////            ['user_teacher_id' => Auth::user() -> id],
////            ['noti_three' => 1]
////        );
//
//        $check = DB::table('teacher_notification') -> where('user_teacher_id', Auth::user() -> id)->get();
//
//        //Insert or Update in TEACHERS noti table
//        if (!$check-> isEmpty())   {
//            DB::table('teacher_notification') -> where('user_teacher_id', Auth::user() -> id)
//                ->update(
//                    ['noti_three' => 1]
//                );
//        }   else    {
//            DB::table('teacher_notification')
//                ->insert(
//                    ['user_teacher_id' => Auth::user()->id, 'noti_three' => 1]
//                );
//        }
//    }

    public function subject_based_on_exam() {
        $exam = request() -> get('exam');

        $subjects = DB::table('subjects_list')->where('exam', $exam)-> get();

        echo '<select name="subject" class="form-control m-1">';
        foreach($subjects as $n)   {
            echo '<option value="',$n->id,'">',$n->name,'</option>';
        }
        echo '</select>';
    }

    public function notification(Request $request)  {
        $id = $request -> get('id');
        (new \App\NotificationTeacher)->insert($id);
    }

//    public function insert_to_notification_teacher_table(int $noti_id)  {
//        $m = new NotificationTeacher;
//
//        $m -> noti_id = $noti_id;
//        $m -> user_id = Auth::user()-> id;
//        $m -> save();
//    }

}
