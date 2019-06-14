@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center>Experiencia Laboral</center></div>
 	<div class="panel-body">
	
 		<div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">

              	<thead>
                  <th>Puesto</th>
              		<th>Fecha Inicio</th>
              		<th>Fecha Finalizacion</th>
              	  <th>Organizacion</th>
                  <th>Telefono</th>
              		<th>Opciones</th>
              	</thead>
              	@foreach ($experiencia as $expe)
              	<tr>
              		<td>{{$expe->nombrepuesto}}</td>
              		<td>{{$expe->fechainicio}}</td>
              		<td>{{$expe->fechafin}}</td>
              		<td>{{$expe->nombreorganizacion}}</td>
              		<td>{{$expe->telefonoorganizacion}}</td>
              		<td>
              			<a href="{{URL::action('ExperienciaLaboralController@edit', $expe->idexperiencialaboral)}}">
                      		<button type="button" class="btn btn-info btn-xs">
                        		<span class="glyphicon glyphicon-cog"></span>Editar
                      		</button>
                    	</a>

                    	<a href="" data-target="#modal-delete-{{$expe->idexperiencialaboral}}" data-toggle="modal">
                      		<button type="button" class="btn btn-danger btn-xs">
                        		<span class="glyphicon glyphicon-trash"></span>Eliminar
                      		</button>
                    	</a>
              		</td>
              	</tr>
              	@include('experienciaLaboral.modal')
              	@endforeach
              </table>
            </div>
          </div>
        </div>

	</div>
</div>

<div class="form-group">
    <center>              
        <a href="{{ url('experienciaLaboral') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>

@endsection