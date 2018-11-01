@extends('adminlte::page')
<!-- Script Geral-->
<script src="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js')}}"></script>
<script src="{{ asset('/plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{asset('js/ScriptsGerais/percurso.js')}}"></script>
@section('htmlheader_title')
    Percurso
@endsection


@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                  <div class="pull-left">
            				<h2> &nbsp <i class="fa fa-road"></i> @yield('contentheader_title', 'Percursos Cadastrados')</h2>
            			</div>
                    <div class="box-header with-border">
                      <!--  <h3 class="box-title fa fa-road">Percursos Cadastrados</h3> -->
                         <div class="col-md-12">
                          <div class="pull-right">
                       <span>   <!-- Botão para cadastrar -->
                            <a class="btn btn-primary btnAdicionarPercursos btn-sm "><i class="fa fa-plus"></i> Cadastrar Percurso</a>
                        </span>
                        </div>
                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered" id="tabela_percursos">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hora de Saída</th>
                                <th>Local de Saída</th>
                                <th>KM de Saída</th>
                                <th>Roteiro</th>
                                <th>Hora de Chegada</th>
                                <th>Local de Chegada</th>
                                <th>KM de Chegada</th>
                                <th>Diário de Bordo</th>
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
@include('percurso.modals.criar_editar_percurso')
@include('percurso.modals.visualizar_percurso')
@include('percurso.modals.retirar_percurso')
@endsection
