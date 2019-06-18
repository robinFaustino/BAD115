@extends ('admin.template.main')

@section ('contenido')

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Mi área</h1>
        <div class="row">
          <div class="col-lg-4">
            <center>
            <img src="{{ asset('imagen/u1.JPG') }}"  class="img-circle" width="140" height="140"/>
            <p></p>
            <p><a class="btn btn-primary btn-lg" href="postulante/create" role="button">Ver Perfil</a></p>
            </center>
          </div>
          <div class="col-lg-4">
            <center>
            <img src="{{ asset('imagen/u2.PNG') }}" alt="..." class="img-circle" width="140" height="140"/>
            <p></p>
            <p><a class="btn btn-primary btn-lg" href="{{ url('puesto') }}" role="button">Buscar ofertas de trabajo</a></p>
            </center>
          </div>
          <div class="col-lg-4">
            <center>
            <img src="{{ asset('imagen/u1.JPG') }}"  class="img-circle" width="140" height="140"/>
            <p></p>
            <p><a class="btn btn-primary btn-lg" href="postulante/curriculum" role="button">Proceso de mis postulaciones</a></p>
            </center>
          </div>
        </div>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Heading</h2>
        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

@endsection