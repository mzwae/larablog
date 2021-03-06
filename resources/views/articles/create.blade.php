@extends('layouts.app')

@section('content')
<div id="wrapper" class="m-5">
    <div id="page" class="container">
        <h1 class="text-center m-5 font-weight-lighter">Add New Article</h1>
        <form action="{{ route('articles.post')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">
                    Title
                </label>

                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">

                @error('title')
                <p class="text-danger">{{ $errors->first('title') }}</p>
                @enderror

            </div>

            <div class="form-group">
                <label for="excerpt">
                    Excerpt
                </label>

                <textarea name="excerpt" id="excerpt"  rows="5" style="height:100%;" class="form-control @error('excerpt') is-invalid @enderror">{{ old('excerpt')}}</textarea>

                @error('excerpt')
                <p class="text-danger">{{ $errors->first('excerpt') }}</p>
                @enderror

            </div>

            <div class="form-group">
                <label for="body">
                    Body
                </label>

                <textarea name="body" id="editor" class="form-control @error('body') is-invalid @enderror">{{ old('body')}}</textarea>

                @error('body')
                <p class="text-danger">{{ $errors->first('body') }}</p>
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
