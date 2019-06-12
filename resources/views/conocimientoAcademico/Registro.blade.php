@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center>Conocimientos Academicos</center></div>
 	<div class="panel-body">
	
 		<div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">

              	<thead>
                  	<th>Tipo</th>
              		<th>Nombre</th>
              		<th>Institucion</th>
              	    <th>Fecha Inicio</th>
                    <th>Fecha Finalizacion</th>
              		<th>Opciones</th>
              	</thead>
              	@foreach ($conoci as $conoci)
              	<tr>
              		<td>{{$conoci->tipo}}</td>
              		<td>{{$conoci->nombre}}</td>
              		<td>{{$conoci->institucionacademico}}</td>
              		<td>{{$conoci->fechainicio}}</td>
              		<td>{{$conoci->fechafin}}</td>
              		<td>
              			<a href="{{URL::action('Conocimiento_AcademicoController@edit', $conoci->idconocimientoacademino)}}">
                      		<button type="button" class="btn btn-info btn-xs">
                        		<span class="glyphicon glyphicon-cog"></span>Editar
                      		</button>
                    	</a>

                    	<a href="" data-target="#modal-delete-{{$conoci->idconocimientoacademino}}" data-toggle="modal">
                      		<button type="button" class="btn btn-danger btn-xs">
                        		<span class="glyphicon glyphicon-trash"></span>Eliminar
                      		</button>
                    	</a>
              		</td>
              	</tr>
              	@include('conocimientoAcademico.modal')
              	@endforeach
              </table>
            </div>
          </div>
        </div>

	</div>
</div>

<div class="form-group">
    <center>              
        <a href="{{ url('conocimientoAcademico') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>

@endsection