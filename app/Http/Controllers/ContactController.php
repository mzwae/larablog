<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }


    public function store()
    {
        request()->validate(['email' => 'required|email']);

        Mail::raw('This is just to confirm your email is valid', function ($message) {
            $message->from('john@johndoe.com', 'John Doe')
            ->to(request('email'))
            ->subject('Hello From LaraBlog');

        });

        return redirect(route('contact'))->with('message', 'Email sent!');
    }
}
