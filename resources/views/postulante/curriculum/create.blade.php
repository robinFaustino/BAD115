@extends ('admin.template.main')

@section ('contenido')
	
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<br>
					<hr>
					{!! Form::open(array('url'=>'postulante/curriculum','method'=>'POST','autocomplete'=>'off')) !!}

  					<div class="panel panel-default">
 						<div class="panel-heading">Ingresar datos personales</div>
 						<div class="panel-body">

              <div class="form-group">
                  <label for="role_id">Pais</label>
                  <select name="role_id" id="role_id" class="form-control">
                    <option selected value="">Seleccione pais</option>
                    @foreach ($paise as $pais)
                      <option value="{{$role->id}}">{{$role->nombre}}
                              </option>
                    @endforeach
                  </select>
              </div>
    
							<div class="form-group">
    							<label for="nombre">Nombre</label>
    							<input type="nombre" name='nombre' class="form-control" id="nombre" placeholder="Nombre...">
  							</div>

  							<div class="form-group">
    							<label for="email">Correo</label>
    							<input type="email" name='email' class="form-control" id="email" placeholder="example@gmail.com">
  							</div>

  							<div class="form-group">
    							<label for="password">Password</label>
    							<input type="password" name="password" class="form-control" id="password" placeholder="Password...">
 						 	</div>
  
  							<!--<div class="form-group">
    							<label for="exampleInputFile">File input</label>
    							<input type="file" id="exampleInputFile">
    							<p class="help-block">Example block-level help text here.</p>
  							</div>

  							<div class="checkbox">
    							<label>
     							 	<input type="checkbox"> Check me out
    							</label>
  							</div>-->
  							<div class="form-group">
    							<button class="btn btn-primary" type="submit">Guardar</button>
    							<button class="btn btn-danger" type="reset">Cancelar</button>
    						</div>
						{!!Form::close()!!}

  						</div>
					</div>
				</div>
			</div>
		</div>

	
@endsection