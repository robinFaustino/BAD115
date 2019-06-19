@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Ingresar datos de Habilidad de Lenguaje</h5></center></div>
 	<div class="panel-body">

    @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach 
        </ul>   
      </div>
    @endif

 		{!! Form::open(array('url'=>'habilidad_lenguaje','method'=>'POST','autocomplete'=>'off')) !!}
        
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
        <center>
        <button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-warning" type="submit">Cancelar</button>       
        </center>
      </div>
      {!!Form::close()!!}

  </div>

</div>

<div class="form-group">
    <center>              
        <a href="{{ url('publicacion') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>
@endsection