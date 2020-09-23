@extends('layouts.app')

@section('content')

<div id="wrapper">
    <div id="page">
        @if(session('message'))
        <div class="alert alert-success mt-5" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <div class="card-columns">
        @forelse($articles as $article)
            <div class="card">
                <a href="/articles/{{ $article->id }}" class="text-reset text-decoration-none">
                    <img class="card-img-top" src="/images/banner.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">
                            {{ $article->excerpt }}
                        </p>
                        <p>
                            <small class="text-muted">
                                <i class="fas fa-comment"> {{ $article->totalCommentsCount() }}</i>
                                <i class="fas fa-calendar-alt pl-2"> {{ $article->created_at->diffForHumans() }} </i>
                            </p>
                            <p>
                                <i class="far fa-user"> {{ $article->author->name }}</i>

                            </p>
                            <p>

                                {{-- Article rating --}}
                                @for($i = round($article->averageRate()); $i > 0; $i--)
                                <i class="fa fa-star text-success"></i>
                                @endfor
                                @for($i = 5 - round($article->averageRate()); $i > 0; $i--)
                                <i class="fa fa-star"></i>
                                @endfor
                            </p>
                            </small>
                    </div>
                </a>
            </div>
            @empty
            <h3>No relelvent articles yet.</h3>
            @endforelse
        </div>
    </div>


    @endsection

