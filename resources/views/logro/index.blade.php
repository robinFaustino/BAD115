@extends ('admin.template.main')

@section ('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
					<br>
					<hr>
					
  			<div class="panel panel-default">
 				<div class="panel-heading">Logros del Postulante 
 					<strong>
 						@foreach($nombre as $nombre)
 						{{$nombre}}
 						@endforeach
 					</strong>
 				</div>
 				<div class="panel-body">
 					<div class="row">
				        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            <div class="table-responsive">
				                <table class="table table-striped table-bordered table-condensed table-hover">
				                    <thead>
				                        <th>Logro</th>
				                        <th>Fecha Inicio</th>
				                        <th>Fecha Fin</th>
				                        <th>Descripcion</th>
				                        <th>Institucion</th>
				                        <th>Acciones</th>
				                    </thead>
				                    @foreach ($logro as $logro)
				                    <tr>
				                        <td>{{ $logro->idtipologro}}</td>
				                        <td>{{ $logro->fechainicio}}</td>
				                        <td>{{ $logro->fechafin}}</td>
				                        <td>{{ $logro->descripcion}}</td>
				            			<td>{{ $logro->institucion}}</td>

				                        
				                        <td>
				                            <a href="{{route('logro.edit',$logro->idlogro)}}">
                      <button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-cog"></span>Editar
                      </button>
                    </a>
				                           <a href="#" data-target="#modal-delete-{{$logro->idlogro}}" data-toggle="modal">
                      <button type="button" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                      </button>
                    </a>
				                        </td>
				                    </tr>

				                    @include('logro.modal')
				                    
				                    @endforeach
				                </table>
				            </div>
				            
				        </div>
    				</div>
   				</div>
			</div>

			<a href="{{ url('logro/show') }}"><button class="btn btn-danger">Regresar</button></a>
		</div>
	</div>
</div>



@endsection