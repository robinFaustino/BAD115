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
            
    @if(Auth::user()->usuario())

                <div class="form-group">
                  <label for="idpostulante">Postulante</label>
               <select name="idpostulante" id="idpostulante" class="form-control" required>
                 <option selected value="">-- Seleccione un postulante --</option>
                 @foreach($postulante as $postulante)
                 <option value="{{$postulante->idpostulante}}"> {{$postulante->firtsname}}</option>
                 @endforeach
               </select>
                </div>
                @endif

      <div class="form-group">
        <label for="tipo">Tipo</label>
        <input type="tipo" name='tipo' class="form-control" id="titulo" value="{{$habilidadLenguaje->tipo}}" placeholder="tipo...">
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
