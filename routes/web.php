<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/home', function() {
    return redirect('/');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@LoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationChoose')->name('register');
Route::get('register/data-protected', 'Auth\RegisterController@dataProtectedIndex');
Route::get('register/form', 'Auth\RegisterController@registerForm');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
// Login for different categories
// For students
Route::get('/student', 'StudentController@index')->name('student')->middleware('student');
// End for students

// =====================================================================================================
// For teachers ----------------------------------------------------------------------------------------
Route::get('/teacher', 'Teacher\TeacherController@index')->name('teacher')->middleware('teacher');
Route::get('/teacher/details', 'Teacher\DetailsController@index')->middleware('teacher');
Route::get('/teacher/performance', 'Teacher\PerformanceController@index')->middleware('teacher');

Route::post('/teacher/details/edit-profile', 'Teacher\DetailsController@edit_profile');
Route::post('/teacher/details/teaching-details', 'Teacher\DetailsController@teaching_details');
Route::post('/teacher/details/add-image', 'Teacher\DetailsController@add_image');
Route::get('/teacher/details/add-image/no-image', 'Teacher\DetailsController@no_image');

Route::post('/teacher/details/teaching-details/exam', 'Teacher\DetailsController@teaching_details_exam');
Route::post('/teacher/details/teaching-details/subject', 'Teacher\DetailsController@teaching_details_subject');

Route::get('/teacher/submission-status', 'Teacher\SubmissionController@index')->middleware('teacher');
Route::get('/teacher/submission-status/{set_id}', 'Teacher\SubmissionController@verify_index')->middleware('teacher');
//Route::get('/teacher/submission-status/verify/set-element/{id}', 'Teacher\SubmissionController@verify_set_element')->middleware('teacher');
Route::post('/teacher/submission-status/verify/set-parent/{id}', 'Teacher\SubmissionController@verify_set_parent')->middleware('teacher');

// --- For 30 questions = RM50
Route::get('/teacher/promo', 'Teacher\PromoController@index')->middleware('teacher');

//Route::get('/teacher/instruction', 'Teacher\InstructionController@index')->middleware('teacher');
//Route::get('/teacher/instruction/process-upload-questions', 'Teacher\InstructionController@process_upload_questions')->middleware('teacher');
//Route::get('/teacher/instruction/disclaimer', 'Teacher\InstructionController@disclaimer')->middleware('teacher');

//Route::get('/teacher/upload/with-help','Teacher\AddquestionController@index_with_help')->middleware('teacher');;
//Route::get('/teacher/upload/with-help-2','Teacher\AddquestionController@index_with_help_2')->middleware('teacher');;
//Route::get('/teacher/upload/with-help-3','Teacher\AddquestionController@index_with_help_3')->middleware('teacher');;
//Route::post('/teacher/upload/with-help/upload-file', 'Teacher\AddquestionController@upload_question_set');

//For add phone number in about.teacher
Route::get('/about/submit/phone-number', 'About\TeacherController@phone_number');

//For Contributing Set
Route::get('/teacher/set', 'Teacher\AddquestionController@index')->middleware('teacher');
Route::get('/teacher/set/template', 'Teacher\AddquestionController@contribute_set_template')->middleware('teacher');
Route::get('/teacher/set/submit', 'Teacher\AddquestionController@contribute_set_submit')->middleware('teacher');
Route::get('/teacher/set/status', 'Teacher\AddquestionController@contribute_set_status')->middleware('teacher');

Route::get('/teacher/set/see/{id}', 'Teacher\AddquestionController@contribute_set_see')->middleware('teacher');
Route::get('/teacher/set/see/{id}/show-question', 'Teacher\AddquestionController@see_set_choose')->middleware('teacher');

Route::post('/teacher/set/submit/post', 'Teacher\AddquestionController@upload_set')->middleware('teacher');
//Route::post('/teacher/set/verify-finish/{id}', 'Teacher\AddquestionController@verify_set_finish')->middleware('teacher');

// End for teachers-------------------------------------------------------------------------------------------------------
// ======================================================================================================================


//For Tutors ------------------------------------------------------------------------------------------------
Route::get('/tutor', 'Tutor\HomeController@index')->name('tutor')->middleware('tutor');

