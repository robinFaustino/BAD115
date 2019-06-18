<?php

use App\Empresa;

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
                    <th>Empresa</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Proceso</th>
                    <th>Examen</th>
                  </thead>
                  @foreach ($puestoTrabajo as $puesto)
                <tr>
                  
                  <?php                 

                  $emp=Empresa::findOrFail($puesto->idempresa);

                  ?>
                  <td>{{$emp->nombre}}</td>
                  <td>{{$puesto->nombre}}</td>
                  <td>{{$puesto->descripcion}}</td>
                  <td>{{$puesto->estado}}</td>
                  <td>{{}}</td>
                  <td>{{}}</td>
                  <td>
                    
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