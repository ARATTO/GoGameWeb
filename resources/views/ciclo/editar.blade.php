@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Ciclo') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.ciclo.editar_head')
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
							{!! Form::open(['route' => ['ciclos.update', $ciclo], 'method' => 'PUT']) !!}

                                        <div class="form-group">
                                            {!! form::label('CODIGOCICLO','Codigo Ciclo') !!}
                                            {!! form::text('CODIGOCICLO', $ciclo->CODIGOCICLO, ['class' => 'form-control', 'placeholder'=> 'codigo de Ciclo', 'required']) !!}
                                        </div>
 
                                        <div class="form-group">
                                            {!! form::label('daterange','Fechas de Ciclo') !!}
                                            {!! form::text('daterange', $rangoFecha, ['class' => 'form-control', 'required']) !!}
                                            
                                        </div>
                                        @if($ciclo->ESTAACTIVOCICLO == 1)
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="ESTAACTIVOCICLO" class='form-control' checked disabled>
                                                {!! form::label('checkbox',' Desactive Ciclo en la Pantalla Principal') !!}
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="ESTAACTIVOCICLO" class='form-control' disabled>
                                                {!! form::label('checkbox',' Active Ciclo en la Pantalla Principal') !!}
                                            </div>
                                        @endif

                                        <button type="submit" class="btn btn-success"> {{trans('gogamessage.Guardar')}} </button>
                                        
                            {!! Form::close() !!}  
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
