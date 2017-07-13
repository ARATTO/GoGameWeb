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
			<div class="col-md-5 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Asignar Categoria Porcentaje</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							{!! Form::open(['route' => 'cuestionarios.store', 'method' => 'POST']) !!}

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
                                                    <li>            
                                                        <!-- todo text -->
                                                        <span class="text">Categoria 1</span>
                                                        <!-- Emphasis label -->
                                                        <small class="label label-danger"><i class="fa fa-clock-o"></i> 3 preguntas</small>
                                                        <!-- General tools such as edit or delete-->
                                                        <div class="tools">
                                                            <i class="fa fa-trash-o"></i>
                                                        </div>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer clearfix no-border">
                                                <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
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
