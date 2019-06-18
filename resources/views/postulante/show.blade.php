<?php

use App\Empresa;
use App\Postulante;
use App\Puesto_Trabajo;

?>
@extends ('admin.template.main')

@section ('contenido')

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Proceso de postulaciones</h1>
        <div class="row">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Empresa</th>
                    <th>Opciones</th>
                  </thead>
                  @foreach ($puesto_postu as $puesto_postu)
                  <tr>
                  <?php                 

                  $pos=Postulante::findOrFail($puesto_postu->idpostulante);
                  $pues=Puesto_Trabajo::findOrFail($puesto_postu->idpuestotrabajo);
                  $emp=Empresa::findOrFail($pues->idempresa)

                  ?>
                  <td>{{$pos->lastname}}, {{$pos->firtsname}}</td>
                  <td>{{$pues->nombre}}</td>
                  <td>{{$emp->nombre}}</td>
                  <?php if($puesto_postu->estado==0): ?>
                  <td>No enviado</td>
                  <?php  else: ?>
                  <td>Enviado</td>
                  <?php endif ?>
                  <td>
                    <a href="enviarOferta/{{$puesto_postu->id}}">
                      <button type="button" class="btn btn-primary btn-xs">
                        <span class="glyphicon glyphicon-globe"></span>Enviar
                      </button>
                    </a>
                    <a href="#">
                      <button type="button" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                      </button>
                    </a>
                  </td>
                  </tr>
                @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <hr>
<div class="form-group">
    <center>              
        <a href="{{ url('postulante') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>

</main>

@endsection