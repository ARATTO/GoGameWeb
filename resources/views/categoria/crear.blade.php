@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Categoria') }}
@endsection
        
@section('main-content')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Categoria') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							{!! Form::open(['route' => 'categorias.store', 'method' => 'POST']) !!}

                                        <div class="form-group">
                                            {!! form::label('NOMBRECATEGORIA','Nombre de Categoria') !!}
                                            {!! form::text('NOMBRECATEGORIA', null, ['class' => 'form-control', 'placeholder'=> 'Introduccion al Tema', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! form::label('DESCRIPCIONCATEGORIA','Descripcion de Categoria') !!}
                                            {!! form::textarea('DESCRIPCIONCATEGORIA', null, ['class' => 'form-control', 'placeholder'=> 'Introduccion al Tema', 'maxlength' => '250', 'required']) !!}
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
