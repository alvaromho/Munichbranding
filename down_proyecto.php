<?php

require_once "assets/config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];
    $orden = 0 ;
    $buscar = $con->prepare("SELECT * FROM proyecto WHERE idProyecto = '$id' LIMIT 1");
    try {
        $buscar->execute();
        $row = $buscar->fetch();
        $nombre =  $row['nombre'];
        $orden  = $row['orden'];
        $orden_siguiente = $orden+1;
        echo $nombre;
    } catch (PDOException $e) {

        $array_devolver["error_sql"] = $e;
    }
    $buscar = $con->prepare("SELECT * FROM proyecto WHERE idProyecto = '$id' LIMIT 1");
    try {
        $buscar->execute();
    } catch (PDOException $e) {
        $array_devolver["error_sql"] = $e;
    }




    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        try{
            $eliminar = $con->prepare("UPDATE proyecto SET orden = -1  WHERE orden = '$orden_siguiente'");
            $eliminar->execute();
            $eliminar = $con->prepare("UPDATE proyecto SET orden = '$orden_siguiente'  WHERE orden = '$orden'");
            $eliminar->execute();
            $eliminar = $con->prepare("UPDATE proyecto SET orden = '$orden'  WHERE orden = -1");
            $eliminar->execute();
            //Borrar archivos
        } catch(PDOException $e){
            $array_devolver["error"] = "No puede borrar el slider del proyecto.";

        }

    } else {
        echo 'no existe';
    }
    echo json_encode($array_devolver);
} else {
    exit("Fuera de aqui");
}

?>
