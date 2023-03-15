<!---  Algoritmo simples pra identificar rota e adcionar active a nav   -->
@php
    $currentRota = Route::getCurrentRoute()->getName()
@endphp
@php
    $rotas = ["home", "relatorios", "membros", "novaVida", "backup"]
@endphp
@php
    $index = []
@endphp

@foreach($rotas as $indice => $rota)
    @if(str_contains($currentRota, $rota))
        @php
            $index[$indice] = "active";
        @endphp
    @else
        @php
            $index[$indice] = " ";
        @endphp
    @endif
@endforeach

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column position-static">
            <li class="nav-item">
                <a class="nav-link {{ $index[0] }}" href="{{ route('home') }}">
                    <span data-feather="home"></span>
                    Visão Geral
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $index[1] }}" href="{{ route('relatorios') }}">
                    <span data-feather="file"></span>
                    Relatórios
                </a>
            </li>
            <li class="accordion" id="accordionMembros">
            <div class="accordion-item border-top-0 border-bottom-0">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="nav-link {{ $index[2] }} accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                <span data-feather="users"></span>
                    Membros
                </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <a class="nav-link" href="{{ route('membros-create-form') }}">
                            <span data-feather="user-plus" class="feather-accordion-body"></span>
                            Adcionar
                        </a>
                        <a class="nav-link" href="{{ route('membros-view') }}">
                            <span data-feather="eye" class="feather-accordion-body"></span>
                            Visualizar
                        </a>
                    </div>
                </div>
            </div>
            </li>

            <li class="nav-item mt-auto">
                <a class="nav-link {{ $index[3] }}" href="{{ route('novaVida') }}">
                    <span data-feather="heart"></span>
                    Nova Vida
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link {{ $index[4] }}" href="{{ route('backup') }}">
                    <span data-feather="database"></span>
                    Backups
                </a>
            </li>
        </ul>
    </div>
</nav>
<main>

</main>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>



<style>
    body {
        font-size: .900rem;
    }

    .navbar-collapse {
        position: relative;
    }


    .nav-link {
        position: relative;
    }

    .navbar-nav {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 1000;
    }

    /*
   * Sidebar
   */

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        /* Behind the navbar */
        padding: 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 48px;
        /* Height of navbar */
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }


    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    /*
   * Navbar
   */



    .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
    }

    .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }

    /*
   * Utilities
   */

    .border-top {
        border-top: 1px solid #e5e5e5;
    }

    .border-bottom {
        border-bottom: 1px solid #e5e5e5;
    }


</style>
