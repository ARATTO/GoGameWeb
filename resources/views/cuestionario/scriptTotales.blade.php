<script>
   function totalesPreguntas() 
   {
      var suma = 0;
      @foreach($categoriaCuestionario as $catCue)
        suma = suma + parseInt(document.getElementById("pregunta_{!! $catCue->categoria->id !!}").value);
      @endforeach

      $("#tot_preguntas").val(suma);
   }
      
   function totalesPorcentajes() 
   {
      var suma = 0;
      @foreach($categoriaCuestionario as $catCue)
        @if($catCue->categoria->id == $ultimo_categoria->categoria->id)
            var ultimo_por = 100 - suma;
            $("#porcentaje_{!! $catCue->categoria->id !!}").val(ultimo_por);
        @else
            suma = suma + parseFloat(document.getElementById("porcentaje_{!! $catCue->categoria->id !!}").value);
        @endif
        
      @endforeach
      
      porcentajeFinal();
   }

   function porcentajeFinal() 
   {
      var suma = 0;
      @foreach($categoriaCuestionario as $catCue)
        suma = suma + parseFloat(document.getElementById("porcentaje_{!! $catCue->categoria->id !!}").value);
      @endforeach

      $("#tot_porcentaje").val(suma);
   }

    function limpiar(){
        @foreach($categoriaCuestionario as $catCue)
            $("#porcentaje_{!! $catCue->categoria->id !!}").val("0.0");
            $("#pregunta_{!! $catCue->categoria->id !!}").val("0");
            $("#tot_preguntas").val("");
            $("#tot_porcentaje").val("");
        @endforeach
    }
</script>