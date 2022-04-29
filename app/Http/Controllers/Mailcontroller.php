<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class Mailcontroller extends Controller
{
    //
    public function sendEmail(Request $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,

            'subject' => $request->subject,
            'msg' => $request->msg
        ];

        Mail::to('dreamyshivanpg@gmail.com')->send(new contactMail($details)); 
        return view('emails.Mail');
        
       // return 'Thanks for reacting out!';
    
    }
}
