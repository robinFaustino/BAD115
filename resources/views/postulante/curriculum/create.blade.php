@extends ('admin.template.main')

@section ('contenido')
	
		<div class="container">
			<div class="row">
        <h3><center>Mi Curriculum</center></h3>
				<div class="col-md-8 col-md-offset-2">

					<br>
					<hr>
					{!! Form::open(array('url'=>'postulante/curriculum1','method'=>'POST','autocomplete'=>'off')) !!}
  					<div class="panel panel-default">
 						<div class="panel-heading">Datos personales</div>
 						<div class="panel-body">

              <div class="form-group">
                  <label for="firtsname">Primer Nombre</label>
                  <input type="firtsname" name='firtsname' class="form-control" id="firtsname" placeholder="Nombre...">
                </div>
                <div class="form-group">
                  <label for="secondsname">Segundo Nombre</label>
                  <input type="secondsname" name='secondsname' class="form-control" id="secondsname" placeholder="Nombre...">
                </div>
                <div class="form-group">
                  <label for="lastname">Apellidos</label>
                  <input type="lastname" name='lastname' class="form-control" id="lastname" placeholder="Apellidos...">
                </div>
                <div class="form-group">
                  <label for="generp">Genero</label>
                  <select name="genero" id="genero" class="form-control">
                    <option selected value="">Seleccione Genero</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                  </select>
              </div>
                <div class="form-group">
                  <label for="fechanacimiento">Fecha de nacimiento</label>
                  <date></date>
                  <input type=date name='fechanacimiento' class="form-control" id="fechanacimiento" placeholder="Apellidos...">
                </div>
                <div class="form-group">
                  <label for="dui">Dui</label>
                  <input type="dui" name='dui' class="form-control" id="dui" placeholder="115669-5...">
                </div>
                <div class="form-group">
                  <label for="pasaporte">Pasaporte</label>
                  <input type="pasaporte" name='pasaporte' class="form-control" id="pasaporte" placeholder="115669-5...">
                </div>
                <div class="form-group">
                  <label for="nit">Nit</label>
                  <input type="nit" name='nit' class="form-control" id="nit" placeholder="...">
                </div>
                <div class="form-group">
                  <label for="nup">Nup</label>
                  <input type="nup" name='nup' class="form-control" id="nup" placeholder="...">
                </div>

              <div class="form-group">
                  <label for="role_id">Pais</label>
                  <select name="role_id" id="role_id" class="form-control">
                    <option selected value="">Seleccione pais</option>
                    @foreach ($paise as $pais)
                      <option value="{{$pais ->idpais }}">{{$pais->nombre}}</option>
                    @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="role_id">Departamento</label>
                  <select name="role_id" id="departamento" class="form-control">
                    <option selected value="">Seleccione departamento</option>
                    <option value="san salvador">San salvador</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="role_id">Municipio</label>
                  <select name="role_id" id="municipio" class="form-control">
                    <option selected value="">Seleccione municipio</option>
                    <option value="Ciudad Delgado">Ciudad Delgado</option>
                  </select>
              </div>
    
							
  							<div class="form-group">
    							<label for="email">Correo</label>
    							<input type="email" name='correo' class="form-control" id="correo" placeholder="example@gmail.com">
  							</div>

  							<div class="form-group">
    							<label for="telefono">Telefono</label>
    							<input type="telefono" name="telefono" class="form-control" id="telefono" placeholder="0000-0000">
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