@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Medalla') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.medalla.editar_head')
        <section class="content">
            <div class="container spark-screen">    
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('gogamessage.Medalla') }}</div>
                                <div class="panel-body">
                                    @include('layouts.partials.flash')

                                    {!! Form::open(['route' => ['medallas.update', $detalleMedalla], 'method' => 'PUT', 'files' => true]) !!}
                                        
                                       <div class="form-group">
                                            {!! form::label('NOMBREMEDALLA','Nombre de Medalla') !!}
                                            {!! form::text('NOMBREMEDALLA', $detalleMedalla->medalla->NOMBREMEDALLA , ['class' => 'form-control', 'placeholder'=> 'Medalla GG', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! form::label('DESCRIPCIONMEDALLA','Descripcion de Medalla') !!}
                                            {!! form::text('DESCRIPCIONMEDALLA', $detalleMedalla->medalla->DESCRIPCIONMEDALLA , ['class' => 'form-control', 'placeholder'=> 'Descripcion ......', 'required']) !!}
                                        </div>
                                        @if($detalleMedalla->medalla->ESCUANTITATIVA == 1)
                                            <div class="form-group">
                                                    <input type="checkbox" value="1" name="ESCUANTITATIVA" class="form-control" disabled checked>
                                                    {!! form::label('checkbox',' Es Cuantitativa') !!}
                                            </div>
                                        @else
                                            <div class="form-group">
                                                    <input type="checkbox" value="1" name="ESCUANTITATIVA" class="form-control" disabled>
                                                    {!! form::label('checkbox',' Es Cuantitativa') !!}
                                            </div>
                                        @endif
                                        <div class="form-group">
                                                {!! form::label('CANTIDADMINIMAPUNTOS',' Puntos Necesarios') !!}
                                                <input class="form-control" type="number" id="numeros" name="CANTIDADMINIMAPUNTOS" min="1" step="1" placeholder="Puntos Minimos" value="{{$detalleMedalla->CANTIDADMINIMAPUNTOS}}"/>
                                        </div>
                                        <div class="form-group">
                                                {!! form::label('PUNTOSACTIVIDAD',' Puntos Ganados por Actividad') !!}
                                                <input class="form-control" type="number" id="numeros_" name="PUNTOSACTIVIDAD" min="1" step="1" placeholder="Puntos Ganados por Actividad" value="{{$detallePunto->PUNTOSACTIVIDAD}}"/>
                                        </div>
                                        <input type="hidden" name="IDMATERIAIMPARTIDA" value="{{ $detalleMedalla->IDMATERIAIMPARTIDA }}">
                                        <div class="form-group">
                                            {!! form::label('#','Actualizar Imagen de Medalla') !!}    
                                            <input id="input-id" type="file" name="imgMedalla" title="Agregar Imagen">
                                        </div>
                                        {!! form::label('#','Imagen Actual') !!}
                                        <div class="form-group ">
                                          <a class="col-xs-6 col-md-4 thumbnail" href="{{ asset('/gogame/FotoMedalla')}}/{{ $detalleMedalla->medalla->IMAGENMEDALLA }}" rel="lightbox" data-tittle="{{$detalleMedalla->medalla->NOMBREMEDALLA}}">
                                             <img src="{{ asset('/gogame/FotoMedalla')}}/{{ $detalleMedalla->medalla->IMAGENMEDALLA }}" class="img-user">
                                          </a>    
                                        </div>
                                        <input type="hidden" name="IDMATERIAIMPARTIDA" value="{{ $matImp->id }}">
                                        <div class="form-group col-xs-6 col-md-12">
                                            <button type="submit" class="btn btn-warning"> {{trans('gogamessage.Actualizar')}} </button>
                                        </div>
                                    {!! Form::close() !!}                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section><!-- /.content -->
@endsection




