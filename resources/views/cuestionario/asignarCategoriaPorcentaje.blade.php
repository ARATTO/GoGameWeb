@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Cuestionario') }}
@endsection
        
@section('main-content')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Asignar Categoria Porcentaje</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							{!! Form::open(['route' => ['cuestionarios.guardarPorcentajes', $idCuestionario], 'method' => 'POST']) !!}

                                        <!-- TO DO List -->
                                        <div class="box box-primary">
                                            <div class="box-header">
                                                <i class="ion ion-clipboard"></i>
                                                <h3 class="box-title">Categorias</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr class="success">
                                                            <th>CATEGORIA</th>
                                                            <th>PREGUNTA</th>
                                                            <th>PORCENTAJE</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr class="danger">
                                                            <th>
                                                                <div class="input-group has-danger form-inline">
                                                                   
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="input-group has-info form-inline">
                                                                    <span class="input-group-addon">#</span>
                                                                    <input class="form-control" type="text" id="tot_preguntas" disabled/>
                                                                </div>
                                                            </th>
                                                            <th>
                                                                <div class="input-group has-info form-inline">
                                                                    <span class="input-group-addon">%</span>
                                                                    <input class="form-control" type="text" id="tot_porcentaje" disabled/>
                                                                </div>
                                                                @include('cuestionario.scriptTotales', ['categoriaCuestionario' => $categoriaCuestionario, 'ultimo_categoria' => $ultimo_categoria])
                                                            </th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @foreach($categoriaCuestionario as $catCue)
                                                            <tr>
                                                                <td>
                                                                    {{ $catCue->categoria->NOMBRECATEGORIA}}
                                                                    <small class="pull-right label label-success"><i class="fa fa-clock-o"></i> {{$catCue->categoria->NumeroPregunta}} preguntas</small>
                                                                </td>
                                                                <td>
                                                                    <div class="input-group has-info form-inline">
                                                                            <span class="input-group-addon">#</span>
                                                                            <input class="form-control" type="number" onchange="totalesPreguntas()" id="pregunta_{!! $catCue->categoria->id !!}" name="pregunta_{!! $catCue->categoria->id !!}" min="1" max="{{$catCue->categoria->NumeroPregunta}}" step="1" value="0" required/>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    @if($catCue->categoria->id == $ultimo_categoria->categoria->id)
                                                                        <div class="input-group has-info form-inline">
                                                                            <span class="input-group-addon">%</span>
                                                                            <input class="form-control" type="number" id="porcentaje_{!! $catCue->categoria->id !!}" name="porcentaje_{!! $catCue->categoria->id !!}" min="0" max="100" step="0.1" value="0.0" required readonly/>
                                                                        </div>
                                                                    @else
                                                                        <div class="input-group has-info form-inline">
                                                                            <span class="input-group-addon">%</span>
                                                                            <input class="form-control" type="number" onchange="totalesPorcentajes()" id="porcentaje_{!! $catCue->categoria->id !!}" name="porcentaje_{!! $catCue->categoria->id !!}" min="0" max="100" step="0.1" value="0.0" required/>
                                                                        </div>
                                                                    @endif
                                                                </td>                                       
                                                            </tr>
                                                            
                                                        @endforeach
                                                        <input type="hidden" name="idCuestionario" value="{{$idCuestionario}}">
                                                    </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer clearfix no-border">
                                                <button type="button" onclick="limpiar()" class="btn btn-default pull-right"><i class="fa fa-recycle"></i> Limpiar Campos</button>
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-success"> GUARDAR</button>
                                        </div>
                            {!! Form::close() !!}  
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
