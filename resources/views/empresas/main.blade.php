@extends ('admin.template.main')

@section ('contenido')

@if(Session::has('message'))
     <p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Ofertar Puesto</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2"> Crear oferta de Puesto Trabajo</a>
        <a href="#" class="btn btn-primary my-2">Ver ofertas</a>

        <a href="" data-target="#modal-create" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

        @include('empresas.modal')



      </p>
    </div>
  </section>

<div class="container">

    <div class="row">
        <div class="col-md-4">
        	<p>hola</p>
        </div>
    </div>
</div>

@endsection