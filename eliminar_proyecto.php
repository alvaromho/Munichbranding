<?php

require_once "assets/config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $id = $_POST['id'];
    $slider = '';
    $thumbnail = '';

    $buscar = $con->prepare("SELECT * FROM proyecto WHERE idProyecto = '$id' LIMIT 1");
        try {
            $buscar->execute();
            $row = $buscar->fetch();
            $nombre =  $row['nombre'];
            $slider = $row['slider'];
            $thumbnail = $row['thumbnail'];
            if (file_exists('img/'.$slider && $slider != '')){
                unlink('img/'.$slider) or die("Couldn't delete file");
            }
            if (file_exists('img/'.$thumbnail  && $thumbnail != '')){
                unlink('img/'.$thumbnail) or die("Couldn't delete file");
            }
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
            $eliminar = $con->prepare("DELETE FROM proyecto WHERE idProyecto = '$id'");
            $eliminar->execute();
            unlink(str_replace(" ","_",$nombre) . '.php');
            unlink(str_replace(" ","_",$nombre).'_admin.php');
            //Borrar archivos
            echo 'Borrar';
        } catch(PDOException $e){
          $array_devolver["error"] = "No puede borrar proyectos que tengan proyectos asociadas.";

        }

    } else {
      echo 'no existe';
    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
