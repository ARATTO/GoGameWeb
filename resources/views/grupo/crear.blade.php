@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Grupo') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.grupo.crear_head')
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
							{!! Form::open(['route' => 'grupos.store', 'method' => 'POST']) !!}

                                        <div class="form-group">
                                            {!! form::label('CODIGOGRUPO','Codigo Grupo') !!}
                                            {!! form::text('CODIGOGRUPO', null, ['class' => 'form-control', 'placeholder'=> 'GT-01', 'required']) !!}
                                        </div>
                                        <h4><span for="chosen-select2" class="label label-success">Seleccione la Materia.</span><h4>
                                        <select name="IDMATERIAIMPARTIDA" id="chosen-select2" required>
                                           <option value="">Seleccione la Materia</option>
                                           @foreach ($materiasImpartidas as $materiaImpartida)
                                               <option value="{{ $materiaImpartida->id }}">{{$materiaImpartida->materia->CODIGOMATERIA}}:{{$materiaImpartida->materia->NOMBREMATERIA}}</option>
                                           @endforeach
                                        </select>
                                        <h4><span for="chosen-select1" class="label label-success">Seleccione el Tipo de Grupo.</span><h4>
                                        <select name="IDTIPOGRUPO" id="chosen-select1" required>
                                           <option value="">Seleccione un Tipo de Grupo</option>
                                           @foreach ($tipoGrupos as $tipoGrupo)
                                               <option value="{{ $tipoGrupo->id }}">{{$tipoGrupo->NOMBRETIPOGRUPO}}</option>
                                           @endforeach
                                        </select>
                                        <h4><span for="chosen-select" class="label label-success">Seleccione el Docente asignado al grupo.</span><h4>
                                        <select name="IDDOCENTE" id="chosen-select" required>
                                           <option value="">Seleccione un Docente</option>
                                           @foreach ($docentes as $docente)
                                             <option value="{{ $docente->IDDOCENTE }}">{{$docente->NOMBREPERFIL}}</option>
                                           @endforeach
                                        </select>

                                        <hr>
                                        <button type="submit" class="btn btn-success"> {{trans('gogamessage.Crear')}} </button>

                                    {!! Form::close() !!}  
					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
