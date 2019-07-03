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

            <div class="form-group col-md-12">
              <strong>Quantidade da Diária:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-black-tie"></i></span>
                <input maxlength="250" id="qtd_diaria" class="form-control" name="qtd_diaria" type="numeric">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Valor da Diária:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="valor_diaria" class="form-control" name="valor_diaria" type="numeric">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Custo Total da Diária:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="custo_total_diaria" class="form-control" name="custo_total_diaria" type="numeric">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Valor da Manutenção:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="valor_manutencao" class="form-control" name="valor_manutencao" type="numeric">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Custo Total da Viagem:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="custo_total_viagem" class="form-control" name="custo_total_viagem" type="numeric">
              </div>
            </div>

            <div class="form-group col-md-12 senha">
              <strong>Diário de Bordo:</strong>
              <select name="fk_diario_bordo" id="fk_diario_bordo" class="form-control selectDiario">
                @foreach($diarios as $diario)
                  <option value='{{$diario->id}}'>{{$diario->nome}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-12 senha">
              <strong>Combustível:</strong>
              <select name="fk_combustivel" id="fk_combustivel" class="form-control selectCombustivel">
                @foreach($combustiveis as $combustivel)
                  <option value='{{$combustivel->id}}'>{{$combustivel->nome}}</option>
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
