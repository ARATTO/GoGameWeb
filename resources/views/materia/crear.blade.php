@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Materia') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.materia.crear_head')
        <section class="content">
            <div class="container spark-screen">    
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('gogamessage.Materia') }}</div>
                                <div class="panel-body">
                                    @include('layouts.partials.flash')

                                    {!! Form::open(['route' => 'materias.store', 'method' => 'POST', 'files' => true]) !!}

                                        <div class="form-group">
                                            {!! form::label('CODIGOMATERIA','Codigo') !!}
                                            {!! form::text('CODIGOMATERIA', null, ['class' => 'form-control', 'placeholder'=> 'AAA-115', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! form::label('NOMBREMATERIA','Nombre') !!}
                                            {!! form::text('NOMBREMATERIA', null, ['class' => 'form-control', 'placeholder'=> 'Nombre de Materia', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                                <input type="checkbox" value="1" name="ESTECNICAELECTIVA" class="form-control">
                                                {!! form::label('checkbox',' Es Electiva') !!}
                                        </div>
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
