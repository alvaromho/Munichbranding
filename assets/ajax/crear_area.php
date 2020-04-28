<?php
require_once "../config/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $nombre = $_POST['nombre'];

    //Comrpobar su el usuario existe
    $buscar = $con->prepare("SELECT * FROM area_gestion WHERE nombre = '$nombre' LIMIT 1");
    $buscar->execute();


    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        $array_devolver['error'] = "Area de gestion ya existe.";
    } else {

      $nuevo = $con->prepare("INSERT INTO area_gestion (nombre) VALUES ('$nombre')");
      $nuevo->execute();

    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
