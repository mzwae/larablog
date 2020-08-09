<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function show()
    {
        return view('notify');
    }


    public function store()
    {
        request()->validate(['email' => 'required|email']);


        return redirect(route('notify'))->with('message', 'Thank You. Your email has been sent!');
    }
}
