<?php
require_once "assets/config/config.php";




    //Comrpobar su el usuario existe
    $buscar_areas = $con->prepare("SELECT * FROM Area_gestion");
    $buscar_areas->execute();

    if ($buscar_areas->rowCount() > 0) {
    // output data of each row
      while($row = $buscar_areas->fetch()) {
          echo '<tr>
                          <td> ' . $row["idArea_gestion"]. ' </td>
                          <td>  '. $row["nombre"]. '</td>
                          <td>
                            <a class="btn" onclick="confirmarArea('. $row['idArea_gestion'].')"><i class="fas fa-trash-alt"></i></a>
                            <a class="btn" onclick="seleccionarArea('. $row['idArea_gestion'].')"> <i class="fas fa-angle-double-right"></i> </a>
                          </td>
                </tr>';
      }
      } else {
            echo "No hay resultados. ";
      }



?>

<script>

</script>
