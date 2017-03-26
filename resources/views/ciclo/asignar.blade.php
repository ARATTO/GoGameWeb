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
                                                {!! form::label('chosen-select','Seleccione las Materias para este Ciclo') !!}

                                                @if($materias != null)
                                                    <select multiple name="MateriaSeleccionada[]" id="chosen-select" data-placeholder="Seleccione las materias a asignar...">
                                                        @foreach ($materias as $materia)
                                                            @if($MateriaImpartida->count() != 0)
                                                                @foreach ($MateriaImpartida as $materiaImp)
                                                                    @if($materia->id == $materiaImp->IDMATERIA) 
                                                                        <option value="{{ $materia->id }}" selected>{{$materia->CODIGOMATERIA}} : {{$materia->NOMBREMATERIA}}</option>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <option value="{{ $materia->id }}" >{{$materia->CODIGOMATERIA}} : {{$materia->NOMBREMATERIA}}</option>
                                                            @endif
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
