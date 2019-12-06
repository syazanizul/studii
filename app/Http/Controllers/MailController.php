<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\Mail\newsletter;

class MailController extends Controller
{
    public function newsletter()    {
        $email = request() -> get('email');

        \Mail::to($email)->send(new newsletter);

        $noti['newsletter']=1;

        return redirect('/');
    }
}
