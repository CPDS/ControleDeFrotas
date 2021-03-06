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
              <strong>Nome do Setor:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-black-tie"></i></span>
                <input maxlength="250" id="nome_setor" class="form-control" name="nome_setor" type="text">
              </div>
            </div>


            <div class="form-group col-md-12 senha">
              <strong>Nome do Campus:</strong>
              <input id="fk_campus" class="form-control" name="fk_campus" type="hidden">
              <select name="fk_campus" id="fk_campus" class="form-control selectCampus">
                @foreach($campus as $campu)
                  <option value='{{$campu->id}}'>{{$campu->nome_campus}}</option>
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
