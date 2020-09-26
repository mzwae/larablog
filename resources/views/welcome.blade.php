@extends('layouts.app')

@section('header')
<div id="header-featured">
    <div id="banner-wrapper">
        <div id="banner" class="container">
            <h2>Maecenas luctus lectus</h2>
            <p>This is <strong>SimpleWork</strong>, a free, fully standards-compliant CSS template designed by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>. The photos in this template are from <a href="http://fotogrph.com/"> Fotogrph</a>. This free template is released under the <a href="http://templated.co/license">Creative Commons Attribution</a> license, so you're pretty much free to do whatever you want with it (even use it commercially) provided you give us credit for it. Have fun :) </p>
            <a href="#" class="button">Etiam posuere</a>
        </div>
    </div>
</div>
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
                <h3>First Article</h3>
                <p>First excerpt</p>
            </div>


        </div>
        @foreach($articles as $article)
        <div class="carousel-item">
            <img src="/images/banner.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h3>{{$article->title}}</h3>
                <p>{{$article->excerpt}}</p>
            </div>


        </div>
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
