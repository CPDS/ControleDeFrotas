@extends('adminlte::layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel de Controle de Frotas</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!--  HOME do PROJETO TELA PRINCIPAL-->
                    <div class="row">
                    	<br><br>
                    </div>

                    <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                          <div class="inner">
                            <h3>Painel Usuários</h3>
                            <br>
                            <strong><p>usuário(s) cadastrado(s)<br> no sistema</p></strong>
                          </div>
                          <div class="icon">
                            <i class="fa fa-user"></i>

                          <a href="{{ url('usuarios') }}" class="small-box-footer">Exibir usuário(s) <i class="fa fa-arrow-circle-right"></i></a>
                          </div>
                        </div>
                      </div>

                          <!-- ./col -->
                          <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">
                                <h3>Painel Viagems</h3>
                                <br>
                                <strong><p>viagem(s) cadastrada(s)<br> no sistema</p></strong>
                              </div>
                              <div class="icon">
                                <i class="fa fa-road"></i>

                              <a href="{{ url('viagems') }}" class="small-box-footer">Exibir viagem(s) <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                          </div>
                          <!-- ./col -->
                          <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">
                                <h3>Painel Veículos</h3>
                                <br>
                                <strong><p>veículo(s) cadastrado(s)<br> no sistema</p></strong>
                              </div>
                              <div class="icon">
                                <i class="fa fa-car"></i>

                              <a href="{{ url('veiculos') }}" class="small-box-footer">Exibir veículo(s) <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                          </div>

                          <!-- ./col -->
                          <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">
                                <h3>Painel Passageiros</h3>
                                <br>
                                <strong><p>passageiro(s) cadastrado(s)<br> no sistema</p></strong>
                              </div>
                              <div class="icon">
                                <i class="fa fa-users"></i>

                              <a href="{{ url('passageiros') }}" class="small-box-footer">Exibir passageiro(s) <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">
                                <h3>Painel Contratos</h3>
                                <br>
                                <strong><p>contrato(s) cadastrado(s)<br> no sistema</p></strong>
                              </div>
                              <div class="icon">
                                <i class="fa fa-file"></i>

                              <a href="{{ url('contratos') }}" class="small-box-footer">Exibir contrato(s) <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                              <div class="inner">
                                <h3>Painel Percursos</h3>
                                <br>
                                <strong><p>percurso(s) cadastrado(s)<br> no sistema</p></strong>
                              </div>
                              <div class="icon">
                                <i class="fa fa-road"></i>

                              <a href="{{ url('percursos') }}" class="small-box-footer">Exibir percurso(s) <i class="fa fa-arrow-circle-right"></i></a>
                              </div>
                            </div>
                          </div>
                  	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
