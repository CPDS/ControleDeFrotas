@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app" v-cloak>
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/home') }}"><b>Controle de Frotas</b></a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body">
                <p style="color:red"> Entre em contato com o setor de Transporte da UESB para realizar seu cadastro!</p>
                <a href="{{ url('/login') }}">Voltar</a><br>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>



    @include('adminlte::layouts.partials.scripts_auth')



</body>

@endsection
