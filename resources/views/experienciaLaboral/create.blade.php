@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Ingresar datos de la experiencia laboral obtenida</h5></center></div>
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

 		{!! Form::open(array('url'=>'experienciaLaboral','method'=>'POST','autocomplete'=>'off')) !!}
 		<div class="form-group">
      <label for="nombrepuesto">Nombre del Puesto</label>
      <input type="nombrepuesto" name='nombrepuesto' class="form-control" id="nombrepuesto" placeholder="Ingrese el nombre del puesto...">
    </div>

    <div class="form-group">
      <label for="fechainicio">Fecha Inicio</label>
      <input type="date"  name="fechainicio" class="form-control" id="fechainicio" placeholder="yyyy/mm/dd">
    </div>

    <div class="form-group">
      <label for="fechafin">Fecha Final</label>
      <input type="date"  name="fechafin" class="form-control" id="fechafin" placeholder="yyyy/mm/dd">
    </div>

    <div class="form-group">
      <label for="funcion">Funcion</label>
      <input type="funcion" name='funcion' class="form-control" id="funcion" placeholder="Ingrese el nombre del funcion que desempeñado...">
    </div>

    <div class="form-group">
      <label for="nombreorganizacion">Nombre de la organizacion</label>
      <input type="nombreorganizacion" name='nombreorganizacion' class="form-control" id="nombreorganizacion" placeholder="Ingrese el nombre de la organizacion...">
    </div>

    <div class="form-group">
      <label for="telefonoorganizacion">Telefono de la organizacion</label>
      <input type="telefonoorganizacion" name='telefonoorganizacion' class="form-control" id="telefonoorganizacion" placeholder="XXXX-XXXX">
    </div>

    <div class="form-group">
      <label for="correoorganizacion">Correo de la organizacion</label>
      <input type="email"  name="correoorganizacion" class="form-control" id="correoorganizacion" placeholder="Example@mail.com">
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
        <a href="{{ url('experienciaLaboral') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>
@endsection