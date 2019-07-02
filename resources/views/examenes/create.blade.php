@extends('admin.template.main')

@section('contenido')
<div class="panel panel-default">
	<div class="panel-heading">Registrar Examen</div>
		<div class="panel-body">
			{!! Form::open(['route' => 'examenes.store', 'autocomplete' => 'off', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
			<div class="form-group{{ $errors->has('idempresa') ? ' has-error' : '' }}">
				{!! Form::label('idempresa', 'Empresa', ['class' => 'col-sm-3 control-label']) !!}
				<div class="col-sm-6">
					{!! Form::select('idempresa', $empresas, old('idempresa'), ['class' => 'form-control', 'placeholder' => '-- Seleccione una empresa --', 'required']) !!}
					@if ($errors->has('idempresa'))
					<span class="help-block">{{ $errors->first('idempresa') }}</span>
					@endif
				</div>
			</div>
			<div class="form-group{{ $errors->has('idtipoexamen') ? ' has-error' : '' }}">
				{!! Form::label('idtipoexamen', 'Tipo de examen', ['class' => 'col-sm-3 control-label']) !!}
				<div class="col-sm-6">
					{!! Form::select('idtipoexamen', $tipos_examen, old('idtipoexamen'), ['class' => 'form-control', 'placeholder' => '-- Seleccione un tipo de examen --', 'required']) !!}
					@if ($errors->has('idtipoexamen'))
					<span class="help-block">{{ $errors->first('idtipoexamen') }}</span>
					@endif
				</div>
			</div>
			<div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
				{!! Form::label('fecha', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
				<div class="col-sm-6">
					{!! Form::date('fecha', old('fecha'), ['class' => 'form-control', 'placeholder' => 'Fecha', 'required']) !!}
					@if ($errors->has('fecha'))
					<span class="help-block">{{ $errors->first('fecha') }}</span>
					@endif
				</div>
			</div>
			<div class="col-sm-9">
				<div class="pull-right">
					<a href="{{ route('examenes.index') }}" class="btn btn-danger">Regresar</a>
					{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
				</div>
			</div>
			{!! Form::close() !!}
		</div>
</div>
@endsection