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
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
          <!--  <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li> -->
            <ul class="sidebar-menu">
            <li class="active"><a href="{{ url('viagems') }}"><i class='fa fa-globe'></i> <span>{{ trans('Viagem') }}</span></a></li>
            <li class="treeview"> <!-- cria o menuzinho que abre para cadastrar a viagem -->
               <a href="{{ url('viagems') }}"><i class='fa fa-location-arrow'></i> <span>{{ trans('Cadastro de Viagem') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- <li><a href="#">{{ trans('Solicitação de Vaga') }}</a></li> -->
                    <li><a class="btnAdicionarViagems">{{ trans('Solicitação de Viagem') }}</a></li>
                </ul>

            </li>
            <li class="active"><a href="{{ url('passageiros') }}"><i class='fa fa-globe'></i> <span>{{ trans('Passageiros') }}</span></a></li>
            <li class="active"><a href="{{ url('veiculos') }}"><i class='fa fa-car'></i> <span>{{ trans('Veículos') }}</span></a></li>
            <li class="active"><a href="{{ url('contato') }}"><i class='fa fa-phone'></i> <span>{{ trans('Contato') }}</span></a></li>
        </ul><!-- /.sidebar-menu -->
      <!--  <ul class="sidebar-menu">
        <li class="active"><a href="{{ url('veiculos') }}"><i class='fa fa-car'></i> <span>{{ trans('Veículos') }}</span></a></li> </ul> -->
    </section>
    <!-- /.sidebar -->
</aside>
