<?php

require_once "../config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];
    $sql = "SELECT * FROM bloque WHERE idBloque = '$id' LIMIT 1";
    //echo $sql;
    $buscar = $con->prepare($sql);
    try {
        $buscar->execute();
        $row = $buscar->fetch();
    } catch (PDOException $e) {

        $array_devolver["error_sql"] = $e;
    }
    /*$buscar = $con->prepare("SELECT * FROM bloque WHERE idBloque = '$id' LIMIT 1");
    try {
        $buscar->execute();
    } catch (PDOException $e) {
        $array_devolver["error_sql"] = $e;
    }*/




    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        try{
            $eliminar = $con->prepare("DELETE FROM bloque WHERE idBloque = '$id'");
            $eliminar->execute();

            echo 'ok';
        } catch(PDOException $e){
            $array_devolver["error"] = "No puede borrar proyectos que tengan proyectos asociadas.";

        }

    } else {
        echo 'no existe';
    }
    //echo json_encode($array_devolver);
} else {
    exit("Fuera de aqui");
}

?>
