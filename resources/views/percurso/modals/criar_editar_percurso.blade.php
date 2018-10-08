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
              <strong>Hora de Saída:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input maxlength="250" id="hora_saida" class="form-control" name="hora_saida" type="date">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Hora de Chegada:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input id="hora_chegada" maxlength="250" class="form-control" name="hora_chegada" type="date">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Estado de Saída:</strong> <!-- mudar id e name -->
              <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-genderless"></i></span>
                <input id="local_saida" maxlength="250" class="form-control" name="local_saida" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Local de Saída:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-genderless"></i></span>
                <input id="local_saida" maxlength="250" class="form-control" name="local_saida" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Estado de Chegada:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input id="local_chegada" maxlength="250" class="form-control" name="local_chegada" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Local de Chegada:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input id="local_chegada" maxlength="250" class="form-control" name="local_chegada" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>KM de Saída:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-dashboard"></i></span>
                <input id="km_saida" maxlength="250" class="form-control" name="km_saida" type="text">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>KM de Chegada:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input id="km_chegada" maxlength="250" class="form-control" name="km_chegada" type="text">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Roteiro:</strong>
              <div class="input-group col-md-12">
               <span></span>
                <textarea rows="5" id="roteiro" maxlength="250" class="form-control" name="roteiro" type="text"></textarea>
              </div> <!-- Verificar tamanho após rota ser configurado -->
            </div>

            <div class="form-group col-md-12">
              <strong>Diário de Bordo:</strong>
              <div class="input-group col-md-12">
                <textarea rows="5" id="fk_diario" maxlength="250" class="form-control" name="fk_diario" type="text"></textarea>
              </div>
            </div>

          <!--
              </div>
            </div> -->
<!--
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
                 <select name="tem_arcondicionado" id="tem_arcondicionado" class="form-control">
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
             </div> -->

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
