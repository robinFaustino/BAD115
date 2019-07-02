@extends('admin.template.main')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">Exámenes</div>
		<div class="panel-body">
			<div style="text-align: right; padding-bottom: 10px;">
				<a href="{{ route('examenes.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar</a>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>#</th>
						<th>Tipo de examen</th>
						<th>Empresa</th>
						<th>Fecha</th>
						<th>Opciones</th>
					</thead>
					<tbody>
						@foreach ($examenes as $examen)
						<tr>
							<td>{{ $i++ }}</td>
							<td>{{ $examen->tipo_examen->nombre }}</td>
							<td>{{ $examen->empresa->nombre }}</td>
							<td>{{ \Carbon\Carbon::parse($examen->fecha)->format('d/m/Y')}}</td>
							<td>
								<a href="{{ route('agregar_preguntas', $examen->idexamen)  }}" class="btn btn-success btn-xs">
									<i class="glyphicon glyphicon-plus"></i> Agregar preguntas
								</a>
								<a href="#" class="btn btn-info btn-xs">
									<i class="glyphicon glyphicon-cog"></i> Editar
								</a>
								<a href="#" data-target="#modal-delete-{{ $examen->idexamen }}" data-toggle="modal" class="btn btn-danger btn-xs">
									<i class="glyphicon glyphicon-trash"></i> Eliminar
								</a>
							</td>
						</tr>
						@include('examenes.modal')
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
</div>
@endsection