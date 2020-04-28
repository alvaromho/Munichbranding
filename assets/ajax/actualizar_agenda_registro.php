<?php

require_once "../config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];
    $numero = $_POST['numero'];

    $buscar_agenda = $con->prepare("SELECT * FROM agenda WHERE idAgenda = '$id' LIMIT 1");
    $buscar_agenda->execute();


    // COmprobar que el email exista en la base de datos
    if ($buscar_agenda->rowCount() == 1){
        // Si existe
        $update_agenda = $con->prepare("UPDATE agenda SET estado = 2, duracion_real ='$numero' where idAgenda='$id'");
        $update_agenda->execute();
    } else {
      echo 'no existe';
    }
    //echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
