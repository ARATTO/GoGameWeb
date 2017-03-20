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
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Admin') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- Inicio Menu Usuario -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Usuario') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('users.index') }}">{{ trans('gogamessage.VerUsuario') }}</a></li>
                            <li><a href="{{ route('users.create') }}">{{ trans('gogamessage.CrearUsuario') }}</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Usuario -->
                    <!-- Inicio Menu Materias -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Materia') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">{{ trans('gogamessage.VerMateria') }}</a></li>
                            
                        </ul>
                    </li>
                    <!-- Fin Menu Materias -->
                    <!-- Inicio Menu Ciclos -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Ciclo') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('ciclos.index') }}">{{ trans('gogamessage.VerCiclo') }}</a></li>
                            <li><a href="{{ route('ciclos.create') }}">{{ trans('gogamessage.CrearCiclo') }}</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Ciclos -->
                </ul>
            </li>
            <!-- FIN MENU ADMINISTRADOR -->

            <!-- MENU DOCENTE -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Docente') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- Inicio Menu Medallas -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Medalla') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">{{ trans('gogamessage.VerMedalla') }}</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Medallas -->
                    <!-- Inicio Menu Inscripcion Estudiante -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Inscripcion') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#">{{ trans('gogamessage.InscripcionEstudiante') }}</a></li>
                            
                        </ul>
                    </li>
                    <!-- Fin Menu Inscripcion Estudiante -->
                    <!-- Inicio Menu GG -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.GG') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            
                            <!-- Inicio SubMenu Cuestionario -->
                            <li class="treeview">
                                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Cuestionario') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    
                                    <li><a href="#">{{ trans('gogamessage.VerLista') }}</a></li>
                                    <li><a href="#">{{ trans('gogamessage.Nuevo') }}</a></li>
                                    
                                </ul>
                            </li>
                            <!-- Fin SubMenu Cuestionario -->
                            <!-- Inicio SubMenu Categoria -->
                            <li class="treeview">
                                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Categoria') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    
                                    <li><a href="#">{{ trans('gogamessage.VerLista') }}</a></li>
                                    <li><a href="#">{{ trans('gogamessage.Nuevo') }}</a></li>
                                    
                                </ul>
                            </li>
                            <!-- Fin SubMenu Categoria -->
                        </ul>
                    </li>
                    <!-- Fin Menu GG -->
                </ul>
            </li>
            <!-- FIN MENU DOCENTE -->

            <!-- MENU ESTUDIANTE -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Estudiante') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- 
                        * 
                        * 
                        *  AUN NO SE DEFINE NADA PARA ESTE MENU
                        * 
                        * 
                        *
                    -->
                </ul>
            </li>
            <!-- FIN MENU ESTUDIANTE -->

            <!-- MENU TODOS -->
            <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.LeaderBoard') }}</span></a></li>
            <!-- FIN MENU TODOS -->

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
