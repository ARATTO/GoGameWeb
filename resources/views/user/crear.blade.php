@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Usuario') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.user.crear_head')
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
                                                <input type="checkbox" value="1" name="ESADMINISTRADOR" class="form-control">
                                                {!! form::label('checkbox',' Es Administrador') !!}
                                        </div>
                                        <div class="form-group">
                                                <input type="checkbox" value="1" name="ESDOCENTE" class="form-control">
                                                {!! form::label('checkbox',' Es Docente') !!}
                                        </div>
                                        <div class="form-group">
                                            <label for="inputFoto"> {{trans('gogamessage.FotoPerfil')}} </label>
                                            <input type="file" name="fotoPerfil" id="inputFoto">
                                            <p class="help-block"> {{trans('gogamessage.FotoPerfil')}} {{trans('gogamessage.PorDefecto')}}.</p>
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
