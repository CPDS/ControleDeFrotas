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

        <form id="form" role="form" method="post">
          <div class="row" style="width: 100%">

            <div class="form-group col-md-12">
              <strong>Nome de Veículo:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-bus"></i></span>
                <input maxlength="250" id="nome_veiculo" class="form-control" name="nome_veiculo" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Placa:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-cc-jcb"></i></span>
                <input id="placa" maxlength="10" class="form-control" name="placa" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
             <strong>Tipo de Combustível:</strong>
                <select name="tipo_combustivel" id="tipo_combustivel" class="form-control">
                  <option value='' selected disabled>Selecione ...</option>
                  <option value="Combustível X">Combustível X</option>
                  <option value="Combustível Y">Combustível Y</option>
                  <option value="Combustível Z">Combustível Z</option>
                </select>
            </div>

            <div class="form-group col-md-12">
              <strong>Campus:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                <input maxlength="150" id="fk_campus" class="form-control" name="fk_campus" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Total de Lugares:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-bus"></i></span>
                <input id="qtd_total_lugares" maxlength="20" class="form-control" name="qtd_total_lugares" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Ano de Fabricação:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input maxlength="20" class="form-control" id="ano_fabricacao" name="ano_fabricacao" type="text">
              </div>
            </div>

             <div class="form-group col-md-6">
               <strong>Mínimo de Passageiros:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-users"></i></span>
                 <input id="minimo_passageiros" maxlength="20" class="form-control" name="minimo_passageiros" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Maxímo de Passageiros:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-users"></i></span>
                 <input id="maximo_passageiros" maxlength="20" class="form-control" name="maximo_passageiros" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Rendimento:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-tachometer"></i></span>
                 <input id="rendimento" maxlength="20" class="form-control" name="rendimento" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
               <strong>Marca:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-adn"></i></span>
                 <input id="marca" maxlength="20" class="form-control" name="marca" type="text">
               </div>
             </div>

             <div class="form-group col-md-6">
              <strong>Ar Condicionado:</strong>
                 <select name="tipo_combustivel" id="tem_arcondicionado" class="form-control">
                   <option value='' selected disabled>Selecione ...</option>
                   <option value="Sim">Sim</option>
                   <option value="Não">Não</option>
                 </select>
             </div>

             <div class="form-group col-md-6">
               <strong>Bagageiro:</strong>
               <div class="input-group">
                 <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                 <input id="tipo_bagageiro" maxlength="254" class="form-control" name="tipo_bagageiro" type="text">
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
