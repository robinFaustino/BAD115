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

    @if(Auth::user()->usuario())

                <div class="form-group">
                  <label for="idpostulante">Postulante</label>
               <select name="idpostulante" id="idpostulante" class="form-control" required>
                 <option selected value="">-- Seleccione un postulante --</option>
                 @foreach($postulantes as $postulante)
                 <option value="{{$postulante->idpostulante}}"> {{$postulante->firtsname}}</option>
                 @endforeach
               </select>
                </div>
                @endif

      <div class="form-group">
        <label for="tipo">Tipo</label>
        <input type="tipo" name='tipo' class="form-control" id="titulo" placeholder="tipo...">
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