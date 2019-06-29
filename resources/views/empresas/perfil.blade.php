@extends ('admin.template.main')

@section ('contenido')


<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Perfil del postulante</h5></center></div>
 	<div class="panel-body">
 		@foreach ($data as $data)
 		<p>Nombre: {{$data->n1}}</p>
 		<p>Apellido: {{$data->a1}}</p>
		<p>Genero: {{$data->genero}}</p>
		<p>Fecha Nacimiento: {{$data->fecha}}</p>
		<p>Dui: {{$data->dui}}</p>
		<p>Telefono: {{$data->telefono}}</p>
		<p>Correo: {{$data->correo}}</p>
		@endforeach
 	</div>
</div>

<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Conocimientos</h5></center></div>
 	<div class="panel-body">
 		<table class="table table-striped table-bordered table-condensed table-hover">
 			<thead>
 				<th>tipo</th>
 				<th>nombre</th>
 				<th>institucion</th>
 				<th>fecha inicio</th>
 				<th>fecha fin</th>
 			</thead>
 			@foreach ($conocimiento as $cono)
 			<tr>
 				<td>{{$cono->tipo}}</td>
 				<td>{{$cono->nombre}}</td>
 				<td>{{$cono->institucionacademico}}</td>
 				<td>{{$cono->fechainicio}}</td>
 				<td>{{$cono->fechafin}}</td>
 			</tr>
 			@endforeach
 		</table>
 	</div>
</div>

<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Experiencia Laboral</h5></center></div>
 	<div class="panel-body">
 		<table class="table table-striped table-bordered table-condensed table-hover">
 			<thead>
 				<th>nombre</th>
 				<th>fecha inicio</th>
 				<th>fecha fin</th>
 				<th>organizacion</th>
 				<th>Telefono</th>
 			</thead>
 			@foreach ($expe as $expe)
 			<tr>
 				<td>{{$expe->nombrepuesto}}</td>
 				<td>{{$expe->fechainicio}}</td>
 				<td>{{$expe->fechafin}}</td>
 				<td>{{$expe->nombreorganizacion}}</td>
 				<td>{{$expe->telefonoorganizacion}}</td>
 			</tr>
 			@endforeach
 		</table>
 	</div>
</div>

@endsection