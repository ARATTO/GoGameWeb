@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Ciclo') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.ciclo.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Ciclo') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							<table id="TablaLista" class="table table-striped table-bordered" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Codigo</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Activo</th>
                                        <th>Accion</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Codigo</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Activo</th>
                                        <th>Accion</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach($ciclos as $ciclo)
										<tr>
											<td>{{$ciclo->CODIGOCICLO}}</td>
											<td>{{$ciclo->FECHAINICIO}}</td>
                                            <td>{{$ciclo->FECHAFIN}}</td>
											<td>
												@if($ciclo->ESTAACTIVOCICLO == 1)
                                                        <a href="#" class="btn btn-info btn-block" disabled="disabled">
															<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
														</a>
												@else		
														<a href=" {{ route('ciclos.activar' , $ciclo->id) }} " title="Activar Ciclo: {{$ciclo->CODIGOCICLO}}" class="btn btn-danger btn-block" onclick="return confirm('¿ Realmente desea Activar CICLO : {{$ciclo->CODIGOCICLO}} ?')">
															<span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
														</a>
												@endif
											</td>
                                            <td>
                                                @if($ciclo->ESTAACTIVOCICLO == null)
                                                    <a href=" {{ route('ciclos.edit' , $ciclo->id) }} " class="btn btn-warning" onclick="return confirm('¿ Realmente desea Editar CICLO : {{$ciclo->CODIGOCICLO}} ?')">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </a>
                                                    <a href=" {{ route('ciclos.destroy' , $ciclo->id) }} " title="Eliminar Ciclo: {{$ciclo->CODIGOCICLO}}" class="btn btn-danger" onclick="return confirm('¿ Realmente desea ELIMINAR CICLO : {{$ciclo->CODIGOCICLO}} ?')">
														<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
													</a>
                                                @else
                                                    <a href=" {{ route('ciclos.edit' , $ciclo->id) }} " class="btn btn-warning btn-block" onclick="return confirm('¿ Realmente desea Editar CICLO : {{$ciclo->CODIGOCICLO}} ?')">
                                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                                    </a>
                                                @endif
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
