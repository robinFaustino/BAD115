@extends ('admin.template.main')

@section ('contenido')

@if (count($errors)>0)
    <div class="alert alert-danger">
    	<ul>
    		@foreach ($errors->all() as $error)
    			<li>{{$error}}</li>
    		@endforeach	
    	</ul>	
    </div>
@endif

{!!Form::model($puesto,['method'=>'PATCH','route'=>['empresas_ofertar.update',$puesto->idpuestotrabajo]])!!}
{{Form::token()}}
<div class="panel panel-default">
    <div class="panel-heading"><h4><center>Empresa: {{$emp->nombre}}</center></h4>
    	<h5><center> Editar Puesto de Trabajo: {{$puesto->nombre}}</center></h15> 
    </div>
        <div class="panel-body">


        	<div class="row">
              <div class="form-horizontal">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{$puesto->nombre}}" placeholder="Nombre Puesto">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-horizontal">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$puesto->descripcion}}" placeholder="Descripcion del Puesto">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>

            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="experiencia" class="col-sm-3 required">Experiencia</label>
                  <div class="col-sm-8">
                    <input type="text"  name="experiencia" class="form-control" id="experiencia" value="{{$puesto->experiencia}}" placeholder="Experiencia..">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="anosexp" class="col-sm-3 required">Años Experiencia</label>
                  <div class="col-sm-8">
                    <input type="text"  name="anosexp" class="form-control" id="anosexp" value="{{$puesto->anosexp}}" placeholder="Cuantos Años de experiencia para el puesto">  
                  </div>
                </div>
              </div>

            </div>

            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="salariomin" class="col-sm-3 required">Salario Minimo</label>
                  <div class="col-sm-8">
                    <input type="text"  name="salariomin" class="form-control" id="salariomin" value="{{$puesto->salariomin}}" placeholder="Salario Minimo">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="salariomax" class="col-sm-3 required">Salario Maximo</label>
                  <div class="col-sm-8">
                    <input type="text"  name="salariomax" class="form-control" id="salariomax" value="{{$puesto->salariomax}}" placeholder="Salario Maximo">  
                  </div>
                </div>
              </div>

            </div>

            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="conocimiento" class="col-sm-3 required">Conocimiento</label>
                  <div class="col-sm-8">
                    <input type="text"  name="conocimiento" class="form-control" id="conocimiento" value="{{$puesto->conocimiento}}" placeholder="Conocimientos para el puesto">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="rangoedad" class="col-sm-3 required">Rango de edad</label>
                  <div class="col-sm-8">
                    <input type="text"  name="rangoedad" class="form-control" id="rangoedad" value="{{$puesto->rangoedad}}" placeholder="Rango edad XX-XX">  
                  </div>
                </div>
              </div>

            </div>

            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="educacion" class="col-sm-3 required">Grado Academico</label>
                  <div class="col-sm-8">
                    <input type="text"  name="educacion" class="form-control" id="educacion" value="{{$puesto->educacion}}" placeholder="Grado Academico">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="vacantes" class="col-sm-3 required"># Vacantes del puesto</label>
                  <div class="col-sm-8">
                    <input type="text"  name="vacantes" class="form-control" id="vacantes" value="{{$puesto->vacantes}}" placeholder="Vacantes para el puesto">  
                  </div>
                </div>
              </div>

            </div>

            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="fechacontrato" class="col-sm-3 required">Fecha del Contrato</label>
                  <div class="col-sm-8">
                    <input type="date"  name="fechacontrato" class="form-control" id="fechacontrato" value="{{$puesto->fechacontrato}}" placeholder="yyyy/mm/dd">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="iddepartamento" class="col-sm-3 required">Ubicacion</label>
                  <div class="col-sm-8">
                    <select name="iddepartamento" id="iddepartamento" class="form-control">
                      <option selected value="{{$puesto->iddepartamento}}">{{$dep->nombre}}</option>
                      @foreach ($depa as $depa)
                      <option value="{{$depa->iddepartamento}}">{{$depa->nombre}}
                              </option>
                      @endforeach  
                    </select>
                  </div>
                </div>
              </div>

              <input id="idempresa" name="idempresa" type="hidden" value="{{$puesto->idempresa}}">

            </div>



        </div>

        <div class="form-group">
        	<center>
            	<button class="btn btn-primary" type="submit">Guardar</button>
              <a href="{{ url('empresas') }}"><button class="btn btn-danger">Regresar</button></a>
            	
            </center>
        </div>
</div>
{!!Form::close()!!}


@endsection