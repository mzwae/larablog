@extends('layouts.app')

@section('content')

<div id="wrapper">
    <div id="page" class="container">

        <h2>{{ $article->title }}</h2>
        <small>Written by {{ $article->author->name }} on {{$article->created_at}}</small>
        <img src="/images/banner.jpg" alt="" class="img-thumbnail d-block"/>
        <p>
            {{ $article->body }}
        </p>
        <p class="mt-4">
            @foreach($article->tags as $tag)
            <a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
            @endforeach
        </p>

        <hr>

        @auth
        <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="btn btn-info">
            <i class="fas fa-edit"> Edit</i>
        </a>
        <a data-toggle="modal" data-target="#deleteModal" title="Delete Article" type="button" class="btn btn-danger ml-5">
            <i class="fas fa-trash-alt"> Delete</i>
        </a>
        @endauth
    </div>
</div>

@include('layouts.deletemodal', ['id' => $article->id])

@endsection
