@extends ('admin.template.main')

@section ('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
					<br>
					<hr>
					
  			<div class="panel panel-default">
 				<div class="panel-heading">Recomendaciones del postulante</div>
 				<div class="panel-body">
 					<div class="row">
				        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            <div class="table-responsive">
				                <table class="table table-striped table-bordered table-condensed table-hover">
				                    <thead>
				                        <th>Nombre</th>
				                        <th>Telefono</th>
				                        <th>Correo</th>
				                        <th>Institucion</th>
				                        <th>Opciones</th>
				                    </thead>
				                    @foreach ($recomendacion as $recomendacion)
				                    <tr>
				                        <td>{{ $recomendacion->nombre}}</td>
				                        <td>{{ $recomendacion->telefono}}</td>
				                        <td>{{ $recomendacion->correo}}</td>
				                        <td>{{ $recomendacion->institucion}}</td>
				                        
				                        <td>
				                            <a href="{{route('recomendacion.edit',$recomendacion->idrecomendacion)}}">
                      <button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-cog"></span>Editar
                      </button>
                    </a>
				                           <a href="#" data-target="#modal-delete-{{$recomendacion->idrecomendacion}}" data-toggle="modal">
                      <button type="button" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                      </button>
                    </a>
				                        </td>
				                    </tr>

				                    @include('recomendacion.modal')
				                    
				                    @endforeach
				                </table>
				            </div>
				            
				        </div>
    				</div>
   				</div>
			</div>

			<a href="{{ url('/admin') }}"><button class="btn btn-danger">Regresar</button></a>
		</div>
	</div>
</div>



@endsection