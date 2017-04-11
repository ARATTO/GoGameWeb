@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Grupo') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.grupo.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Grupo') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
						@if($grupos->count())
							<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Ciclo</th>
										<th>Codigo</th>
                                        <th>Materia</th>
										<th>Tipo Grupo</th>
                                        <th>Docente</th>
										<th>Accion</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Ciclo</th>
										<th>Codigo</th>
                                        <th>Materia</th>
										<th>Tipo Grupo</th>
                                        <th>Docente</th>
										<th>Accion</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($grupos as $grupo)
										<tr>
											<td>{{$grupo->ciclo->CODIGOCICLO}}</td>
											<td>{{$grupo->CODIGOGRUPO}}</td>
											<td>{{$grupo->materia->NOMBREMATERIA}}</td>
                                            <td>{{$grupo->tipoGrupo->NOMBRETIPOGRUPO}}</td>
											<td>{{$grupo->docente->NOMBREDOCENTE}}</td>
											<td>
												<div class="btn-group btn-group-sm" role="group" aria-label="...">
													<a href=" {{ route('grupos.edit' , $grupo->id) }} " title="Editar Grupo: {{$grupo->CODIGOGRUPO}}" class="btn btn-warning">
														<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
													</a>
													<a href=" {{ route('grupos.destroy' , $grupo->id) }} " title="Eliminar Grupo: {{$grupo->CODIGOGRUPO}}" class="btn btn-danger" onclick="return confirm('¿Eliminar el Grupo: {{$grupo->ciclo->CODIGOCICLO}}_{{$grupo->CODIGOGRUPO}}:{{$grupo->materia->NOMBREMATERIA}} ?')">
														<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
													</a>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
						No hay Grupos en el sistema.
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
