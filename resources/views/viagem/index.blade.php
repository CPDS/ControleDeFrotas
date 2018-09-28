@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/viagem.js')}}"></script>
@section('htmlheader_title')
    Veículos
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Viagems Solicitadas</h3>
                         <div class="col-md-12">
                          <div class="pull-right">
                        <span>
                          <!--  <a class="btn btn-primary btnAdicionar btn-sm"><i class="fa fa-plus"></i>  Cadastrar Viagem</a> -->
                        </span>
                        </div>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="tabela_viagem">
                            <thead>
                            <tr>
                                <th>Nº RV</th>
                                <th>Setor Emissor da RV</th>
                                <th>Veículo</th>
                                <th>Horário de Saída</th>
                                <th>Horário de Chegada</th>
                                <th>Cidade de Saída</th>
                                <th>Cidade de Chegada</th>
                                <th>Tipo de Serviço</th>
                                <th>Solicitante</th>
                                <th>Estimativa de KM</th>
                                <th>Estado</th>
                                <th>Nome Responsável</th>
                                <th>Telefone</th>
                                <th>Local de Saída</th>
                                <th>Autorização</th>
                                <th>Nº Passageiros</th>
                                <th>Tipo de Solicitação</th>
                                <th>Natureza da Viagem</th>
                                <th>Custo da Viagem</th>
                                <th>Código ACP</th>
                                <th>Bagagem</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>
@include('viagem.modals.criar_editar')
@include('viagem.modals.visualizar')
@include('viagem.modals.excluir')
@endsection
