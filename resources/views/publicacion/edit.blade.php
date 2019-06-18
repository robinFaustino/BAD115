@extends('admin.template.main')

@section('contenido')

@if(count($errors) > 0)
<div class="alert alert-danger" role="alert">
  <ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<br>
			<hr>
			{!!Form::open(['route'=>['publicacion.update', $publicacion], 'method'=>'PUT', 'autocomplete'=>'off', 'files'=>true])!!}
			<div class="panel panel-default">
				<div class="panel-heading">Editar Publicacion</div>
					<div class="panel-body">
						
    @if(Auth::user()->usuario())

                <div class="form-group">
                  <label for="idpostulante">Postulante</label>
               <select name="idpostulante" id="idpostulante" class="form-control" required>
                 <option selected value="">-- Seleccione un postulante --</option>
                 @foreach($postulantes as $postulante)
                 <option value="{{$postulante->idpostulante}}"> {{$postulante->firtsname}}</option>
                 @endforeach
               </select>
                </div>

                @endif
 		<div class="form-group">
    		<label for="tipo">Tipo</label>
    		<select name="tipo" id="tipo" class="form-control" onmousedown="habilitar()" required >
    			<option selected value="">-- Seleccione un tipo --</option>
    			<option value="libro">Libro</option>
    			<option value="articulo">Articulo</option>
    		</select>
  		</div>

  		<div class="form-group">
    		<label for="titulo">Titulo</label>
    		<input type="titulo" name='titulo' class="form-control" value="{{ $publicacion->titulo}}" id="titulo" placeholder="Titulo...">
  		</div>

  		<div class="form-group">
    		<label for="lugar">Lugar</label>
    		<input type="lugar" name='lugar' class="form-control" id="lugar" value="{{ $publicacion->lugar}}" placeholder="Lugar de publicacion">
  		</div>
  		
  		<div class="form-group">
    		<label for="fecha">Fecha</label>
    		<input type="date"  name="fecha" class="form-control" id="fecha" value="{{ $publicacion->fecha}}" placeholder="yyyy/mm/dd">
  		</div>

  		<div class="form-group">
    		<label for="edicion">Edicion</label>
    		<input type="edicion"  name="edicion" class="form-control" id="edicion" value="{{ $publicacion->edicion}}" placeholder="Edicion del libro" requierd>
  		</div>

      <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="isbn"  name="isbn" class="form-control" id="isbn" value="{{ $publicacion->isbn}}"  placeholder="ISBN del libro" required>
      </div>

						<div class="form-group">
    							<button class="btn btn-primary" type="submit">Guardar</button>
    							<a href="{{route('publicacion.index')}}" class="btn btn-danger">Cancelar</a>
    						</div>
						{!!Form::close()!!}

					</div>
			</div>

		</div>
	</div>
</div>
@endsection

@section('script')

<script type="text/javascript">

function habilitar(){
  var tipo = document.getElementById("tipo");
  var edicion = document.getElementById("edicion");
  var isbn = document.getElementById("isbn");

  if(tipo.value == 'libro')
  {
    edicion.disabled = false;
    isbn.disabled= false;
  } else {
    edicion.disabled = true;
    isbn.disabled = true;
  }
}

</script>

@endsection