<?php
/*
require_once "C:/xampp/htdocs/Clo/assets/config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];

    $query = $con->prepare("UPDATE agenda SET estado = 1 WHERE idUsuario = 1 and fecha between '2018-11-13' and DATE_ADD('2018-11-13', INTERVAL 7 DAY);
 ");
    $query->execute();


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
*/
?>
