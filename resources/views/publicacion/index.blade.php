@extends ('admin.template.main')

@section ('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
					<br>
					<hr>
					
  			<div class="panel panel-default">
 				<div class="panel-heading">Publicaciones del postulante <strong> 
 					@foreach($nombre as $nombre)
 					{{$nombre}}
 					@endforeach
 				 </strong> </div>
 				<div class="panel-body">
 					<div class="row">
				        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            <div class="table-responsive">
				                <table class="table table-striped table-bordered table-condensed table-hover">
				                    <thead>
				                        <th>Tipo</th>
				                        <th>Titulo</th>
				                        <th>Lugar</th>
				                        <th>Fecha</th>
				                        <th>Edicion</th>
				                        <th>ISBN</th>
				                        <th>Acciones</th>
				                    </thead>
				                    @foreach ($publicacion as $publicacion)
				                    <tr>
				                        <td>{{ $publicacion->tipo}}</td>
				                        <td>{{ $publicacion->titulo}}</td>
				                        <td>{{ $publicacion->lugar}}</td>
				                        <td>{{ $publicacion->fecha}}</td>
				                        <td>{{ $publicacion->edicion}}</td>
				            			<td>{{ $publicacion->isbn}}</td>

				                        
				                        <td>
				                            <a href="{{route('publicacion.edit',$publicacion->idpubicacion)}}">
                      <button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-cog"></span>Editar
                      </button>
                    </a>
				                           <a href="#" data-target="#modal-delete-{{$publicacion->idpubicacion}}" data-toggle="modal">
                      <button type="button" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                      </button>
                    </a>
				                        </td>
				                    </tr>

				                    @include('publicacion.modal')
				                    
				                    @endforeach
				                </table>
				            </div>
				            
				        </div>
    				</div>
   				</div>
			</div>

			<a href="{{ url('publicacion/show') }}"><button class="btn btn-danger">Regresar</button></a>
		</div>
	</div>
</div>



@endsection