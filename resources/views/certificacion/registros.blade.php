@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center>Certificaciones Obtenidas</center></div>
 	<div class="panel-body">
	
 		<div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">

              	<thead>
                  <th>Titulo</th>
              		<th>Tipo</th>
              		<th>Codigo</th>
                  <th>Institucion</th>
              	  <th>Fecha Inicio</th>
                  <th>Fecha Finalizacion</th>
              		<th>Opciones</th>
              	</thead>
              	@foreach ($certificacion as $certi)
              	<tr>
              		<td>{{$certi->titulo}}</td>
              		<td>{{$certi->tipo}}</td>
              		<td>{{$certi->codigo}}</td>
              		<td>{{$certi->institucion}}</td>
              		<td>{{$certi->fechainicio}}</td>
                  <td>{{$certi->fechafin}}</td>
              		<td>
              			<a href="{{URL::action('CertificacionController@edit', $certi->idcertificacion)}}">
                      <button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-cog"></span>Editar
                      </button>
                    </a>

                    <a href="" data-target="#modal-delete-{{$certi->idcertificacion}}" data-toggle="modal">
                      <button type="button" class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></span>Eliminar
                      </button>
                    </a>
              		</td>
              	</tr>
              	@include('certificacion.modal')
              	@endforeach
              </table>
            </div>
          </div>
        </div>

	</div>
</div>

<div class="form-group">
    <center>              
        <a href="{{ url('certificacion') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>

@endsection