<div class="modal fade" id="Modal{!! $cuesMat->cuestionario->id !!}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Cuestionario: {{$cuesMat->cuestionario->NOMBRECUESTIONARIO}}</h3>
			</div>
		    <div class="modal-body">
				
                {!! Form::open(['route' => ['cuestionarios.guardarCategorias', $cuesMat->cuestionario->id], 'method' => 'POST']) !!}
                
                <div class="form-group" >
                    <h4><span  for="chosen-select" class="label label-info">Categorias para Asignar</span></h4>
                    <select class="chosen-select" name="categoriasSeleccionadas[]" id="chosenCategoria_{!! $cuesMat->cuestionario->id !!}" multiple data-placeholder="Seleccione las categorias necesarias...">
                        @foreach ($categorias as $cat)
                           <option value="{{ $cat->id }}">{{$cat->NOMBRECATEGORIA}}</option>
                        @endforeach
                    </select>
                </div>
                <hr>
                <div class="form-group" >
                    <h4><span  for="chosen-select" class="label label-danger">Categorias para Eliminar</span></h4>
                    <select class="chosen-select" name="categoriasEliminar[]" id="chosenCategoriaEliminar_{!! $cuesMat->cuestionario->id !!}" multiple data-placeholder="Seleccione las categorias a Eliminar...">
                        @foreach ($categorias as $cat)
                           <option value="{{ $cat->id }}">{{$cat->NOMBRECATEGORIA}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="idCuestionario" value="{!! $cuesMat->cuestionario->id !!}">
				
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-lg" > {{trans('gogamessage.Guardar')}} </button>
                </div>
                {!! Form::close() !!}
			</div>
			<div class="modal-footer">
				<a href="#" data-dismiss="modal" class="btn btn-danger">
                    {{trans('gogamessage.Cancelar')}}
                </a>
			</div>
		</div>
	</div>
</div>

<script>
   function mostrarModalAsignarCategoria{!! $cuesMat->cuestionario->id !!}() 
   {
      $("#Modal{!! $cuesMat->cuestionario->id !!}").modal("show");
      $("#chosenCategoria_{!! $cuesMat->cuestionario->id !!}").chosen({
             no_results_text: "Oops, No encontramos nada como:  ",
             width: "100%",
      });
      $("#chosenCategoriaEliminar_{!! $cuesMat->cuestionario->id !!}").chosen({
             no_results_text: "Oops, No encontramos nada como:  ",
             width: "100%",
      });
      
      // defaults
   }
      
  
  
</script>