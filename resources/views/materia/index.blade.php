@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Materia') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.materia.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Materia') }}</div>
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
													<img src="{{ asset('/gogame/FotoMateria')}}/{{ $materia->IMAGENMATERIA }}" class="user-image" alt="Materia">
													</li>
												</ul>
											</td>
											<td>{{$materia->CODIGOMATERIA}}</td>
											<td>{{$materia->NOMBREMATERIA}}</td>
											<td>
												@if($materia->ESTECNICAELECTIVA != null && $materia->ESTECNICAELECTIVA == 1)
                                                    <span class="label label-success col-md-12"> {{trans('gogamessage.SI')}} </span>
												@else
													<span class="label label-info col-md-12"> {{trans('gogamessage.NO')}} </span>
												@endif
											</td>
											<td>
												<a href="#" class="btn btn-warning btn-block">
												    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
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
