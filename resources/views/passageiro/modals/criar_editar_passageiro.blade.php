 <div id="criar_editar-modal" class="modal fade bs-example modalPassageiros" role="dialog" data-backdrop="static">
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
              <strong>Nome do Passageiro:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input placeholder="Digite o nome do Passageiro" maxlength="250" id="nome_passageiro" class="form-control" name="nome_passageiro" type="text">
              </div>
            </div>

            <div class="form-group col-md-12">
             <strong>Solicitação:</strong>
                <select name="fk_solicitacao" id="fk_solicitacao" class="form-control">
                  <option value='' selected disabled>Selecione ...</option>
                  @foreach($viagems as $viagem)
                    <option value="{{$viagem->id}}">{{$viagem->numero_rv}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
              <strong>RG:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input placeholder="Digite seu RG" id="rg" maxlength="254" class="form-control" name="rg" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Matrícula:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input maxlength="150" id="matricula" class="form-control" name="matricula" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Telefone:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input placeholder="Digite o telefone" id="telefone" maxlength="254" class="form-control" name="telefone" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Categoria:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                <input maxlength="254" class="form-control" id="categoria" name="categoria" type="text">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Email:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input placeholder="Digite um email" maxlength="254" class="form-control" id="email" name="email" type="text">
              </div>
            </div>

             <div class="form-group col-md-12">
               <strong>Instituição:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-university"></i></span>
                 <input placeholder="Digite a Instituição" id="instituicao" maxlength="254" class="form-control" name="instituicao" type="text">
               </div>
             </div>

             <div class="form-group col-md-12">
               <strong>Observações:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-commenting"></i></span>
                 <input placeholder="Digite a Observação" id="observacoes" maxlength="600" class="form-control" name="observacoes" type="text">
               </div>
             </div>

             <input type="hidden" id="id" name="id">

         </div>

       </form>

      <!-- <form class="form-horizontal" role="form" id="form">

          <div class="form-group col-md-12">
            <strong>Nome do Passageiro:</strong>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input placeholder="Digite o nome do Passageiro" maxlength="250" id="nome_passageiro" class="form-control" name="nome_passageiro" type="text">
            </div>
          </div>

          <div class="form-group col-md-6">
           <strong>Viagem:</strong>
           <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-globe"></i></span>
              <select name="funcao" id="fk_viagem" class="form-control">
                <option value='' selected disabled>Selecione ...</option>
                <option value="Viagem X">Viagem X</option>
                <option value="Viagem Y">Viagem Y</option>
                <option value="Viagem Z">Viagem Z</option>
              </select>
            </div>
          </div>

          <div class="form-group col-md-6">
            <strong>Matrícula:</strong>
            <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
            <input id="matricula" class="form-control"  name="matricula" type="text">
            </div>
          </div>

          <div class="form-group col-md-12">
            <strong>Email:</strong>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input placeholder="Digite um email" maxlength="254" class="form-control" id="email" name="email" type="text">
            </div>
          </div>

          <div class="form-group col-md-6">
            <strong>Telefone:</strong>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
              <input placeholder="Digite o telefone" id="telefone" maxlength="254" class="form-control" name="telefone" type="text">
            </div>
          </div>

          <div class="form-group col-md-6">
            <strong>RG:</strong>
            <div class="input-group">
            <span class="input-group-addon"><i class="far fa-id-card"></i></span>
            <input id="rg" class="form-control"  name="rg" type="text">
            </div>
          </div>


          <input type="hidden" id="id" name="id">

        </form> -->


  <!--     <form class="form-horizontal" role="form" id="form">
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
                        <div class="col-sm-12">
                            <strong>Matricula:</strong>
                            <div class="input-group">
                                <span data-toggle="tooltip" title="Matricula" class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" maxlength="254" class="form-control" name="matricula"  id="matricula">
                              </div>
                        </div>
                    </div>

                      <input type="hidden" id="id" name="id">
                </form>
-->

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
