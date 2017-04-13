<li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Coordinador') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <!-- Inicio Menu Medallas -->
                    <li class="treeview">
                        <a href="#"><i class='fa fa-link'></i> <span>{{ trans('gogamessage.Medalla') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('medallas.index') }}">{{ trans('gogamessage.VerMedalla') }}</a></li>
                            <li><a href="{{ route('medallas.create') }}">{{ trans('gogamessage.NuevaMedalla') }}</a></li>
                        </ul>
                    </li>
                    <!-- Fin Menu Medallas -->
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