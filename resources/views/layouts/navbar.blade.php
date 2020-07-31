
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">LaraBlog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">

                        <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>

                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('about') }}">About us</a>
                        </li>

                        <li class="nav-item {{ Request::is('articles') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('articles.index') }}">Articles</a>
                        </li>

                        <li class="nav-item {{ Request::is('create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('articles.create') }}">Create Article</a>
                        </li>
                  </ul>
                </div>
            </nav>

