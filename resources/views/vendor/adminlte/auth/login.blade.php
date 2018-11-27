@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Log in
@endsection

@section('content')
<body class="hold-transition login-page">
    <div id="app">
        <div class="login-box">
            <div class="login-logo">
                <b>Controle de Frotas</b>
                <center><h5>Sistema de Reservas de Viagens</h5></center>
            </div><!-- /.login-logo -->

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Ops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="callout callout-danger hidden">
            <p></p>
        </div>
        <div class="login-box-body">
        <p class="login-box-msg"> Inicie sua sessão<!--{{ trans('adminlte_lang::message.siginsession') }}--> </p>
        <form action="{{ url('/login') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" name="email"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <!--<input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password"/>-->
                <input type="password" class="form-control" placeholder="Senha" name="password"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <!--<input type="checkbox" name="remember"> {{ trans('adminlte_lang::message.remember') }}-->
                            <input type="checkbox" name="remember"> Lembrar-me
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <!--<button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.buttonsign') }}</button>-->
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar
                </div><!-- /.col -->
            </div>
        </form>


        <a href="{{ url('/password/reset') }}">Esqueci minha senha</a><br>

    </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    </div>
    @include('adminlte::layouts.partials.scripts_auth')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>

@endsection
