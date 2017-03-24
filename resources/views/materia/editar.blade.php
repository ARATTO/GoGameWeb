@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Materia') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.materia.editar_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Materia') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							{!! Form::open(['route' => ['materias.update', $materia], 'method' => 'PUT']) !!}
                                        
                                         <div class="form-group">
                                            {!! form::label('CODIGOMATERIA','Codigo') !!}
                                            {!! form::text('CODIGOMATERIA', $materia->CODIGOMATERIA, ['class' => 'form-control', 'placeholder'=> 'AAA-115', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! form::label('NOMBREMATERIA','Nombre') !!}
                                            {!! form::text('NOMBREMATERIA', $materia->NOMBREMATERIA, ['class' => 'form-control', 'placeholder'=> 'Nombre de Materia', 'required']) !!}
                                        </div>
                                        @if($materia->ESTECNICAELECTIVA == 1)
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="ESTECNICAELECTIVA" class='form-control' checked>
                                                {!! form::label('checkbox',' Es Electiva') !!}
                                            </div>
                                        @else
                                            <div class="form-group">
                                                <input type="checkbox" value="1" name="ESTECNICAELECTIVA" class='form-control'>
                                                {!! form::label('checkbox',' Es Electiva') !!}
                                            </div>
                                        @endif
                                        <div class="form-group col-xs-6 col-md-4">
                                          {!! form::label('#','Imagen Actual') !!}    
                                          <a class="thumbnail" href="{{ asset('/gogame/FotoMateria')}}/{{ $materia->IMAGENMATERIA }}" rel="lightbox" data-tittle="{{$materia->NOMBREMATERIA}}">
                                             <img src="{{ asset('/gogame/FotoMateria')}}/{{ $materia->IMAGENMATERIA }}" class="img-user">
                                          </a>
                                        </div>   
                                        <div class="form-group col-xs-6 col-md-12">
                                            {!! form::label('#','Actualizar Imagen de Materia') !!}    
                                            <input id="input-id" type="file" name="imgMateria" >
                                        </div>
                                        <div class="form-group col-xs-6 col-md-12">
                                            <button type="submit" class="btn btn-success"> {{trans('gogamessage.Guardar')}} </button>
                                        </div>
                                        
                            {!! Form::close() !!}  
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
