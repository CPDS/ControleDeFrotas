@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/servico.js')}}"></script>
@section('htmlheader_title')
    Servico
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                  <div class="pull-left">
            				<h2> &nbsp <i class="fa fa-wrench"></i> @yield('contentheader_title', 'Serviços Cadastrados')</h2>
            			</div>
                    <div class="box-header with-border">
                      <!--  <h3 class="box-title fa fa-road">Percursos Cadastrados</h3> -->
                         <div class="col-md-12">
                          <div class="pull-right">
                       <span>   <!-- Botão para cadastrar -->
                            <a class="btn btn-primary btnAdicionarServicos btn-sm "><i class="fa fa-plus"></i> Cadastrar Serviço</a>
                        </span>
                        </div>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="tabela_servicos">
                            <thead>
                            <tr>
                                <th>ID</th> 
                                <th>Veículo</th>
                                <th>Contrato</th>
                                <th>Valor dos Derivados</th>
                                <th>Valor das Peças</th>
                                <th>Valor do Serviço</th>
                                <th>Valor do SMV</th>
                                <th>Ordem de Serviço</th>
                                <th>Data do Serviço</th>
                                <th>Motorista</th>
                                <th>Tipo de Manutenção</th>
                                <th>Valor Pago</th> <!--restantes do campos suprimidos para melhor visualização -->
                                <th>Ação</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>
@include('servico.modals.criar_editar_servico')
@include('servico.modals.visualizar_servico')
@include('servico.modals.retirar_servico')
@endsection
