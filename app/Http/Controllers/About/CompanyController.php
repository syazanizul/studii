<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Mail\event;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    public function index() {
        //SEO
        SEOMeta::setTitle('Studii for Companies');
        SEOMeta::setDescription('Impact Lives By Sponsoring Studii - For Companies');
        SEOMeta::setCanonical('https://www.studii.my');
        return view('about.company');
    }

    public function submit(Request $request)    {
        $name = $request -> post('name');
        $company = $request -> post('company');
        $email = $request -> post('email');
        $phone = $request -> post('phone');

        Mail::to('syazanizul@gmail.com')->send(new event('Sponsor!!!!
        <br>name : '.$name.'
        <br>company : '.$company.'
        <br>email : '.$email.'
        <br>phone :'.$phone));

        return  redirect(url()->previous().'#info-submitted')
            ->with('success','Yes');
    }
}
