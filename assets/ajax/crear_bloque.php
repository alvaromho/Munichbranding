<?php
header("Location: {$_SERVER['HTTP_REFERER']}");

require_once "../../assets/config/config.php";
require_once "../../funciones.php";
$valid_extensions = array("image/jpeg", "image/jpg", "image/png", "image/gif");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
       

        if (!empty($_FILES['fondo1']['name'])) {
           
            $fondo1 = '';
            if (!empty($_FILES["fondo1"]["type"])) {
                $fileName = $_FILES['fondo1']['name'];
                $temporary = explode(".", $_FILES["fondo1"]["name"]);
                $file_extension = end($temporary);

                if(in_array($_FILES["fondo1"]["type"],$valid_extensions)){    
                    $sourcePath = $_FILES['fondo1']['tmp_name'];
                    $targetPath = "../../proyectos/img/bloques/" . sanitizar(str_replace(" ","_", $fileName));
                    //echo $targetPath;
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $fondo1 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
        }
        echo $fondo1;   
        if (!empty($_FILES['fondo2']['name'])) {
            $fondo2 = '';
            if (!empty($_FILES["fondo2"]["type"])) {
                $fileName = $_FILES['fondo2']['name'];
                $temporary = explode(".", $_FILES["fondo2"]["name"]);
                $file_extension = end($temporary);
                if(in_array($_FILES["fondo2"]["type"],$valid_extensions)){    
                    $sourcePath = $_FILES['fondo2']['tmp_name'];
                    $targetPath = "../../proyectos/img/bloques/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $fondo2 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
        }

        if (!empty($_FILES['fondo3']['name'])) {
        $fondo3 = '';
        if (!empty($_FILES["fondo3"]["type"])) {
            $fileName = $_FILES['fondo3']['name'];
            $temporary = explode(".", $_FILES["fondo3"]["name"]);
            $file_extension = end($temporary);
            if(in_array($_FILES["fondo3"]["type"],$valid_extensions)){    
                $sourcePath = $_FILES['fondo3']['tmp_name'];
                $targetPath = "../../proyectos/img/bloques/" . sanitizar(str_replace(" ","_", $fileName));
                if (move_uploaded_file($sourcePath, $targetPath)) {
                        $fondo3 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
        }


        if (!empty($_POST['idProyecto'])) $idProyecto = $_POST['idProyecto'];
        if (!empty($_POST['tipo'])) $tipo = $_POST['tipo'];
        if (!empty($_POST['altura']) && !empty($_POST['unidad'])) $altura = $_POST['altura'] . $_POST['unidad'];

        if (!empty($_POST['texto1'])) $texto1 = str_replace("'","\'",$_POST['texto1']);
        if (!empty($_POST['titulo1'])) $titulo1 = $_POST['titulo1'];
        if (!empty($_POST['subtitulo1'])) $subtitulo1 = $_POST['subtitulo1'];
        if (!empty($_POST['alineacion1'])) $alineacion1 = $_POST['alineacion1'];
        if (!empty($_POST['color1'])) $color1 = $_POST['color1'];


        if (!empty($_POST['texto2'])) $texto2 = str_replace("'","\'",$_POST['texto2']);
        if (!empty($_POST['titulo2'])) $titulo2 = $_POST['titulo2'];
        if (!empty($_POST['subtitulo2'])) $subtitulo2 = $_POST['subtitulo2'];
        if (!empty($_POST['alineacion2'])) $alineacion2 = $_POST['alineacion2'];
        if (!empty($_POST['color2'])) $color2 = $_POST['color2'];

        if (!empty($_POST['texto3'])) $texto3 = str_replace("'","\'",$_POST['texto3']);
        if (!empty($_POST['titulo3'])) $titulo3 = $_POST['titulo3'];
        if (!empty($_POST['subtitulo3'])) $subtitulo3 = $_POST['subtitulo3'];
        if (!empty($_POST['alineacion3'])) $alineacion3 = $_POST['alineacion3'];
        if (!empty($_POST['color3'])) $color3 = $_POST['color3'];


        $sql = '';
        $sql .= "INSERT INTO bloque (idProyecto,tipo";
        if ($altura != '') $sql .= ',altura';
        if ($texto1 != '') $sql .= ',texto1';
        if ($titulo1 != '') $sql .= ',titulo1';
        if ($subtitulo1 != '') $sql .= ',subtitulo1';
        if ($fondo1 != '') $sql .= ',img_url1';
        if ($alineacion1 != '') $sql .= ',alineacion1';
        if ($color1 != '') $sql .= ',color1';

        if ($texto2 != '') $sql .= ',texto2';
        if ($titulo2 != '') $sql .= ',titulo2';
        if ($subtitulo2 != '') $sql .= ',subtitulo2';
        if ($fondo2 != '') $sql .= ',img_url2';
        if ($alineacion2 != '') $sql .= ',alineacion2';
        if ($color2 != '') $sql .= ',color2';

        if ($texto3 != '') $sql .= ',texto3';
        if ($titulo3 != '') $sql .= ',titulo3';
        if ($subtitulo3 != '') $sql .= ',subtitulo3';
        if ($fondo3 != '') $sql .= ',img_url3';
        if ($alineacion3 != '') $sql .= ',alineacion3';
        if ($color3 != '') $sql .= ',color3';
        $sql .= ") VALUES (" . $idProyecto . ",'" . $tipo . "'";
        if ($altura != '') $sql .= ",'" . $altura . "'";
        if ($texto1 != '') $sql .= ",'" . $texto1 . "'";
        if ($titulo1 != '') $sql .= ",'" . $titulo1 . "'";
        if ($subtitulo1 != '') $sql .= ",'" . $subtitulo1 . "'";
        if ($fondo1 != '') $sql .= ",'" . $fondo1 . "'";
        if ($alineacion1 != '') $sql .= ",'" . $alineacion1 . "'";
        if ($color1 != '') $sql .= ",'" . $color1 . "'";

        if ($texto2 != '') $sql .= ",'" . $texto2 . "'";
        if ($subtitulo2 != '') $sql .= ",'" . $titulo2 . "'";
        if ($subtitulo2 != '') $sql .= ",'" . $subtitulo2 . "'";
        if ($fondo2 != '') $sql .= ",'" . $fondo2 . "'";
        if ($alineacion2 != '') $sql .= ",'" . $alineacion2 . "'";
        if ($color2 != '') $sql .= ",'" . $color2 . "'";

        if ($texto3 != '') $sql .= ",'" . $texto3 . "'";
        if ($titulo3 != '') $sql .= ",'" . $titulo3 . "'";
        if ($subtitulo3 != '') $sql .= ",'" . $subtitulo3 . "'";
        if ($fondo3 != '') $sql .= ",'" . $fondo3 . "'";
        if ($alineacion3 != '') $sql .= ",'" . $alineacion3 . "'";
        if ($color3 != '') $sql .= ",'" . $color3 . "'";
        $sql .= ')';


        try {
            $insertar = $con->query($sql);
            exit;
        } catch (Exception $e) {
            //exit( $e);
            echo $sql;
        }

    }
}


?>
