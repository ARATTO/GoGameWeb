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
                            <li><a href="{{ route('materias.index') }}">{{ trans('gogamessage.VerMateria') }}</a></li>
                            <li><a href="{{ route('materias.create') }}">{{ trans('gogamessage.CrearMateria') }}</a></li>
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
                    <!-- Inicio Menu Grupos -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Grupo') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('grupos.index') }}">{{ trans('gogamessage.VerGrupo') }}</a></li>
                            <li><a href="{{ route('grupos.create') }}">{{ trans('gogamessage.CrearGrupo') }}</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Grupos -->
                </ul>
            </li>