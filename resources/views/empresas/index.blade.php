@extends ('admin.template.main')

@section ('contenido')


<hr>

<section class="jumbotron text-center" >
    <div class="container">
      <h1 class="jumbotron-heading">Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="empresas/create" class="btn btn-primary my-2">Ofertar Puesto Trabajo</a>
        <a href="empresas_ofertar" class="btn btn-primary my-2">Ver ofertas</a>

        <a href="" data-target="#modal-create" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

        @include('empresas.modal')



      </p>
    </div>
  </section>


@endsection