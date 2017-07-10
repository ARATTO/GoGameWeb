<div class="modal fade" id="ModalPregunta{!! $cat->id !!}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Preguntas para Categoria: {{$cat->NOMBRECATEGORIA}}</h3>
			</div>
		    <div class="modal-body">
				<h4>Seleccione el Archivo para cargar Preguntas</h4>
                {!! Form::open(['route' => ['categoria.importarPreguntas', $cat->id], 'method' => 'POST', 'files' => true, 'enctype' =>'multipart/form-data']) !!}

				<div class="form-group"  >
                        <input id="importarPregunta{!! $cat->id !!}" type="file" name="ArchivoExcel" required>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-success btn-lg" enctype='multipart/form-data'> {{trans('gogamessage.Importar')}} </button>
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
   function mostrarModalPregunta{!! $cat->id !!}() 
   {
      $("#ModalPregunta{!! $cat->id !!}").modal("show");
      // defaults
      $("#importarPregunta{!! $cat->id !!}").fileinput({
            showUpload: false,
            showPreview: false,
      }); 
   }
    
</script>