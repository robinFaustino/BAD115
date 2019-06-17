@extends ('admin.template.main')

@section ('contenido')

<div class="panel panel-default">
  <div class="panel-heading"><center><h5>Ingresar datos de Publicacion</h5></center></div>
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

      {!! Form::open(array('url'=>'logro','method'=>'POST','autocomplete'=>'off')) !!}

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
        <label for="idtipologro">Tipo de logro</label>
        <select name="idtipologro" id="idtipologro" class="form-control" required>
          <option selected value="">-- Seleccione una Opcion --</option>
            @foreach($tipologro as $tipologro)
          <option value="{{$tipologro->idtipologro}}">{{$tipologro->nombre}}</option>
            @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="fechainicio">Fecha Inicio</label>
        <input type="date"  name="fechainicio" class="form-control" id="fechainicio" placeholder="yyyy/mm/dd">
      </div>

       <div class="form-group">
        <label for="fechafin">Fecha Fin</label>
        <input type="date"  name="fechafin" class="form-control" id="fechafin" placeholder="yyyy/mm/dd">
      </div>

<div class="form-group">
        <label for="descripcion">Descripcion</label>
        <input type="descripcion"  name="descripcion" class="form-control" id="edicion" placeholder="Edicion del libro">
      </div>

      <div class="form-group">
        <label for="institucion">Institucion</label>
        <input type="institucion"  name="institucion" class="form-control" id="institucion" placeholder="Institucion">
      </div>



      {!!Form::close()!!}


    </div>

</div>

<div class="form-group">
    <center>              
        <a href="{{ url('publicacion.index') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>

@endsection