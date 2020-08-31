<!DOCTYPE html>
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : SimpleWork
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140225

-->
<html>
    <head>
        @include('layouts.head')
    </head>


    <body>
        @include('layouts.navbar')
        @yield('header')
        @yield('content')

        <div id="copyright" class="container">
            <p>&copy; MZ Apps. All rights reserved.</p>
        </div>

        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    </body>
</html>
