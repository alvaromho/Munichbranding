<?php
require_once "../config/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $nombre = $_POST['nombre'];
    $thumbnail = $_FILES['thumbnail'];
    $array_devolver['thumbnail'] = $thumbnail;


    //Comrpobar su el usuario existe
    $buscar = $con->prepare("SELECT * FROM proyecto WHERE nombre = '$nombre'");
    try {
        $buscar->execute();
    } catch (Exception $e) {
        $array_devolver['error_bd'] = $e;
    }

    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        $array_devolver['error'] = "Proyecto ya existe.";
    } else {
            //$fileName = $_POST['thumbnail']['name'];
           // print_r($fileName);

      /*$nuevo = $con->prepare("INSERT INTO proyecto (nombre, thumbnail, fecha_inicio, fecha_fin, prioridad, idCliente, idUsuario) VALUES ('$nombre','$descripcion','$fecha_inicio', '$fecha_fin','$prioridad','$idCliente', '$idUsuario')");
       try {
            $nuevo->execute();
        } catch (Exception $e){
        $array_devolver["cliente"] = $idCliente;
        $array_devolver["query"] = "INSERT INTO proyecto (nombre, descripcion, fecha_inicio, fecha_fin, prioridad, idCliente, idUsuario) VALUES ('$nombre','$descripcion','$fecha_inicio', '$fecha_fin','$prioridad','$idCliente', '$idUsuario')";
            echo $e;
        }*/
    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }





?>
