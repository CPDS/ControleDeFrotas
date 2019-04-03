
@extends('adminlte::page')
<script src ="{{ asset('/plugins/jQuery/jQuery-3.1.0.min.js') }}" type = "text/javascript" ></script>
<script src ="{{ asset('/js/ScriptsGerais/usuario.js') }}" type = "text/javascript" ></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}" type = "text/javascript"></script>
<script src="{{ asset('plugins/mask-input-js/maskinput.js') }}" type = "text/javascript"></script>

<script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">
<script src="{{ asset('js/iziToast.min.js') }}"></script>

@section('htmlheader_title')
	Gerenciar Permissões
@endsection
@section('usuario', 'active')

@section('main-content')
	  <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Permissões</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">  
                        <form id="form">
                         <select name="fk_model" class="form-control" id="papel" name="papel">
                            <option> - </option>
                            @foreach($models as $model)
                                <option value="{{ $model->id }}">{{ $model->name }}
                            @endforeach
                        </select>
                       
                        @foreach($permissions as $permission)
                        <label>
                            <input type="checkbox" id="permissao" name="permissao[]" value="{{ $permission->id }}"> {{ $permission->name }}
                        </label>
                        <br>
                        @endforeach
                          <button type="button" class="btn btn-action btn-success permission" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> &nbsp Aguarde...">
                              <i class="fa fa-floppy-o"> </i>
                            </button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </div>

@endsection