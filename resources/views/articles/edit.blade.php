@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">Edit Article</h1>
        <form action="/articles/{{ $article->id }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title" class="lable">
                    Title
                </label>

                <input type="text" class="form-control" name="title" id="title" value="{{ $article->title }}">
            </div>

            <div class="form-group">
                <label for="excerpt" class="label">
                    Excerpt
                </label>

                <textarea name="excerpt" id="" cols="30" rows="10" class="form-control">{{ $article->excerpt }}</textarea>
            </div>

            <div class="form-group">
                <label for="body" class="label">
                    Body
                </label>

                <textarea name="body" id="editor" cols="30" rows="10" class="form-control">{!! $article->body !!}</textarea>
            </div>

            <p class="mt-4"> Previously selected tags:
                @foreach($article->tags as $tag)
                <a class="badge badge-danger badge-pill" href="{{ route('articles.removeTag', ['tag' => $tag, 'article' => $article]) }}">
                    {{ $tag->name }}
                </a>
                @endforeach
            </p>

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

    </div>
    </form>
</div>
</div>
@endsection
