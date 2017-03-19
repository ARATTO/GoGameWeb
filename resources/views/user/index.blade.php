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
													<img src="{{ asset('/gogame/FotoPerfil')}}/{{ $user->IMAGENPERFIL }}" class="user-image" alt="Foto">
													</li>
												</ul>
											</td>
											<td>{{$user->NOMBREPERFIL}}</td>
											<td>{{$user->email}}</td>
											<td>
												@if($user->ESADMINISTRADOR != null || $user->ESADMINISTRADOR == 1)
													<span class="label label-warning col-md-12"> {{trans('gogamessage.SI')}} </span>
												@else
													<span class="label label-danger col-md-12"> {{trans('gogamessage.NO')}} </span>
												@endif
											</td>
											<td>
												@if($user->IDDOCENTE != null)
													<span class="label label-success col-md-10"> {{trans('gogamessage.SI')}} </span>
												@else
													<span class="label label-danger col-md-10"> {{trans('gogamessage.NO')}}</span>
												@endif
											</td>
											<td>
												@if($user->IDESTUDIANTE != null)
													<span class="label label-success col-md-8"> {{trans('gogamessage.SI')}}</span>
												@else
													<span class="label label-danger col-md-8"> {{trans('gogamessage.NO')}}</span>
												@endif
											</td>
											<td>
												@if($user->ESACTIVO != null)
													<span class="label label-success col-md-8"> {{trans('gogamessage.SI')}}</span>
												@else
													<span class="label label-danger col-md-8"> {{trans('gogamessage.NO')}}</span>
												@endif
											</td>
											<td>
												@if($user->ESADMINISTRADOR != null)
														<a href="#" class="btn btn-info btn-block" onclick="return alert('{{$user->NOMBREPERFIL}} es Usuario Administrador')">
															<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
														</a>
												@else	
													@if($user->ESACTIVO != null)
														
														<a href=" {{ route('users.inactivar' , $user->id) }} " class="btn btn-danger btn-block" onclick="return confirm('¿Hacer inactivo a {{$user->NOMBREPERFIL}} ?')">
															<span class="glyphicon glyphicon-download" aria-hidden="true"></span>
														</a>
													@else
														<a href=" {{ route('users.activar' , $user->id) }} " class="btn btn-success btn-block" onclick="return confirm('¿Activar a {{$user->NOMBREPERFIL}} ?')">
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
