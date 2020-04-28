<?php

require_once "../config/config.php";
    session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $fecha = $_POST['fecha'];
    $duracion = $_POST['duracion'];
    $idTarea = $_POST['idTarea'];
    $usuario = $_SESSION['idUsuario'];

    //Comrpobar su el usuario existe
    $buscar = $con->prepare("SELECT * FROM agenda WHERE fecha = '$fecha' AND idTarea = '$idTarea' LIMIT 1");
    try {
        $buscar->execute();
    } catch (Excepction $e) {
        $array_devolver["error"] = $e;
    }

    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        $array_devolver['error'] = "Area de gestion ya existe.";
    } else {

      $nuevo = $con->prepare("INSERT INTO agenda (fecha,duración_estimada,idTarea,idUsuario) VALUES ('$fecha','$duracion','$idTarea','$usuario')");
      try {
        $nuevo->execute();
      } catch (Excepction $e) {
          $array_devolver["error"] = $e;
      }


    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
