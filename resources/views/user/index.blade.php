@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Usuario') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.user.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Usuario') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Foto</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th>Administrador</th>
										<th>Docente</th>
										<th>Estudiante</th>
										<th>Activo</th>
										<th>Accion</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Foto</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th>Administrador</th>
										<th>Docente</th>
										<th>Estudiante</th>
										<th>Activo</th>
										<th>Accion</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($users as $user)
										<tr>
											<td>
												<ul class="nav navbar-nav">
													<li class="dropdown user user-menu">
														<a href="{{ asset('/gogame/FotoPerfil')}}/{{ $user->IMAGENPERFIL }}" rel="lightbox">
															<img src="{{ asset('/gogame/FotoPerfil')}}/{{ $user->IMAGENPERFIL }}" class="user-image">
														</a>
													</li>
												</ul>
											</td>
											<td>{{$user->NOMBREPERFIL}}</td>
											<td>{{$user->email}}</td>
											<td>
												@if($user->ESADMINISTRADOR != null || $user->ESADMINISTRADOR == 1)
													<a href="#" class="btn btn-warning btn-block" disabled="disabled">
												    	{{trans('gogamessage.SI')}}
													</a>
												@else
													<a href="#" class="btn btn-danger btn-block" disabled="disabled">
												    	{{trans('gogamessage.NO')}}
													</a>
												@endif
											</td>
											<td>
												@if($user->IDDOCENTE != null)
													<a href="#" class="btn btn-success btn-block" disabled="disabled">
												    	{{trans('gogamessage.SI')}}
													</a>
												@else
												<a href="#" class="btn btn-danger btn-block" disabled="disabled">
												    	{{trans('gogamessage.NO')}}
													</a>
												@endif
											</td>
											<td>
												@if($user->IDESTUDIANTE != null)
													<a href="#" class="btn btn-success btn-block" disabled="disabled">
												    	{{trans('gogamessage.SI')}}
													</a>
												@else
													<a href="#" class="btn btn-danger btn-block" disabled="disabled">
												    	{{trans('gogamessage.NO')}}
													</a>
												@endif
											</td>
											<td>
												@if($user->ESACTIVO != null)
													<a href="#" class="btn btn-success btn-block" disabled="disabled">
												    	{{trans('gogamessage.SI')}}
													</a>
												@else
													<a href="#" class="btn btn-danger btn-block" disabled="disabled">
												    	{{trans('gogamessage.NO')}}
													</a>
												@endif
											</td>
											<td>
												@if($user->ESADMINISTRADOR != null)
														<a href="#" class="btn btn-info btn-block" title="{{$user->NOMBREPERFIL}} es Usuario Administrador" onclick="return alert('{{$user->NOMBREPERFIL}} es Usuario Administrador')">
															<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
														</a>
												@else	
													@if($user->ESACTIVO != null)
														<a href=" {{ route('users.inactivar' , $user->id) }} " title="Activar Usuario: {{$user->NOMBREPERFIL}}" class="btn btn-danger btn-block" onclick="return confirm('¿Hacer inactivo a {{$user->NOMBREPERFIL}} ?')">
															<span class="glyphicon glyphicon-download" aria-hidden="true"></span>
														</a>
													@else
														<a href=" {{ route('users.activar' , $user->id) }} " title="Desactivar Usuario: {{$user->NOMBREPERFIL}}" class="btn btn-success btn-block" onclick="return confirm('¿Activar a {{$user->NOMBREPERFIL}} ?')">
															<span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
														</a>
													@endif
												@endif
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
