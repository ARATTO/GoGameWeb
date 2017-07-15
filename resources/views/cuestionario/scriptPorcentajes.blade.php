<script>
  
    $('#pregunta_{!! $catCue->categoria->id !!}').on('change', function() {
        totalesPreguntas();
    });

    $('#pregunta_{!! $catCue->categoria->id !!}').maskNumber({
            integer: true,
    });

</script>