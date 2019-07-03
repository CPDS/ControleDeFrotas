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
              <strong>Data de Ínicio:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input maxlength="250" id="data_inicio" class="form-control" name="data_inicio" type="date" max="2200-12-31">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Data de Término:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                <input id="data_termino" maxlength="250" class="form-control" name="data_termino" type="date">
              </div>
            </div>

            <div class="form-group col-md-6">
              <strong>Valor:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa  fa-genderless"></i></span>
                <input id="valor" maxlength="250" class="form-control" name="valor" type="numeric">
              </div>
            </div>

            <div class="form-group col-md-12 senha">
              <strong>Contrato:</strong>
              <input id="fk_contrato" class="form-control" name="fk_contrato" type="hidden">
              <select name="fk_contrato" id="fk_contrato" class="form-control selectValor">
                @foreach($testecontrato as $valor)
                  <option value='{{$valor->id}}'>{{$valor->empresa_contratada_nome}}</option>
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
