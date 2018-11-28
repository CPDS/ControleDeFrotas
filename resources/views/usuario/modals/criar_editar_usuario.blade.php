<div id="criar_editar-modal" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog ">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
        <small class="modal-sub" style="color: red;"></small>
      </div> <!-- Fim de ModaL Header-->

      <div class="modal-body">

        <div class="callout callout-danger hidden">
            <p></p>
        </div>

       <form id="form" role="form" method="post">
         <div class="row" style="width: 100%">

            <div class="form-group col-md-12">
              <strong>Nome Completo:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input placeholder="Digite o nome completo do usuário" maxlength="254" id="name" class="form-control" name="name" type="text">
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
              <strong>Endereço:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                <input placeholder="Digite o Endereço" maxlength="254" class="form-control" id="endereco" name="endereco" type="text">
              </div>
            </div>

            <div class="form-group col-md-12">
              <strong>Telefone:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input placeholder="Digite o Telefone" maxlength="254" class="form-control" id="telefone" name="telefone" type="text">
              </div>
            </div>

            <div class="form-group col-md-6 senha">
              <strong>Estado:</strong>
              <select name="estado" id="estado" class="form-control selectEstado">
                @foreach($estados as $estado)
                  <option value='{{$estado->id}}'>{{$estado->nome}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-md-6 senha ">
              <strong>Cidade</strong>
              <select name="cidade" id="cidade" class="form-control">
              </select>
            </div>

            <div class="form-group col-md-6 senha">
              <strong>Senha:</strong>
              <input placeholder="Digite uma senha" id="senha" maxlength="32" class="form-control" name="senha" type="password">
            </div>

            <div class="form-group col-md-6 senha ">
              <strong>Confirmar Senha:</strong>
              <input placeholder="Digite a senha novamente" maxlength="32" id="confirmarsenha" class="form-control"  name="confirmarsenha" type="password">
            </div>


            <div class="form-group col-md-12">
             <strong>Função:</strong>
                <select name="funcao" id="funcao" class="form-control">
                  <option value='' selected disabled>Selecione ...</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Secretaria">Secretária</option>
                  <option value="Motorista">Motorista</option>
                  <option value="Professor">Professor</option>
                  <option value="Tecnico">Técnico</option>
                </select>
            </div>

    <!--        <div class="form-group col-md-12">
              <strong>Endereço:</strong>
              <div class="input-group">
                <span class="input-group-addon"><i class="material-icons md-18">add_location</i></span>
                <input placeholder="Digite o endereço" maxlength="254" id="endereco" class="form-control" name="endereco" type="text">
              </div>
            </div> -->


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
