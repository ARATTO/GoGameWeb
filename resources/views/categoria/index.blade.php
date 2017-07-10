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
					<div class="panel-heading">{{ trans('gogamessage.Categoria') }} : {{$materia}}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
						@if($categorias->count() > 0 )
								<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Nombre</th>
											<th>Categoria</th>
											<th>Preguntas</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Nombre</th>
											<th>Categoria</th>
											<th>Preguntas</th>
										</tr>
									</tfoot>
									<tbody>
										@foreach($categorias as $cat)
											<tr>
												<td>{{$cat->NOMBRECATEGORIA}}</td>
												
												<td>
													<div class="btn-group btn-group-sm" role="group" aria-label="...">
															
															<a href="{{ route('categorias.edit' , $cat->id) }}" class="btn btn-warning" title="Editar Categoria">
																<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
															</a>
															<a href="#" class="btn btn-warning" disabled="disabled">
																EDITAR CATEGORIA
															</a>
															<a href="#" class="btn btn-danger" title="Eliminar Categoria">
																<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
															</a>
															<a href="#" class="btn btn-danger" disabled="disabled">
																ELIMINAR CATEGORIA
															</a>
															
													</div>
												</td>
												<td>
													<div class="btn-group btn-group-sm" role="group" aria-label="...">
															
															<a href="#" class="btn btn-info" title="Ver Preguntas">
																<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
															</a>
															<a href="#" class="btn btn-info" disabled="disabled">
																VER PREGUNTAS
															</a>
															<a href="#" class="btn btn-success" onclick="mostrarModalPregunta{{$cat->id}}();" title="Asignar Preguntas">
																<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>
															</a>
															<a href="#" class="btn btn-success" disabled="disabled">
																ASIGNAR PREGUNTAS
															</a>
															
															<!-- MODAL -->
															@include('layouts.partials.modalPregunta', ['cat' => $cat])
															<!-- FIN MODAL -->
															
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
