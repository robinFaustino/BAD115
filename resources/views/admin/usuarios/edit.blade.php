@extends('admin.template.main')

@section('contenido')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<br>
			<hr>
			{!!Form::open(['route'=>['usuarios.update', $user], 'method'=>'PUT', 'autocomplete'=>'off', 'files'=>true])!!}
			<div class="panel panel-default">
				<div class="panel-heading">Editar Usuario</div>
					<div class="panel-body">
						
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" value="{{$user->nombre}}" class="form-control" id="nombre" required="">
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" name="email" value="{{$user->email}}" class="form-control" id="email" required>
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="New Password" required>
						</div>

						<div class="form-group">
							<label for="role_id">Tipo de Rol</label>
							<select name="role_id" id="role_id" class="form-control" required >
								<option value="">-- Seleccione un rol de usuario --</option>
								@foreach($roles as $role)
									<option value="{{$role->id}}">{{$role->nombre}}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
    							<button class="btn btn-primary" type="submit">Guardar</button>
    							<a href="{{route('usuarios.index')}}" class="btn btn-danger">Cancelar</a>
    						</div>
						{!!Form::close()!!}

					</div>
			</div>

		</div>
	</div>
</div>


@endsection