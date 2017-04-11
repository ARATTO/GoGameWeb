@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('gogamessage.Ciclo') }}
@endsection
        
@section('main-content')
    @include('layouts.partials.contentheader.ciclo.index_head')
    <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
	<div class="container spark-screen">    
		<div class="row">
			<div class="col-md-8 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">{{ trans('gogamessage.Ciclo') }} {{$ciclo->CODIGOCICLO}} : Asignar Materias</div>
					<div class="panel-body">
						@include('bones-flash::bones.flash')
						@include('layouts.partials.flash')
                            {!! Form::open(['route' => ['ciclos.asignadas', $ciclo->id], 'method' => 'POST']) !!}
                                        <div class="form-group">    
                                                <h4><span for="chosen-select" class="label label-info">Seleccione las Materias para este Ciclo.</span><h4>
                                                @if($materias != null)
                                                    <select multiple name="MateriaSeleccionada[]" id="chosen-select" data-placeholder="Seleccione las materias a asignar...">
                                                        @if($MateriaAsociada)
                                                            @foreach ($materias as $materia)
                                                                    <option value="{{ $materia->id }}">{{$materia->CODIGOMATERIA}} : {{$materia->NOMBREMATERIA}}</option>
                                                            @endforeach
                                                            @foreach ($MateriaAsociada as $materia)
                                                                    <option value="{{ $materia->id }}" selected>{{$materia->CODIGOMATERIA}} : {{$materia->NOMBREMATERIA}}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($materias as $materia)
                                                                    <option value="{{ $materia->id }}">{{$materia->CODIGOMATERIA}} : {{$materia->NOMBREMATERIA}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                @else
                                                    {!! form::label('#','No existen materias en el Sistema') !!}
                                                @endif
                                                
                                                
                                                @if($MateriaAsociada)
                                                    <hr>
                                                    <h4><span for="chosen-select" class="label label-danger">Seleccione las Materias que desea ELIMINAR del CICLO.</span><h4>
                                                    <select multiple name="MateriaBorrar[]" id="chosen-borrar" data-placeholder="Esto no podra Revertirse, tenga Cuidado...">
                                                        @foreach ($MateriaAsociada as $materia)
                                                             <option value="{{ $materia->id }}">{{$materia->CODIGOMATERIA}} : {{$materia->NOMBREMATERIA}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                    
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success"> {{trans('gogamessage.Asignar')}} </button>
                                        
                            {!! Form::close() !!}  
                            

					</div>
				</div>
			</div>
		</div>
	</div>
    </section><!-- /.content -->
@endsection
