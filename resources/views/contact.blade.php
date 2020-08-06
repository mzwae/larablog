@extends('layouts.app')

@section('content')

<div class="container">


    <div class="text-center mt-5 border border-5 border-success w-50 p-5 mx-auto">
        <form method="POST" action="{{route('contact')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Type your email here">

                @error('email')
                    <div class="text-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Email Me</button>

        </form>

    </div>

</div>


@endsection
