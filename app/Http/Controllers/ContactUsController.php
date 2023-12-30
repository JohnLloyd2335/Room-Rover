<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function contactUs(ContactUsRequest $request)
    {

        $validated = $request->validated();

        try {
            Mail::to(env('MAIL_FROM_ADDRESS','agnesmarkkangelo@gmail.com'))->send(new ContactUsMail($request->name,$request->email,$request->message));

            return redirect()->route('contact')->with('success','Email Sent. We will back to you shortly');
        } catch (Exception $ex) {
             return redirect()->route('contact')->with('error','There was an error sending your Email');
        }
    }
}
