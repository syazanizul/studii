<?php

namespace App\Http\Controllers;

use App\Mail\event;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        //SEO
        SEOMeta::setTitle('Contact Us');
        SEOMeta::setDescription('Send to us any question, suggestion, or anything.');
        SEOMeta::setCanonical('https://www.studii.my');
        return view('contact.contact');
    }

    public function submit(Request $request)    {
        $name = $request -> get('name');
        $email = $request -> get('email');
        $message = $request -> get('message');

        $update_table = DB::table('contact_us')->insert(
            ['name'=> $name, 'email'=> $email , 'message' => $message , 'created_at' => now() , 'updated_at' => now()]
        );

        if($update_table)    {
            Mail::to('syazanizul@gmail.com')->send(new event('Contact Us - From: ' . $name .  ', Email: ' .$email. ', Message: '. $message));

            return redirect(url()->previous().'#register-form')->with('update_status', '1');

        }   else    {

            return redirect(url()->previous().'#register-form')->with('update_status', '0');
        }
    }
}
