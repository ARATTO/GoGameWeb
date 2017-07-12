@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Pregunta') }}
@endsection
        
@section('main-content')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Preguntas de Categoria: <b>{{ $categoria->NOMBRECATEGORIA }} </b></div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
						@if( $preguntasCategoria )
								<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>Pregunta</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Pregunta</th>
											<th>Accion</th>
										</tr>
									</tfoot>
									<tbody>
										@foreach($preguntasCategoria as $preCat)
											<tr>
												<td>{{$preCat->PREGUNTA}}</td>
												<td>
													<div class="btn-group btn-group-sm" role="group" aria-label="...">
															
															<a href="#" class="btn btn-success" title="Ver">
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
