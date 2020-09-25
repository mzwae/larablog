<!DOCTYPE html>
<html>
<head>
    @include('layouts.head')

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
        }

        #wrap {
            min-height: 100%;
        }

        #main {
            overflow: auto;
            padding-bottom: 180px;
            /* must be same height as the footer */
        }

        #footer {
            position: relative;
            margin-top: -180px;
            /* negative value of footer height */
            height: 180px;
            clear: both;
            background-color: grey;
        }


        /* Opera Fix thanks to Maleika (Kohoutec) */

        body:before {
            content: "";
            height: 100%;
            float: left;
            width: 0;
            margin-top: -32767px;
            /* thank you Erik J - negate effect of float*/
        }

    </style>


</head>


<body>
    <div class="container" id="wrap">

        <div id="main">


            @include('layouts.navbar')
            @yield('header')
            @yield('content')
        </div>
    </div>

    @include('layouts.partials.footer')




    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>
</body>
</html>
