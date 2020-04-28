<?php

require_once "../config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];

    $buscar_tarea = $con->prepare("SELECT * FROM tarea WHERE idtarea = '$id' LIMIT 1");
    $buscar_tarea->execute();


    // COmprobar que el email exista en la base de datos
    if ($buscar_tarea->rowCount() == 1){
        // Si existe
        $eliminar_tarea = $con->prepare("DELETE FROM tarea WHERE idtarea = '$id'");
        $eliminar_tarea->execute();
    } else {
      echo 'no existe';
    }
    //echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
