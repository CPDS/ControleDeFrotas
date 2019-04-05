@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/veiculo.js')}}"></script>
@section('htmlheader_title')
    Veículos
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                  <div class="pull-left">
                    <h2> &nbsp <i class="fa fa-car"></i>  @yield('contentheader_title', 'Veículos Cadastrados')</h2>
                  </div>
                    <div class="box-header with-border">

                         <div class="col-md-12">
                          <div class="pull-right">
                       <span>
                            <a class="btn btn-primary btnAdicionarVeiculos btn-sm "><i class="fa fa-plus"></i> Cadastrar Veículo</a>
                        </span>
                        </div>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="tabela_veiculo">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do Veículo</th>
                            <!--    <th>Placa</th> -->
                             <!--   <th>Campus</th> -->
                                <th>Quantidade Total de Lugares</th>
                                <th>Mínimo de Passageiros</th>
                                <th>Máximo de Passageiros</th>
                               <!-- <th>Rendimento</th> -->
                                <th>Ar Condicionado</th>
                                <th>Bagageiro</th>
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
@include('veiculo.modals.criar_editar_veiculo')
@include('veiculo.modals.visualizar_veiculo')
@include('veiculo.modals.retirar_veiculo')
@endsection
