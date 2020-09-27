@extends('layouts.app')

@section('header')

<h1>Our Latest Articles</h1>
<div id="carouselId" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
        <li data-target="#carouselId" data-slide-to="1"></li>
        <li data-target="#carouselId" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img src="/images/banner.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>{{$articles[0]->title}}</h3>
                <p>{{$articles[0]->excerpt}}</p>
            </div>


        </div>
        @foreach($articles as $index => $article)
        @if($index > 0)
        <div class="carousel-item">
            <img src="/images/banner.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>{{$article->title}}</h3>
                <p>{{$article->excerpt}}</p>
            </div>
        </div>
        @endif

        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div>


@endsection
