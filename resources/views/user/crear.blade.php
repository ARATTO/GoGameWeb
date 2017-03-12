@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Usuario') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.crearUser_head')
        <section class="content">
            <div class="container spark-screen">    
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('gogamessage.Usuario') }}</div>
                                <div class="panel-body">
                                    @include('layouts.partials.flash')

                                    {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => true]) !!}

                                        <div class="form-group">
                                            {!! form::label('CARNETDOCENTE','Carnet') !!}
                                            {!! form::text('CARNETDOCENTE', null, ['class' => 'form-control', 'placeholder'=> 'Carnet de Usuario', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! form::label('NOMBREDOCENTE','Nombre') !!}
                                            {!! form::text('NOMBREDOCENTE', null, ['class' => 'form-control', 'placeholder'=> 'Nombre de Usuario', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" value="1" name="ESADMINISTRADOR">Es Administrador
                                                </label>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" value="1" name="ESDOCENTE">Es Docente
                                                </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" name="file" id="exampleInputFile">
                                            <p class="help-block">Example block-level help text here.</p>
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
