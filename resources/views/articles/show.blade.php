@extends('layouts.app')

@section('content')

<div id="wrapper">
    <div id="page" class="container">
        <div id="content">
            <div class="title">

                <h2>{{ $article->title }}</h2>
                <img src="/images/banner.jpg" alt="" class="image image-full" />
                <p>
                    {{ $article->body }}
                </p>
                <p class="mt-4">
                    @foreach($article->tags as $tag)
                    <a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                    @endforeach
                </p>

                @auth
                <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="btn btn-info">Edit</a>
                @endauth
            </div>
        </div>
    </div>
</div>

@endsection
