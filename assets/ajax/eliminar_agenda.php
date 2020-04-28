<?php

require_once "../config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];

    $buscar_agenda = $con->prepare("SELECT * FROM agenda WHERE idAgenda = '$id' LIMIT 1");
    $buscar_agenda->execute();


    // COmprobar que el email exista en la base de datos
    if ($buscar_agenda->rowCount() == 1){
        // Si existe
        $eliminar_agenda = $con->prepare("DELETE FROM agenda WHERE idAgenda = '$id'");
        $eliminar_agenda->execute();
    } else {
      echo 'no existe';
    }
    //echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
