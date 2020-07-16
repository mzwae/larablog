@extends('layouts.app')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1>New Article</h1>
            <form action="">

                <div class="field">
                    <label for="title" class="lable">
                        Title
                    </label>

                    <div class="control">
                        <input type="text" class="input" name="title" id="title">
                    </div>
                </div>

                <div class="field">
                    <label for="excerpt" class="label">
                        Excerpt
                    </label>

                    <div class="control">
                        <textarea name="excerpt" id="excerpt" cols="30" rows="10" class="textarea"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">
                        Body
                    </label>

                    <div class="control">
                        <textarea name="body" id="excerpt" cols="30" rows="10" class="textarea"></textarea>
                    </div>
                </div>

                <div class="field is-grouped">

                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>

                    <div class="control">
                        <button class="button is-text">Cancel</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
