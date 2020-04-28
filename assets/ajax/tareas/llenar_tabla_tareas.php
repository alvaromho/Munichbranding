<?php
require_once "assets/config/config.php";
    //Comrpobar su el usuario existe
    $buscar_tareas = $con->prepare("SELECT * FROM tarea");
    $buscar_tareas->execute();

    if ($buscar_tareas->rowCount() > 0) {
    // output data of each row
      while($row = $buscar_tareas->fetch()) {
          echo '<tr>
                          <td> ' . $row["idTarea"]. ' </td>
                          <td>  '. $row["nombre"]. '</td>
                          <td>  '. $row["descripcion"]. '</td>
                          <td><a  class="btn btn-danger" onclick="confirmarTarea('. $row['idTarea'].')"><i class="icon_close_alt2"></i></a></td>
                          <td hidden>  '. $row["idActividad"]. '</td>

                </tr>';
      }
      } else {
            echo "No hay resultados. ";
      }
?>


<script>
//Seleccionar una area de gestion para desplegar sus Actividads correspondientes


//Confirmar si se quiere eliminar el elemento de Actividad

function confirmarTarea(id) {
      if (confirm("Desea eliminar la Tarea seleccionada? Esta acción no se puede deshacer.")) {
          delete_itemTarea(id);
      }
}

// Borrar un Area
function delete_itemTarea(idTarea) {
  var url_php = 'assets/ajax/tareas/eliminar_tarea.php';
  var data_form = {
    id: idTarea
  }

  $.ajax({
      type: 'POST',
      url: url_php,
      data: data_form,
      dataType: 'json',
      async: true,

  })
  .done(function ajaxDone(res) {
      console.log(res);
  })
  .fail(function ajaxError(e) {
      console.log(e.error);
  })
  .always(function ajaxAlways() {
      console.log("'Final de la llamada ajax.'");
      location.reload();
  })
}



</script>
