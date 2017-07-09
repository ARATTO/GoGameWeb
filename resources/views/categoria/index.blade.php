@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Categoria') }}
@endsection
        
@section('main-content')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Categoria') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
						@if($categorias->count() > 0 )
								<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Inicia (Fecha Hora)</th>
											<th>Termina (Fecha Hora)</th>
											<th>Duracion (H:M:S)</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Nombre</th>
											<th>Inicia (Fecha Hora)</th>
											<th>Termina (Fecha Hora)</th>
											<th>Duracion (H:M:S)</th>
											<th>Accion</th>
										</tr>
									</tfoot>
									<tbody>
										@foreach($cuestionariomateria as $cuesMat)
											<tr>
												<td>{{$cuesMat->cuestionario->NOMBRECUESTIONARIO}}</td>
												<td>{{$cuesMat->cuestionario->FECHAINICIOCUESTIONARIO}}</td>
												<td>{{$cuesMat->cuestionario->FECHAFINCUESTIONARIO}}</td>
												<td>{{$cuesMat->cuestionario->DURACIONCUESTIONARIO}}</td>
												<td>
													<div class="btn-group btn-group-sm" role="group" aria-label="...">
															<a href="#" class="btn btn-success" title="Ver Categorias">
																<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
															</a>
															<a href="#" class="btn btn-success" disabled="disabled">
																CATEGORIAS
															</a>
															<!-- MODAL -->

															<!-- FIN MODAL -->
															<a href=" {{ route('cuestionarios.edit' , $cuesMat->cuestionario->id) }} " class="btn btn-warning" title="Editar">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
															</a>
													</div>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
						@else
						<div class="form-group">
								{{ trans('gogamessage.NoTiene') }}
                                
                                <div class="pull-right btn-group btn-group-lg" role="group" aria-label="...">
									<a href="{{ route('categorias.create') }}" class="btn btn-success" title="Crear Nueva Categoria">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</a>
									<a href="#" class="btn btn-success" disabled="disabled">
										CREAR CATEGORIA
									</a>
								</div>
                        </div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
