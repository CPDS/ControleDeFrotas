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
              <strong>Veículo:</strong>
                <select name="fk_veiculo" id="fk_veiculo" class="form-control selectVeiculo">
                  @foreach($veiculos as $veiculo)
                    <option value='{{$veiculo->id}}'>{{$veiculo->nome_veiculo}}</option>
                  @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
              <strong>Contrato:</strong>
              <select name="fk_contrato" id="fk_contrato" class="form-control">
                @foreach($contratos as $contrato)
                  <option value='{{$contrato->id}}'>{{$contrato->empresa_contratada_nome}}</option>
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

            <div class="form-group col-md-6">
              <strong>Valor dos derivados:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="valor_derivados" class="form-control" name="valor_derivados" type="number">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Valor dos SMV:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="valor_smv" class="form-control" name="valor_smv" type="number">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Nº Ordem de Serviço:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input maxlength="250" id="numero_ordem_servico" class="form-control" name="numero_ordem_servico" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Data do Serviço:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                <input maxlength="250" id="data_servico" class="form-control" name="data_servico" type="date">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>KM Entrada Oficina:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dashboard"></i></span>
                <input maxlength="250" id="km_entrada_oficina" class="form-control" name="km_entrada_oficina" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Número SMV:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input maxlength="250" id="numero_smv" class="form-control" name="numero_smv" type="number">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Número Lupus:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input maxlength="250" id="numero_lupus" class="form-control" name="numero_lupus" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Número SEI:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input maxlength="250" id="numero_sei" class="form-control" name="numero_sei" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Número Empenho:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input maxlength="250" id="numero_empenho" class="form-control" name="numero_empenho" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Data Envio Pedido Empenho:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                <input maxlength="250" id="data_envio_pedido_empenho" class="form-control" name="data_envio_pedido_empenho" type="date">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Número Nota Fiscal:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input maxlength="250" id="numero_nf" class="form-control" name="numero_nf" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Data PG NOB:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                <input maxlength="250" id="data_pg_nob" class="form-control" name="data_pg_nob" type="date">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Número NOB:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-file"></i></span>
                <input maxlength="250" id="numero_nob" class="form-control" name="numero_nob" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Valor Empenho:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="valor_empenho" class="form-control" name="valor_empenho" type="number">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Valor Pago:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input maxlength="250" id="valor_pago" class="form-control" name="valor_pago" type="number">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Descrição Geral do Serviço:</strong>
              <div class="input-group col-md-12">
                <span></span>
                <textarea rows="5" id="descricao_geral_servico" maxlength="250" class="form-control" name="descricao_geral_servico" type="text"></textarea>
              </div>
            </div>


             <input type="hidden" id="id" name="id">

         </div>

       </form>


    <!--




                    <div class="form-group col-md-6">
                      <strong>Tipo Combustível:</strong>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-fire"></i></span>
                        <input id="tipo_combustivel" maxlength="50" class="form-control" name="tipo_combustivel" type="text">
                      </div>
                    </div>



                      <input type="hidden" id="id" name="id">
                </form> -->

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
