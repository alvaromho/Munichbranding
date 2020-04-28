<?php
// Dropdown que enlista todas las actividades y
// es utilizado para filtrar la tabla de tareas
// asociadas a la actividad seleccionada

require_once "assets/config/config.php";

    //Comrpobar su el usuario existe
    $buscar_actividades = $con->prepare("SELECT * FROM Actividad");
    $buscar_actividades->execute();

    if ($buscar_actividades->rowCount() > 0) {
    // output data of each row
    echo '<select id="inputFiltrarTareas" onchange="filtrarTareas(this)" class ="custom-select">';
    echo '<option value= "" >Todas las fases</option>';
      while($row = $buscar_actividades->fetch()) {
          echo '<option  value="' . $row["idActividad"]. '"> ' . $row["nombre"]. ' </option>';
      }
    echo '</select>';
      } else {
            echo "No hay resultados. ";
      }

?>

<script>
// Configura en el input la accion de filtrar
//el contenido de la tabla fases cuando cambie el valor de este input.
// El cambio del valor se hace desde la accion seleccionarArea() en el boton seleccionar de cada elemento de esta tabla.
function filtrarTareas(tarea) {
  var input, filter, table, tr, td, i;
  input = tarea.value;
  filter = input.toUpperCase();
  table = document.getElementById("displayTareas");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  if (input === ""){
    $("#boton_crear_tarea").hide();
  } else {
      $("#boton_crear_tarea").show();
  }
}
</script>
