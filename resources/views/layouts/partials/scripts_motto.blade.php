<script type="text/javascript">
      //Funcion paraMostrar Coordinador al Poner como Docente
      function showContentCoordinador() {
          element = document.getElementById("id_COORDINADOR");
          elementMateria = document.getElementById("id_MAT_COORDINADOR");
          check = document.getElementById("id_DOCENTE");
          if (check.checked) {
                element.style.display='block';
                element.value='0';
          }
          
      }
      //FIN Funcion paraMostrar Coordinador al Poner como Docente
      //Funcion paraMostrar Materia para Coordinador
      function showContentMateriaCoordinador() {
          element = document.getElementById("id_MAT_COORDINADOR");
          chosen = document.getElementById("chosen-select");
          check = document.getElementById("id_ACT_COORDINADOR");
          if (check.checked) {
                element.style.display='block';
                chosen.setAttribute('required','true');
          }else{
                chosen.removeAttribute("required");
          }
          
      }
</script>