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

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}

Route::get('/', 'WelcomeController@index');
Route::get('//home', function() {
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

// Login for different categories
Route::get('/student', 'StudentController@index')->name('student')->middleware('student');

Route::get('/teacher', 'TeacherController@index')->name('teacher')->middleware('teacher');
Route::get('/teacher/details', 'TeacherController@index_details')->name('teacher')->middleware('teacher');
Route::get('/teacher/performance', 'TeacherController@index_performance')->name('teacher')->middleware('teacher');

Route::get('/parent', 'ParentsController@index')->name('parents')->middleware('parents');
Route::get('/volunteer', 'VolunteerController@index')->name('volunteer')->middleware('volunteer');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');

// Basics
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/practice', 'QuestionController@index');
Route::get('/about', 'AboutController@index');

/* Routes to add question */
Route::get('/teacher/question', 'AddController@index');

    //Save 1
    Route::get('/question/add', 'AddController@property');     //Show Add Property Page
    Route::post('/question/add/save/property', 'AddController@store1');     //Save Property
    Route::post('/question/add/newproperty/1','AddController@newsubject');      //Add new property
    Route::post('/question/add/newproperty/2','AddController@newchapter');      //Add new property

    //Save 2
    Route::get('/question/update/{id}', 'AddController@update');        //Show Update Content Page
    Route::post('/question/add/save/content/{id}', 'AddController@store2');     //Save update
    Route::get('/question/add/save/content/{id}/remove', 'AddController@removeimage');
    Route::get('/question/add/save/content/{id}/remove/{order}', 'AddController@removecontent');

    //Save 3
    Route::get('/question/update/answer/{id}', 'AddController@answer'); //view answer page
    Route::get('/question/add/check/answer/{id}','AddController@check_answer');
    Route::get('/question/add/save/answer/{id}','AddController@store3');
    Route::get('/question/publish/{id}','AddController@publish');
    /* End Routes to add question */
/* End Routes to add question */

Route::get('/redirect/quick','QuestionController@quick');
Route::get('/redirect/detailed','QuestionController@detailed');

// ALL AJAX ----------
// AJAX for Welcome page
Route::get('/ajax', 'AjaxController@fetch');
Route::get('/ajax/count', 'AjaxController@count');
// End AJAX for Welcome page

//AJAX for general
Route::get('/ajax/feedback', 'AjaxController@feedback');
//End Ajax for general

// AJAX for teacher dashboard
Route::get('/ajax/dashboard/hide-modal', 'AjaxController@hide_modal');
//Route::get('/ajax/dashboard/teacher/details/school_name/', 'AjaxController@school_name');
// End AJAX for teacher dashboard

//Ajax for practicelink
Route::get('/ajax/practice/session-for-new', 'AjaxController@session_for_new');
Route::get('/ajax/practice/count-attempt', 'AjaxController@count_attempt');
Route::get('/ajax/practice/rating', 'AjaxController@rating');

//End ALL AJAX ----------

