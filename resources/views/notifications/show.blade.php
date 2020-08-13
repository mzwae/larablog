@extends('layouts.app')

@section('content')

<div class="container">

    <div class="text-center mt-5 border border-5 border-success w-50 p-5 mx-auto bg-primary text-white">

        <ul>
            @foreach($notifications as $notification)
                <li>
                    @if ($notification->type === 'App\Notifications\EmailReceived')
                        We have received an email from you, with reference {{ $notification->data['amount'] }}.
                    @endif
                </li>
            @endforeach
        </ul>

    </div>

</div>


@endsection
