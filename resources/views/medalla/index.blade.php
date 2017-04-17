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
					@if($detalleMedalla == null)
						<div class="panel-heading">{{ trans('gogamessage.Medalla') }} : {{$materia->NOMBREMATERIA}}</div>
					@else
						<div class="panel-heading">{{ trans('gogamessage.Medalla') }} : {{$materia->NOMBREMATERIA}}
                        <a href="{{ route('medallas.create') }}" class="btn btn-success btn-xs pull-right" title="{{trans('gogamessage.NuevaMedalla')}}">
						    <span class="glyphicon glyphicon-plus" aria-hidden="true"> {{trans('gogamessage.Crear')}}</span>
						</a>
						</div>
					@endif
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
										<th>Accion</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Imagen</th>
										<th>Nombre</th>
										<th>Cuantitativa</th>
										<th>Puntos Min.</th>
										<th>Accion</th>
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
											<td>
												<div class="btn-group btn-group-sm" role="group" aria-label="...">
													<a href="{{ route('medallas.edit' , $detalleM->id) }}" class="btn btn-warning ">
														<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
													</a>
													<a href="{{ route('medallas.destroy' , $detalleM->id) }}" title="Eliminar : {{$detalleM->medalla->NOMBREMEDALLA}}" class="btn btn-danger" onclick="return confirm('¿Eliminar {{$detalleM->medalla->NOMBREMEDALLA}} y TODOS sus datos relacionados ?')">
														<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
													</a>
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						@else
							<div class="form-group">
								{{ trans('gogamessage.NoRegistro') }}
                            </div>
							<div class="form-group">
							{!! Form::open(['route' => 'medallas.default', 'method' => 'POST']) !!}
							   <input type="hidden" name="IDMATERIAIMPARTIDA" value="{{ $matImp->id }}">
                               <button type="submit" class="btn btn-success"> 
							   		{{trans('gogamessage.Crear')}} Medallas por Default
								</button>
                            {!! Form::close() !!}  
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
