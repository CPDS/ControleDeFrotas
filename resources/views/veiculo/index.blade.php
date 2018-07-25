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
    Change Title here!
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Example box</h3>
                         <div class="col-md-12"> 
                          <div class="pull-right">
                        <span>
                            <a class="btn btn-primary btnAdicionar btn-sm "><i class="fa fa-plus"></i>  Cadastrar veículo</a>
                        </span>
                        </div>
                        </div>  
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table" id="tabela_veiculo">
                            <thead>
                            <tr>
                                <th>Nº</th>
                                <th>Nome</th>
                                <th>Placa</th>
                                <th>Tipo Combustível</th>
                                <th>Ações</th>
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
@include('veiculo.modals.visualizar')
@endsection