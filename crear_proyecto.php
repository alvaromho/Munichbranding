<?php
include 'crear_pagina_proyecto.php';

if(!empty($_FILES['thumbnail'])){
    echo 'mal';
} else {
    var_dump('Archivo: '.$_POST['thumbnail']) ;
}

if(!empty($_POST['nombre']) ||  !empty($_FILES['thumbnail']['name']) ||  !empty($_FILES['slider_url']['name']) || !empty($_POST['tipo']) || !empty($_POST['descripcion'])){
    $uploadedFile1 = '';
    if(!empty($_FILES["thumbnail"]["type"])){
        $fileName = $_FILES['thumbnail']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["thumbnail"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["thumbnail"]["type"] == "image/png") || ($_FILES["thumbnail"]["type"] == "image/jpg") || ($_FILES["thumbnail"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['thumbnail']['tmp_name'];
            $targetPath = "img/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile1 = $fileName;
            }
        }
    }
    $uploadedFile2 = '';
    if(!empty($_FILES["slider_url"]["type"])){
        $fileName = $_FILES['slider_url']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["slider_url"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["slider_url"]["type"] == "image/png") || ($_FILES["slider_url"]["type"] == "image/jpg") || ($_FILES["slider_url"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['slider_url']['tmp_name'];
            $targetPath = "img/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile2 = $fileName;
            }
        }
    }


    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];

    //include database configuration file
    include_once 'assets/config/config.php';

    //insert form data in the database
    $buscar = $con->query(" select * from proyecto where nombre = '".$nombre."' LIMIT 1");
    try {
        $buscar->execute();
    } catch (Exception $e) {
        echo $e;
    }

    // COmprobar que el email exista en la base de datos
    if ($buscar->rowCount() == 1){
        // Si existe
        echo 'Proyecto ya existe.';
    } else {

        $insert = $con->query("INSERT into proyecto (nombre,thumbnail, categoria,descripcion,orden,slider) VALUES ('" . $nombre . "','" . $uploadedFile1 . "','" . $tipo . "','" . $descripcion . "',15,'-')");
        echo $insert ? 'ok' : $insert . error_get_last(). "INSERT into proyecto (nombre,thumbnail, categoria,descripcion,orden,slider) VALUES ('" . $nombre . "','" . $uploadedFile1 . "','" . $tipo . "','" . $descripcion . "',15,'-')";
        //crear_paginas($_POST['nombre']);
    }
    //Crear aarchivos de paginas correspondientes: vista normal y vista administrador.



}


?>