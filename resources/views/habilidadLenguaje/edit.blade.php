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
			{!!Form::open(['route'=>['habilidad_lenguaje.update', $habilidadLenguaje], 'method'=>'PUT', 'autocomplete'=>'off', 'files'=>true])!!}
      <div class="panel panel-default">
        <div class="panel-heading">Editar Habilidad de Lenguaje</div>
          <div class="panel-body">
            
    <div class="form-group">
        <label for="ididioma">Idioma</label>
        <select name="ididioma" id="ididioma" class="form-control">
          <option selected value="">-- Seleccione una Opcion --</option>
          @foreach($idioma as $idioma)
          <option value="{{ $idioma->ididioma }}">{{ $idioma->nombre }}</option>
          @endforeach
        </select>
      </div>
        
      <div class="form-group">
        <label for="tipo">Tipo</label>
        <select id="tipo" name='tipo' class="form-control">
          <option selected value="">-- Seleccione una Opcion --</option>
          <option value="Escritura"> Escritura</option>
          <option value="Lectura"> Lectura</option>
          <option value="Conversacion"> Conversacion</option>
          <option value="Escucha"> Escucha</option>
        </select>
      </div>

        <div class="form-group">
        <label for="nivel">Nivel</label>
        <select name="nivel" id="nivel" class="form-control">
          <option selected value="">-- Seleccione una Opcion --</option>
          <option value="Alto">Alto</option>
          <option value="Medio">Medio</option>
          <option value="Bajo">Bajo</option>
        </select>
      </div>

            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <a href="{{route('logro.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            {!!Form::close()!!}

          </div>
      </div>

		</div>
	</div>
</div>
@endsection
