@extends ('admin.template.main')

@section ('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
					<br>
					<hr>
					
  			<div class="panel panel-default">
 				<div class="panel-heading">Publicaciones del postulante</div>
 				<div class="panel-body">
 					<div class="row">
				        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            <div class="table-responsive">
				                <table class="table table-striped table-bordered table-condensed table-hover">
				                    <thead>
				                        <th>Tipo</th>
				                        <th>Nivel</th>
				                        <th>Acciones</th>
				                    </thead>
				                    @foreach ($habilidadLenguaje as $habilidadLenguaje)
				                    <tr>
				                        <td>{{ $habilidadLenguaje->tipo}}</td>
				                        <td>{{ $habilidadLenguaje->nivel}}</td>
				                        <td>
				                            <a href="{{route('habilidad_lenguaje.edit',$habilidadLenguaje->idhabilidadlenguaje)}}">
                      <button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-cog"></span>Editar
                      </button>
                    </a>
				                           <a href="#" data-target="#modal-delete-{{$habilidadLenguaje->idhabilidadlenguaje}}" data-toggle="modal">
                      <button type="button" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                      </button>
                    </a>
				                        </td>
				                    </tr>

				                    @include('habilidadLenguaje.modal')
				                    
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