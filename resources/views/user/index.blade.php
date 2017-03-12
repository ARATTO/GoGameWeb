@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Usuario') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.indexUser_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Usuario') }}</div>

					<div class="panel-body">
							<table id="UsuarioLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Foto</th>
										<th>Nombre</th>
										<th>Correo</th>
										<th>Administrador</th>
										<th>Docente</th>
										<th>Estudiante</th>
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
									</tr>
								</tfoot>
								<tbody>
									@foreach($users as $user)
									{{$user->IMAGENPERFIL}}
									<img alt="foto perfil" src="data:image/jpeg;base64,base64_encode( $user->IMAGENPERFIL )"/>
										<tr>
											<td>
												{{$imagen = $user->IMAGENPERFIL}}
												{{--<img src="data:image/jpeg;base64,'.base64_encode( $user->IMAGENPERFIL  ).'"/>;--}}
												<img alt="foto perfil" src="data:image/jpg;base64,'.base64_encode( $imagen ).'"/>
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
