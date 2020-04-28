<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    borrar_pagina_proyecto($_POST['idProyecto']);
}


function borrar_pagina_proyecto($idProyecto){
    $archivo = $idProyecto.".php";
    $archivo_admin = $idProyecto."_admin.php";
    unlink($archivo) or die("Error al borrar archivo de proyecto.");
    unlink($archivo_admin) or die("Error al borrar archivo de proyecto admin.");

}

?>