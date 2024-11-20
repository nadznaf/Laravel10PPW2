<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendMailJob;

class SendEmailController extends Controller
{
    public function index()
    {
        // $content = [
        //     'name' => 'Nafa',
        //     'subject' => 'Laravel 10',
        //     'body' => 'Hello, this is a test email.'
        // ];
        // Mail::to('nadzirafarahiya@gmail.com')->send(new SendEmail ($content));
        // return 'Email was successfully sent';

        return view('emails.kirim-email');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dispatch(new SendMailJob($data));
        return redirect()->route('send-email')->with('success', 'Email was successfully sent');
    }
}
