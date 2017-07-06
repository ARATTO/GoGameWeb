@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Usuario') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.user.editar_head')
        <section class="content">
            <div class="container spark-screen">    
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">{{ trans('gogamessage.Usuario') }}</div>
                                <div class="panel-body">
                                    @include('layouts.partials.flash')

                                    {!! Form::open(['route' => ['users.update', $user], 'method' => 'PUT', 'files' => true]) !!}

                                        <div class="form-group">
                                            {!! form::label('CARNETDOCENTE','Carnet') !!}
                                            {!! form::text('CARNETDOCENTE', $docente->CARNETDOCENTE, ['class' => 'form-control', 'placeholder'=> 'Carnet de Usuario', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                            {!! form::label('NOMBREDOCENTE','Nombre') !!}
                                            {!! form::text('NOMBREDOCENTE', $docente->NOMBREDOCENTE, ['class' => 'form-control', 'placeholder'=> 'Nombre de Usuario', 'required']) !!}
                                        </div>
                                        <div class="form-group">
                                                @if($user->ESADMINISTRADOR == 1)
                                                    <input type="checkbox" value="1" name="ESADMINISTRADOR" class="form-control" checked>
                                                    {!! form::label('checkbox',' Es Administrador') !!}
                                                @else
                                                    <input type="checkbox" value="1" name="ESADMINISTRADOR" class="form-control">
                                                    {!! form::label('checkbox',' Es Administrador') !!}
                                                @endif
                                        </div>
                                        <div class="form-group">
                                                @if($user->IDDOCENTE)
                                                    <input type="checkbox" value="1" name="ESDOCENTE" class="form-control" checked  disabled>
                                                    {!! form::label('checkbox',' Es Docente') !!}
                                                @else
                                                    <input type="checkbox" value="1" name="ESDOCENTE" class="form-control">
                                                    {!! form::label('checkbox',' Es Docente') !!}
                                                @endif
                                        </div>
                                        <div class="form-group">
                                                @if($docente->ESCOORDINADOR == 1)
                                                    <input type="checkbox" value="1" name="ESCOORDINADOR" class="form-control" checked>
                                                    {!! form::label('checkbox',' Es Coordinador') !!}
                                                @else
                                                    <input type="checkbox" value="1" name="ESCOORDINADOR" class="form-control">
                                                    {!! form::label('checkbox',' Es Coordinador') !!}
                                                @endif
                                        </div>
                                        <div class="form-group">
                                            @if($EsCoor)
                                                <h4><span for="chosen-select" class="label label-success">Seleccione la Materia a Coordinar.</span><h4>
                                                <select name="IDMATERIAIMPARTIDA" id="chosen-select" required>
                                                @foreach ($materiasImpartidas as $materiaImpartida)
                                                    @if($materiaImpartida->id == $materiaCoor)
                                                        <option value="{{ $materiaImpartida->id }}" selected>{{$materiaImpartida->materia->CODIGOMATERIA}}:{{$materiaImpartida->materia->NOMBREMATERIA}}</option>
                                                    @else
                                                        <option value="{{ $materiaImpartida->id }}">{{$materiaImpartida->materia->CODIGOMATERIA}}:{{$materiaImpartida->materia->NOMBREMATERIA}}</option>
                                                    @endif
                                                @endforeach
                                                </select>
                                            @else
                                                <h4><span for="chosen-select" class="label label-success">Seleccione la Materia a Coordinar.</span><h4>
                                                <select name="IDMATERIAIMPARTIDA" id="chosen-select">
                                                <option value="">Seleccione una Materia</option>
                                                @foreach ($materiasImpartidas as $materiaImpartida)
                                                        <option value="{{ $materiaImpartida->id }}">{{$materiaImpartida->materia->CODIGOMATERIA}}:{{$materiaImpartida->materia->NOMBREMATERIA}}</option>
                                                @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        
                                        <button type="submit" class="btn btn-warning"> {{trans('gogamessage.Actualizar')}} </button>
                                        
                                    {!! Form::close() !!}                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section><!-- /.content -->
@endsection




