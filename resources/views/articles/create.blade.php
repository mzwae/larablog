@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
        <form action="/articles" method="post">
            @csrf
            <div class="form-group">
                <label for="title">
                    Title
                </label>

                <input type="text" class="form-control @error('title') is-danger @enderror" name="title" id="title" value="{{ old('title') }}">

                @error('title')
                <p class="help is-danger">{{ $errors->first('title') }}</p>
                @enderror

            </div>

            <div class="form-group">
                <label for="excerpt">
                    Excerpt
                </label>

                <textarea name="excerpt" id="excerpt" class="form-control @error('excerpt') is-danger @enderror">{{ old('excerpt')}}</textarea>

                @error('excerpt')
                <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                @enderror

            </div>

            <div class="form-group">
                <label for="body">
                    Body
                </label>

                <textarea name="body" id="body" class="form-control @error('body') is-danger @enderror">{{ old('body')}}</textarea>

                @error('body')
                <p class="help is-danger">{{ $errors->first('body') }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="tags">
                    Tags
                </label>

                <select multiple class="form-control" name="tags[]" multiple id="tags">
                    @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                @error('tags')
                <p class="help is-danger">{{ $message }}</p>
                @enderror

            </div>

            <button class="btn btn-primary" type="submit">Submit</button>

        </form>
    </div>
</div>
@endsection
