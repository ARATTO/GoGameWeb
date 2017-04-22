<div class="modal fade" id="Modal{!! $grupo->id !!}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
	    <div class="modal-content">
			<div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>Inscribir {{$grupo->CODIGOGRUPO}} : {{$grupo->materia->NOMBREMATERIA}}</h3>
			</div>
		    <div class="modal-body">
				<h4>Seleccione el Archivo para Inscribir</h4>
                {!! Form::open(['route' => ['inscripcion.inscribir', $grupo->id], 'method' => 'POST', 'files' => true, 'enctype' =>'multipart/form-data']) !!}

				<div class="form-group"  >
                        <input id="importar{!! $grupo->id !!}" type="file" name="ArchivoExcel" required>
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
   function mostrarModal{!! $grupo->id !!}() 
   {
      $("#Modal{!! $grupo->id !!}").modal("show");
      // defaults
      $("#importar{!! $grupo->id !!}").fileinput({
            showUpload: false,
            showPreview: false,
      }); 
   }
    
</script>