<?php
require_once "assets/config/config.php";




    //Comrpobar su el usuario existe
    $buscar_actividades = $con->prepare("SELECT * FROM actividad");
    $buscar_actividades->execute();

    if ($buscar_actividades->rowCount() > 0) {
    // output data of each row
      while($row = $buscar_actividades->fetch()) {
          echo '<tr>
                          <td> ' . $row["idActividad"]. ' </td>
                          <td>  '. $row["nombre"]. '</td>
                          <td><a class="btn " onclick="confirmarActividad('. $row['idActividad'].')"><i class="fas fa-trash-alt"></i></a></td>
                          <td hidden>  '. $row["idFase"]. '</td>
                </tr>';
      }
      } else {
            echo "No hay resultados. ";
      }




?>


<script>


//Seleccionar una area de gestion para desplegar sus Actividads correspondientes


//Confirmar si se quiere eliminar el elemento de Actividad

function confirmarActividad(id) {
      if (confirm("Desea eliminar la Actividad seleccionada? Esta acción no se puede deshacer.")) {
          delete_itemActividad(id);
      }
}

// Borrar un Area
function delete_itemActividad(id) {
  var url_php = 'assets/ajax/eliminar_actividad.php';
  var data_form = {
    id: id
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
      console.log(e);
  })
  .always(function ajaxAlways() {
      console.log("'Final de la llamada ajax.'");
      location.reload();
  })
}



</script>
