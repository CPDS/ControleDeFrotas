@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/banco_hora.js')}}"></script>
@section('htmlheader_title')
    Banco de Horas
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                  <div class="pull-left">
                    <h2> &nbsp<i class="fa fa-calendar-times-o"></i>  @yield('contentheader_title', 'Horas Cadastradas')</h2>
                  </div>
                    <div class="box-header with-border">


                        <div class="col-md-12">
                         <div class="pull-right">
                      <span>   <!-- Botão para cadastrar -->
                           <a class="btn btn-primary btnAdicionarHoras btn-sm "><i class="fa fa-plus"></i> Cadastrar Hora</a>
                       </span>
                       </div>
                       </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="tabela_banco_horas">
                            <thead>
                            <tr>
                                <th>Hora de Ínicio</th>
                                <th>Hora de Término</th>
                                <th>Hora de Intervalo</th>
                                <th>Motorista</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>
@include('banco_hora.modals.criar_editar_banco_hora')
@include('banco_hora.modals.visualizar_banco_hora')
@include('banco_hora.modals.retirar_banco_hora')
@endsection
