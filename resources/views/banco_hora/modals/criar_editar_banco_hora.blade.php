<div id="criar_editar-modal" class="modal fade bs-example" role="dialog" data-backdrop="static">
 <div class="modal-dialog modal-lg">
   <div class="modal-content">

     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
       <h4 class="modal-title"></h4>
     </div> <!-- Fim de ModaL Header-->

     <div class="modal-body">

       <div class="erros callout callout-danger hidden">
               <p></p> <!-- Modal de Banco de Horas -->
       </div>


       <form id="form" role="form" method="post">
         <div class="row" style="width: 100%">

           <div class="form-group col-md-6">
             <strong>Hora de Ínicio:</strong>
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
               <input id="hora_inicio" class="form-control" name="hora_inicio" type="time">
             </div>
           </div>

           <div class="form-group col-md-6">
             <strong>Hora de Término:</strong>
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
               <input id="hora_termino" class="form-control" name="hora_termino" type="time">
             </div>
           </div>

           <div class="form-group col-md-6">
             <strong>Hora de Intervalo:</strong>
             <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-calendar-times-o"></i></span>
               <input id="hora_intervalo" class="form-control" name="hora_intervalo" type="time">
             </div>
           </div>

               <input id="fk_motorista" class="form-control" name="fk_motorista" type="hidden">
           <div class="form-group col-md-6 senha">
             <strong>Motorista:</strong>
             <select name="fk_motorista" id="fk_motorista" class="form-control selectMotorista">
               @foreach($users as $motorista)
                 <option value='{{$motorista->id}}'>{{$motorista->name}}</option>
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
