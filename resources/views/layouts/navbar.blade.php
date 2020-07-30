  <div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><a href="/">Brand</a></h1>
        </div>
        <div id="menu">
            <ul>
                <li class="{{ Request::is('/') ? 'current_page_item' : ''}}"><a href="/" accesskey="1" title="">Homepage</a></li>
                <li class="{{ Request::is('about') ? 'current_page_item' : ''}}"><a href="/about" accesskey="3" title="">About Us</a></li>
                <li class="{{ Request::is('articles') ? 'current_page_item' : ''}}"><a href="/articles" accesskey="4" title="">Articles</a></li>
                <li class="{{ Request::is('create') ? 'current_page_item' : ''}}"><a href="{{route('articles.create')}}" accesskey="5" title="">Create Article</a></li>
            </ul>
        </div>
    </div>
