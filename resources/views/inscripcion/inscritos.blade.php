@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Inscritos') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.inscripcion.inscritos_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Inscritos') }} <b>{{ $grupo->tipoGrupo->NOMBRETIPOGRUPO }} {{ $grupo->CODIGOGRUPO }} {{ $grupo->materia->CODIGOMATERIA }}</b> : {{ $grupo->materia->NOMBREMATERIA }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
						@if( $inscripciones )
								<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Carnet</th>
											<th>Nombre</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Carnet</th>
											<th>Nombre</th>
											<th>Accion</th>
										</tr>
									</tfoot>
									<tbody>
										@foreach($inscripciones as $inscripcion)
											<tr>
												<td>{{$inscripcion->estudiante->CARNETESTUDIANTE}}</td>
                                                <td>{{$inscripcion->estudiante->NOMBREESTUDIANTE}}</td>
												<td>
													<div class="btn-group btn-group-sm" role="group" aria-label="...">
															<a href=" {{ route('inscripcion.desinscribir' , [$inscripcion->estudiante->id , $grupo->id] ) }}" class="btn btn-danger" title="Dar de Baja : {{$inscripcion->estudiante->CARNETESTUDIANTE}}">
																<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>
															</a>
															<a href="#" class="btn btn-success" title="Ver {{$inscripcion->estudiante->CARNETESTUDIANTE}}">
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
