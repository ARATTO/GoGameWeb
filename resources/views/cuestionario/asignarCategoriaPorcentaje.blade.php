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
                                                <ul class="todo-list">
                                                               
                                                        @foreach($categoriaCuestionario as $catCue)
                                                            <li> 
                                                                <!-- todo text -->
                                                                <span class="text">{{ $catCue->categoria->NOMBRECATEGORIA}}</span>
                                                                <!-- Emphasis label -->
                                                                <div class="tools">
                                                                    <!-- 
                                                                    <i class="fa fa-trash-o"></i>
                                                                    ver preguntas-->
                                                                    <small class="label label-danger"><i class="fa fa-clock-o"></i> 3 preguntas</small>
                                                                </div>
                                                                <span class="text">
                                                                    Preguntas
                                                                    <input type="number">
                                                                </span>
                                                                <span class="text">
                                                                    Porcentaje
                                                                    <input type="number">
                                                                </span>
                                                            </li>
                                                            <br>
                                                        @endforeach
                                                        <hr>
                                                        <li> 
                                                                <!-- todo text -->
                                                                <span class="text">TOTALES</span>
                                                                
                                                                <span class="text">
                                                                    Preguntas
                                                                    <input type="number">
                                                                </span>
                                                                <span class="text">
                                                                    Porcentaje
                                                                    <input type="number">
                                                                </span>
                                                        </li>
                                                    
                                                    
                                                </ul>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer clearfix no-border">
                                                <button type="button" class="btn btn-default pull-right"><i class="fa fa-recycle"></i> Limpiar Campos</button>
                                            </div>
                                        </div>
                                        <!-- /.box -->
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-success"> ACEPTAR</button>
                                        </div>
                            {!! Form::close() !!}  
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
