<!-- Content Header (Page header) -->
@section('main-content')

<section class="content-header">

  <h1>
    <h2>  <i class="fa fa-wrench"></i> @yield('contentheader_title', 'Área de Trabalho')
    <small>@yield('contentheader_description')</small>
 	</h1>

</section>

<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
  	<br><br>
  </div>

  <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a style="color: white;" href="{{ url('usuarios') }}" >
          <div class="small-box bg-orange">
            <div class="inner">
              <h3 align="center">Usuários</h3>
              <!-- pula linha removido para ficar sincrono na tela -->
              <strong><p align="center">Usuário(s) cadastrado(s) no sistema</p></strong>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{ url('usuarios') }}" class="small-box-footer">Usuário(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div> </a>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a style="color: white;" href="{{ url('viagens') }}">
          <div class="small-box bg-green">
            <div class="inner">
              <h3 align="center">Viagens</h3>

              <strong><p align="center">Reserva(s) de viagem(s) agendadas</p></strong>
            </div>
            <div class="icon">
            	<i class="fa fa-road"></i>
            </div>
            <a href="{{ url('viagens') }}" class="small-box-footer">Viagem(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div></a>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a style="color: white;" href="{{ url('veiculos') }}">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 align="center">Veículos</h3>

              <strong><p align="center">Veículo(s) cadastrado(s) no sistema</p></strong>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <a href="{{ url('veiculos') }}" class="small-box-footer">Veículo(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div> </a>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a style="color: white;" href="{{ url('passageiros') }}">
          <div class="small-box bg-green">
            <div class="inner">
              <h3 align="center"> Passageiros</h3>

              <strong><p align="center">Exibir passageiro(s) cadastrado(s) no sistema</p></strong>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{ url('passageiros') }}" class="small-box-footer">Passageiro(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div></a>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a style="color: white;" href="{{ url('contratos') }}">
         	<div class="small-box bg-aqua">
	            <div class="inner">
	              <h3 align="center">Contratos</h4>

	              <strong><p align="center">Contrato(s) cadastrado(s) no sistema</p></strong>
	            </div>
	            <div class="icon">
	              <i class="fa fa-file"></i>
	            </div>
	            <a href="{{ url('contratos') }}" class="small-box-footer">Contrato(s) <i class="fa fa-arrow-circle-right"></i></a>
          	</div></a>
        </div>

    	<div class="col-lg-4 col-xs-6">
          	<!-- small box -->
            <a style="color: white;" href="{{ url('percursos') }}">
          	<div class="small-box bg-green">
            	<div class="inner">
              		<h3 align="center">Percursos</h3>

              		<strong><p align="center">&nbsp;Percurso(s) cadastrado(s) no sistema</p></strong>
            	</div>

            	<div class="icon">
              		<i class="fa fa-road"></i>
            	</div>
            	<a href="{{ url('percursos') }}" class="small-box-footer">Percurso(s) <i class="fa fa-arrow-circle-right"></i></a>
          	</div></a>
    	</div>
	</div>
</section>


@endsection
