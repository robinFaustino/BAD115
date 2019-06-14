<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title','Default')| panel de Administracion</title>
	<link rel="stylesheet" href="{{ asset('pluglins/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('pluglins/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('pluglins/bootstrap/css/workaround.css') }}">
  <link rel="stylesheet" href="{{ asset('pluglins/bootstrap/css/dashboard.css') }}">
  
</head>
<?php
  // Nombre corto de usuario autentificado.
  $nombre = explode(' ', Auth::user()->nombre);
?>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Base de datos</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('imagen/users/user_default.jpg') }}" class="user-image img-circle" alt="Imagen de usuario" height="30px" >
              <span class="hidden-xs">{{ $nombre[0] }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('imagen/users/user_default.jpg') }}" class="user-image img-circle" alt="Imagen de usuario" height="200px">
                <p align="center">
                  {{ $nombre[0] }}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('home') }}" class="btn btn-default btn-flat">Inicio</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar sesión</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          </ul>
        </div>
      </div>
</nav>


<div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>

          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <section>
              @include('flash::message')
              @yield('contenido')
            </section>
          </div>
        </div>
    </div>
</div>







	<script src="{{ asset('pluglins/jquery/js/jquery.js') }}"></script>
	<script src="{{ asset('pluglins/bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ asset('pluglins/bootstrap/js/modes-warning.js') }}"></script>
</body>
</html>