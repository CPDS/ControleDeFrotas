<!-- @extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
			<!--	<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Home</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						{{ trans('adminlte_lang::message.logged') }}. Teste testando !!!
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

<!--			</div>
		</div>
	</div>
@endsection -->

<!-- Content Header (Page header) -->
@section('main-content')

<section class="content-header">

  <h1>
    @yield('contentheader_title', 'Área de Trabalho')
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
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Geral</h3>
              <br>
              <strong><p>descrição...</p></strong>
            </div>

            <div class="icon">
              <i class="glyphicon glyphicon-eye-open"></i>
            </div>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>X</h3>

              <strong><p>Reserva(s) de laboratório(s)<br> agendadas para hoje</p></strong>
            </div>
            <div class="icon">
            	<i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="#" class="small-box-footer">Exibir reserva(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>X</h3>

              <strong><p>Reserva(s) de equipamento(s)<br> aguardando retirada hoje</p></strong>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o "></i>
            </div>
            <a href="#" class="small-box-footer">Exibir reserva(s) <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>X</h3>
              <br>
              <strong><p>Equipamento(s) com defeito</p></strong>
            </div>
            <div class="icon">
              <i class="glyphicon glyphicon-thumbs-down"></i>
            </div>
            <a href="#" class="small-box-footer">Exibir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
         	<div class="small-box bg-aqua">
	            <div class="inner">
	              <h3>X</h3>
	              <br>
	              <strong><p>Retirada(s) de equipamento em andamento</p></strong>
	            </div>
	            <div class="icon">
	              <i class="glyphicon glyphicon-check"></i>
	            </div>
	            <a href="#" class="small-box-footer">Exibir Retirada(s) <i class="fa fa-arrow-circle-right"></i></a>
          	</div>
        </div>

    	<div class="col-lg-4 col-xs-6">
          	<!-- small box -->
          	<div class="small-box bg-green">
            	<div class="inner">
              		<h3>X</h3>
              		<br>
              		<strong><p>Laboratório(s) em uso</p></strong>
            	</div>

            	<div class="icon">
              		<i class="glyphicon glyphicon-ok"></i>
            	</div>
            	<a href="#" class="small-box-footer">Exibir <i class="fa fa-arrow-circle-right"></i></a>
          	</div>
    	</div>
	</div>
</section>


@endsection