Route::get('/tutor/contribute', 'Tutor\ContributeController@index')->middleware('tutor');
Route::get('/tutor/contribute/choose-set/{id}', 'Tutor\ContributeController@choose_set')->middleware('tutor');

Route::get('/tutor/contribute/see-set/{id}', 'Tutor\ContributeController@see_set')->middleware('tutor');
Route::get('/tutor/contribute/see-set/{id}/show-question', 'Tutor\ContributeController@see_set_choose')->middleware('tutor');
Route::post('/tutor/contribute/see-set/declare-uploaded/{id}', 'Tutor\ContributeController@declare_set_uploaded')->middleware('tutor');

Route::get('/tutor/contribute/add-property/{id}', 'Tutor\AddquestionController@index')->middleware('tutor');
Route::post('/tutor/contribute/add-property/store', 'Tutor\AddquestionController@store')->middleware('tutor');
// End for tutors


Route::get('/parent', 'ParentsController@index')->name('parents')->middleware('parents');

// For Admin
Route::get('/admin', 'Admin\AdminController@index')->name('admin')->middleware('admin');

Route::get('/admin/question-database', 'Admin\QuestionDatabaseController@index')->middleware('admin');

Route::get('/admin/earning-tracker', 'Admin\EarningTrackerController@index')->middleware('admin');
Route::get('/admin/earning-tracker/save-new-contribution-earning-tracker', 'Admin\EarningTrackerController@save_new_contribution_earning_tracker')->middleware('admin');

Route::get('/admin/verify-question', 'Admin\VerifyQuestionController@index')->middleware('admin');
Route::get('/admin/verify-question/verify/{id}', 'Admin\VerifyQuestionController@verify')->middleware('admin');

Route::get('/admin/set-price', 'Admin\SetPriceQuestionController@index')->middleware('admin');
Route::get('/admin/set-price/show', 'Admin\SetPriceQuestionController@show_question')->middleware('admin');
Route::post('/admin/set-price/save', 'Admin\SetPriceQuestionController@save')->middleware('admin');

Route::get('/admin/price-manipulator', 'Admin\PriceManipulatorController@index')->middleware('admin');

Route::get('/admin/falsify-data', 'Admin\FalsifyDataController@index')->middleware('admin');

Route::get('/admin/feedback', 'Admin\FeedbackController@index')->middleware('admin');

Route::get('/admin/question', 'Admin\QuestionController@index')->middleware('admin');

Route::get('/admin/record-new-earning', 'Admin\RecordNewEarningController@index')->middleware('admin');
// End for Admin

// Basics
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/practice', 'QuestionController@index');
Route::get('/practice/report', 'QuestionController@report');
Route::get('/practice/question-id/{id}', 'QuestionController@go_to_practicelink');

//Route for collection browsing
Route::get('/practice/collection-id/{id}','QuestionCollectionController@browse');

Route::get('/contact', 'ContactController@index');
Route::get('/contact/submit', 'ContactController@submit');

// Routes for all About Us things
Route::get('/about', 'About\AboutController@index');
Route::get('/disclaimer', 'About\AboutController@disclaimer');

// About Us - Teachers
Route::get('about/teacher/join-us', 'About\TeacherController@JoinUs')->name('about-teacher-join-us');
Route::get('about/teacher/compensation-for-contributors', 'About\TeacherController@compensation');

// About Us - Company
Route::get('about/for-company', 'About\CompanyController@index');
Route::post('about/for-company/submit', 'About\CompanyController@submit');
// End About Us

