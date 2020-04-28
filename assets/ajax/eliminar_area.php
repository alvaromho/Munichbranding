<?php

require_once "../config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];
    echo "2";
    //Comrpobar su el usuario existe
    $buscar_area = $con->prepare("SELECT * FROM area_gestion WHERE idArea_gestion = '$id' LIMIT 1");
    $buscar_area->execute();
    echo "  3";


    // COmprobar que el email exista en la base de datos
    if ($buscar_area->rowCount() == 1){
    echo "  entra en if";
        // Si existe
        $eliminar_area = $con->prepare("DELETE FROM area_gestion WHERE idArea_gestion = '$id'");
         echo "prepara consulta objeto";

        try {
            $eliminar_area->execute();
        } catch (Exception $e) {
            echo $e;
        }


    } else {
    echo "  no entra en if";
    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
