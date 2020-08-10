<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\EmailReceived;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\RequestStack;

class NotifyController extends Controller
{
    public function show()
    {
        return view('notify');
    }


    public function store()
    {
        // Notification::send(request()->user(), new EmailReceived());

        request()->user()->notify(new EmailReceived);

        return redirect(route('notify'))->with('message', 'Thank You. Your email '. request()->user()->email .' has been sent!');
    }
}
