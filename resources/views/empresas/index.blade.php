@extends ('admin.template.main')

@section ('contenido')

@if(Session::has('message'))
     <p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

<hr>

<section class="jumbotron text-center" >
    <div class="container">
      <h1 class="jumbotron-heading">Bienvenido</h1>
      <p class="lead text-muted"></p>
      <p>
        <a href="empresas/create" class="btn btn-primary my-2">Ofertar Puesto Trabajo</a>
        <a href="empresas_ofertar" class="btn btn-primary my-2">Ver ofertas</a>
        <a href="{{ route('empresas.candidatos') }}" class="btn btn-primary my-2">Ver Candidatos</a>

        <!--<a href="" data-target="#modal-create" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

        @include('empresas.modal')-->



      </p>
    </div>
  </section>


@endsection