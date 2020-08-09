@extends('layouts.app')

@section('content')

<div class="container">

    @if(session('message'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <div class="text-center mt-5 border border-5 border-success w-50 p-5 mx-auto">
        <form method="POST" action="{{route('notify.post')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Type your email here">

                @error('email')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Notify Me</button>

        </form>

    </div>

</div>


@endsection
