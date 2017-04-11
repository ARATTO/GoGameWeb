@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Grupo') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.grupo.editar_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-5 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Grupo') }}</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
							{!! Form::open(['route' => ['grupos.update', $grupo], 'method' => 'PUT']) !!}

                                        <div class="form-group">
                                            {!! form::label('CODIGOGRUPO','Codigo Grupo') !!}
                                            {!! form::text('CODIGOGRUPO', $grupo->CODIGOGRUPO, ['class' => 'form-control', 'placeholder'=> 'GT-01', 'required']) !!}
                                        </div>
                                        <h4><span for="chosen-select2" class="label label-warning">Seleccione la Materia.</span><h4>
                                        <select name="IDMATERIAIMPARTIDA" id="chosen-select2" required>
                                           @foreach ($materiasImpartidas as $materiaImpartida)
                                               @if($grupo->IDMATERIAIMPARTIDA == $materiaImpartida->id)
                                                    <option value="{{ $materiaImpartida->id }}" selected>{{$materiaImpartida->materia->CODIGOMATERIA}}:{{$materiaImpartida->materia->NOMBREMATERIA}}</option>
                                               @else
                                                    <option value="{{ $materiaImpartida->id }}">{{$materiaImpartida->materia->CODIGOMATERIA}}:{{$materiaImpartida->materia->NOMBREMATERIA}}</option>
                                               @endif
                                           @endforeach
                                        </select>
                                        <h4><span for="chosen-select1" class="label label-warning">Seleccione el Tipo de Grupo.</span><h4>
                                        <select name="IDTIPOGRUPO" id="chosen-select1" required>
                                           @foreach ($tipoGrupos as $tipoGrupo)
                                               @if($grupo->IDTIPOGRUPO == $tipoGrupo->id)
                                                    <option value="{{ $tipoGrupo->id }}" selected>{{$tipoGrupo->NOMBRETIPOGRUPO}}</option>
                                               @else
                                                    <option value="{{ $tipoGrupo->id }}">{{$tipoGrupo->NOMBRETIPOGRUPO}}</option>
                                               @endif
                                           @endforeach
                                        </select>
                                        <h4><span for="chosen-select" class="label label-warning">Seleccione el Docente asignado al grupo.</span><h4>
                                        <select name="IDDOCENTE" id="chosen-select" required>
                                           @foreach ($docentes as $docente)
                                               @if($grupo->IDDOCENTE == $docente->IDDOCENTE)
                                                    <option value="{{ $docente->IDDOCENTE }}" selected>{{$docente->NOMBREPERFIL}}</option>
                                               @else
                                                    <option value="{{ $docente->IDDOCENTE }}">{{$docente->NOMBREPERFIL}}</option>
                                               @endif
                                           @endforeach
                                        </select>

                                        <hr>
                                        <button type="submit" class="btn btn-warning"> {{trans('gogamessage.Actualizar')}} </button>

                                    {!! Form::close() !!}  
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
