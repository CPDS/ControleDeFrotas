<div id="criar_editar-modal" class="modal fade bs-example" role="dialog" data-backdrop="static">
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


       <form class="form-horizontal" role="form" id="form">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Número RV:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="numero_rv" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="numero_rv"  id="numero_rv">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Roteiro:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="roteiro_id" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="roteiro_id"  id="roteiro_id">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Setor:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="setor_nome" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="setor_nome"  id="setor_nome">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Motorista:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="motorista_id" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="motorista_id"  id="motorista_id">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Veículo:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="veiculo_id" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="veiculo_id"  id="veiculo_id">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Data de Saída:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="data_saida" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="date" maxlength="254" class="form-control" name="data_saida"  id="data_saida">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Data de Chegada:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="data_chegada" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="date" maxlength="254" class="form-control" name="data_chegada"  id="data_chegada">
                              </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Criado em:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="criado_em" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="date" maxlength="254" class="form-control" name="criado_em"  id="criado_em">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Atualizado em:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="atualizado_em" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="date" maxlength="254" class="form-control" name="atualizado_em"  id="atualizado_em">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Cidade de Saída:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="cidade_saida" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="cidade_saida"  id="cidade_saida">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Cidade de Chegada:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="cidade_chegada" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="cidade_chegada"  id="cidade_chegada">
                              </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <strong>Situação:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="situacao" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="situacao"  id="situacao">
                              </div>
                        </div>
                    </div>

                      <input type="hidden" id="id" name="id">
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
