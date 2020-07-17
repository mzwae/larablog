@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">Edit Article</h1>
            <form action="/articles" method="post">
                @csrf
                <div class="field">
                    <label for="title" class="lable">
                        Title
                    </label>

                    <div class="control">
                    <input type="text" class="input" name="title" id="title" value="{{ $article->title }}">
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">
                        Excerpt
                    </label>

                    <div class="control">
                    <textarea name="excerpt" id="excerpt" cols="30" rows="10" class="textarea" >{{ $article->excerpt }}</textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">
                        Body
                    </label>

                    <div class="control">
                        <textarea name="body" id="excerpt" cols="30" rows="10" class="textarea">{{ $article->body }}</textarea>
                    </div>
                </div>

                <div class="field is-grouped">

                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