/* Routes to add question */
//Route::get('/teacher/question', 'AddQuestion\AddController@index');

    //Save 1
    Route::get('/question/add', 'AddQuestion\AddProperty@index');     //Show Add Property Page
    Route::get('/question/addnew', 'AddQuestion\AddProperty@index2');     //Show Add Property Page
    Route::post('/question/add/newproperty/1','AddQuestion\AddProperty@newsubject');      //Add new property
    Route::post('/question/add/newproperty/2','AddQuestion\AddProperty@newchapter');      //Add new property
    Route::post('/question/add/newproperty/3','AddQuestion\AddProperty@newsubtopic');      //Add new property

    Route::post('/question/add/save/property', 'AddQuestion\AddProperty@store1');     //Save Property

    //Save 2
    Route::get('/question/update/{id}', 'AddQuestion\AddContent@index');        //Show Update Content Page
    Route::post('/question/add/save/content/{id}', 'AddQuestion\AddContent@store2');     //Save update
    Route::get('/question/add/save/content/{id}/remove', 'AddQuestion\AddContent@removeimage');
    Route::get('/question/add/save/content/{id}/remove/{order}', 'AddQuestion\AddContent@removecontent');

    //Save 3
    Route::get('/question/update/answer/{id}', 'AddQuestion\AddAnswer@index'); //view answer page
    Route::get('/question/add/check/answer/{id}','AddQuestion\AddAnswer@check_answer');
    Route::get('/question/add/save/answer/setup/update/{id}','AddQuestion\AddAnswer@set_up_update');
    Route::get('/question/add/save/answer/insert','AddQuestion\AddAnswer@store_insert');
    Route::get('/question/add/save/answer/update','AddQuestion\AddAnswer@store_update');
    Route::get('/question/add/save/answer/delete','AddQuestion\AddAnswer@delete');
    Route::get('/question/publish/{id}','AddQuestion\AddAnswer@publish');

    /* Route Add Working */
    Route::get('/question/working/{id}', 'AddQuestion\AddWorking@index');
    Route::post('/question/working/text/insert', 'AddQuestion\AddWorking@insert_text');
    Route::post('/question/working/image/insert', 'AddQuestion\AddWorking@insert_image');
    Route::post('/question/working/delete', 'AddQuestion\AddWorking@delete');

/* End Routes to add question */

Route::get('/redirect/quick','QuestionController@quick');
Route::get('/redirect/detailed','QuestionController@detailed');



// ALL AJAX ----------
// AJAX for Welcome page
Route::get('/ajax/fetch', 'Ajax\WelcomeController@fetch');
Route::get('/ajax/fetch_subject_change_chapter', 'Ajax\WelcomeController@fetch_subject_change_chapter');
Route::get('/ajax/fetch_subject_level_change_chapter', 'Ajax\WelcomeController@fetch_subject_level_change_chapter');
Route::get('/ajax/fetch_chapter_change_subtopic', 'Ajax\WelcomeController@fetch_chapter_change_subtopic');
Route::get('/ajax/count', 'Ajax\WelcomeController@count');
// End AJAX for Welcome page

//AJAX for general

//Ajax for Welcome Page
Route::get('/ajax/welcome/hide-modal', 'Ajax\WelcomeController@hide_first_impression_modal');

//Route::get('/ajax/feedback', 'Ajax\AjaxController@feedback');
Route::get('/ajax/feedback/rating', 'Ajax\PracticeController@feedback_form_quick_rating');
Route::get('/ajax/feedback/improvement', 'Ajax\PracticeController@feedback_form_quick_improvement');
//End Ajax for general

// AJAX for teacher dashboard
//Route::get('/ajax/dashboard/hide-modal', 'Ajax\Dashboard\TeacherController@hide_modal');
//Route::get('/ajax/dashboard/noti2', 'Ajax\Dashboard\TeacherController@noti2');
//Route::get('/ajax/dashboard/noti3', 'Ajax\Dashboard\TeacherController@noti3');
Route::get('/ajax/dashboard/notification', 'Ajax\Dashboard\TeacherController@notification');
Route::get('/ajax/dashboard/teacher/details/subject_based_on_exam', 'Ajax\Dashboard\TeacherController@subject_based_on_exam');
// End AJAX for teacher dashboard

//Ajax for practicelink
Route::get('/ajax/practice/session-for-new', 'Ajax\PracticeController@session_for_new');
Route::get('/ajax/practice/count-attempt', 'Ajax\PracticeController@count_attempt');
Route::get('/ajax/practice/rating', 'Ajax\PracticeController@difficulty_rating');

//End ALL AJAX ----------


//----------------------------------------------------------------------------------
//Start for Mail

//Mail for newsletter
Route::get('/mail/newsletter','MailController@newsletter');
//Route::get('/test', function (){
//    return view('emails.register_thankyou');
//});

//End for Mail
//----------------------------------------------------------------------------------
