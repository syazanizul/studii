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
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationChoose')->name('register');
Route::get('register/form', 'Auth\RegisterController@registerForm');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
// Login for different categories
// For students
Route::get('/student', 'StudentController@index')->name('student')->middleware('student');
// End for students


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
// End for teachers


Route::get('/parent', 'ParentsController@index')->name('parents')->middleware('parents');
Route::get('/volunteer', 'VolunteerController@index')->name('volunteer')->middleware('volunteer');

// For Admin
Route::get('/admin', 'Admin\AdminController@index')->name('admin')->middleware('admin');
Route::get('/admin/set-price', 'Admin\SetPriceQuestionController@index')->middleware('admin');
Route::get('/admin/set-price/show', 'Admin\SetPriceQuestionController@show_question')->middleware('admin');
Route::post('/admin/set-price/save', 'Admin\SetPriceQuestionController@save')->middleware('admin');
// End for Admin

// Basics
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/practice', 'QuestionController@index');
Route::get('/practice/report', 'QuestionController@report');

Route::get('/contact', 'ContactController@index');

// Routes for all About Us things
Route::get('/about', 'AboutController@index');
Route::get('/disclaimer', 'AboutController@disclaimer');

// About Us - Teachers
Route::get('about/teacher/join-us', 'About\TeacherController@JoinUs');
Route::get('about/teacher/compensation-for-contributors', 'About\TeacherController@compensation');

//For add phone number in about.teacher
Route::get('/about/submit/phone-number', 'AboutController@phone_number');
// End About Us

/* Routes to add question */
Route::get('/teacher/question', 'AddQuestion\AddController@index');
Route::get('/teacher/question/go-practicelink/{id}', 'AddQuestion\AddController@go_to_practicelink');

    //Save 1
    Route::get('/question/add', 'AddQuestion\AddProperty@index');     //Show Add Property Page
    Route::get('/question/addnew', 'AddQuestion\AddProperty@index2');     //Show Add Property Page
    Route::post('/question/add/newproperty/1','AddQuestion\AddProperty@newsubject');      //Add new property
    Route::post('/question/add/newproperty/2','AddQuestion\AddProperty@newchapter');      //Add new property
    Route::post('/question/add/save/property', 'AddQuestion\AddProperty@store1');     //Save Property

    //Save 2
    Route::get('/question/update/{id}', 'AddQuestion\AddContent@index');        //Show Update Content Page
    Route::post('/question/add/save/content/{id}', 'AddQuestion\AddContent@store2');     //Save update
    Route::get('/question/add/save/content/{id}/remove', 'AddQuestion\AddContent@removeimage');
    Route::get('/question/add/save/content/{id}/remove/{order}', 'AddQuestion\AddContent@removecontent');

    //Save 3
//    Route::get('/question/update/answer/{id}', 'AddQuestion\AddAnswer@answer'); //view answer page
    Route::get('/question/update/answer/{id}', 'AddQuestion\AddAnswer@index'); //view answer page
    Route::get('/question/add/check/answer/{id}','AddQuestion\AddAnswer@check_answer');
//    Route::get('/question/add/save/answer/{id}','AddQuestion\AddAnswer@store3');
    Route::get('/question/add/save/answer/setup/update/{id}','AddQuestion\AddAnswer@set_up_update');
    Route::get('/question/add/save/answer/insert','AddQuestion\AddAnswer@store_insert');
    Route::get('/question/add/save/answer/update','AddQuestion\AddAnswer@store_update');
    Route::get('/question/publish/{id}','AddQuestion\AddAnswer@publish');
    /* End Routes to add question */
/* End Routes to add question */

Route::get('/redirect/quick','QuestionController@quick');
Route::get('/redirect/detailed','QuestionController@detailed');

// ALL AJAX ----------
// AJAX for Welcome page
Route::get('/ajax/fetch', 'Ajax\WelcomeController@fetch');
Route::get('/ajax/fetch_subject_change_chapter', 'Ajax\WelcomeController@fetch_subject_change_chapter');
Route::get('/ajax/fetch_subject_level_change_chapter', 'Ajax\WelcomeController@fetch_subject_level_change_chapter');
Route::get('/ajax/count', 'Ajax\WelcomeController@count');
// End AJAX for Welcome page

//AJAX for general
//Route::get('/ajax/feedback', 'Ajax\AjaxController@feedback');
Route::get('/ajax/feedback/rating', 'Ajax\PracticeController@feedback_form_quick_rating');
Route::get('/ajax/feedback/improvement', 'Ajax\PracticeController@feedback_form_quick_improvement');
//End Ajax for general

// AJAX for teacher dashboard
Route::get('/ajax/dashboard/hide-modal', 'Ajax\Dashboard\TeacherController@hide_modal');
Route::get('/ajax/dashboard/noti2', 'Ajax\Dashboard\TeacherController@noti2');
Route::get('/ajax/dashboard/noti3', 'Ajax\Dashboard\TeacherController@noti3');
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
