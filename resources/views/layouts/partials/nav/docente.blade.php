<li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Docente') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- Inicio Menu Inscripcion Estudiante -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Inscripcion') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('inscripcion.index') }}">{{ trans('gogamessage.Inscripciones') }}</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Inscripcion Estudiante -->
                </ul>
            </li>