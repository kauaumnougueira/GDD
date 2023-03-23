<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ url('storage\app\public\img\icone_app.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts  -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        @if(Route::getCurrentRoute()->getName() != 'login' &&  Route::getCurrentRoute()->getName() != 'register')
            @include('layouts.sidenav')
        @endif

        @include('layouts.header')

        <main class="py-4" id="content">
           @yield('content')
        </main>

        @include('layouts.footer')

    </div>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <!--

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '#link_ajax', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');
            $.get(url, function(response) {
                $('#content').html(response);
            });
        });
    </script>

     -->
    <style>

        .feather {
            width: 25px;
            height: 25px;
            vertical-align: text-bottom;
        }

        .feather-accordion-body{
            width: 20px;
            height: 20px;
            vertical-align: text-bottom;
        }
    </style>

    <script>
        //dark
        let sun = document.getElementById("sun")
        let moon = document.getElementById("moon")
        let body = document.querySelector('body')

        function toDark(){
            //trocar icon
            if(moon.style.display === ""){
                moon.style.display = "none"
                sun.style.display = ""
                sun.addEventListener("click", toLight)
                body.classList.toggle('dark-mode');
            }
        }

        function toLight(){
            //trocar ícon
            if(sun.style.display === ""){
                sun.style.display = "none"
                moon.style.display = ""
            }

        }
    </script>

</body>
</html>
