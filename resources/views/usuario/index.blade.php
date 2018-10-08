@extends('adminlte::layouts.app')

<script src ="{{ asset('plugins/jQuery/jQuery-3.1.0.min.js') }}" type = "text/javascript" ></script>

<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>
<script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
<script src=" {{ asset('js/ScriptsGerais/usuario.js') }} "> </script>

@section('main-content')

	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2><i class="fa fa-users"></i> @yield('contentheader_title', 'Usuários')</h2>
			</div>

			<br>

		<div class="pull-right">
				<a class="btn btn-primary btnAdicionarUsuario" title="Novo Usuário" data-toggle="tooltip"><span class="fa fa- fa-user-plus"></span> Novo Usuário</a>
			</div>
		</div>
	</div>


	<div class="box">
		<div class="box-body">
			<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			   <thead>
					<tr>
						 <th>ID</th>
						 <th>Nome</th>
						 <th>E-mail</th>
						 <th>Funçao</th>
						 <th>Status</th>
						 <th>Ação</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>

@include('usuario.modals.criar_editar_usuario')
@include('usuario.modals.visualizar_usuario')
@include('usuario.modals.retirar_usuario')

@endsection
