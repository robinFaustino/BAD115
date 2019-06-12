@extends ('admin.template.main')

@section ('contenido')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
					<br>
					<hr>
					
  			<div class="panel panel-default">
 				<div class="panel-heading">Ver Usuarios</div>
 				<div class="panel-body">

 					<div class="row">
				        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            <div class="table-responsive">
				                <table class="table table-striped table-bordered table-condensed table-hover">
				                    <thead>
				                        <th>Id</th>
				                        <th>Nombre</th>
				                        <th>Correo</th>
				                        <th>Opciones</th>
				                    </thead>
				                    @foreach ($user as $user)
				                    <tr>
				                        <td>{{ $user->id}}</td>
				                        <td>{{ $user->nombre}}</td>
				                        <td>{{ $user->email}}</td>
				                        <td>
				                            <a href="#"><button class="btn btn-info">Editar</button></a>
				                            <a href="#" data-target="#" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
				                        </td>
				                    </tr>
				                    
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