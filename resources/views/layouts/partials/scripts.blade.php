<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>
<!-- DataTable pluggin -->
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<!-- Include Date Range Picker Pluging RangosFechas-->
<script type="text/javascript" src="{{ asset('/plugins/daterangepicker/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Include Plugin Checkbox https://vsn4ik.github.io/bootstrap-checkbox -->
<script src="{{ asset('/plugins/checkbox/bootstrap-checkbox.min.js') }}"></script>
<!-- Include Plugin LightBox para Imagenes Pop-Up http://lokeshdhakar.com/projects/lightbox2 -->
<script src="{{ asset('/plugins/lightbox2/dist/js/lightbox.js') }}" type="text/javascript"></script>

<!-- FileInput Shido http://plugins.krajee.com/file-input -->
<script src="{{ asset('/plugins/file-input/js/plugins/canvas-to-blob.min.js') }}" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('/plugins/file-input/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files.
     This must be loaded before fileinput.min.js -->
<script src="{{ asset('/plugins/file-input/js/plugins/purify.min.js') }}" type="text/javascript"></script>
<!-- the main fileinput plugin file -->
<script src="{{ asset('/plugins/file-input/js/fileinput.min.js') }}"></script>
<!-- optionally if you need translation for your language then include 
    locale file as mentioned below -->
<script src="{{ asset('/plugins/file-input/js/locales/es.js') }}"></script>
<!-- FIN FileInput Shido http://plugins.krajee.com/file-input -->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<!-- Mensajes Flash -->
<script>
    $('#flash-overlay-modal').modal();
</script>
<!-- Fin Mansajes Flash -->

<!-- JS PARA TABLAS -->

<!-- TABLA -->
<script type="text/javascript">
	$(document).ready(function() {
            $('#TablaLista').DataTable();
      });
</script>

<!-- Include Date Range Picker Pluging RangosFechas -->
<script type="text/javascript">
       $(function() {
            $('input[name="daterange"]').daterangepicker({
                  
                        "format": "YYYY-MM-DD",
                        "separator": " al ",
                       
            });
       });
</script>

<!-- Include Plugin CheckBox -->
<script>
      $(function() {
            $(':checkbox').checkboxpicker({
                  html: true,
                  offLabel: '<span class="glyphicon glyphicon-remove">',
                  onLabel: '<span class="glyphicon glyphicon-ok">'
            })
      }); 
</script>

<!-- Include Plugin FileShido -->
<script>
      // defaults
      $("#input-id").fileinput({
            showUpload: false,
      });       
</script>
