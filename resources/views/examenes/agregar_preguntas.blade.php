@extends('admin.template.main')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">Preguntas de Falso y Verdadero</div>
		<div class="panel-body">
			<div style="text-align: right; padding-bottom: 10px;">
				<a href="{{ route('examenes.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Descripción</th>
						<th>Puntaje</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						@foreach ($preguntas_fv as $pfv)
						<tr>
							<td>{{ $pfv->descripcion }}</td>
							<td>{{ $pfv->puntaje }}</td>
							<td>
								<a href="#" class="btn btn-info btn-xs">
									<i class="glyphicon glyphicon-cog"></i> Editar
								</a>
								<a href="#" data-target="#modal-delete-{{ $pfv->idpreguntafv }}" data-toggle="modal" class="btn btn-danger btn-xs">
									<i class="glyphicon glyphicon-trash"></i> Eliminar
								</a>
							</td>
						</tr>
						@include('examenes.modal_pfv')
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">Preguntas de Opción Múltiple</div>
		<div class="panel-body">
			<div style="text-align: right; padding-bottom: 10px;">
				<a href="{{ route('examenes.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Descripción</th>
						<th>Puntaje</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						@foreach ($preguntas_fv as $pfv)
						<tr>
							<td>{{ $pfv->descripcion }}</td>
							<td>{{ $pfv->puntaje }}</td>
							<td>
								<a href="#" class="btn btn-info btn-xs">
									<i class="glyphicon glyphicon-cog"></i> Editar
								</a>
								<a href="#" data-target="#modal-delete-{{ $pfv->idpreguntafv }}" data-toggle="modal" class="btn btn-danger btn-xs">
									<i class="glyphicon glyphicon-trash"></i> Eliminar
								</a>
							</td>
						</tr>
						@include('examenes.modal_pfv')
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
</div>
@endsection