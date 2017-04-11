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
										<th>Codigo</th>
                                        <th>Materia</th>
										<th>Tipo Grupo</th>
                                        <th>Docente</th>
										<th>Ciclo</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Codigo</th>
                                        <th>Materia</th>
										<th>Tipo Grupo</th>
                                        <th>Docente</th>
										<th>Ciclo</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($grupos as $grupo)
										<tr>
											<td>{{$grupo->CODIGOGRUPO}}</td>
											<td>{{$grupo->materia->NOMBREMATERIA}}</td>
                                            <td>{{$grupo->tipoGrupo->NOMBRETIPOGRUPO}}</td>
											<td>{{$grupo->docente->NOMBREDOCENTE}}</td>
											<td>{{$grupo->ciclo->CODIGOCICLO}}</td>
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
