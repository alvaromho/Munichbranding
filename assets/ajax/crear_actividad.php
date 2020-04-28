<?php

require_once "../config/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $nombre = $_POST['nombre'];
    $idFase = $_POST['idFase'];

    //Comrpobar su el usuario existe
    $buscar = $con->prepare("SELECT * FROM actividad WHERE nombre = '$nombre' and idFase = '$idFase' LIMIT 1");
    try {
        $buscar->execute();
    } catch (Exception $e){
        echo $e;
    }

    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        $array_devolver['error'] = "Fase ya existe.";
    } else {

      $nuevo = $con->prepare("INSERT INTO actividad (nombre,idFase) VALUES ('$nombre','$idFase')");
      try {
        $nuevo->execute();
      } catch (Exception $e){
          echo $e;
      }

    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
