<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $examen->idexamen }}">
  {!! Form::open(array('action' => array('ExamenController@destroy', $examen->idexamen), 'method' => 'delete')) !!}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
        <h4 class="modal-title">Eliminar Examen</h4>
      </div>
      <div class="modal-body">
        <p>¿Desea eliminar el examen de la empresa {{ $examen->empresa->nombre }}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary btn-flat">Aceptar</button>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>