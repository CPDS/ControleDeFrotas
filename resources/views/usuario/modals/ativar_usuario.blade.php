<!-- Ativar -->
<div id="ativar-modal" class="modal fade"  role="dialog">

  <div class="modal-dialog" role="document">

  <div class="modal-content">

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
  <!--@role('Administrador')-->
      <h4 class="modal-title"><strong>Ativar</strong></h4>
    </div>

    <div class="modal-body"> Tem certeza que deseja ativar este usuário? </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-primary ativ" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> &nbsp Aguarde...">OK</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      <span class="hidden id_ativ"></span> <!-- Passar o ID para o Controlador -->
    </div>
  <!--@endrole-->
  </div> <!-- Fim de ModaL Content -->
  </div> <!-- Fim de ModaL Dialog -->

</div> <!-- Fim de ModaL -->
