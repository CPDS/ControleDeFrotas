@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/contrato.js')}}"></script>
@section('htmlheader_title')
    Contrato
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                  <div class="pull-left">
                    <h2> &nbsp<i class="fa fa-file-o"></i>  @yield('contentheader_title', 'Contratos Cadastrados')</h2>
                  </div>
                    <div class="box-header with-border">


                        <div class="col-md-12">
                         <div class="pull-right">
                      <span>   <!-- Botão para cadastrar -->
                           <a class="btn btn-primary btnAdicionarContratos btn-sm "><i class="fa fa-plus"></i> Cadastrar Contrato</a>
                       </span>
                       </div>
                       </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="tabela_contrato">
                            <thead>
                            <tr>
                                <th>Nome da Empresa</th>
                                <th>CNPJ</th>
                                <th>Nº do Contrato</th>
                                <th>Ínicio do Contrato</th>
                                <th>Vencimento do Contrato</th>
                                <th>Valor do Contrato</th>
                                <th>Tipo de Contrato</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>
@include('contrato.modals.criar_editar_contrato')
@include('contrato.modals.visualizar_contrato')
@include('contrato.modals.retirar_contrato')
@endsection
