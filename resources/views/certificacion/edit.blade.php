@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Editar datos de la Certificacion</h5></center></div>
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

 		{!!Form::model($certi,['method'=>'PATCH','route'=>['certificacion.update',$certi->idcertificacion]])!!}
    {{Form::token()}}
 		<div class="form-group">
      <label for="titulo">Titulo</label>
      <input type="titulo" name='titulo' value="{{$certi->titulo}}" class="form-control" id="titulo" placeholder="Ingrese el nombre de la certificacion...">
    </div>

    <div class="form-group">
      <label for="tipo">Tipo de certificacion</label>
      <input type="tipo" name='tipo' value="{{$certi->tipo}}" class="form-control" id="tipo" placeholder="Tipo de certificacion...">
    </div>

    <div class="form-group">
      <label for="codigo">Codigo</label>
      <input type="codigo" name='codigo' value="{{$certi->codigo}}" class="form-control" id="codigo" placeholder="Codigo de certificacion...">
    </div>

    <div class="form-group">
      <label for="institucion">Nombre de la Institucion</label>
      <input type="institucion" name='institucion' value="{{$certi->institucion}}" class="form-control" id="institucion" placeholder="Nombre de la Institucion...">
    </div>

    <div class="form-group">
      <label for="fechainicio">Fecha Inicio</label>
      <input type="date"  name="fechainicio" value="{{$certi->fechainicio}}" class="form-control" id="fechainicio" placeholder="yyyy/mm/dd">
    </div>

    <div class="form-group">
      <label for="fechafin">Fecha Final</label>
      <input type="date"  name="fechafin" value="{{$certi->fechafin}}" class="form-control" id="fechafin" placeholder="yyyy/mm/dd">
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
        <a href="{{ url('certificacion') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>
@endsection