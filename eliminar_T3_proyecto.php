<?php

require_once "assets/config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];
    $orden = 0 ;
    $eliminar = $con->prepare("UPDATE proyecto SET thumbnail3 = ''  WHERE idProyecto = '$id'");
    try {
        $eliminar->execute();
        $row = $eliminar->fetch();

    } catch (PDOException $e) {

        $array_devolver["error_sql"] = $e;
    }


    echo json_encode($array_devolver);
} else {
    exit("Fuera de aqui");
}

?>
