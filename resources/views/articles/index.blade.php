@extends('layouts.app')

@section('content')

<div id="wrapper">
    <div id="page" class="container">
        @if(session('message'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session('message') }}
        </div>
        @endif
        @forelse($articles as $article)
        <div class="row">
            <div class="col-sm-12 mt-5">
                <h2>
                    <a href="/articles/{{ $article->id }}">
                        {{ $article->title }}
                    </a>
                </h2>
                <small class="pr-5">Written by {{ $article->author->name }} on {{ $article->created_at }} - {{ $article->totalCommentsCount() }} comments</small>

                {{-- Article Rating stars --}}
                @for($i = round($article->averageRate()); $i > 0; $i--)
                <span class="fa fa-star text-success"></span>
                @endfor
                @for($i = 5-round($article->averageRate()); $i > 0; $i--)
                <span class="fa fa-star"></span>
                @endfor
                {{-- Article rating stars end --}}

                <p><img src="/images/banner.jpg" alt="" class="img-thumbnail" /> </p>
                {{ $article->excerpt }}
            </div>
        </div>
        @empty
        <h3>No relelvent articles yet.</h3>
        @endforelse
    </div>


    @endsection
