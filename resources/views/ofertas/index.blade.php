<?php

use App\Empresa;

?>

@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h4>Ofertas de Puestos de Trabajo</h4></center></div>
 	<div class="panel-body">
 		
 		<table class="table table-striped table-bordered table-condensed table-hover">
              	<thead>
                  	<th>Empresa</th>
              		<th>Nombre</th>
              		<th>Descripcion</th>
                  
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
                    <td>{{$puestos->anosexp}} Año</td>
                  	<td>
                    
                    <a href="postulante/create">
                      <button type="button" class="btn btn-primary btn-xs">
                        <span class="glyphicon glyphicon-ok"></span>Aplicar
                      </button>
                    </a>

                  </td>
              	</tr>
                
        		@endforeach
        </table>

        <div class="form-group">
          <center>
              
              <a href="postulante"><button class="btn btn-primary">
              	<span class="glyphicon glyphicon-user"></span>  Perfil Postulante</button>
              </a>

            </center>
        </div>

 	</div>
</div>
@endsection