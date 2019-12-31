<?php

namespace App\Http\Controllers;

use App\Mail\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AboutController extends Controller
{
    public function index()
    {
        return view('about.about');
    }

    public function teacherJoinUs()
    {
        return view('about.about_teachers');
    }

    public function disclaimer()
    {
        return view('about.disclaimer');
    }

    public function phone_number()
    {
        $name = request()->get('name');
        $phone = request()->get('phone');

        Mail::to('syazanizul@gmail.com')->send(new event('Teacher want to talk more - through phone: <br>The name is : '.$name.'<br> and phone number is :'.$phone));

        return redirect()->route('about-teacher', ['#submitted'])
            ->with('success','Yes');
    }
}
