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
          <a href="{{ url('usuarios') }}" >
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>&nbsp; Painel Usuários</h3>
              <!-- pula linha removido para ficar sincrono na tela -->
              <strong><p>Usuário(s) cadastrado(s)<br> no sistema</p></strong>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="{{ url('usuarios') }}" class="small-box-footer">Exibir usuário(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div> </a>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="{{ url('viagens') }}">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>&nbsp; Painel Viagens</h3>

              <strong><p>Reserva(s) de viagem(s)<br> agendadas</p></strong>
            </div>
            <div class="icon">
            	<i class="fa fa-road"></i>
            </div>
            <a href="{{ url('viagens') }}" class="small-box-footer">Exibir viagem(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div></a>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="{{ url('veiculos') }}">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>&nbsp; Painel Veículos</h3>

              <strong><p>Veículo(s) cadastrado(s)<br> no sistema</p></strong>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div>
            <a href="{{ url('veiculos') }}" class="small-box-footer">Exibir veículo(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div> </a>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="{{ url('passageiros') }}">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>&nbsp; Painel Passageiros</h3>

              <strong><p>Exibir passageiro(s) cadastrado(s)<br> no sistema</p></strong>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{ url('passageiros') }}" class="small-box-footer">Exibir Passageiro(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div></a>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <a href="{{ url('contratos') }}">
         	<div class="small-box bg-aqua">
	            <div class="inner">
	              <h3>&nbsp; Painel Contratos</h3>

	              <strong><p>Contrato(s) cadastrado(s)<br> no sistema</p></strong>
	            </div>
	            <div class="icon">
	              <i class="fa fa-file"></i>
	            </div>
	            <a href="{{ url('contratos') }}" class="small-box-footer">Exibir Contrato(s) <i class="fa fa-arrow-circle-right"></i></a>
          	</div></a>
        </div>

    	<div class="col-lg-4 col-xs-6">
          	<!-- small box -->
            <a href="{{ url('percursos') }}">
          	<div class="small-box bg-green">
            	<div class="inner">
              		<h3>&nbsp; Painel Percursos</h3>

              		<strong><p>Percurso(s) cadastrado(s)<br> no sistema</p></strong>
            	</div>

            	<div class="icon">
              		<i class="fa fa-road"></i>
            	</div>
            	<a href="{{ url('percursos') }}" class="small-box-footer">Exibir Percurso(s) <i class="fa fa-arrow-circle-right"></i></a>
          	</div></a>
    	</div>
	</div>
</section>


@endsection
