<!-- Retirar -->
<div id="retirar-modal" class="modal fade"  role="dialog">

  <div class="modal-dialog" role="document">

  <div class="modal-content">

    <div class="modal-header">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>

      <h4 class="modal-title"><strong>Retirar</strong></h4>

    </div>

    <div class="modal-body">
      <div class="callout callout-danger hidden">
          <p></p>
      </div>
      <div class="form-group">
        <strong>Percurso(s):</strong><br>
        <span id="equipamentos-retirar"></span>
      </div>
      <h4>O Serviço mostrado são os mesmos listados acima?</h4> </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary ret" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> &nbsp Aguarde...">OK</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      <span class="hidden id_ret"></span> <!-- Passar o ID para o Controlador -->
    </div>

  </div> <!-- Fim de ModaL Content -->

  </div> <!-- Fim de ModaL Dialog -->

</div> <!-- Fim de ModaL -->
