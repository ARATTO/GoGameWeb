@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Medalla') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.medalla.crear_head')
        <section class="content">
            <div class="container spark-screen">    
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('gogamessage.Medalla') }}: {{$materia->NOMBREMATERIA}}</div>
                                <div class="panel-body">
                                    @include('layouts.partials.flash')

                                    {!! Form::open(['route' => 'medallas.store', 'method' => 'POST', 'files' => true]) !!}

                                        <div class="form-group">
                                            {!! form::label('NOMBREMEDALLA','Nombre de Medalla') !!}
                                            {!! form::text('NOMBREMEDALLA', null, ['class' => 'form-control', 'placeholder'=> 'Medalla GG', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! form::label('DESCRIPCIONMEDALLA','Descripcion de Medalla') !!}
                                            {!! form::text('DESCRIPCIONMEDALLA', null, ['class' => 'form-control', 'placeholder'=> 'Descripcion ......', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                                <input type="checkbox" value="1" name="ESCUANTITATIVA" class="form-control">
                                                {!! form::label('checkbox',' Es Cuantitativa') !!}
                                        </div>
                                        <div class="form-group">
                                                <input class="form-control" type="number" id="numeros" name="CANTIDADMINIMAPUNTOS" min="0" step="1" data-thousands=","/>
                                        </div>
                                        <input type="hidden" name="IDMATERIAIMPARTIDA" value="{{ $matImp->id }}">
                                        <div class="form-group">
                                            {!! form::label('#','Imagen de Materia') !!}    
                                            <input id="input-id" type="file" name="imgMateria" >
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
