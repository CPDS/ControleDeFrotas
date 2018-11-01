@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/termo_aditivo.js')}}"></script>
@section('htmlheader_title')
    Termo Aditivo
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                  <div class="pull-left">
            				<h2> &nbsp <i class="fa fa-file"></i> @yield('contentheader_title', 'Termos Cadastrados')</h2>
            			</div>
                    <div class="box-header with-border">

                         <div class="col-md-12">
                          <div class="pull-right">
                       <span>   <!-- Botão para cadastrar -->
                            <a class="btn btn-primary btnAdicionarTermos btn-sm "><i class="fa fa-plus"></i> Cadastrar Termo Aditivo</a>
                        </span>
                        </div>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="tabela_termo_aditivo">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Data de Ínico</th>
                                <th>Data de Término</th>
                                <th>Valor</th>
                                <th>Contrato</th>
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
@include('termo.modals.criar_editar_termo')
@include('termo.modals.visualizar_termo')
@include('termo.modals.retirar_termo')
@endsection
