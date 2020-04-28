actividad<?php

require_once "../config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];

    //Comrpobar su el usuario existe
    $buscar_actividad = $con->prepare("SELECT * FROM actividad WHERE idActividad = '$id' LIMIT 1");
    $buscar_actividad->execute();


    // COmprobar que el email exista en la base de datos
    if ($buscar_actividad->rowCount() == 1){
        // Si existe
        $eliminar_actividad = $con->prepare("DELETE FROM actividad WHERE idActividad = '$id'");
        $eliminar_actividad->execute();
        echo 'bien';

    } else {
      echo 'mal';


    }
    //echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
