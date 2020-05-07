<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Mail\event;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TeacherController extends Controller
{
    public function JoinUs()
    {
        //SEO
        SEOMeta::setTitle('Studii for Teachers');
        SEOMeta::setDescription('Role of Teachers In Studii');
        SEOMeta::setCanonical('https://www.studii.my');
        return view('about.teacher.about_teachers');
    }

    public function compensation()
    {
        //SEO
        SEOMeta::setTitle('Compensation For Contributors');
        SEOMeta::setDescription('Questions are pieces of peoples contribution - learn about them here');
        SEOMeta::setCanonical('https://www.studii.my');
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
