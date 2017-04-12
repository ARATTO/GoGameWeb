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
					<div class="panel-heading">{{ trans('gogamessage.Medalla') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Foto</th>
										<th>Codigo</th>
										<th>Nombre</th>
										<th>Electiva</th>
										<th>Accion</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Foto</th>
										<th>Codigo</th>
										<th>Nombre</th>
										<th>Electiva</th>
										<th>Accion</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($materias as $materia)
										<tr>
											<td>
												<ul class="nav navbar-nav">
													<li class="dropdown user user-menu">
														<a href="{{ asset('/gogame/FotoMateria')}}/{{ $materia->IMAGENMATERIA }}" rel="lightbox" data-tittle="{{$materia->NOMBREMATERIA}}">
															<img src="{{ asset('/gogame/FotoMateria')}}/{{ $materia->IMAGENMATERIA }}" class="user-image">
														</a>
													</li>
												</ul>
											</td>
											<td>{{$materia->CODIGOMATERIA}}</td>
											<td>{{$materia->NOMBREMATERIA}}</td>
											<td>
												@if($materia->ESTECNICAELECTIVA != null && $materia->ESTECNICAELECTIVA == 1)
													<a href="#" class="btn btn-success btn-block" disabled="disabled">
												    	{{ trans('gogamessage.SI') }}
													</a>
												@else
													<a href="#" class="btn btn-info btn-block" disabled="disabled">
												    	{{ trans('gogamessage.NO') }}
													</a>
												@endif
											</td>
											<td>
												<a href="{{ route('materias.edit' , $materia->id) }}" class="btn btn-warning ">
												    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
												</a>
												<a href="{{ route('materias.destroy' , $materia->id) }}" title="Eliminar : {{$materia->NOMBREMATERIA}}" class="btn btn-danger" onclick="return confirm('¿Eliminar {{$materia->NOMBREMATERIA}} y TODOS sus datos relacionados ?')">
												    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</a>
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
