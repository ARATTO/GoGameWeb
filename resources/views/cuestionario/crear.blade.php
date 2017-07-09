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
					<div class="panel-heading">{{ trans('gogamessage.Cuestionario') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							{!! Form::open(['route' => 'cuestionarios.store', 'method' => 'POST']) !!}

                                        <div class="form-group">
                                            {!! form::label('NOMBRECUESTIONARIO','Nombre de Cuestionario') !!}
                                            {!! form::text('NOMBRECUESTIONARIO', null, ['class' => 'form-control', 'placeholder'=> 'Test Post-Evaluado', 'required']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! form::label('daterange_','Fechas Realizacion de Cuestionario') !!}
                                            {!! form::text('daterange_', null, ['class' => 'form-control', 'required']) !!}
                                        </div>

                                        <div class="form-group input-group bootstrap-timepicker timepicker">
                                             {!! form::label('DURACIONCUESTIONARIO','Duracion Cuestionario') !!}
                                            <input name="DURACIONCUESTIONARIO" id="timepicker" type="text" class="form-control">
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-lg btn-success"> {{trans('gogamessage.Crear')}} </button>
                                        
                            {!! Form::close() !!}  
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
