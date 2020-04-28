<?php

require_once "/var/www/html/Registro_Actividades/assets/config/config.php";

    //Comrpobar su el usuario existe
    $buscar_fases = $con->prepare("SELECT * FROM Fase");
    $buscar_fases->execute();

    if ($buscar_fases->rowCount() > 0) {
    // output data of each row
    echo '<select id="idArea" class ="custom-select">';
      while($row = $buscar_fases->fetch()) {
          echo '<option  value="' . $row["idFase"]. '"> ' . $row["nombre"]. ' </option>';
      }
    echo '</select>';
      } else {
            echo "No hay resultados. ";
      }

?>
