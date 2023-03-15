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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container col-md-8">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if(Route::getCurrentRoute()->getName() != 'login')
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                            @endif
                            @if(Route::getCurrentRoute()->getName() != 'register')
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="">
                                        {{ __('Perfil') }}
                                    </a>
                                </div>
                            </li>
                            <li>
                                <span data-feather="moon" style="cursor: pointer" onclick="toDark()" id="moon"></span>
                                <span data-feather="sun" style="cursor: pointer; display: none" id="sun"></span>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4" id="main">
           @yield('content')
        </main>

        @include('layouts.footer')

    </div>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

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
