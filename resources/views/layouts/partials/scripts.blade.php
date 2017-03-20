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