<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Ticketmaster -> @yield('titulo')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="\ccs\dashboard.css" rel="stylesheet">
  </head>
  <body>

    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/admin/dashboard">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/artists">
              <span data-feather="layers"></span>
              Artists
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/categories">
              <span data-feather="layers"></span>
              Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/events">
              <span data-feather="layers"></span>
              Events
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/places">
              <span data-feather="layers"></span>
              Places
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/promotions">
              <span data-feather="layers"></span>
              Promotions
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/purchases">
              <span data-feather="layers"></span>
              Purchases
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/reviews">
              <span data-feather="layers"></span>
              Reviews
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/seats">
              <span data-feather="layers"></span>
              Seats
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tickets">
              <span data-feather="layers"></span>
              Tickets
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users">
              <span data-feather="layers"></span>
              Users
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <main class="container">
        @yield('contenido')
      </main>
    </main>
  </div>
</div>


    <script src="/assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="\ccs\dashboard.js"></script>
  </body>
</html>
