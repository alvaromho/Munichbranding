<?php
require_once "../config/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $duracion = $_POST['duracion'];
    $prioridad = $_POST['prioridad'];
    $objetivo = $_POST['objetivo'];
    //$estado = $_POST['estado'];
    //$progreso = $_POST['progreso'];
    $idActividad = $_POST['idActividad'];
    $idUsuario = $_POST['idUsuario'];
    $idProyecto = $_POST['idProyecto'];


    //Comrpobar su el usuario existe
    $buscar = $con->prepare("SELECT * FROM tarea WHERE nombre = '$nombre' AND idActividad = '$idActividad' AND idProyecto = '$idProyecto' LIMIT 1");
    try {
        $buscar->execute();

    } catch (Exception $e) {
        $array_devolver["error"] = $e;
        echo $e;
    }

    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        $array_devolver['error'] = "Tarea ya existe.";
    } else {

      $nuevo = $con->prepare("INSERT INTO tarea (nombre, descripcion, duracion, prioridad, objetivo, idActividad, idUsuario, idProyecto) VALUES ('$nombre','$descripcion', '$duracion', '$prioridad', '$objetivo', '$idActividad', '$idUsuario','$idProyecto')");
       try {
            $nuevo->execute();
        } catch (Exception $e){
        $array_devolver["error"] = $e;
            echo $e;
        }
    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");

  }

?>

