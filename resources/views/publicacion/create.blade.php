@extends ('admin.template.main')

@section ('contenido')
<div class="panel panel-default">
 	<div class="panel-heading"><center><h5>Ingresar datos de Publicacion</h5></center></div>
 	<div class="panel-body">

    @if (count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach 
        </ul>   
      </div>
    @endif

 		{!! Form::open(array('url'=>'publicacion','method'=>'POST','autocomplete'=>'off')) !!}

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
    		<select name="tipo" id="tipo" class="form-control" onmousedown="habilitar()">
    			<option selected value="">-- Seleccione una Opcion --</option>
    			<option value="libro">Libro</option>
    			<option value="articulo">Articulo</option>
    		</select>
  		</div>

  		<div class="form-group">
    		<label for="titulo">Titulo</label>
    		<input type="titulo" name='titulo' class="form-control" id="titulo" placeholder="Titulo...">
  		</div>

  		<div class="form-group">
    		<label for="lugar">Lugar</label>
    		<input type="lugar" name='lugar' class="form-control" id="lugar" placeholder="Lugar de publicacion">
  		</div>
  		
  		<div class="form-group">
    		<label for="fecha">Fecha</label>
    		<input type="date"  name="fecha" class="form-control" id="fecha" placeholder="yyyy/mm/dd">
  		</div>

  		<div class="form-group">
    		<label for="edicion">Edicion</label>
    		<input type="edicion"  name="edicion" class="form-control" id="edicion" placeholder="Edicion del libro">
  		</div>

      <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="isbn"  name="isbn" class="form-control" id="isbn" placeholder="ISBN del libro">
      </div>

  		<div class="form-group">
  			<center>
    		<button class="btn btn-primary" type="submit">Guardar</button>
        <button class="btn btn-warning" type="submit">Cancelar</button>    		
    		</center>
    	</div>
      {!!Form::close()!!}

 	</div>

</div>

<div class="form-group">
    <center>              
        <a href="{{ url('publicacion') }}"><button class="btn btn-danger">Regresar</button></a>
    </center>
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