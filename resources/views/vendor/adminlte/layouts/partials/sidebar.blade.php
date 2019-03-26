<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('Conrole de Frotas') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('Ínicio') }}</span></a></li>
          <!--  <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li> -->
            <ul class="sidebar-menu">

          <!--  <li class="active"><a href="{{ url('viagems') }}"><i class='fa fa-globe'></i> <span>{{ trans('Viagem') }}</span></a></li> -->
            <li class="treeview"> <!-- cria o menuzinho que abre para cadastrar a viagem -->
               <a href="{{ url('viagens') }}"><i class='fa fa-globe'></i> <span>{{ trans('Gerenciar Viagem') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu"><!-- se a role nao pegar na linha tenta colocar antes desse treeview -->
                @role('Administrador')<li><a href="{{ url('viagens') }}">{{ trans('Viagens Solicitadas') }}</a></li>@endrole
                     @role('Administrador')<li><a class="btnAdicionarViagems" data-id="{{Auth::user()->id}}" data-name="{{Auth::user()->name}}">{{ trans('Solicitação de Viagem') }}</a></li>@endrole
                    @role('Administrador')<li><a href="{{ url('percursos') }}" class="btnAdicionarPercursos">{{ trans('Percursos') }}</a></li>@endrole
                    @role('Administrador|Motorista')<li><a href="{{ url('diarios') }}" class="btnAdicionarDiarios">{{ trans('Diários de Bordo') }}</a></li>@endrole
                </ul>

            </li>
            @role('Administrador')<li class="active"><a href="{{ url('passageiros') }}"><i class='fa fa-users'></i> <span>{{ trans(' Gerenciar Passageiros') }}</span></a></li>@endrole

            <li class="treeview"> <!-- cria o menuzinho que abre para cadastrar veículos -->
            @role('Administrador')<a href="#"><i class='fa fa-car'></i> <span>{{ trans('Gerenciar Veículos') }}</span> <i class="fa fa-angle-left pull-right"></i></a>@endrole
                <ul class="treeview-menu">
                @role('Administrador')<li><a href="{{ url('veiculos') }}">{{ trans('Veículos Cadastrados') }}</a></li>@endrole
                     @role('Administrador')<li><a class="btnAdicionarVeiculos">{{ trans('Cadastrar Veículos') }}</a></li>@endrole
                     @role('Administrador')<li><a href="{{ url('servicos') }}">{{ trans('Serviços Cadastrados') }}</a></li>@endrole
                </ul>

            </li>
            <!--Gerenciar demais opções -->
            <li class="treeview"> <!-- cria o menuzinho que abre para gerenciar demais opções -->
               <a href="{{ url('Gerenciar') }}"><i class='fa fa-globe'></i> <span>{{ trans('Gerenciar') }}</span> <i class="fa fa-wrench pull-right"></i></a>
                <ul class="treeview-menu">
                @role('Administrador')<li><a href="{{ url('banco_horas') }}">{{ trans('Banco de Horas') }}</a></li>@endrole
                @role('Administrador')<li><a href="{{ url('setor') }}">{{ trans('Setores') }}</a></li>@endrole
                @role('Administrador')<li><a href="{{ url('contratos') }}" class="btnAdicionarContratos">{{ trans('Contrato') }}</a></li>@endrole
                @role('Administrador')<li><a href="{{ url('tiposervico') }}">{{ trans('Tipo de Serviços') }}</a></li>@endrole
                @role('Administrador')<li><a href="{{ url('campus') }}">{{ trans('Campus') }}</a></li>@endrole
                @role('Administrador')<li><a href="{{ url('termos') }}">{{ trans('Termo Aditivo') }}</a></li>@endrole
                    @role('Administrador|Motorista')<li><a href="{{ url('combustivel') }}">{{ trans('Combustível') }}</a></li>@endrole
                </ul>

            </li>

        </ul><!-- /.sidebar-menu -->
      <!--  <ul class="sidebar-menu">
        <li class="active"><a href="{{ url('veiculos') }}"><i class='fa fa-car'></i> <span>{{ trans('Veículos') }}</span></a></li> </ul> -->
    </section>
    <!-- /.sidebar -->
</aside>
