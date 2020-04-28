<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Mail\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    public function JoinUs()
    {
        return view('about.teacher.about_teachers');
    }

    public function compensation()
    {
        return view('about.teacher.compensation');
    }

    public function phone_number()
    {
        $name = request()->get('name');
        $phone = request()->get('phone');

        Mail::to('syazanizul@gmail.com')->send(new event('Teacher want to talk more - through phone: <br>The name is : '.$name.'<br> and phone number is :'.$phone));

        return redirect()->route('about-teacher-join-us', ['#submitted'])
            ->with('success','Yes');
    }
}
