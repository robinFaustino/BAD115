<?php

use App\Empresa;

?>

@extends ('admin.template.main')

@section ('contenido')



        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
              	<thead>
                  <th>Empresa</th>
              		<th>Nombre</th>
              		<th>Descripcion</th>
                  <th>Estado</th>
                  <th>Experiencia</th>
              		<th>Opciones</th>
              	</thead>
              	@foreach ($puestos as $puestos)
              	<tr>
                  <?php                 

                  $emp=Empresa::findOrFail($puestos->idempresa);

                  ?>
                  <td>{{$emp->nombre}}</td>
              		<td>{{$puestos->nombre}}</td>
              		<td>{{$puestos->descripcion}}</td>
                  <?php if($puestos->estado==0): ?>
                  <td>Inactivo</td>
                  <?php  else: ?>
              		<td>Activo</td>
                  <?php endif ?>
                  <td>{{$puestos->anosexp}} Año</td>
                  <td>
                    
                    <a href="{{URL::action('Puesto_TrabajoController@show', $puestos->idpuestotrabajo)}}">
                      <button type="button" class="btn btn-primary btn-xs">
                        <span class="glyphicon glyphicon-globe"></span>Publicar
                      </button>
                    </a>

                    <a href="{{URL::action('Puesto_TrabajoController@edit', $puestos->idpuestotrabajo)}}">
                      <button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-cog"></span>Editar
                      </button>
                    </a>

                    <a href="#" data-target="#modal-edit-{{$puestos->idpuestotrabajo}}" data-toggle="modal">
                      <button type="button" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                      </button>
                    </a>
                  </td>
              	</tr>
                @include('puesto.modal')
              	@endforeach
              </table>
            </div>
          </div>
        </div>


        <div class="form-group">
          <center>
              
              <a href="{{ url('empresas') }}"><button class="btn btn-danger">Regresar</button></a>
            </center>
        </div>
 

@endsection