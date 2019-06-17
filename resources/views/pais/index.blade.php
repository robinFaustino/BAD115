@extends ('admin.template.main')

@section ('contenido')

<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
					<br>
					<hr>
					
  			<div class="panel panel-default">
 				<div class="panel-heading">Pais</div>
 				<div class="panel-body">
 					<div class="row">
				        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            <div class="table-responsive">
				                <table class="table table-striped table-bordered table-condensed table-hover">
				                    <thead>
				                        <th>Nombre</th>
				                        <th>Continente</th>
				                        
				                    </thead>
				                    @foreach ($pais as $pais)
				                    <tr>
				                        <td>{{ $pais->nombre}}</td>
				                        <td>{{ $pais->continente}}</td>
				                        				                        
				                        <td>
				                            <a href="{{route('pais.edit',$pais->idpais)}}">
                      <button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-cog"></span>Editar
                      </button>
                    </a>
				                           <a href="#" data-target="#modal-delete-{{$pais->idpais}}" data-toggle="modal">
                      <button type="button" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                      </button>
                    </a>
				                        </td>
				                    </tr>

				                    @include('pais.modal')
				                    
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