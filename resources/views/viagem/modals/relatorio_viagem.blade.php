<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="relatorio_viagem-modal" class="modal fade bs-example" role="dialog" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div> <!-- Fim de ModaL Header-->

      <div class="modal-body">

        <div class="erros callout callout-danger hidden">
                <p></p>
        </div>

      <form action="{{route('viagens.relatorio') }}" target="_blank" method="post" class="form-horizontal" role="form" id="form" >
           {{ csrf_field() }}
         <div class="form-group">
            <div class="col-sm-12">
                <strong>Nome:</strong>
                <div class="input-group">
                    <span data-toggle="tooltip" title="Nome" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                    <input type="text" maxlength="254" class="form-control" name="nome"  id="nome">
                </div>       
            </div>
        </div>

         <div class="form-group">
            <div class="col-sm-5">
                <strong>Destino:</strong>
                <div class="input-group">
                    <span data-toggle="tooltip" title="Destino" class="input-group-addon"><i class="fa fa-bookmark-o"></i></span>
                    <input type="text" maxlength="254" class="form-control" name="fk_cidade_saida"  id="fk_cidade_saida">
                </div>       
            </div>
        
            <div class="col-sm-7">
                <strong>Veículo:</strong>
                <div class="input-group">
                    <span data-toggle="tooltip" title="Veiculo" class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" maxlength="254" class="form-control" name="fk_veiculo"  id="fk_veiculo">
                </div>       
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-12">
                <strong>RV:</strong>
                <div class="input-group">
                    <span data-toggle="tooltip" title="RV" class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    <input type="text" maxlength="254" class="form-control" name="numero_rv"  id="numero_rv">
                </div>       
            </div>
        </div>
      
        <input type="hidden" id="id" name="id">
        <div class="modal-footer">
        <button type="submit" class="btn btn-action btn-success gerar_setor" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> &nbsp Aguarde...">
          <i class="fa fa-floppy-o"> </i>
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          <i class='fa fa-times'></i>
        </button>
      </div> <!-- Fim de ModaL Footer-->

      </form>

      </div> <!-- Fim de ModaL Body-->

      
    </div> <!-- Fim de ModaL Content-->

  </div> <!-- Fim de ModaL Dialog-->

</div> <!-- Fim de ModaL Usuario-->