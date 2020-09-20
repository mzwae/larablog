<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
</head>


<body>
   <div class="container">
    @include('layouts.navbar')
    @yield('header')
    @yield('content')
   </div>

    <div id="copyright" class="container">
        <p>&copy; MZ Apps. All rights reserved.</p>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>
</body>
</html>
