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
			{!!Form::open(['route'=>['pais.update', $pais], 'method'=>'PUT', 'autocomplete'=>'off', 'files'=>true])!!}
			<div class="panel panel-default">
				<div class="panel-heading">Editar Pais</div>
					<div class="panel-body">
						
    
     <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="nombre" name='nombre' class="form-control" value="{{ $pais->nombre}}" id="nombre" placeholder="Nombre..." required>
      </div>

 		<div class="form-group">
    		<label for="continente">Continente</label>
    		<select name="continente" id="continente" class="form-control" required>
    			<option selected value="">-- Seleccione una Opcion --</option>
    			<option value="america">America</option>
    			<option value="asia">Asia</option>
          <option value="europa">Europa</option>
          <option value="africa">Africa</option>
          <option value="oceania">Oceania</option>
    		</select>
  		</div>

  		
						<div class="form-group">
    							<button class="btn btn-primary" type="submit">Guardar</button>
    							<a href="{{route('pais.index')}}" class="btn btn-danger">Cancelar</a>
    						</div>
						{!!Form::close()!!}

					</div>
			</div>

		</div>
	</div>
</div>


@endsection