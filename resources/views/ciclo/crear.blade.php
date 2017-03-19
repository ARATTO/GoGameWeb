@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Ciclo') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.ciclo.crear_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Ciclo') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							{!! Form::open(['route' => 'ciclos.store', 'method' => 'POST']) !!}

                                        <div class="form-group">
                                            {!! form::label('CODIGOCICLO','Codigo Ciclo') !!}
                                            {!! form::text('CODIGOCICLO', null, ['class' => 'form-control', 'placeholder'=> 'codigo de Ciclo', 'required']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! form::label('daterange','Fechas de Ciclo') !!}
                                            {!! form::text('daterange', null, ['class' => 'form-control', 'required']) !!}
                                            
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" value="1" name="ESTAACTIVOCICLO" class='form-control'>
                                            {!! form::label('checkbox',' Activar Ciclo INMEDIATAMENTE') !!}
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success"> {{trans('gogamessage.Crear')}} </button>
                                        
                                    {!! Form::close() !!}  
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
