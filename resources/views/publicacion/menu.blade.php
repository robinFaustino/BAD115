@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h4>Publicacion de Libros o Articulos</h4></center></div>
 	<div class="panel-body">
 		
 	</div>


 	<div class="form-group">
 		<center>
    	<a href="{{route('publicacion.create')}}" class="btn btn-primary">Registrar</a>
    	<a href="{{ route('publicacion.index') }}" class="btn btn-primary my-2">Ver registro</a>
    	<a href="{{ url('postulante') }}"><button class="btn btn-danger">Regresar</button></a>
    	</center>
    </div>
</div>

@endsection