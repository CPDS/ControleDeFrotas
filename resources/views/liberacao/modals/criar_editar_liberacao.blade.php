<div id="criar_editar-modal" class="modal fade bs-example" role="dialog" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div> <!-- Fim de ModaL Header-->

      <div class="modal-body">

        <div class="erros callout callout-danger hidden">
                <p></p>
        </div>

        <form id="form" role="form" method="post">
          <div class="row" style="width: 100%">

            <div class="form-group col-md-6">
              <strong>Título:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="titulo" class="form-control" name="titulo" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Data Saída:</strong>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
              <input id="datahora_saida" class="form-control"  name="datahora_saida" type="date"> <!-- Campo nào pega hora ainda -->
            </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Data Chegada:</strong>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
              <input id="datahora_chegada" class="form-control"  name="datahora_chegada" type="date"> <!-- Campo nào pega hora ainda -->
            </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Destino:</strong>
              <div class="input-group col-md-12">
               <span></span>
                <textarea rows="5" id="destino" maxlength="250" class="form-control" name="destino" type="text"></textarea>
              </div> <!-- Verificar tamanho após rota ser configurado -->
            </div>

            <div class="form-group col-md-12">
              <strong>Retorno:</strong>
              <div class="input-group col-md-12">
               <span></span>
                <textarea rows="5" id="retorno" maxlength="250" class="form-control" name="retorno" type="text"></textarea>
              </div> <!-- Verificar tamanho após rota ser configurado -->
            </div>

            <div class="form-group col-md-6">
              <strong>Veículo:</strong>
                <select name="fk_veiculo" id="fk_veiculo" class="form-control selectVeiculo">
                  @foreach($veiculos as $veiculo)
                    <option value='{{$veiculo->id}}'>{{$veiculo->nome_veiculo}}</option>
                  @endforeach
                </select>
            </div>


            <div class="form-group col-md-6">
              <strong>Motorista:</strong>
              <select name="fk_motorista" id="fk_motorista" class="form-control">
                @foreach($motoristas as $motorista)
                  <option value='{{$motorista->id}}'>{{$motorista->name}}</option>
                @endforeach
              </select>
            </div>

             <input type="hidden" id="id" name="id">

         </div>

       </form>

      </div> <!-- Fim de ModaL Body-->

      <div class="modal-footer">
        <button type="button" class="btn btn-action btn-success add" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> &nbsp Aguarde...">
          <i class="fa fa-floppy-o"> </i>
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">
          <i class='fa fa-times'></i>
        </button>
      </div> <!-- Fim de ModaL Footer-->

    </div> <!-- Fim de ModaL Content-->

  </div> <!-- Fim de ModaL Dialog-->

</div> <!-- Fim de ModaL Usuario-->
