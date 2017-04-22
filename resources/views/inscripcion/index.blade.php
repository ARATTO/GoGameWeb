@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Inscripcion') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.inscripcion.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Inscripcion') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
						@if($grupos->count() )
								<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Ciclo</th>
											<th>Codigo</th>
											<th>Materia</th>
											<th>Tipo Grupo</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Ciclo</th>
											<th>Codigo</th>
											<th>Materia</th>
											<th>Tipo Grupo</th>
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
												<td>
													<div class="btn-group btn-group-sm" role="group" aria-label="...">
															<a href="#" class="btn btn-info" onclick="mostrarModal{{$grupo->id}}();" title="Inscribir {{$grupo->CODIGOGRUPO}} : {{$grupo->materia->NOMBREMATERIA}}">
																<span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span>
															</a>
															<a href="#" class="btn btn-info" disabled="disabled">
																INSCRIBIR ESTUDIANTES
															</a>
															<!-- MODAL -->
															@include('layouts.partials.modalInscribir', ['grupo' => $grupo])
															<!-- FIN MODAL -->
															<a href=" {{ route('inscripcion.inscritos' , $grupo->id) }} " class="btn btn-success" title="Ver Inscritos {{$grupo->CODIGOGRUPO}} : {{$grupo->materia->NOMBREMATERIA}}">
																<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
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
                        </div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
