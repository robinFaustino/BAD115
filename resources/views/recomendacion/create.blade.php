@extends ('admin.template.main')

@section ('contenido')

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

					{!! Form::open(array('url'=>'recomendacion','method'=>'POST','autocomplete'=>'off')) !!}

  					<div class="panel panel-default">
 						<div class="panel-heading">Crear recomendacion</div>
 						<div class="panel-body">
    
							<div class="form-group">
    							<label for="nombre">Nombre</label>
    							<input type="nombre" name='nombre' class="form-control" id="nombre" placeholder="Nombre..." required>
              </div>

  							<div class="form-group">
    							<label for="telefono">telefono</label>
    							<input type="numeric" name='telefono' class="form-control" id="telefono" placeholder="9999-9999" required>
  							</div>

                <div class="form-group">
                  <label for="correo">Correo</label>
                  <input type="correo" name='correo' class="form-control" id="correo" placeholder="example@gmail.com" required>
                </div>

  							<div class="form-group">
                  <label for="nombre">Institucion</label>
                  <input type="institucion" name='institucion' class="form-control" id="instirucion" placeholder="Institucion" required>
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
