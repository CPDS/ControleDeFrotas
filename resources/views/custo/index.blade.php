@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/custo.js')}}"></script>
@section('htmlheader_title')
    Custos
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                  <div class="pull-left">
            				<h2> &nbsp <i class="fa fa-dollar"></i> @yield('contentheader_title', 'Custos Cadastrados')</h2>
            			</div>
                    <div class="box-header with-border">
                      <!--  <h3 class="box-title fa fa-road">Percursos Cadastrados</h3> -->
                         <div class="col-md-12">
                          <div class="pull-right">
                       <span>   <!-- Botão para cadastrar -->
                            <a class="btn btn-primary btnAdicionarCustos btn-sm "><i class="fa fa-plus"></i> Cadastrar Custo</a>
                        </span>
                        </div>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="tabela_custos">
                            <thead>
                            <tr>
                               <th>ID</th>
                                <th>Quantidade da Diária</th>
                                <th>Valor da Diária</th>
                                <th>Custo Total da Diária</th>
                                <th>Valor da Manutenção</th>
                                <th>Custo Total da Viagem</th>
                                <th>Diário de Bordo</th>
                                <th>Combustível</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>
@include('custo.modals.criar_editar_custo')
@include('custo.modals.visualizar_custo')
@include('custo.modals.retirar_custo')
@endsection
