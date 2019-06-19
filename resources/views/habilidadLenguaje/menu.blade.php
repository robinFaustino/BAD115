@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h4>Habilidades de Lenguaje</h4></center></div>
 	<div class="panel-body">
 		
 	</div>


 	<div class="form-group">
 		<center>
    	<a href="{{route('habilidad_lenguaje.create')}}" class="btn btn-primary">Registrar</a>
    	<a href="{{ route('habilidad_lenguaje.index') }}" class="btn btn-primary my-2">Ver registro</a>
    	<a href="{{ url('postulante') }}"><button class="btn btn-danger">Regresar</button></a>
    	</center>
    </div>
</div>

@endsection