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
                                                <input type="checkbox" value="1" name="ESDOCENTE" class="form-control" id="id_DOCENTE" onchange="javascript:showContentCoordinador()">
                                                {!! form::label('checkbox',' Es Docente') !!}
                                        </div>
                                        <div class="form-group" id="id_COORDINADOR" style='display:none;'>
                                                <input type="checkbox" value="1" name="ESCOORDINADOR" class="form-control" id="id_ACT_COORDINADOR" onchange="javascript:showContentMateriaCoordinador()">
                                                {!! form::label('checkbox',' Es Coordinador') !!}
                                        </div>
                                        <div class="form-group" id="id_MAT_COORDINADOR" style='display:none;'>
                                                <h4><span for="chosen-select" class="label label-success">Seleccione la Materia a Coordinar.</span><h4>
                                                <select name="IDMATERIAIMPARTIDA" id="chosen-select">
                                                <option value="">Seleccione una Materia</option>
                                                @foreach ($materiasImpartidas as $materiaImpartida)
                                                    <option value="{{ $materiaImpartida->id }}">{{$materiaImpartida->materia->CODIGOMATERIA}}:{{$materiaImpartida->materia->NOMBREMATERIA}}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                        

                                        <div class="form-group">
                                            {!! form::label('#','Foto de Perfil') !!}    
                                            <input id="input-id" type="file" name="fotoPerfil" >
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




