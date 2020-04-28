<?php

require_once "/var/www/html/Registro_Actividades/assets/config/config.php";

    //Comrpobar su el usuario existe
    $buscar_areas = $con->prepare("SELECT * FROM Area_gestion");
    $buscar_areas->execute();

    if ($buscar_areas->rowCount() > 0) {
    // output data of each row
    echo '<select id="idArea" class ="custom-select">';
      while($row = $buscar_areas->fetch()) {
          echo '<option  value="' . $row["idArea_gestion"]. '"> ' . $row["nombre"]. ' </option>';
      }
    echo '</select>';
      } else {
            echo "No hay resultados. ";
      }

?>
