@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Editar Registro de formacion academica</h5></center></div>
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

 		{!!Form::model($conoci,['method'=>'PATCH','route'=>['conocimientoAcademico.update',$conoci->idconocimientoacademino]])!!}
    {{Form::token()}}
 		<div class="form-group">
    		<label for="tipo">Tipo</label>
    		<select name="tipo" id="tipo" class="form-control">
    			<option selected value="{{$conoci->tipo}}">Seleccione una Opcion</option>
    			<option value="titulo">Titulo</option>
    			<option value="diploma">Diploma</option>
    			<option value="curso">Curso</option>
    		</select>
  		</div>

  		<div class="form-group">
    		<label for="nombre">Nombre</label>
    		<input type="nombre" name='nombre' value="{{$conoci->nombre}}" class="form-control" id="nombre" placeholder="Nombre...">
  		</div>

  		<div class="form-group">
    		<label for="institucionacademico">Institucion Academica</label>
    		<input type="institucionacademico" name='institucionacademico' value="{{$conoci->institucionacademico}}" class="form-control" id="institucionacademico" placeholder="Nombre de la Institucion Academica">
  		</div>
  		
  		<div class="form-group">
    		<label for="fechainicio">Fecha Inicio</label>
    		<input type="date"  name="fechainicio" value="{{$conoci->fechainicio}}" class="form-control" id="fechainicio" placeholder="yyyy/mm/dd">
  		</div>

  		<div class="form-group">
    		<label for="fechafin">Fecha Final</label>
    		<input type="date"  name="fechafin" value="{{$conoci->fechafin}}" class="form-control" id="fechafin" placeholder="yyyy/mm/dd">
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
        <a href="{{ url('conocimientoAcademico/show') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>
@endsection