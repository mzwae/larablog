@extends('layouts.app')

@section('content')

<div id="wrapper">
    <div id="page" class="container row">
        <div id="content" class="col-12 col-md-8">
            <div class="jumbotron">
                <h2>Welcome to our website</h2>
                <span class="byline">Mauris vulputate dolor sit amet nibh</span>
            </div>
            <img src="images/banner.jpg" alt="" class="rounded img-fluid" />
            <p>Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis. Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo. Aliquam lacinia metus ut elit. Suspendisse iaculis mauris nec lorem. Donec leo. Vivamus fermentum nibh in augue. Praesent a lacus at urna congue rutrum. Nulla enim eros, porttitor eu, tempus id, varius non, nibh. </p>
            <p>Donec condimentum, urna non molestie semper, ligula enim ornare nibh, quis laoreet eros quam eget ante. Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis. Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo.</p>
            <p>Donec condimentum, urna non molestie semper, ligula enim ornare nibh, quis laoreet eros quam eget ante. Aliquam libero. Vivamus nisl nibh, iaculis vitae, viverra sit amet, ullamcorper vitae, turpis. Aliquam erat volutpat. Vestibulum dui sem, pulvinar sed, imperdiet nec, iaculis nec, leo. Fusce odio. Etiam arcu dui, faucibus eget, placerat vel, sodales eget, orci. Donec ornare neque ac sem. Mauris aliquet. Aliquam sem leo, vulputate sed, convallis at, ultricies quis, justo. Donec nonummy magna quis risus. Quisque eleifend. Phasellus tempor vehicula justo.</p>
        </div>
        <div class="col-12 col-md-4">

            <ul class="list-unstyled">
                @foreach($articles as $article)
                <div class="row ml-2">
                    <li>
                        <a href="/articles/{{ $article->id }}" class="text-decoration-none text-reset">
                            <h3>
                                {{ $article->title }}
                            </h3>
                            <p>{{ $article->excerpt }}</p>
                        </a>
                    </li>
                </div>
                @endforeach
            </ul>

            <div id="stwo-col" class="row">
                <div class="col-6 bg-info">
                    <h2>Etiam rhoncus</h2>
                    <ul class="style2">
                        <li><a href="#">Semper quis egetmi dolore</a></li>
                        <li><a href="#">Quam turpis feugiat dolor</a></li>
                        <li><a href="#">Amet ornare hendrerit lectus</a></li>
                        <li><a href="#">Quam turpis feugiat dolor</a></li>
                    </ul>
                </div>
                <div class="col-6 bg-danger">
                    <h2>Integer gravida</h2>
                    <ul class="style2">
                        <li><a href="#">Semper quis egetmi dolore</a></li>
                        <li><a href="#">Quam turpis feugiat dolor</a></li>
                        <li><a href="#">Consequat lorem phasellus</a></li>
                        <li><a href="#">Amet turpis feugiat amet</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
