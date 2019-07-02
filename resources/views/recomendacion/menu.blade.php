@extends ('admin.template.main')

@section ('contenido')

@if(Session::has('message'))
     <p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

<div class="panel panel-default">
 	<div class="panel-heading"><center><h4>Recomendaciones</h4></center></div>
 	<div class="panel-body">
 		
 	</div>


 	<div class="form-group">
 		<center>
    	<a href="{{route('recomendacion.create')}}" class="btn btn-primary">Registrar</a>
    	<a href="{{ route('recomendacion.index') }}" class="btn btn-primary my-2">Ver registro</a>
    	<a href="{{ url('postulante') }}"><button class="btn btn-danger">Regresar</button></a>
    	</center>
    </div>
</div>

@endsection