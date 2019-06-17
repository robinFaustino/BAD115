@extends ('admin.template.main')

@section ('contenido')
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
    	<div class="container">
      	<h1 class="display-3">Ofertas de Trabajo</h1>
      	<br>
      	<hr>
      	<div class="row">
      		<div class="col-md-4">
      			@include('puesto.search')
      		</div>
      		<div class="col-md-4">
      			@include('puesto.search2')
      		</div>
      		<div class="col-md-4">
      			@include('puesto.search3')
      		</div>
      	</div>
    	</div>
    </div>

    <div class="row">
          <div class="row">
            <div class="col-lg-12 col-md-10 col-sm-10 col-xs-10">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                    <th>Empresa</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
               
                    <th>Experiencia</th>
                    <th>Opciones</th>
                  </thead>
                  @foreach ($puestos as $puestos)
              	  <tr>
              		<td>{{$puestos->idempresa}}</td>
              		<td>{{$puestos->nombre}}</td>
              		<td>{{$puestos->descripcion}}</td>
                  	
                  	<td>{{$puestos->anosexp}} Año</td>
                  	<td>
                  		<a href="{{URL::action('Puesto_TrabajoController@show', $puestos->idpuestotrabajo)}}">
                      	<button type="button" class="btn btn-info btn-xs">
                        <span class="glyphicon glyphicon-globe"></span>Ver oferta
                      </button>
                    </a>
                  	</td>
                  </tr>
                 @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
</main>

@endsection