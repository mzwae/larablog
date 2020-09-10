@extends('layouts.app')

@section('content')

<div id="wrapper">
    <div id="page" class="container">

        {{-- Notify user about the newly added comment --}}
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Success: </strong>{{ session('message') }}
        </div>
        @endif



        {{-- Notify user editing articles only for authors only --}}
        @if(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Warning: </strong>{{ session('warning') }}
        </div>
        @endif
        {{-- notifications end --}}



        <h2>{{ $article->title }}</h2>
        <small class="pr-5">Written by {{ $article->author->name }} on {{ $article->created_at }} has {{ $article->totalCommentsCount() }} comments</small>

        {{-- Article Rating stars --}}
        @for($i = round($article->averageRate()); $i > 0; $i--)
        <span class="fa fa-star text-success"></span>
        @endfor
        @for($i = 5-round($article->averageRate()); $i > 0; $i--)
        <span class="fa fa-star"></span>
        @endfor
        {{-- Article rating stars end --}}

        <img src="/images/banner.jpg" alt="" class="img-thumbnail d-block mt-5 mb-5" />
        <p>
            {!! $article->body !!}
        </p>
        <p class="mt-4">
            @foreach($article->tags as $tag)
            <a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
            @endforeach
        </p>

        <hr>

        @auth
        @if(Auth::user()->id === $article->author->id)
        <div class="m-5">
            <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class="btn btn-info">
                <i class="fas fa-edit"> Edit</i>
            </a>
            <a data-toggle="modal" data-target="#deleteModal" title="Delete Article" type="button" class="btn btn-danger pull-right">
                <i class="fas fa-trash-alt"> Delete</i>
            </a>
        </div>
        @endif
        @endauth

        @include('layouts.partials.comment')

    </div>
</div>


@include('layouts.deletemodal', ['id' => $article->id])

@endsection
