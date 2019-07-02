@extends('admin.template.main')

@section('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Ingrese el Tipo de Examen</h5></center></div>
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


{!! Form::open(array('url'=>'tipoexamen','method'=>'POST','autocomplete'=>'off')) !!}

 		<div class="form-group">
      <label for="nombre">Nombre del Tipo de Examen</label>
      <input type="nombre" name='nombre' class="form-control" id="nombre" placeholder="Ingrese el nombre del tipo de examen..." required>
    </div>

         
  	<div class="form-group">
  		<center>
    		<button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-warning" type="submit">Cancelar</button>    		
    	</center>
    </div>
    {!!Form::close()!!}



@endsection