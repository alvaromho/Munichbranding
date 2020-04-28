<?php
require_once "../config/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $empresa = $_POST['empresa'];
    $nombre_contacto = $_POST['nombre_contacto'];
    $mail_contacto = $_POST['mail_contacto'];


    //Comrpobar su el usuario existe
    $buscar = $con->prepare("SELECT * FROM cliente WHERE empresa = '$empresa'  LIMIT 1");
    try {
        $buscar->execute();
    } catch (Exception $e) {
        echo $e;
    }

    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        $array_devolver['error'] = "<i class=\"fas fa-exclamation-triangle\"></i>  Cliente ya existe.";
    } else {

      $nuevo = $con->prepare("INSERT INTO cliente (empresa, nombre_contacto, mail_contacto) VALUES ('$empresa','$nombre_contacto','$mail_contacto')");
       try {
            $nuevo->execute();
        } catch (Exception $e){
            echo $e;
        }
    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
