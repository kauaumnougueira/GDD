<nav class="col-md-2 d-none d-md-block bg-light sidebar pb-4 pt-4">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $index[0] }}" href="{{ route('home') }}">
                    <span data-feather="home"></span>
                    Visão Geral <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $index[1] }}" href="{{ route('relatorios') }}">
                    <span data-feather="file"></span>
                    Relatórios
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link {{ $index[2] }} dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <span data-feather="users"></span>
                    Membros
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    @if(Auth::user()->cargo_id == $cargos[0]->id)
                    <a class="dropdown-item" href="{{ route('membros-edit') }}">Adcionar</a>
                    @endif
                    <a class="dropdown-item" href="{{ route('membros-view') }}">Visualizar</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $index[3] }}" href="{{ route('novaVida') }}">
                    <span data-feather="heart"></span>
                    Nova Vida
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $index[4] }}" href="{{ route('backup') }}">
                    <span data-feather="database"></span>
                    Backups
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

<style>
    body {
    font-size: .900rem;
  }

  .feather {
    width: 25px;
    height: 25px;
    vertical-align: text-bottom;
  }

  /*
   * Sidebar
   */

  .sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    z-index: 100; /* Behind the navbar */
    padding: 0;
    box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
  }

  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
    top: 48px; /* Height of navbar */
    height: calc(100vh - 48px);
    padding-top: .5rem;
    overflow-x: hidden;
    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
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

  .border-top { border-top: 1px solid #e5e5e5; }
  .border-bottom { border-bottom: 1px solid #e5e5e5; }

</style>
