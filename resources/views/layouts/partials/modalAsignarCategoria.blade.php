<div class="modal fade" id="Modal{!! $cuesMat->cuestionario->id !!}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Inscribir </h3>
			</div>
		    <div class="modal-body">
				<h4>Seleccione el Archivo para Inscribir</h4>
                {!! Form::open(['route' => ['cuestionarios.guardarCategorias', $cuesMat->cuestionario->id], 'method' => 'POST']) !!}

				
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-lg" > {{trans('gogamessage.Importar')}} </button>
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
      // defaults
   }
    
</script>