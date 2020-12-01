<?php

//echo 'funcionaes.php importado correctamente';
function print_msg($tipo, $msg){
    if ($tipo == 'error') {
        $clase = 'error';
        $strong = 'Error: ';
    } elseif ($tipo = 'success') {
        $clase = 'success';
        $strong = 'Exito!';
    } elseif ($tipo = "notice") {
        $clase = 'notice';
        $strong = 'Mensage: ';
    }

    $msg_div = '<div class="alert_msg '.$clase.'" style="z-index: 1000">
    <span class="closebtn"  onclick="this.parentElement.style.display=\'none\';">&times;</span> 
    <strong>'.$strong.'</strong> '.$msg.'
    </div>';

    echo $msg_div;
}

function sanitizar($string)
{

    $string = trim($string);

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
        array( "¨", "~",'"', "'",
            "^", "<code>","\"",
            "¨", "´",
            ">", "< "),
        '',
        $string
    );

    $string = str_replace("\n", "[SALTO]",$string);
    return $string;
}

function quitar_saltos($string){
    $string =str_replace("\r\n", "[SALTO]",$string);
    $string =str_replace("\n", "[SALTO]",$string);



    return $string;

}
function agregar_saltos($string){
    //$string = str_replace( "[SALTO]","\n",$string);
    //$string = str_replace( "[SALTO]","\r\n",$string);
    $string  = str_replace("\"", "&quot;" ,$string);
    $string  = str_replace("'", "&apos;;" ,$string);


    return $string;

}
function agregar_saltos_html($string){
    $string = str_replace( "[SALTO]","<br>",$string);
    return $string;

}


function sanitizar_acentos($string)
{

    $string = trim($string);

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );



    return $string;
}




function get_orden_proyecto($id)
{
    //include_once 'assets/config/config.php';

    //insert form data in the database
    $buscar = $con->query(" select orden from proyecto where  idProyecto = '" . $id . "' LIMIT 1");
    try {

        return $buscar->fetch(PDO::FETCH_ASSOC)['orden'] ;



    } catch (Exception $e) {
        echo $e;
    }

}


function get_proyect_url($orden)
{

    //include_once 'assets/config/config.php';

    //insert form data in the database
    $buscar = $con->query(" select nombre from proyecto where  orden = '" . $orden . "' LIMIT 1");
    try {

        return $buscar->fetch(PDO::FETCH_ASSOC)['nombre'] .'.php';



    } catch (Exception $e) {
        echo $e;
        return $orden;
    }

}


function get_next_proyect_url($id)
{

    global $con;

    //insert form data in the database
    $buscar = $con->query(" select orden from proyecto where  idProyecto = '" . $id . "' LIMIT 1");
    try {

        $next_proyecto = $buscar->fetch(PDO::FETCH_ASSOC)['orden'] +1 ;
        $buscar = $con->query(" select nombre from proyecto where  orden = '" . $next_proyecto . "' LIMIT 1");
        try {

            $aux =  $buscar->fetch(PDO::FETCH_ASSOC)['nombre'] .'.php';
            if ($aux!= '.php') return $aux;
            else return 'index.php';



        } catch (Exception $e) {
            echo $e;
            return $next_proyecto;
        }


    } catch (Exception $e) {
        echo $e;
    }

}


function get_prev_proyect_url($id)
{

    global $con;

    //insert form data in the database
    $buscar = $con->query(" select orden from proyecto where  idProyecto = '" . $id . "' LIMIT 1");
    try {

        $next_proyecto = $buscar->fetch(PDO::FETCH_ASSOC)['orden'] -1 ;
        $buscar = $con->query(" select nombre from proyecto where  orden = '" . $next_proyecto . "' LIMIT 1");
        try {

            $aux =  $buscar->fetch(PDO::FETCH_ASSOC)['nombre'] .'.php';
            if ($aux!= '.php') return $aux;
            else return 'index.php';



        } catch (Exception $e) {
            echo $e;
            return $next_proyecto;
        }


    } catch (Exception $e) {
        echo $e;
    }

}

function getProyecto($id)
{
    global $con;

    //insert form data in the database
    $buscar = $con->query(" select * from proyecto where  idProyecto = '" . $id . "' LIMIT 1");
    try {
        return  $buscar->fetch(PDO::FETCH_ASSOC) ;
    } catch (Exception $e) {
        echo $e;
    }
}

function getCategoria($id)
{
    global $con;

    //insert form data in the database
    $buscar = $con->query(" select categoria from proyecto where  idProyecto = '" . $id . "' LIMIT 1");
    try {
        $proyecto = $buscar->fetch(PDO::FETCH_ASSOC) ;
        $categoria = $proyecto["categoria"];

        if ($categoria == 'branding' || $categoria == 'Branding') $categoria  = 'Branding';
        if ($categoria == 'editorial' || $categoria == 'Diseño Editorial') $categoria = 'Diseño Editorial';
        if ($categoria == 'packaging'|| $categoria == 'Packaging') $categoria = 'Packaging';
        if ($categoria == 'espacios' || $categoria == 'Diseño Espacios') $categoria  = 'Diseño Espacios';
        if ($categoria == 'digital' || $categoria == 'Digital') $categoria  = 'Digital';
        
        return $categoria;
    } catch (Exception $e) {
        echo $e;
    }
}


?>