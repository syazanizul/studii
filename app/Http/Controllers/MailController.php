<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail;
use App\Mail\newsletter;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function newsletter()    {
        $email = request() -> get('email');

        $newsletter = DB::table('newsletter')-> where('email', $email)-> get();

        if ($newsletter -> isEmpty())   {
            DB::table('newsletter')-> insert(['email' => $email, 'created_at' => now(), 'updated_at' => now()]);
            \Mail::to($email)->send(new newsletter);
        }
  
        return redirect('/');
    }
}
