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
  $rol = explode(' ', Auth::user()->role_id);
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
            <li class="active"><a href="#"> {{ $nombre[0] }} <span class="sr-only">(current)</span></a></li>


            @if($rol[0]==2)
            <li><a href="empresas/create">Ofertar un Nuevo Puesto Trabajo</a></li>
            <li><a href="{{ url('puesto') }}">Lista de Puesto</a></li>
            <!--<li><a href="empresas_ofertar">Ofertas</a></li>-->
            <li><a href="{{ route('empresas.candidatos') }}">Candidatos</a></li>
            <li><a href="{{ url('examenes') }}">Examenes</a></li>
            <li><a href="{{ url('tipoexamen') }}">Tipo de Examen</a></li>
            @endif

            @if($rol[0]==1)
            <li><a href="{{ url('admin') }}">Perfil</a></li>
            <li><a href="{{ url('admin/usuarios') }}">Ver Usuarios </a></li>
            <li><a href="{{ url('admin/usuario') }}">Crear Usuario</a></li>
            <li><a href="{{ url('idioma') }}">Idiomas</a></li>
            <li><a href="{{ url('pais') }}">Paises</a></li>
            @endif

          @if($rol[0]==3)
            <li><a href="{{ url('ofertas') }}">Ofertas</a></li>
            <li><a href="{{  url('postulante') }}">Postulante</a></li>
            <li><a href="{{ url('conocimientoAcademico') }}">Conocimiento Academico</a></li>
            <li><a href="{{ url('recomendacion') }}">Recomendacion</a></li>
            <li><a href="{{ url('experienciaLaboral') }}">Experiencia Laboral</a></li>
            <li><a href="{{ url('certificacion') }}">Certificacion </a></li>
            <li><a href="{{ url('publicacion') }}">Publicación </a></li>
            <li><a href="{{ url('experienciaLaboral') }}">Experiencia Laboral</a></li>
            <li><a href="{{ url('logro') }}">Logros</a></li>
            <li><a href="{{ url('habilidad_lenguaje') }}">Habilidad de Lenguaje</a></li>
          </ul>
        @endif



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
  @yield('script')
  <!-- jQuery 2.1.4 -->
  <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
  <script src="{{asset('js/departamento.js')}}"></script>
  <script src="{{asset('js/municipio.js')}}"></script>
</body>
</html>