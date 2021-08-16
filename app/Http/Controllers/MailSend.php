<?php

namespace App\Http\Controllers;
use \App\Mail\SuccessMail;
use Illuminate\Http\Request;
class MailSend extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'Title: Mail from shamseer',
            'body' => 'Body: This is welcome mail'
        ];

        \Mail::to('raheesep318@gmail.com')->send(new SuccessMail($details));
        return view('emails.thanks');
    }
}
