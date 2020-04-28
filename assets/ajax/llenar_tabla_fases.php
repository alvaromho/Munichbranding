<?php require_once "assets/config/config.php";

    //Comrpobar su el usuario existe
    $buscar_fases = $con->prepare("SELECT * FROM fase");
    $buscar_fases->execute();

    if ($buscar_fases->rowCount() > 0) {
    // output data of each row
      while($row = $buscar_fases->fetch()) {
          echo '<tr>
                          <td> ' . $row["idFase"]. ' </td>
                          <td>  '. $row["nombre"]. '</td>
                          <td>
                            <a class="btn" onclick="confirmarFase('. $row['idFase'].')"> <i class="fas fa-trash-alt"></i> </a>
                            <a class="btn" onclick="seleccionarFase('. $row['idFase'].')"> <i class="fas fa-angle-double-right"> </i> </a>
                          </td>
                          <td hidden>  '. $row["idArea_gestion"]. '</td>
                </tr>';
      }
      } else {
            echo "No hay resultados. ";
      }




?>

<script>
// Configura en el input (no visible desde la interfaz) la accion de filtrar
//el contenido de la tabla fases cuando cambie el valor de este input.
// El cambio del valor se hace desde la accion seleccionarArea() en el boton seleccionar de cada elemento de esta tabla.
function filtrarActividades() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("inputFiltrarActividades");
  filter = input.value.toUpperCase();
  table = document.getElementById("displayActividades");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

<script>


//Seleccionar una area de gestion para desplegar sus fases correspondientes


//Confirmar si se quiere eliminar el elemento de Fase

function confirmarFase(id) {
      if (confirm("Desea eliminar el Fase seleccionada? Esta acción no se puede deshacer.")) {
          delete_itemFase(id);
      }
}

// Borrar un Area
function delete_itemFase(id) {
  var url_php = 'assets/ajax/eliminar_fase.php';
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

//Selecciona un Area con tal de mostrar en la tabla de Fases solo las que esten relacionadas con esta area en especial.
function seleccionarFase(idFase) {
  //alert('boton apreatado - Id:  ' + idFase);

  document.getElementById("inputFiltrarActividades").value = idFase ;
  $( "#inputFiltrarActividades" ).trigger( "change" );
}

</script>
