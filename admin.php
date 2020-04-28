<?php
/*
session_start();
if (isset($_SESSION['nombre'])) {
    // it does; output the message
    $nombre_usuario = $_SESSION['nombre'];
}*/
require_once "assets/config/config.php";
require_once "funciones.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'crear_pagina_proyecto.php';

    if (!empty($_POST['nombre'])) {
        if (!empty($_POST['nombre']) || !empty($_FILES['thumbnail']['name']) || !empty($_FILES['thumbnail2']['name']) ||!empty($_FILES['thumbnail3']['name']) || !empty($_FILES['slider']['name']) || !empty($_POST['categoria']) || !empty($_POST['descripcion'])) {
            $uploadedFile1 = '';
            if (!empty($_FILES["thumbnail"]["type"])) {
                $fileName = sanitizar(str_replace(" ", "_",$_FILES['thumbnail']['name']));
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["thumbnail"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["thumbnail"]["type"] == "image/png") || ($_FILES["thumbnail"]["type"] == "image/jpg") || ($_FILES["thumbnail"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['thumbnail']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $uploadedFile1 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
            $uploadedFile2 = '';
            if (!empty($_FILES["thumbnail2"]["type"])) {
                $fileName = sanitizar(str_replace(" ", "_",$_FILES['thumbnail2']['name']));
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["thumbnail2"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["thumbnail2"]["type"] == "image/png") || ($_FILES["thumbnail2"]["type"] == "image/jpg") || ($_FILES["thumbnail2"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['thumbnail2']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $uploadedFile2 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
            $uploadedFile3 = '';
            if (!empty($_FILES["thumbnail3"]["type"])) {
                $fileName = sanitizar(str_replace(" ", "_",$_FILES['thumbnail3']['name']));
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["thumbnail3"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["thumbnail3"]["type"] == "image/png") || ($_FILES["thumbnail3"]["type"] == "image/jpg") || ($_FILES["thumbnail3"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['thumbnail3']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $uploadedFile3 = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
            $slider = '';
            if (!empty($_FILES["slider"]["type"])) {
                $fileName = sanitizar(str_replace(" ", "_",$_FILES['slider']['name']));
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["slider"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["slider"]["type"] == "image/png") || ($_FILES["slider"]["type"] == "image/jpg") || ($_FILES["slider"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['slider']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $slider = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }


            $nombre = sanitizar($_POST['nombre']);
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $cliente = quitar_saltos($_POST['e_cliente']);
            $industria = quitar_saltos($_POST['e_industria']);
            $servicios = quitar_saltos($_POST['e_servicios']);
            $detalles = quitar_saltos($_POST['e_detalles']);

            //include database configuration file
            include_once 'assets/config/config.php';

            //insert form data in the database
            $buscar = $con->query(" select * from proyecto where nombre = '" . $nombre . "' LIMIT 1");
            try {
                $buscar->execute();
            } catch (Exception $e) {
                echo $e;
            }

            // COmprobar que el email exista en la base de datos
            if ($buscar->rowCount() == 1) {
                // Si existe
                print_msg('error', 'Proyecto ya existe.');
            } else {
                // echo "INSERT into proyecto (nombre,thumbnail,thumbnail2,thumbnail3, categoria,orden,cliente,industria,servicios,slider) VALUES ('" . $nombre . "','" . $uploadedFile1 . "','" . $uploadedFile2 . "','" . $uploadedFile3 . "','" . $categoria . "',(select last_insert_id(orden)+1 from proyecto as p   order by orden desc limit 1)),'" . $cliente . "','" . $industria . "','" . $servicios . "','" . $slider . "')";
                $insert = $con->query("INSERT into proyecto (nombre,thumbnail,thumbnail2,thumbnail3, categoria,orden,cliente,industria,servicios,slider,detalles) VALUES ('" . $nombre . "','" . $uploadedFile1 . "','" . $uploadedFile2 . "','" . $uploadedFile3 . "','" . $categoria . "',(select last_insert_id(orden)+1 from proyecto as p   order by orden desc limit 1),'" . $cliente . "','" . $industria . "','" . $servicios . "','" . $slider . "','" . $detalles . "')");
                //echo $insert ? 'ok' : $insert . error_get_last();
                crear_paginas($_POST['nombre'],$con->lastInsertId());
                if ($insert) print_msg('success', 'Proyecto creado exitosamente.');
                else print_msg('error', 'Error al ingresar el proyecto a la base de datos.');
            }


        }
    } elseif (!empty($_POST['e_nombre'])) {

        if (!empty($_POST['e_nombre']) || !empty($_FILES['e_thumbnail']['name']) || !empty($_FILES['e_slider']['name']) || !empty($_POST['e_categoria']) || !empty($_POST['e_descripcion'])) {
            $uploadedFile1 = '';
            if (!empty($_FILES["e_thumbnail"]["type"])) {
                $fileName = sanitizar(str_replace(" ", "_", $_FILES['e_thumbnail']['name']));
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["e_thumbnail"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["e_thumbnail"]["type"] == "image/png") || ($_FILES["e_thumbnail"]["type"] == "image/jpg") || ($_FILES["e_thumbnail"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['e_thumbnail']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $uploadedFile1 =sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
            $uploadedFile2 = '';
            if (!empty($_FILES["e_thumbnail2"]["type"])) {
                $fileName = sanitizar(str_replace(" ", "_", $_FILES['e_thumbnail2']['name']));
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["e_thumbnail2"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["e_thumbnail2"]["type"] == "image/png") || ($_FILES["e_thumbnail2"]["type"] == "image/jpg") || ($_FILES["e_thumbnail2"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['e_thumbnail2']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $uploadedFile2 =sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
            $uploadedFile3 = '';
            if (!empty($_FILES["e_thumbnail3"]["type"])) {
                $fileName = sanitizar(str_replace(" ", "_", $_FILES['e_thumbnail3']['name']));
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["e_thumbnail3"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["e_thumbnail3"]["type"] == "image/png") || ($_FILES["e_thumbnail3"]["type"] == "image/jpg") || ($_FILES["e_thumbnail3"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['e_thumbnail3']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $uploadedFile3 =sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }
            $slider = '';
            if (!empty($_FILES["e_slider"]["type"])) {
                $fileName = sanitizar(str_replace(" ","_",$_FILES['e_slider']['name']));
                $valid_extensions = array("jpeg", "jpg", "png");
                $temporary = explode(".", $_FILES["e_slider"]["name"]);
                $file_extension = end($temporary);
                if ((($_FILES["e_slider"]["type"] == "image/png") || ($_FILES["e_slider"]["type"] == "image/jpg") || ($_FILES["e_slider"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)) {
                    $sourcePath = $_FILES['e_slider']['tmp_name'];
                    $targetPath = "img/" . sanitizar(str_replace(" ","_", $fileName));
                    if (move_uploaded_file($sourcePath, $targetPath)) {
                        $slider = sanitizar(str_replace(" ","_", $fileName));
                    }
                }
            }


            $nombre = sanitizar($_POST['e_nombre']);
            $categoria = $_POST['e_categoria'];
            $descripcion = $_POST['e_descripcion'];
            $idProyecto = $_POST['idProyecto'];
            $cliente = quitar_saltos($_POST['e_cliente']);
            $industria = quitar_saltos($_POST['e_industria']);
            $servicios = quitar_saltos($_POST['e_servicios']);
            $detalles = quitar_saltos($_POST['e_detalles']);


            //include database configuration file
            include_once 'assets/config/config.php';

            //insert form data in the database
            $buscar = $con->query(" select * from proyecto where idProyecto = '" . $idProyecto . "' LIMIT 1");
            try {
                $buscar->execute();
            } catch (Exception $e) {
                echo $e;
            }

            if ($buscar->rowCount() == 1 ) {
                $buscar->fetch();
                if ($buscar["nombre"] != $nombre){ echo '<script type="application/javascript">alert(1);</script>';}
                $sql = "UPDATE proyecto SET nombre = '" . $nombre . "',categoria = '" . $categoria . "',descripcion = '" . $descripcion."'";
                if ($uploadedFile1 != '') $sql .= ", thumbnail = '".$uploadedFile1."'";
                if ($uploadedFile2 != '') $sql .= ", thumbnail2 = '".$uploadedFile2."'";
                if ($uploadedFile3 != '') $sql .= ", thumbnail3 = '".$uploadedFile3."'";
                if ($slider != '') $sql .= ", slider = '".$slider."'";
                if ($cliente != '') $sql .= ", cliente = '".$cliente."'";
                if ($servicios != '') $sql .= ", servicios = '".$servicios."'";
                if ($industria != '') $sql .= ", industria = '".$industria."'";
                if ($detalles != '') $sql .= ", detalles = '".$detalles."'";


                // if ($uploadedFile2 != '') $sql .= ", slider = '".$uploadedFile2."'";
                $sql .= " WHERE idProyecto = ".$idProyecto;

                $insert = $con->query($sql);
                //echo $insert ? 'ok' : $insert . error_get_last();
                //crear_paginas($_POST['nombre']);
                if ($insert) print_msg('success', 'Proyecto editado exitosamente.');
                else print_msg('error', 'Error al ingresar el proyecto a la base de datos.');
            } else {
                // No existe
                print_msg('error', 'Proyecto no existe.'. "UPDATE proyecto SET nombre = '" . $nombre . "',categoria = '" . $categoria . "',descripcion = '" . $descripcion . "' WHERE idProyecto = '.$idProyecto.')");
            }
        }

    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Administración Munich</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow:300,400,500,600,700,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="assets/css/PUSH---Bootstrap-Button-Pack-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Modal-Form---with-error-message.css">
    <link rel="stylesheet" href="assets/css/MUSA_panel-table.css">
    <!-- <link rel="stylesheet" href="assets/css/Sidemenu-1.css">-->
    <link rel="stylesheet" href="assets/css/Sidemenu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <style>
        .input-group-text{
            width: 100%;
        }
        .input-group-prepend{
            min-width: 120px;
        }

    </style>

</head>


<body>
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h1 class="display-3">Proyectos</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xl-12 align-self-start search-table-col">
                <div class="form-group pull-right col-lg-4"><input type="text" id="filtrar" class="search form-control filtrar" placeholder="Filtrar..."></div>
                <span class="counter pull-right"></span>
                <button class="btn btn-primary btn-circle btn-xl fixed" id="crear_proyecto" type="button" data-toggle="modal" data-target="#nuevoProyecto" >
                    <i class="fa fa-plus"></i>
                </button>
                <div class="table-responsive table-bordered table table-hover table-bordered results" style="font-family: Roboto, sans-serif; margin-bottom: 100px;">
                    <table id="tabla" class="table table-bordered table-hover">
                        <thead class="bill-header cs">
                        <tr>
                            <th id="trs-hd"  style="width:5%"># Orden</th>
                            <th id="trs-hd" style="width:15%" >Nombre</th>
                            <th id="trs-hd" style="width:15%">Slider</th>
                            <th id="trs-hd" style="width:10%">Url Thumbnail 1</th>
                            <th id="trs-hd" style="width:10%">Url Thumbnail 2</th>
                            <th id="trs-hd" style="width:10%">Url Thumbnail 3</th>
                            <th id="trs-hd" style="width:10%">Categoria</th>
                            <th id="trs-hd" style="width:10%"><i class="fa fa-gears" style="font-size: 22px;"></i></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php


                        //Comrpobar su el usuario existe
                        $buscar_proyectos = $con->prepare("SELECT * FROM proyecto order by orden");
                        $buscar_proyectos->execute();

                        if ($buscar_proyectos->rowCount() > 0) {
                            // output data of each row
                            while($row = $buscar_proyectos->fetch()):
                                ?>
                                <tr>
                                    <td>  <?=$row["orden"]?> </td>
                                    <td><a href="<?=str_replace(" ","_",sanitizar_acentos($row["nombre"]))?>.php"> <?=$row["nombre"]?></a>  <a style="font-size: small" href="<?= str_replace(" ","_",sanitizar_acentos($row["nombre"]))?>_admin.php"><i class="far fa-edit"></i>
                                        </a> </td>
                                    <td> <?= $row["slider"]?>
                                        <?php if($row["slider"] != ""):?>
                                            <a class="text-danger button-margin" type="button" onclick="eliminarSliderProyecto(<?=$row['idProyecto']?>)">
                                                <i class="fas fa-eraser"></i>
                                            </a>
                                        <?php endif;?>
                                    </td>
                                    <td> <?= $row["thumbnail"]?>
                                        <?php if($row["thumbnail"] != ""):?>
                                            <a class="text-danger button-margin" type="button" onclick="eliminarT1Proyecto(<?= $row['idProyecto']?>)">
                                                <i class="fas fa-eraser"></i>
                                            </a>
                                        <?php endif;?>
                                    </td>
                                    <td> <?= $row["thumbnail2"]?>
                                        <?php if($row["thumbnail2"] != ""):?>
                                            <a class="text-danger button-margin" type="button" onclick="eliminarT2Proyecto(<?= $row['idProyecto']?>)">
                                                <i class="fas fa-eraser"></i>
                                            </a>
                                        <?php endif;?>
                                    </td>
                                    <td> <?= $row["thumbnail3"]?>
                                        <?php if($row["thumbnail3"] != ""):?>
                                            <a class="text-danger button-margin" type="button" onclick="eliminarT3Proyecto(<?= $row['idProyecto']?>)">
                                                <i class="fas fa-eraser"></i>
                                            </a>
                                        <?php endif;?>
                                    </td>
                                    <td> <?= $row["categoria"]?></td>

                                    <td>
                                        <a id="editar_proyecto" type="button" onclick="editar_proyecto(<?= $row["idProyecto"]?>,'<?= $row["nombre"]?>','<?=  $row["descripcion"]?>','<?=$row["categoria"]?>','<?= $row["thumbnail"]?>','<?= $row["thumbnail2"]?>','<?= $row["thumbnail3"]?>','<?= $row["cliente"] ?>','<?=agregar_saltos($row["industria"])?>','<?=agregar_saltos($row["servicios"])?>','<?=$row["slider"]?>','<?=agregar_saltos($row["detalles"])?>')" class="text-primary button-margin" data-toggle="tooltip" title="Editar Tarea"><i class="fas fa-edit"></i></a>
                                        <a class="text-danger button-margin" type="button" onclick="confirmarProyecto(<?= $row["idProyecto"]?>)"><i class="fas fa-trash-alt"></i></a>
                                        <a class="text-danger button-margin" type="button" onclick="up(<?= $row["idProyecto"]?>)"><i class="fas fa-sort-up"></i></a>
                                        <a class="text-danger button-margin" type="button" onclick="down(<?= $row["idProyecto"]?>)"><i class="fas fa-sort-down"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile;

                        } else {
                            echo " <tr>No hay resultados</tr> ";
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/smart-forms.min.js"></script>
<script src="assets/js/bs-animation.js"></script>
<script src="assets/js/Contact-FormModal-Contact-Form-with-Google-Map.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
<script src="assets/js/Sidemenu.js"></script>
<script src="assets/js/Table-With-Search.js"></script>
</body>
<!-- MODAL CREAR PROYECTO -->
<div class="modal fade" role="dialog" tabindex="-1" id="nuevoProyecto">
    <div class="modal-dialog modal-grande" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <h1 class="text-center" id="tittle-c" >Nuevo Proyecto</h1><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">


                <div class="col-12" data-aos="fade-down" data-aos-delay="500">
                    <form enctype="multipart/form-data" role="form" method="POST"  action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="40%">
                                        <label class="input-group-text" for="nombre">Nombre</label>
                                    </div>
                                    <input class="form-control" type="text" id="nombre" style="font-family: Barlow, sans-serif;" placeholder="Nombre" name="nombre" required>
                                </div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="30%">
                                        <label class="input-group-text" for="categoria">Categoria</label>
                                    </div>
                                    <select class="custom-select" id="categoria" name ="categoria" required>
                                        <option  value=""selected>Seleccionar...</option>
                                        <option value="Branding">Branding</option>
                                        <option value="Diseño Editorial">Diseño Editorial</option>
                                        <option value="Packaging">Packaging</option>
                                        <option value="Diseño de Espacios">Diseño de Espacios</option>
                                        <option value="Digital">Digital</option>
                                        <option value="Diseño de Información">Diseño de información</option>



                                    </select>
                                </div>
                                <div class="input-group mb-3 edtFormMarg" hidden>
                                    <textarea class="form-control" type="text" id="descripcion" style="font-family: Barlow, sans-serif;" placeholder="Premios " name="descripcion" ></textarea>
                                </div>
                                <!--<div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="40%">
                                        <label class="input-group-text"  for="thumbnail">Thumbnail</label>
                                    </div>
                                    <input class="form-control" type="file" id="thumbnail" style="font-family: Barlow, sans-serif;" placeholder="Imagen Thumbnail" name="thumbnail" required></div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="40%">
                                        <label class="input-group-text" for="slider">Slider</label>
                                    </div>
                                    <input class="form-control" type="file" id="slider" style="font-family: Barlow, sans-serif;" placeholder="Slider" name="slider" required></div>-->
                                <div class="custom-file" style="margin-bottom: 1rem">
                                    <div class="input-group-prepend" width="40%">
                                        <label id="label-thumbnail" class="custom-file-label"  for="thumbnail">Thumbnail 1</label>
                                    </div>
                                    <input id="input-thumbnail" onchange="actualizar_label_crear()" class="custom-file-input" type="file" id="thumbnail" name="thumbnail"  lang="es">
                                </div>
                                <div class="custom-file" style="margin-bottom: 1rem">
                                    <div class="input-group-prepend" width="40%">
                                        <label id="label-thumbnail2" class="custom-file-label"  for="thumbnail2">Thumbnail 2</label>
                                    </div>
                                    <input id="input-thumbnail2" onchange="actualizar_label_crear2()" class="custom-file-input" type="file" id="thumbnail2" name="thumbnail2"  lang="es">
                                </div>
                                <div class="custom-file" style="margin-bottom: 1rem">
                                    <div class="input-group-prepend" width="40%">
                                        <label id="label-thumbnail3" class="custom-file-label"  for="thumbnail3">Thumbnail 3</label>
                                    </div>
                                    <input id="input-thumbnail3" onchange="actualizar_label_crear3()" class="custom-file-input" type="file" id="thumbnail3" name="thumbnail3"  lang="es">
                                </div>
                                <div class="custom-file" style="margin-bottom: 1rem" >
                                    <div class="input-group-prepend" width="40%">
                                        <label class="custom-file-label" id="label_slider" for="slider">Slider </label>
                                    </div>
                                    <input class="custom-file-input"  onchange="actualizar_label_crear4()"type="file" id="slider" name="slider"  lang="es">
                                </div>

                                <!--<div class="custom-file" style="margin-bottom: 1rem" hidden>
                                    <div class="input-group-prepend" width="40%">
                                        <label class="custom-file-label"  for="slider">Slider </label>
                                    </div>
                                    <input class="custom-file-input" type="file" id="slider" name="slider"  lang="es">
                                </div>-->
                            </div>
                            <div class="col-lg-6 linea-izq">
                                <div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="40%">
                                        <label class="input-group-text" for="cliente">Cliente</label>
                                    </div>
                                    <input class="form-control" type="text" id="cliente" style="font-family: Barlow, sans-serif;" placeholder="Cliente" name="cliente" required>
                                </div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <textarea class="form-control" type="text" id="industria" style="font-family: Barlow, sans-serif;" placeholder="Industria " name="industria" ></textarea>
                                </div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <textarea class="form-control" type="text" id="servicios" style="font-family: Barlow, sans-serif;" placeholder="Servicios " name="servicios" ></textarea>
                                </div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <textarea class="form-control" type="text" id="detalles" style="font-family: Barlow, sans-serif;" placeholder="Detalles " name="detalles" ></textarea>
                                </div>


                            </div>
                        </div>
                        <div id="msg_error" class="alert alert-danger" style="display: none" role="alert" ></div>
                        <div class="text-center" id="button-c-c" style="width: 100%;"><button class="btn btn-primary" id="button-c" type="submit" style="background-color: #33a6cc;">CREAR</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL EDITAR PROYECTO -->
<div class="modal fade" role="dialog" tabindex="-1" id="editarProyecto">
    <div class="modal-dialog modal-grande" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <h1 class="text-center" id="tittle-c" >Editar Proyecto: <label id="label_titulo_nombre" for="e_nombre"></label></h1><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div class=" col-lg-12" data-aos="fade-down" data-aos-delay="500">
                    <form enctype="multipart/form-data" role="form" method="POST"  action="#">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3 edtFormMarg" hidden>
                                    <div class="input-group-prepend" width="40%">
                                        <label class="input-group-text" for="e_nombre">Nombre</label>
                                    </div>
                                    <input class="form-control" type="text" id="e_nombre" style="font-family: Barlow, sans-serif;" placeholder="Nombre" name="e_nombre" >
                                </div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="30%">
                                        <label class="input-group-text" for="e_categoria">Categoria</label>
                                    </div>
                                    <select class="custom-select" id="e_categoria" name ="e_categoria" required>
                                        <option value="Branding">Branding</option>
                                        <option value="Diseño Editorial">Diseño Editorial</option>
                                        <option value="Packaging">Packaging</option>
                                        <option value="Diseño de Espacios">Diseño de Espacios</option>
                                        <option value="Digital">Digital</option>
                                        <option value="Diseño de Información">Diseño de información</option>

                                    </select>
                                </div>
                                <div class="input-group mb-3 edtFormMarg" hidden>
                                    <textarea class="form-control" type="text" id="e_descripcion" style="font-family: Barlow, sans-serif;" placeholder="Premios " name="e_descripcion" ></textarea>
                                </div>
                                <!--<div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="40%">
                                        <label class="input-group-text"  for="thumbnail">Thumbnail</label>
                                    </div>
                                    <input class="form-control" type="file" id="thumbnail" style="font-family: Barlow, sans-serif;" placeholder="Imagen Thumbnail" name="thumbnail" required></div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="40%">
                                        <label class="input-group-text" for="slider">Slider</label>
                                    </div>
                                    <input class="form-control" type="file" id="slider" style="font-family: Barlow, sans-serif;" placeholder="Slider" name="slider" required></div>-->
                                <div class="custom-file" style="margin-bottom: 1rem">
                                    <div class="input-group-prepend" width="40%">
                                        <label id="label-thumbnail-editar" class="custom-file-label"  for="e_thumbnail"> </label>
                                    </div>
                                    <input id="input-thumbnail-editar" class="custom-file-input"  onchange="actualizar_label_editar()" type="file" id="e_thumbnail" name="e_thumbnail"  lang="es">
                                </div>
                                <div class="custom-file" style="margin-bottom: 1rem">
                                    <div class="input-group-prepend" width="40%">
                                        <label id="label-thumbnail2-editar" class="custom-file-label"  for="e_thumbnail2"> </label>
                                    </div>
                                    <input id="input-thumbnail2-editar" class="custom-file-input"  onchange="actualizar_label_editar2()" type="file" id="e_thumbnail2" name="e_thumbnail2"  lang="es">
                                </div>
                                <div class="custom-file" style="margin-bottom: 1rem">
                                    <div class="input-group-prepend" width="40%">
                                        <label id="label-thumbnail3-editar" class="custom-file-label"  for="e_thumbnail3"> </label>
                                    </div>
                                    <input id="input-thumbnail3-editar" class="custom-file-input"  onchange="actualizar_label_editar3()" type="file" id="e_thumbnail3" name="e_thumbnail3"  lang="es">
                                </div>
                                <div class="custom-file" style="margin-bottom: 1rem" >
                                    <div class="input-group-prepend" width="40%">
                                        <label id="label-slider-editar" class="custom-file-label"  for="e_slider">Slider </label>
                                    </div>
                                    <input class="custom-file-input" onchange="actualizar_label_editar4()" type="file" id="e_slider" name="e_slider"  lang="es">
                                </div>
                                <!--<div class="custom-file" style="margin-bottom: 1rem" hidden>
                                    <div class="input-group-prepend" width="40%">
                                        <label id="for_e_slider"class="custom-file-label"  for="e_slider">Slider </label>
                                    </div>
                                    <input class="custom-file-input" type="file" id="e_slider" name="e_slider"  lang="es">
                                </div>-->
                            </div>
                            <div class="col-lg-6 linea-izq">
                                <div class="input-group mb-3 edtFormMarg">
                                    <div class="input-group-prepend" width="40%">
                                        <label class="input-group-text" for="cliente">Cliente</label>
                                    </div>
                                    <input class="form-control" type="text" id="e_cliente" style="font-family: Barlow, sans-serif;" placeholder="Cliente" name="e_cliente" required>
                                </div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <textarea class="form-control" type="text" id="e_industria" style="font-family: Barlow, sans-serif;" placeholder="Industria " name="e_industria" ></textarea>
                                </div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <textarea class="form-control" type="text" id="e_servicios" style="font-family: Barlow, sans-serif;" placeholder="Servicios " name="e_servicios" ></textarea>
                                </div>
                                <div class="input-group mb-3 edtFormMarg">
                                    <textarea class="form-control" type="text" id="e_detalles" style="font-family: Barlow, sans-serif;" placeholder="Detalles " name="e_detalles" ></textarea>
                                </div>



                            </div>
                            <input id="idProyecto" name="idProyecto" type="text" hidden>
                            <div id="msg_error" class="alert alert-danger" style="display: none" role="alert" ></div>
                            <div class="text-center" id="button-c-c" style="width: 100%;"><button class="btn btn-primary" id="button-c" type="submit" style="background-color: #33a6cc;">EDITAR</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL EDITAR PROYECTO -->
<!--<div class="modal fade" role="dialog" tabindex="-1" id="editarProyecto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <h1 class="text-center" id="tittle-c" >Nuevo Proyecto</h1><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <p>(*)Imagenes solo camiaran si se selecciona un archivo.</p>
                <div class="col-lg-6 col-xl-12" data-aos="fade-down" data-aos-delay="500">
                    <form enctype="multipart/form-data" role="form" method="POST"  action="#">
                        <div class="input-group mb-3 edtFormMarg">
                            <div class="input-group-prepend" width="40%">
                                <label class="input-group-text" for="e_nombre">Nombre</label>
                            </div>
                            <input class="form-control" type="text" id="e_nombre" style="font-family: Barlow, sans-serif;" placeholder="Nombre" name="e_nombre" required></div>
                        <div class="form-group">
                            <textarea class="form-control" type="text" id="e_descripcion" style="font-family: Barlow, sans-serif;" placeholder="Descripcion " name="e_descripcion" required></textarea></div>
                        <div class="input-group mb-3 edtFormMarg">
                            <div class="input-group-prepend" width="40%">
                                <label class="input-group-text" for="e_thumbnail">Imagen Thumbnail</label>
                            </div>
                            <input class="form-control" type="file" id="e_thumbnail" style="font-family: Barlow, sans-serif;" placeholder="Imagen Thumbnail" name="e_thumbnail" ></div>
                        <div class="input-group mb-3 edtFormMarg">
                            <div class="input-group-prepend" width="40%">
                                <label class="input-group-text" for="e_slider">Imagen Slider</label>
                            </div>
                            <input class="form-control" type="file" id="e_slider" style="font-family: Barlow, sans-serif;" placeholder="Imagen Slider" name="e_slider" ></div>

                        <div class="input-group mb-3 edtFormMarg">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="e_categoria">Categoria</label>
                            </div>
                            <select class="custom-select" id="e_categoria" name ="e_categoria" >
                                <option  value=""selected>Seleccionar...</option>
                                <option value="Branding">Branding</option>
                                <option value="Diseño Editorial">Diseño Editorial</option>
                                <option value="Packaging">Packaging</option>
                                <option value="Diseño de Espacios">Diseño de Espacios</option>
                                <option value="Digital">Digital</option>

                            </select>
                        </div>
                        <input id="idProyecto" name="idProyecto" type="text" hidden>
                        <div id="msg_error" class="alert alert-danger" style="display: none" role="alert" ></div>
                        <div class="text-center" id="button-c-c" style="width: 100%;"><button class="btn btn-primary" id="button-c" type="submit" style="background-color: #33a6cc;">EDITAR</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
</html>

<script>



    function crear_tarea(idProyeto) {
        $('#nuevaTarea').modal('show');
        $('#idProyecto_tarea').val(idProyeto);
    }


    function editar_proyecto(idProyecto, nombre,descripcion, categoria,thumbnail,thumbnail2,thumbnail3,cliente, industria,servicios, slider,detalles){

        /*<option  value=""selected>Seleccionar...</option>
        <option value="Branding">Branding</option>
        <option value="Diseño Editorial">Diseño Editorial</option>
        <option value="Packaging">Packaging</option>
        <option value="Diseño de Espacios">Diseño de Espacios</option>
        <option value="Digital">Digital</option>*/
        if (categoria ==="packaging") categoria = 'Packaging';
        if (categoria === 'editorial') categoria = 'Diseño Editorial';
        if (categoria === 'branding') categoria = 'Branding';
        if (categoria === 'espacios') categoria = 'Diseño de Espacios';
        if (categoria === 'digital') categoria = 'Digital';
        if (categoria === 'Diseño de Información') categoria = 'Diseño de Información';
        $('#editarProyecto').modal('show');
        $('#e_nombre').val(nombre);
        $('#label_titulo_nombre').html(nombre);

        label_titulo_nombre
        //$('#e_descripcion').val(descripcion);
        $('#e_categoria').val(categoria);
        $('#idProyecto').val(idProyecto);
        $('#label-thumbnail-editar').html( thumbnail);
        $('#label-thumbnail2-editar').html(thumbnail2);
        $('#label-thumbnail3-editar').html(thumbnail3);
        $("textarea[name='e_industria']").val(industria.replace(/\[SALTO]/g,"\n"));
        $("textarea[name='e_servicios']").val(servicios.replace(/\[SALTO]/g,"\n"));
        $("textarea[name='e_detalles']").val(detalles.replace(/\[SALTO]/g,"\n"));


        if (cliente != "")$('#e_cliente').val(cliente);
        $('#label-slider-editar').html(slider);



    }



    function confirmarProyecto(id) {
        if (confirm("¿Desea eliminar el objeto seleccionado? Esta acción no se puede deshacer.")) {
            delete_itemProyecto(id);
        }
    }

    // Borrar un Area
    function delete_itemProyecto(idProyecto) {
        var url_php = 'eliminar_proyecto.php';
        var data_form = {
            id: idProyecto
        }

        $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,

        })
            .done(function ajaxDone(res) {
                console.log(res);
            })
            .fail(function ajaxError(e) {

                console.log(e);
            })
            .always(function ajaxAlways(e) {

                console.log("'Final de la llamada ajax.'");
                window.location = window.location.pathname;
            })
    }

    // Borrar slider
    function eliminarSliderProyecto(idProyecto) {
        var url_php = 'eliminar_slider_proyecto.php';
        var data_form = {
            id: idProyecto
        }

        $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,

        })
            .done(function ajaxDone(res) {
                console.log(res);
                // alert('ok');

            })
            .fail(function ajaxError(e) {

                console.log(e);
            })
            .always(function ajaxAlways(e) {

                console.log("'Final de la llamada ajax.'");
                window.location = window.location.pathname;
            })
    }

    // Borrar Thumbnail1
    function eliminarT1Proyecto(idProyecto) {
        var url_php = 'eliminar_T1_proyecto.php';
        var data_form = {
            id: idProyecto
        }

        $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,

        })
            .done(function ajaxDone(res) {
                console.log(res);
                // alert('ok');

            })
            .fail(function ajaxError(e) {

                console.log(e);
            })
            .always(function ajaxAlways(e) {

                console.log("'Final de la llamada ajax.'");
                window.location = window.location.pathname;
            })
    }
    // Borrar Thumbnail1
    function eliminarT2Proyecto(idProyecto) {
        var url_php = 'eliminar_T2_proyecto.php';
        var data_form = {
            id: idProyecto
        }

        $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,

        })
            .done(function ajaxDone(res) {
                console.log(res);
                // alert('ok');

            })
            .fail(function ajaxError(e) {

                console.log(e);
            })
            .always(function ajaxAlways(e) {

                console.log("'Final de la llamada ajax.'");
                window.location = window.location.pathname;
            })
    }
    // Borrar Thumbnail1
    function eliminarT3Proyecto(idProyecto) {
        var url_php = 'eliminar_T3_proyecto.php';
        var data_form = {
            id: idProyecto
        }

        $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,

        })
            .done(function ajaxDone(res) {
                console.log(res);
                // alert('ok');

            })
            .fail(function ajaxError(e) {

                console.log(e);
            })
            .always(function ajaxAlways(e) {

                console.log("'Final de la llamada ajax.'");
                window.location = window.location.pathname;
            })
    }

    function refreshPage () {
        var page_y = document.getElementsByTagName("body")[0].scrollTop;
        window.location.href = window.location.href.split('?')[0] + '?page_y=' + page_y;
    }
    window.onload = function () {
        //setTimeout(refreshPage, 35000);
        if ( window.location.href.indexOf('page_y') != -1 ) {
            var match = window.location.href.split('?')[1].split("&")[0].split("=");
            document.getElementsByTagName("body")[0].scrollTop = match[1];
        }
    }


    // subir un proyecto
    function up(idProyecto) {
        var url_php = 'up_proyecto.php';
        var data_form = {
            id: idProyecto
        }

        $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,

        })
            .done(function ajaxDone(res) {
                console.log(res);
                // alert('ok');

            })
            .fail(function ajaxError(e) {

                console.log(e);
            })
            .always(function ajaxAlways(e) {

                console.log("'Final de la llamada ajax.'");

                reload();
                //windows.location = window.location.pathname;
                window.location = window.location.pathname;

            })
    }
    // subir un proyecto
    function down(idProyecto) {
        var url_php = 'down_proyecto.php';
        var data_form = {
            id: idProyecto
        }

        $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,

        })
            .done(function ajaxDone(res) {
                console.log(res);
                // alert('ok');

            })
            .fail(function ajaxError(e) {

                console.log(e);
            })
            .always(function ajaxAlways(e) {

                console.log("'Final de la llamada ajax.'");
                window.location = window.location.pathname;
            })
    }

    function reload(){
        var container = document.getElementById("tabla");
        var content = container.innerHTML;
        container.innerHTML= content;

        //this line is to watch the result in console , you can remove it later
        console.log("Refreshed");
    }

    function actualizar_label_crear(){
        var bla = $('#input-thumbnail').val();
        $('#label-thumbnail').html(bla.replace("C:\\fakepath\\",""));
    }

    function actualizar_label_crear2(){
        var bla = $('#input-thumbnail2').val();
        $('#label-thumbnail2').html(bla.replace("C:\\fakepath\\",""));
    }

    function actualizar_label_crear3(){
        var bla = $('#input-thumbnail3').val();
        $('#label-thumbnail3').html(bla.replace("C:\\fakepath\\",""));
    }

    function actualizar_label_crear4(){
        var bla = $('#slider').val();
        $('#label-slider').html(bla.replace("C:\\fakepath\\",""));
    }



    function actualizar_label_editar(){
        var bla = $('#input-thumbnail-editar').val();

        $('#label-thumbnail-editar').html(bla.replace("C:\\fakepath\\",""));
    }
    function actualizar_label_editar2(){
        var bla = $('#input-thumbnail2-editar').val();

        $('#label-thumbnail2-editar').html(bla.replace("C:\\fakepath\\",""));
    }
    function actualizar_label_editar3(){
        var bla = $('#input-thumbnail3-editar').val();

        $('#label-thumbnail3-editar').html(bla.replace("C:\\fakepath\\",""));
    }
    function actualizar_label_editar4(){
        var bla = $('#e_slider').val();

        $('#label-slider-editar').html(bla.replace("C:\\fakepath\\",""));
    }







</script>