<?php
header("Location: {$_SERVER['HTTP_REFERER']}");

require_once "assets/config/config.php";
require_once "funciones.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['editar'])) {

        if (!empty($_FILES['e_fondo1']['name'])) {
            $e_fondo1 = '';
            if (!empty($_FILES["e_fondo1"]["type"])) {
                $fileName = $_FILES['e_fondo1']['name'];
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["e_fondo1"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["e_fondo1"]["type"] == "image/png") || ($_FILES["e_fondo1"]["type"] == "image/jpg") || ($_FILES["e_fondo1"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['e_fondo1']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $fondo1 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
        }
        if (!empty($_FILES['e_fondo2']['name'])) {
            $e_fondo2 = '';
            if (!empty($_FILES["e_fondo2"]["type"])) {
                $fileName = $_FILES['e_fondo2']['name'];
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["e_fondo2"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["e_fondo2"]["type"] == "image/png") || ($_FILES["e_fondo2"]["type"] == "image/jpg") || ($_FILES["e_fondo2"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['e_fondo2']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $fondo2 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
        }

        if (!empty($_FILES['e_fondo3']['name'])) {
            $fondo3 = '';
            if (!empty($_FILES["e_fondo3"]["type"])) {
                $fileName = $_FILES['e_fondo3']['name'];
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["e_fondo3"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["e_fondo3"]["type"] == "image/png") || ($_FILES["e_fondo3"]["type"] == "image/jpg") || ($_FILES["e_fondo3"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['e_fondo3']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $fondo3 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
        }

        if (!empty($_POST['e_idBloque'])) $idBloque = $_POST['e_idBloque'];
        if (!empty($_POST['e_tipo'])) $tipo = $_POST['e_tipo'];
        if (!empty($_POST['e_altura']) && !empty($_POST['e_unidad'])) $altura = $_POST['e_altura'] . $_POST['e_unidad'];

        if (!empty($_POST['e_texto1'])) $texto1 = str_replace("'","\'",$_POST['e_texto1']);
        if (!empty($_POST['e_titulo1'])) $titulo1 = $_POST['e_titulo1'];
        if (!empty($_POST['e_subtitulo1'])) $subtitulo1 = $_POST['e_subtitulo1'];
        if (!empty($_POST['e_alineacion1'])) $alineacion1 = $_POST['e_alineacion1'];
        if (!empty($_POST['e_color1'])) $color1 = $_POST['e_color1'];



        if (!empty($_POST['e_texto2'])) $texto2 = str_replace("'","\'",$_POST['e_texto2']);
        if (!empty($_POST['e_titulo2'])) $titulo2 = $_POST['e_titulo2'];
        if (!empty($_POST['e_subtitulo2'])) $subtitulo2 = $_POST['e_subtitulo2'];
        if (!empty($_POST['e_alineacion2'])) $alineacion2 = $_POST['e_alineacion2'];
        if (!empty($_POST['e_color2'])) $color2 = $_POST['e_color2'];

        if (!empty($_POST['e_texto3'])) $texto3 = str_replace("'","\'",$_POST['e_texto3']);
        if (!empty($_POST['e_titulo3'])) $titulo3 = $_POST['e_titulo3'];
        if (!empty($_POST['e_subtitulo3'])) $subtitulo3 = $_POST['e_subtitulo3'];
        if (!empty($_POST['e_alineacion3'])) $alineacion3 = $_POST['e_alineacion3'];
        if (!empty($_POST['e_color3'])) $color3 = $_POST['e_color3'];


        $sql =  'UPDATE bloque SET tipo = \''.$tipo.'\',altura=\''.$altura.'\', texto1=\''.$texto1.'\', titulo1 = \''.$titulo1.'\',subtitulo1 = \'' .$subtitulo1 . '\',alineacion1 = \'' .$alineacion1 . '\',color1 = \'' .$color1 . '\',texto2=\''.$texto2.'\', titulo2 = \''.$titulo2.'\',subtitulo2 = \'' .$subtitulo2 . '\',alineacion2 = \'' .$alineacion2 . '\',color2 = \'' .$color2 . '\',texto3=\''.$texto3.'\', titulo3 = \''.$titulo3.'\',subtitulo3 = \'' .$subtitulo3 . '\',alineacion3 = \'' .$alineacion3 . '\',color3 = \'' .$color3 . '\'';
        if (!empty($_FILES['e_fondo1']['name'])) $sql .= ',img_url1 = \'' .$fondo1 . '\'';
        if (!empty($_FILES['e_fondo2']['name'])) $sql .= ',img_url2 = \'' .$fondo2 . '\'';
        if (!empty($_FILES['e_fondo3']['name'])) $sql .= ',img_url3 = \'' .$fondo3 . '\'';
        $sql .= 'WHERE idBloque = '.$idBloque;
        echo $sql;
        //insert form data in the database
        try {
            $update = $con->query($sql);
            echo 'update exitoso';
        }catch (PDOException $e){
            echo $e;
        }
        //echo $update ? 'ok' : 'UPDATE bloque SET tipo = \''.$tipo.'\',altura=\''.$altura.'\', titulo1 = \''.$titulo1.'\',subtitulo1 = \'' .$subtitulo1 . '\',alineacion1 = \'' .$alineacion1 . '\',color1 = \'' .$color1 . '\',texto2=\''.$texto2.'\', titulo2 = \''.$titulo2.'\',subtitulo2 = \'' .$subtitulo2 . '\',alineacion2 = \'' .$alineacion2 . '\',color2 = \'' .$color2 . '\',texto3=\''.$texto3.'\', titulo3 = \''.$titulo3.'\',subtitulo3 = \'' .$subtitulo3 . '\',alineacion3 = \'' .$alineacion3 . '\',color3 = \'' .$color3 . '\' WHERE idBloque = '.$idBloque;
        //echo 'fin';


        /*
        $sql = '';
        $sql .= "UPDATE bloque SET bloque (idProyecto,e_tipo";
        if ($e_altura != '') $sql .= ',e_altura';
        if ($e_texto1 != '') $sql .= ',e_texto1';
        if ($titulo1 != '') $sql .= ',titulo1';
        if ($subtitulo1 != '') $sql .= ',subtitulo1';
        if ($e_fondo1 != '') $sql .= ',img_url1';
        if ($alineacion1 != '') $sql .= ',alineacion1';
        if ($color1 != '') $sql .= ',color1';

        if ($texto2 != '') $sql .= ',texto2';
        if ($titulo2 != '') $sql .= ',titulo2';
        if ($subtitulo2 != '') $sql .= ',subtitulo2';
        if ($e_fondo2 != '') $sql .= ',img_url2';
        if ($alineacion2 != '') $sql .= ',alineacion2';
        if ($color2 != '') $sql .= ',color2';

        if ($texto3 != '') $sql .= ',texto3';
        if ($titulo3 != '') $sql .= ',titulo3';
        if ($subtitulo3 != '') $sql .= ',subtitulo3';
        if ($fondo3 != '') $sql .= ',img_url3';
        if ($alineacion3 != '') $sql .= ',alineacion3';
        if ($color3 != '') $sql .= ',color3';
        $sql .= ") VALUES (" . $idProyecto . ",'" . $e_tipo . "'";
        if ($e_e_altura != '') $sql .= ",'" . $e_e_altura . "'";
        if ($e_texto1 != '') $sql .= ",'" . $e_texto1 . "'";
        if ($titulo1 != '') $sql .= ",'" . $titulo1 . "'";
        if ($subtitulo1 != '') $sql .= ",'" . $subtitulo1 . "'";
        if ($e_fondo1 != '') $sql .= ",'" . $e_fondo1 . "'";
        if ($alineacion1 != '') $sql .= ",'" . $alineacion1 . "'";
        if ($color1 != '') $sql .= ",'" . $color1 . "'";

        if ($texto2 != '') $sql .= ",'" . $texto2 . "'";
        if ($subtitulo2 != '') $sql .= ",'" . $titulo2 . "'";
        if ($subtitulo2 != '') $sql .= ",'" . $subtitulo2 . "'";
        if ($e_fondo2 != '') $sql .= ",'" . $e_fondo2 . "'";
        if ($alineacion2 != '') $sql .= ",'" . $alineacion2 . "'";
        if ($color2 != '') $sql .= ",'" . $color2 . "'";

        if ($texto3 != '') $sql .= ",'" . $texto3 . "'";
        if ($titulo3 != '') $sql .= ",'" . $titulo3 . "'";
        if ($subtitulo3 != '') $sql .= ",'" . $subtitulo3 . "'";
        if ($fondo3 != '') $sql .= ",'" . $fondo3 . "'";
        if ($alineacion3 != '') $sql .= ",'" . $alineacion3 . "'";
        if ($color3 != '') $sql .= ",'" . $color3 . "'";
        $sql .= ')';
        echo $sql;


        $insertar = $con->query($sql);
        try {
            mysqli_query($con, $sql);
            //$insertar->execute();
            exit;
        } catch (Exception $e) {
            //exit( $e);
            echo $sql;
        }
*/
    }
}


?>
