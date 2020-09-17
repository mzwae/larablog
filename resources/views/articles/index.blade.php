@extends('layouts.app')

@section('content')

<div id="wrapper">
    <div id="page" class="container">
        @if(session('message'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <div class="card-columns">
        @forelse($articles as $article)
            <div class="card">
                <a href="/articles/{{ $article->id }}">
                    <img class="card-img-top" src="/images/banner.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">
                            {{ $article->excerpt }}
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                <i class="fas fa-comment"></i>{{ $article->totalCommentsCount() }}
                                <i class="far fa-user pl-2"></i>{{ $article->author->name }}
                                <i class="fas fa-calendar-alt pl-2"></i>  {{ $article->created_at->diffForHumans() }}

                                {{-- Article rating --}}
                                @for($i = round($article->averageRate()); $i > 0; $i--)
                                <span class="fa fa-star text-success"></span>
                                @endfor
                                @for($i = 5 - round($article->averageRate()); $i > 0; $i--)
                                <span class="fa fa-star"></span>
                                @endfor
                            </small>
                        </p>
                    </div>
                </a>
            </div>
            @empty
            <h3>No relelvent articles yet.</h3>
            @endforelse
        </div>
    </div>


    @endsection

