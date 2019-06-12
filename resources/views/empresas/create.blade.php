@extends ('admin.template.main')

@section ('contenido')
		
					<br>
					<hr>
					
					{!! Form::open(array('url'=>'empresa','method'=>'POST','autocomplete'=>'off')) !!}
  					<div class="panel panel-default">
 						<div class="panel-heading">Datos de empresa</div>
 						<div class="panel-body">
    
							<div class="form-group">
    							<label for="nombre">Nombre</label>
    							<input type="nombre" name='nombre' class="form-control" id="nombre" placeholder="Nombre...">
  							</div>

  							<div class="form-group">
    							<label for="paginaweb">Pagina Web</label>
    							<input type="paginaweb" name='paginaweb' class="form-control" id="paginaweb" placeholder="www.Example.com">
  							</div>

  							<div class="form-group">
    							<label for="descripcion">Descripcion de la empresa</label>
    							<input type="descripcion" name='descripcion' class="form-control" id="descripcion" placeholder="Descripcion...">
  							</div>

  							<div class="form-group">
    							<label for="correo">Correo</label>
    							<input type="email" name='correo' class="form-control" id="correo" placeholder="example@gmail.com">
  							</div>

  							<div class="form-group">
    							<label for="telefono">Telefono</label>
    							<input type="telefono" name="telefono" class="form-control" id="telefono" placeholder="XXXX-XXXX">
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
  						</div>
					</div>
					{!!Form::close()!!}	
				

@endsection