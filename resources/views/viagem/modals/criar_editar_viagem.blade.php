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
               <strong>Nº RV:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-file"></i></span>
                 <input placeholder="Digite o número da RV" maxlength="150" id="numero_rv" class="form-control" name="numero_rv" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Setor Emissor da RV:</strong>
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-university"></i></span>
               <select name="setor_emissor_rv" id="setor_emissor_rv" class="form-control">
                 <option value='' selected disabled>Selecione ...</option>
                 <option value="Setor X">Setor X</option>
                 <option value="Setor Y">Setor Y</option>
                 <option value="Setor Z">Setor Z</option>
               </select>
             </div>
             </div>

             <div class="form-group col-md-6 senha">
               <strong>Veículo:</strong>
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-bus"></i></span>
               <select name="fk_veiculo" id="fk_veiculo" class="form-control selectVeiculo">
                 @foreach($veiculos as $veiculo)
                   <option value='{{$veiculo->id}}'>{{$veiculo->nome_veiculo}}</option>
                 @endforeach
               </select>
             </div>
             </div>

          <!--   <div class="form-group col-md-6">
               <strong>Data de Chegada:</strong>
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
               <input id="data_chegada" class="form-control"  name="data_chegada" type="time">
             </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Data de Saída:</strong>
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
               <input id="data_saida" class="form-control"  name="data_saida" type="time">
             </div>
           </div> -->
           <div class="form-group col-md-6">
             <strong>Data de Saída:</strong>
             <div class="input-group">
             <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
             <input id="data_saida" class="form-control"  name="data_saida" type="date"> <!-- Campo nào pega hora ainda -->
           </div>
           </div>

           <div class="form-group col-md-6">
             <strong>Data de Chegada:</strong>
             <div class="input-group">
             <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
             <input id="data_chegada" class="form-control"  name="data_chegada" type="date"> <!-- Campo nào pega hora ainda -->
           </div>
           </div>

             <div class="form-group col-md-6">
               <strong>Horário de Saída:</strong>
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
               <input id="datahora_saida" class="form-control"  name="datahora_saida" type="time"> <!-- Campo nào pega hora ainda -->
             </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Horário de Chegada:</strong>
               <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
               <input id="datahora_chegada" class="form-control"  name="datahora_chegada" type="time"> <!-- Campo nào pega hora ainda -->
             </div>
             </div>

             <div class="form-group col-md-6 senha">
               <strong>Estado de Saída:</strong>
               <select name="estado" id="estado" class="form-control selectEstado">
                 @foreach($estados as $estado)
                   <option value='{{$estado->id}}'>{{$estado->nome}}</option>
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-6 senha">
               <strong>Estado de Chegada:</strong>
               <select name="estado2" id="estado2" class="form-control selectEstado2">
                 @foreach($estados as $estado)
                   <option value='{{$estado->id}}'>{{$estado->nome}}</option>
                 @endforeach
               </select>
             </div>

             <div class="form-group col-md-6 senha ">
               <strong>Cidade de Saída:</strong>
               <select name="fk_cidade_saida" id="fk_cidade_saida" class="form-control">
               </select>
             </div>

             <div class="form-group col-md-6 senha ">
               <strong>Cidade de Chegada:</strong>
               <select name="fk_cidade_chegada2" id="fk_cidade_chegada2" class="form-control">
               </select>
             </div>

             <div class="form-group col-md-12">
              <strong>Tipo de Serviço:</strong>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-gear"></i></span>
                 <select name="fk_tipo_servico" id="fk_tipo_servico" class="form-control">
                   <option value='' selected disabled>Selecione ...</option>
                   <option value="Serviço X">Serviço X</option>
                   <option value="Serviço Y">Serviço Y</option>
                   <option value="Serviço Z">Serviço Z</option>
                 </select> <!-- Tem que selecionar da tabela com as cidades -->
               </div>
             </div>

             <div class="form-group col-md-12">
               <strong>Solicitante:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 <input maxlength="250" id="fk_id_solicitante" class="form-control" name="fk_id_solicitante" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
                 <strong>Estimativa de KM</strong>
                 <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-road"></i></span>
                 <input placeholder="Informe a Estimativa de KM" maxlength="254" id="estimativa_km" class="form-control" name="estimativa_km" type="text">
                 </div>
             </div>

             <div class="form-group col-md-6">
              <strong>Situação:</strong>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-question"></i></span>
                 <select name="situacao" id="situacao" class="form-control">
                   <option value='' selected disabled>Selecione ...</option>
                   <option value="Situação X">Situação X</option>
                   <option value="Situação Y">Situação Y</option>
                   <option value="Situação Z">Situação Z</option>
                 </select> <!-- Tem que selecionar da tabela com as cidades -->
               </div>
             </div>

             <div class="form-group col-md-12">
               <strong>Nome Responsável:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                 <input placeholder="Digite o nome do responsável" maxlength="150" id="nome_responsavel" class="form-control" name="nome_responsavel" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Telefone:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                 <input placeholder="Digite o telefone do responsável" id="telefone_responsavel" maxlength="254" class="form-control" name="telefone_responsavel" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Local de Saída:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                 <input placeholder="Digite a cidade de saída" id="local_saida" maxlength="254" class="form-control" name="local_saida" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
              <strong>Autorização:</strong>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-check-square"></i></span>
                 <select name="setor_autoriza_viagem" id="setor_autoriza_viagem" class="form-control">
                   <option value='' selected disabled>Selecione ...</option>
                   <option value="Setor X">Setor X</option>
                   <option value="Setor Y">Setor Y</option>
                   <option value="Setor Z">Setor Z</option>
                 </select> <!-- Tem que selecionar da tabela com as cidades -->
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Nº Passageiros:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-group"></i></span>
                 <input placeholder="Digite quantidade de Passageiros" id="numero_passageiros" maxlength="254" class="form-control" name="numero_passageiros" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
              <strong>Tipo de Solicitação:</strong>
              <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                 <select name="tipo_solicitacao" id="tipo_solicitacao" class="form-control">
                   <option value='' selected disabled>Selecione ...</option>
                   <option value="Tipo X">Tipo X</option>
                   <option value="Tipo Y">Tipo Y</option>
                   <option value="Tipo Z">Tipo Z</option>
                 </select> <!-- Tem que selecionar da tabela com as cidades -->
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Natureza da Viagem:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-bullhorn"></i></span>
                 <input placeholder="Digite a Natureza da Viagem" id="natureza_servico" maxlength="254" class="form-control" name="natureza_servico" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Custo da Viagem:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-money"></i></span>
                 <input placeholder="Digite o Custo da Viagem" id="custo_viagem" maxlength="254" class="form-control" name="custo_viagem" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Código ACP:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
                 <input id="codigo_acp_rv" maxlength="254" class="form-control" name="codigo_acp_rv" type="text">
               </div>
             </div>

             <div class="form-group col-md-12">
               <strong>Bagagem:</strong>
              <!-- <span class="input-group-addon"><i class="fa fa-suitcase"></i></span> -->
               <div class="input-group col-md-12">
                <span></span>
                 <textarea rows="5" id="descricao_bagagem" maxlength="250" class="form-control" name="descricao_bagagem" type="text"></textarea>
               </div>
             </div>

             <input type="hidden" id="id" name="id">

         </div>

       </form>

       <!-- FORM DE EXEMPLO PARA CHUPAR dados

       <form id="form" role="form" method="post">
         <div class="row" style="width: 100%">

            <div class="form-group col-md-12">
              <strong>Nome Completo:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input placeholder="Digite o nome completo do usuário" maxlength="254" id="nome" class="form-control" name="nome" type="text">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Email:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input placeholder="Digite um email" maxlength="254" class="form-control" id="email" name="email" type="text">
              </div>
            </div>

            <div class="form-group col-md-6 senha">
              <strong>Senha:</strong>
              <input placeholder="Digite uma senha" id="senha" maxlength="32" class="form-control" name="senha" type="password">
            </div>

            <div class="form-group col-md-6 senha ">
              <strong>Confirmar Senha:</strong>
              <input placeholder="Digite a senha novamente" maxlength="32" id="confirmarsenha" class="form-control"  name="confirmarsenha" type="password">
            </div>

            <div class="form-group col-md-6">
              <strong>Telefone:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                <input placeholder="Digite o telefone" id="telefone" maxlength="254" class="form-control" name="telefone" type="text">
              </div>
            </div>


            <div class="form-group col-md-12">
              <strong>Endereço:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="material-icons md-18">add_location</i></span>
                <input placeholder="Digite o endereço" maxlength="254" id="endereco" class="form-control" name="endereco" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
                    <strong>Cidade</strong>
                    <input placeholder="Cidade" maxlength="254" id="cidade" class="form-control" name="cidade" type="text">
            </div>

            <div class="form-group col-md-6">
                    <strong>Estado</strong>
                    <input placeholder="Estado" maxlength="254" id="estado" class="form-control" name="estado" type="text">
            </div>

            <input type="hidden" id="id" name="id">

        </div>

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
