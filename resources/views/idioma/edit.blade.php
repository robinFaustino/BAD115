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
			{!!Form::open(['route'=>['idioma.update', $idioma], 'method'=>'PUT', 'autocomplete'=>'off', 'files'=>true])!!}
			<div class="panel panel-default">
				<div class="panel-heading">Editar Idioma</div>
					<div class="panel-body">

					<div class="form-group">
                  <label for="idhabilidadlenguaje">Habilidad Lenguaje</label>
               <select name="idhabilidadlenguaje" id="idhabilidadlenguaje" class="form-control" required>
                 <option selected value="">-- Seleccione un postulante --</option>
                 @foreach($habilidadLenguaje as $habilidadLenguaje)
                 <option value="{{$habilidadLenguaje->idhabilidadlenguaje}}"> {{$habilidadLenguaje->tipo}}</option>
                 @endforeach
               </select>
                </div>
						
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" value="{{$idioma->nombre}}" class="form-control" id="nombre" required="">
						</div>

						<div class="form-group">
    							<button class="btn btn-primary" type="submit">Guardar</button>
    							<a href="{{route('idioma.index')}}" class="btn btn-danger">Cancelar</a>
    						</div>
						{!!Form::close()!!}

					</div>
			</div>

		</div>
	</div>
</div>


@endsection