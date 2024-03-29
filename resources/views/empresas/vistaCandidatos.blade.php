<?php

use App\Empresa;
use App\Postulante;
use App\Puesto_Trabajo;

?>
@extends ('admin.template.main')

@section ('contenido')

@if(Session::has('message'))
     <p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <center><h3 class="display-3">Candidatos al puesto</h3></center>
        <div class="row">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                	<thead>
                    	<th>Nombre</th>
                    	<th>Puesto</th>
                    	<th>Empresa</th>
                    	<th>Opciones</th>
                  	</thead>
                  	<tr>
                  	@foreach ($puesto_postu as $puesto_postu)
                  	<?php                 

                  		$pos=Postulante::findOrFail($puesto_postu->idpostulante);
                  		$pues=Puesto_Trabajo::findOrFail($puesto_postu->idpuestotrabajo);
                  		$emp=Empresa::findOrFail($pues->idempresa)

                  	?>
                  	  <td>{{$pos->lastname}}, {{$pos->firtsname}}</td>
                  	  <td>{{$pues->nombre}}</td>
                  	  <td>{{$emp->nombre}}</td>
                  	  <td>
	                    <a href="datosPostulante/{{$puesto_postu->idpostulante}}">
	                      <button type="button" class="btn btn-primary btn-xs">
	                        <span class="glyphicon glyphicon-eye-open"></span>Ver
	                      </button>
	                    </a>
	                    <a href="#">
	                      <button type="button" class="btn btn-primary btn-xs">
	                        <span class="glyphicon glyphicon-envelope"></span>Enviar Oferta
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
    </div>
  </div>
  <hr>
<div class="form-group">
    <center>              
        <a href="{{ url('empresas') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
</div>

</main>

@endsection