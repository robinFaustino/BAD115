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
			{!!Form::open(['route'=>['logro.update', $logro], 'method'=>'PUT', 'autocomplete'=>'off', 'files'=>true])!!}
      <div class="panel panel-default">
        <div class="panel-heading">Editar Publicacion</div>
          <div class="panel-body">

    <div class="form-group">
        <label for="idtipologro">Tipo</label>
        <select name="idtipologro" id="idtipologro" class="form-control" required >
          <option selected value="">-- Seleccione un tipo --</option>
          @foreach($tipologro as $tipologro)
          <option value="{{$tipologro->idtipologro}}">{{$tipologro->nombre}}</option>
          @endforeach
        </select>
      </div>

       <div class="form-group">
        <label for="fechainicio">Fecha Inicio</label>
        <input type="date"  name="fechainicio" class="form-control" id="fechainicio" value="{{$logro->fechainicio}}" placeholder="yyyy/mm/dd">
      </div>

       <div class="form-group">
        <label for="fechafin">Fecha Fin</label>
        <input type="date"  name="fechafin" class="form-control" id="fechafin" value="{{$logro->fechafin}}" placeholder="yyyy/mm/dd">
      </div>

<div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="descripcion"  name="descripcion" class="form-control" id="edicion" value="{{$logro->descripcion}}" placeholder="Descripcion">
      </div>

      <div class="form-group">
        <label for="institucion">Institucion</label>
        <input type="institucion"  name="institucion" class="form-control" value="{{$logro->institucion}}" id="institucion" placeholder="Institucion">
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
