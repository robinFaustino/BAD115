@extends ('admin.template.main')

@section ('contenido')


<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Album example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Ofertar Puesto Trabajo</a>
        <a href="#" class="btn btn-primary my-2">Ver ofertas</a>
      </p>
    </div>

  <div class="container">
    <div class="row">


      <div class="col-md-12 col-md-offset-0">
      <br>
      <hr>
          
          
        <div class="panel panel-default">
          <div class="panel-heading">Ofertar Puesto de Trabajo</div>
            <div class="panel-body">
            
            <div class="row">
              <div class="form-horizontal">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre Puesto">
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
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del Puesto">
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
                    <input type="text"  name="experiencia" class="form-control" id="experiencia" placeholder="Experiencia..">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="anosExp" class="col-sm-3 required">Años Experiencia</label>
                  <div class="col-sm-8">
                    <input type="text"  name="anosExp" class="form-control" id="anosExp" placeholder="Cuantos Años de experiencia para el puesto">  
                  </div>
                </div>
              </div>

            </div>

            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="salariomin" class="col-sm-3 required">Salario Minimo</label>
                  <div class="col-sm-8">
                    <input type="text"  name="salariomin" class="form-control" id="salariomin" placeholder="Salario Minimo">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="salariomax" class="col-sm-3 required">Salario Maximo</label>
                  <div class="col-sm-8">
                    <input type="text"  name="salariomax" class="form-control" id="salariomax" placeholder="Salario Maximo">  
                  </div>
                </div>
              </div>

            </div>

            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="conocimiento" class="col-sm-3 required">Conocimiento</label>
                  <div class="col-sm-8">
                    <input type="text"  name="conocimiento" class="form-control" id="conocimiento" placeholder="Conocimientos para el puesto">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="rangoedad" class="col-sm-3 required">Rango de edad</label>
                  <div class="col-sm-8">
                    <input type="text"  name="rangoedad" class="form-control" id="rangoedad" placeholder="Rango edad XX-XX">  
                  </div>
                </div>
              </div>

            </div>
                
            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="educacion" class="col-sm-3 required">Grado Academico</label>
                  <div class="col-sm-8">
                    <input type="text"  name="educacion" class="form-control" id="educacion" placeholder="Grado Academico">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="vacantes" class="col-sm-3 required"># Vacantes del puesto</label>
                  <div class="col-sm-8">
                    <input type="text"  name="vacantes" class="form-control" id="vacantes" placeholder="Vacantes para el puesto">  
                  </div>
                </div>
              </div>

            </div>

            <div class="form-horizontal">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="fechacontrato" class="col-sm-3 required">Fecha del Contrato</label>
                  <div class="col-sm-8">
                    <input type="date"  name="fechacontrato" class="form-control" id="fechacontrato" placeholder="yyyy/mm/dd">  
                  </div>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="iddepartamento" class="col-sm-3 required">Ubicacion</label>
                  <div class="col-sm-8">
                    <select name="iddepartamento" id="iddepartamento" class="form-control">
                      <option selected value="">Seleccione Departamento</option>
                      @foreach ($depa as $depa)
                      <option value="{{$depa->iddepartamento}}">{{$depa->nombre}}
                              </option>
                      @endforeach  
                    </select>
                  </div>
                </div>
              </div>

            </div>

           

              
  
                
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">Examen para el postulante</div>
            <div class="panel-body">
            </div>
          </div>
        </div>
          
      </div>

<div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>

    </div>
  </div>



  </section>



@endsection