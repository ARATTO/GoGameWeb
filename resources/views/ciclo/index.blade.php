@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Ciclo') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.ciclo.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Ciclo') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Activo</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Codigo</th>
                                        <th>Accion</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Activo</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Codigo</th>
                                        <th>Accion</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($ciclos as $ciclo)
										<tr>
											<td>
												@if($ciclo->ESTAACTIVOCICLO == 1)
                                                        <a href="#" class="btn btn-success btn-block" disabled="disabled">
															<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
														</a>
												@else
													@if($ciclo->ESTAACTIVOCICLO == 0)		
														<a href="#" title="Ciclo Inactivo: {{$ciclo->CODIGOCICLO}}" class="btn btn-danger btn-block" disabled="disabled">
															<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
														</a>
													@else
														@if($ciclo->ESTAACTIVOCICLO == 2)
															<a href=" {{ route('ciclos.activar' , $ciclo->id) }} " title="Activar Ciclo: {{$ciclo->CODIGOCICLO}}" class="btn btn-info btn-block" onclick="return confirm('¿ Realmente desea Activar CICLO : {{$ciclo->CODIGOCICLO}} ? \nTenga En Cuenta:\n 1- El cambio es IRREVERSIBLE\n 2- Se seteara a todos los Docentes-Coordinadores a Docentes\n 3- Se desactivara el Ciclo actual en Curso')">
																<span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
															</a>
														@endif
													@endif
												@endif
											</td>
											<td>{{$ciclo->FECHAINICIO}}</td>
                                            <td>{{$ciclo->FECHAFIN}}</td>
											<td>{{$ciclo->CODIGOCICLO}}</td>
                                            <td>
                                                @if($ciclo->ESTAACTIVOCICLO == 2)
													<div class="btn-group btn-group-sm" role="group" aria-label="...">
														<a href=" {{ route('ciclos.asignar' , $ciclo->id) }} " title="Asignar Materias a Ciclo: {{$ciclo->CODIGOCICLO}}" class="btn btn-success">
															<span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>
														</a>
														<a href=" {{ route('ciclos.edit' , $ciclo->id) }} " class="btn btn-warning" title="Editar Ciclo: {{$ciclo->CODIGOCICLO}}" onclick="return confirm('¿ Realmente desea Editar CICLO : {{$ciclo->CODIGOCICLO}} ?')">
															<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
														</a>
														<a href=" {{ route('ciclos.destroy' , $ciclo->id) }} " title="Eliminar Ciclo: {{$ciclo->CODIGOCICLO}}" class="btn btn-danger" onclick="return confirm('¿ Realmente desea ELIMINAR CICLO : {{$ciclo->CODIGOCICLO}} ?')">
															<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
														</a>
													</div>
                                                @else
													@if($ciclo->ESTAACTIVOCICLO == 1)
													<div class="btn-group btn-group-sm" role="group" aria-label="...">
														<a href=" {{ route('ciclos.asignar' , $ciclo->id) }} " title="Asignar Materias a Ciclo: {{$ciclo->CODIGOCICLO}}" class="btn btn-success">
															<span class="glyphicon glyphicon-hand-up" aria-hidden="true"></span>
														</a>
														<a href=" {{ route('ciclos.edit' , $ciclo->id) }} " class="btn btn-warning" title="Editar Ciclo: {{$ciclo->CODIGOCICLO}}" onclick="return confirm('¿ Realmente desea Editar CICLO : {{$ciclo->CODIGOCICLO}} ?')">
															<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
														</a>
														<a href="#" class="btn btn-danger" disabled="disabled">
																CICLO ACTIVO
														</a>
													</div>
													@else
														<div class="btn-group btn-group-sm" role="group" aria-label="...">
															<a href=" # " class="btn btn-info" title="Ciclo: {{$ciclo->CODIGOCICLO}} Finalizado - Ver a Detalle">
																<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
															</a>
															<a href="#" class="btn btn-success" disabled="disabled">
																CICLO FINALIZADO
															</a>
														</div>
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
