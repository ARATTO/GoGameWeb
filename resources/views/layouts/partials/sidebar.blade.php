<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('gogame/FotoPerfil')}}/{{ Auth::user()->IMAGENPERFIL }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->NOMBREPERFIL }}</p>
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
            <li class="header">{{ trans('gogamessage.MenuCabecera') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <!--
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li>
            -->


            <!-- MENU ADMINISTRADOR -->
            @include('layouts.partials.nav.administrador')
            <!-- FIN MENU ADMINISTRADOR -->

            <!-- MENU COORDINADOR -->
            @include('layouts.partials.nav.coordinador')
            <!-- FIN MENU COORDINADOR -->

            <!-- MENU DOCENTE -->
            @include('layouts.partials.nav.docente')
            <!-- FIN MENU DOCENTE -->

            <!-- MENU ESTUDIANTE -->
            @include('layouts.partials.nav.estudiante')
            <!-- FIN MENU ESTUDIANTE -->

            <!-- MENU TODOS -->
            @include('layouts.partials.nav.todos')
            <!-- FIN MENU TODOS -->

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
