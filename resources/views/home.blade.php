@extends('admin.template.main')

@section('contenido')
<?php
  // Nombre corto de usuario autentificado.
  $rol = explode(' ', Auth::user()->role_id);
?>
<div class="row">
  <center>
   <h1>Bienvenido al Sistema de Bolsa de Trabajo en línea</h1> 
    <h2>Bases de Datos BAD1115-2019  </h2>
 </center> <br>
  <div class="col-md-4 col-md-offset-4" >

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive" src="{{ asset('img/base.jpg') }}" alt="User profile picture">
          <h3 class="profile-username text-center"> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</h3>
          @if($rol[0]==1)
          <h3 class="profile-username text-center"> Rol: Administrador</h3>
          @endif

           @if($rol[0]==2)
          <h3 class="profile-username text-center">Rol: Empresa</h3>
          @endif
           @if($rol[0]==3)
          <h3 class="profile-username text-center">Rol: Usuario</h3>
          @endif
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

</div>
@endsection
