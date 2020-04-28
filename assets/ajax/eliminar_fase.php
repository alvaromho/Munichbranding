<?php

require_once "../config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];

    //Comrpobar su el usuario existe
    $buscar_fase = $con->prepare("SELECT * FROM fase WHERE idfase = '$id' LIMIT 1");
    $buscar_fase->execute();

    if ($buscar_fase->rowCount() == 1){
        // Si existe
        $eliminar_fase = $con->prepare("DELETE FROM fase WHERE idfase = '$id'");
        try {
            $eliminar_fase->execute();
        } catch (Exception $e) {
            echo $e;
        }

    } else {
      $array_devolver['error'] = 'No se encontro la fase.';


    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
