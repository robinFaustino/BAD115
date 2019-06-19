@extends('admin.template.main')

@section('contenido')

@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
  <ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<br>
			<hr>
			{!!Form::open(['route'=>['recomendacion.update', $recomendacion], 'method'=>'PUT', 'autocomplete'=>'off', 'files'=>true])!!}
			<div class="panel panel-default">
				<div class="panel-heading">Editar Recomendacion</div>
					<div class="panel-body">
						
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" value="{{$recomendacion->nombre}}" class="form-control" id="nombre" required="">
						</div>

						<div class="form-group">
    							<label for="telefono">telefono</label>
    							<input type="numeric" name='telefono' value="{{ $recomendacion->telefono }}" class="form-control" id="telefono" placeholder="9999-9999" required>
  						</div>

						<div class="form-group">
							<label for="correo">Correo</label>
							<input type="text" name="correo" value="{{$recomendacion->correo}}" class="form-control" id="correo" required>
						</div>

						<div class="form-group">
							<label for="institucion">Institucion </label>
							<input type="text" name="institucion" value="{{$recomendacion->institucion}}" class="form-control" id="institucion" required>
						</div>

						<div class="form-group">
    							<button class="btn btn-primary" type="submit">Guardar</button>
    							<a href="{{route('recomendacion.index')}}" class="btn btn-danger">Cancelar</a>
    						</div>
						{!!Form::close()!!}

					</div>
			</div>

		</div>
	</div>
</div>


@endsection