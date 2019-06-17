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
			{!!Form::open(['route'=>['tipologro.update', $tipologro], 'method'=>'PUT', 'autocomplete'=>'off', 'files'=>true])!!}
			<div class="panel panel-default">
				<div class="panel-heading">Editar Recomendacion</div>
					<div class="panel-body">
						
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" value="{{$tipologro->nombre}}" class="form-control" id="nombre" required="">
						</div>

						<div class="form-group">
    							<button class="btn btn-primary" type="submit">Guardar</button>
    							<a href="{{route('tipologro.index')}}" class="btn btn-danger">Cancelar</a>
    						</div>
						{!!Form::close()!!}

					</div>
			</div>

		</div>
	</div>
</div>


@endsection