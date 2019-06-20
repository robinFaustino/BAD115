@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h4>Bienvenido!!!</h4></center>
    <center> <img width="100px"  class="img-circle" height="100px" src="{{ asset('imagen/users/default.png') }}">
      <!--<img width="100px"  class="img-circle" height="100px" src="{{ asset('imagen/users/'.$user->photo) }}">-->
    </center>
  </div>
 	<div class="panel-body">

 		<div class="row">

  			<div class="col-sm-6 col-md-4">
    			<div class="thumbnail">
      				<img src="..." alt="...">
      					<div class="caption">
      						<center>
        					<h3>Ver Perfil</h3>
        					<p>...</p>
        					<p><a href="" class="btn btn-primary" role="button">Button</a></p>
        					</center>
      					</div>
    			</div>
  			</div>

  			<div class="col-sm-6 col-md-4">
    			<div class="thumbnail">
      				<img src="..." alt="...">
      					<div class="caption">
      						<center>
        					<h3>Certificaciones</h3>
        					<p>...</p>
        					<p><a href="certificacion" class="btn btn-primary" role="button">Ingresar</a></p>
        					</center>
      					</div>
    			</div>
  			</div>

  			<div class="col-sm-6 col-md-4">
    			<div class="thumbnail">
      				<img src="..." alt="...">
      					<div class="caption">
      						<center>
        					<h3>Conocimiento Academico</h3>
        					<p>...</p>
        					<p><a href="conocimientoAcademico" class="btn btn-primary" role="button">Ingresar</a></p>
        					</center>
      					</div>
    			</div>
  			</div>

  			<div class="col-sm-6 col-md-4">
    			<div class="thumbnail">
      				<img src="..." alt="...">
      					<div class="caption">
      						<center>
        					<h3>Experiencia Laboral</h3>
        					<p>...</p>
        					<p><a href="experienciaLaboral" class="btn btn-primary" role="button">Ingresar</a></p>
        					</center>
      					</div>
    			</div>
  			</div>

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
              <img src="..." alt="...">
                <div class="caption">
                  <center>
                  <h3>Proceso de Postulaciones</h3>
                  <p>...</p>
                  <p><a href="{{ url('postulante/show') }}" class="btn btn-primary" role="button">Ingresar</a></p>
                  </center>
                </div>
          </div>
        </div>
        

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
              <img src="..." alt="...">
                <div class="caption">
                  <center>
                  <h3>Publicaciones</h3>
                  <p>...</p>
                  <p><a href="{{ url('publicacion/show') }}" class="btn btn-primary" role="button" >Ingresar</a></p>
                  </center>
                </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
              <img src="..." alt="...">
                <div class="caption">
                  <center>
                  <h3>Recomendaciones</h3>
                  <p>...</p>
                  <p><a href="{{ url('recomendacion/show') }}" class="btn btn-primary" role="button" >Ingresar</a></p>
                  </center>
                </div>
          </div>
        </div>

           <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
              <img src="..." alt="...">
                <div class="caption">
                  <center>
                  <h3>Logros</h3>
                  <p>...</p>
                  <p><a href="{{ url('logro/show') }}" class="btn btn-primary" role="button" >Ingresar</a></p>
                  </center>
                </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
              <img src="..." alt="...">
                <div class="caption">
                  <center>
                  <h3>Habilidades de Lenguaje</h3>
                  <p>...</p>
                  <p><a href="{{ url('habilidad_lenguaje/show') }}" class="btn btn-primary" role="button">Ingresar</a></p>
                  </center>
                </div>
          </div>
        </div>


		</div>
 	</div>
  <div class="form-group">
        <center>  
          <a href="{{ url('ofertas') }}"><button class="btn btn-danger">Regresar</button></a>
        </center>
  </div>
</div>
@endsection