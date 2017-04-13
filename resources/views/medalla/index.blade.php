@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Medalla') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.medalla.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Medalla') }} : {{$materia->NOMBREMATERIA}}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
						@if($detalleMedalla != null)
							<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Imagen</th>
										<th>Nombre</th>
										<th>Cuantitativa</th>
										<th>Puntos Min.</th>
										<th>Materia</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Imagen</th>
										<th>Nombre</th>
										<th>Cuantitativa</th>
										<th>Puntos Min.</th>
										<th>Materia</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($detalleMedalla as $detalleM)
										<tr>
											<td>
												<ul class="nav navbar-nav">
													<li class="dropdown user user-menu">
														<a href="{{ asset('/gogame/FotoMedalla')}}/{{ $detalleM->medalla->IMAGENMEDALLA }}" rel="lightbox" data-tittle="{{$detalleM->medalla->NOMBREMEDALLA}}">
															<img src="{{ asset('/gogame/FotoMedalla')}}/{{ $detalleM->medalla->IMAGENMEDALLA }}" class="user-image">
														</a>
													</li>
												</ul>
											</td>
											<td>{{$detalleM->medalla->NOMBREMEDALLA}}</td>
											<td>
												@if($detalleM->medalla->ESCUANTITATIVA == 1)
													<a href="#" class="btn btn-success btn-block" disabled="disabled">
												    	{{ trans('gogamessage.SI') }}
													</a>
												@else
													<a href="#" class="btn btn-info btn-block" disabled="disabled">
												    	{{ trans('gogamessage.NO') }}
													</a>
												@endif
											</td>
											<td>{{$detalleM->CANTIDADMINIMAPUNTOS}}</td>
											<td>{{$detalleM->materia->NOMBREMATERIA}}</td>
											<td>
												<a href="{{ route('medallas.edit' , $detalleM->id) }}" class="btn btn-warning ">
												    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
												</a>
												<a href="{{ route('medallas.destroy' , $detalleM->id) }}" title="Eliminar : {{$detalleM->materia->NOMBREMATERIA}}" class="btn btn-danger" onclick="return confirm('¿Eliminar {{$detalleM->materia->NOMBREMATERIA}} y TODOS sus datos relacionados ?')">
												    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							{{ trans('gogamessage.NoRegistro') }}
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
