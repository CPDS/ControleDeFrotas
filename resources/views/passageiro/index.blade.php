@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/passageiro.js')}}"></script>
@section('htmlheader_title')
    Passageiros
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

              <div class="box box-success">
                <div class="pull-left">
                  <h2> <i class="fa fa-users"></i>  @yield('contentheader_title', 'Passageiros')</h2>
                </div>
                  <div class="box-header with-border">
                    <!--  <h3 class="box-title fa fa-road">Percursos Cadastrados</h3> -->
                       <div class="col-md-12">
                        <div class="pull-right">
                     <span>   <!-- Botão para cadastrar -->
                          <a class="btn btn-primary btnAdicionar btn-sm "><i class="fa fa-plus"></i> Cadastrar Passageiro</a>
                      </span>
                      </div>
                      </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table" id="tabela_passageiro">
                            <thead>
                            <tr>
                                <th>Nome do Passageiro</th>
                                <th>Solicitação</th>
                                <th>RG</th>
                                <th>Matrícula</th>
                                <th>Telefone</th>
                                <th>Categoria</th>
                                <th>Email</th>
                                <th>instituição</th>
                                <th>Observações</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>
@include('passageiro.modals.criar_editar_passageiro')
@include('passageiro.modals.visualizar_passageiro')
@include('passageiro.modals.retirar_passageiro')
@endsection
