<?php

    /*if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
    else
    $link = "http"; */
    //$link .= "://".$_SERVER['HTTP_HOST'];
    /*$link = "http://";
    $link .= $_SERVER['HTTP_HOST'];*/
    $link = "";
    if( strpos($_SERVER['REQUEST_URI'],"/proyecto.php")!= 0 || strpos($_SERVER['REQUEST_URI'],"proyecto_admin.php")!= 0){
        $link = "../assets/config/db.php";
    } else if( strpos($_SERVER['REQUEST_URI'],"admin.php")!= 0 ||  strpos($_SERVER['REQUEST_URI'],"eliminar_proyecto.php")!= 0 ) $link = "assets/config/db.php";
    else if (strpos($_SERVER['REQUEST_URI'],"ajax")!= 0)  $link = "../config/db.php";
    $link = "assets/config/db.php";
    
    //else $link = "../config/db.php"
    //echo $link.strpos($_SERVER['REQUEST_URI'],"proyecto.php").strpos($_SERVER['REQUEST_URI'],"proyecto_admin.php").strpos($_SERVER['REQUEST_URI'],"admin.php").$_SERVER['REQUEST_URI'];
    include_once $link;
    $con = DB::getConn();


?>
