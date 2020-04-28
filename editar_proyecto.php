<?php
if(!empty($_POST['e_nombre']) ||  !empty($_FILES['e_thumbnail']['name']) ||  !empty($_FILES['e_slider_url']['name']) || !empty($_POST['e_tipo']) || !empty($_POST['e_descripcion'])){
    $uploadedFile1 = '';
    if(!empty($_FILES["e_thumbnail"]["type"])){
        $fileName = $_FILES['e_thumbnail']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["e_thumbnail"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["e_thumbnail"]["type"] == "image/png") || ($_FILES["e_thumbnail"]["type"] == "image/jpg") || ($_FILES["e_thumbnail"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['e_thumbnail']['tmp_name'];
            $targetPath = "img/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile1 = $fileName;
            }
        }
    }
    $uploadedFile2 = '';
    if(!empty($_FILES["e_slider_url"]["type"])){
        $fileName = $_FILES['e_slider_url']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["e_slider_url"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["e_slider_url"]["type"] == "image/png") || ($_FILES["e_slider_url"]["type"] == "image/jpg") || ($_FILES["e_slider_url"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['e_slider_url']['tmp_name'];
            $targetPath = "img/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile2 = $fileName;
            }
        }
    }

    $idProyecto = $_POST['idProyecto'];
    $nombre = $_POST['e_nombre'];
    $tipo = $_POST['e_tipo'];
    $descripcion = $_POST['e_descripcion'];

    //include database configuration file
    include_once 'assets/config/config.php';

    //insert form data in the database
    try {
        $insert = $con->query("UPDATE proyecto SET nombre = '".$nombre."',thumbnail='".$uploadedFile1."',slider_url='".$uploadedFile2."', tipo = '".$tipo."',descripcion = '" .$descripcion . "' WHERE idProyecto = ".$idProyecto);

    }catch (PDOException $e){
        echo $e;
    }
    echo $insert ? 'ok' : "UPDATE proyecto SET nombre = '".$nombre."',thumbnail='".$uploadedFile1."',slider_url='".$uploadedFile2."', tipo = '".$tipo."',descripcion = '" .$descripcion . "' WHERE idProyecto = ".$idProyecto;

}


?>