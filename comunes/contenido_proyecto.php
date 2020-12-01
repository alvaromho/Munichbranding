<style>

    html{
        font-size: 14px;
    }
    .row{
        display: flex;
        margin: 5px;

    }
    .titulo{
        font-size: 1.6rem;
        font-family: 'QuincyCF';
        color: #000000;
        font-weight: 500;
        line-height: 3rem;


    }
    .subtitulo{
        font-size: 1.2rem;
        line-height: 3rem;
        font-family: 'QuincyCF';
        color: #000000;
        font-weight: 500;
        font-style: italic;
    }

    .texto_mitad{
        width: 50%;
        /* text-align: initial;*/
    }

    .texto1b{
        width: 50%;
        margin-top: 2%;
        font-weight: lighter;
        /*//text-align: initial;*/
    }
    .texto1{
        font-weight: lighter;
        /*//text-align: initial;*/
    }
    .contenedor_texto-un-bloque{
        /*text-align: initial;*/
        margin-bottom: auto;
        margin-top: auto;
        display: flow;
    }
    .contenedor_texto{
        /*text-align: initial;*/
        margin-bottom: auto;
        margin-top: auto;
    }

    .flex{
        display: flex;
        /*padding: 0;*/
        margin: 0;
    }

    @media (max-width:400px) {
        .div_bloque{
            align: center!important;
        }
    }

    @media (max-width:600px) {

        .segunda-fila{
            margin-top: 10%;
        }
        .modificar{
            height: 800px;
        }
    }

    .no-padding-margin{
        padding: 0;
        margin: 0;
    }



    /* Bounce In */
    .hvr-bounce-in {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
    }
    .hvr-bounce-in:hover, .hvr-bounce-in:focus, .hvr-bounce-in:active {
        -webkit-transform: scale(1.2);
        transform: scale(1.2);
        -webkit-transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
        transition-timing-function: cubic-bezier(0.47, 2.02, 0.31, -0.36);
    }

    /* Sink */
    .hvr-sink {
        display: inline-block;
        vertical-align: middle;
        -webkit-transform: perspective(1px) translateZ(0);
        transform: perspective(1px) translateZ(0);
        box-shadow: 0 0 1px rgba(0, 0, 0, 0);
        -webkit-transition-duration: 0.3s;
        transition-duration: 0.3s;
        -webkit-transition-property: transform;
        transition-property: transform;
        -webkit-transition-timing-function: ease-out;
        transition-timing-function: ease-out;
    }
    .hvr-sink:hover, .hvr-sink:focus, .hvr-sink:active {
        -webkit-transform: translateY(8px);
        transform: translateY(8px);
    }


    @font-face {
        font-family: 'Chronicle';
        src: url("assets/fonts/ChronicleDisp-Roman.otf") format("opentype");
        font-weight: 400;
        font-style: normal;
        font-stretch: normal; }

    @font-face {
        font-family: 'Chronicle';
        src: url("assets/fonts/ChronicleDisp-Semibold.ttf") format("truetype");
        font-weight: 500;
        font-style: normal;
        font-stretch: normal; }

</style>
<?php



include_once '../assets/config/config.php';
include "../funciones.php";

$buscar_proyecto= $con->prepare("SELECT * FROM proyecto where idProyecto = ".$idProyecto);
$buscar_proyecto->execute();
$proyecto = $buscar_proyecto->fetch();
$nombre = $proyecto["nombre"];
$cliente = $proyecto["cliente"];
$servicios = agregar_saltos_html($proyecto["servicios"]);
$industria = agregar_saltos_html($proyecto["industria"]);
$detalles = agregar_saltos_html($proyecto["detalles"]);
$categoria = $proyecto["categoria"];

if(is_null($cliente))    $cliente = "Vacío";
if(is_null($proyecto["servicios"]))   $servicios = "Vacío";
if(is_null($proyecto["industria"]))  $industria = "Vacío";
if(is_null($proyecto["detalles"]))   $detalles = "Vacío";


//Comrpobar su el usuario existe
$buscar_bloques = $con->prepare("SELECT * FROM bloque where idProyecto = ".$idProyecto);
$buscar_bloques->execute();

$contador = 0;


/*
 * Sección de botón de flecha
 */

$div_detalles = '<div id="flecha" class="hvr-sink" style="width:100% ;justify-content: center;display: flex; margin-top: -5%;margin-bottom: 7%; color: white ">
                    <a style="color: white " href="#detalles"><svg class="bi bi-chevron-down " width="2.5em" height="2.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="position: absolute">
                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 01.708 0L8 10.293l5.646-5.647a.5.5 0 01.708.708l-6 6a.5.5 0 01-.708 0l-6-6a.5.5 0 010-.708z" clip-rule="evenodd"/>
                    </svg></a>
                 </div>';
$div_detalles .= '<div id="detalles" style=" margin-bottom: 5%;margin-top: 2.5%;" class="row" >';
/*
 * Sección de Descripción o detalles del proyecto
 */
$div_detalles .= '<div class="col-md-12 modificar "  style=" width:100vw; font-family: Graphik3;">
                    <div style="height: 20%;margin-bottom: 4%" class="row " >
                        <div class="col-lg-6 col-sm-12 col-xs-12 " style="font-family: Helvetica; font-size: 40px; line-height: 40px;  font-weight: 500;padding-left: .2rem!important; ">'.$nombre. '</div>
                        <div class="col-lg-6 col-sm-12 col-xs-12 ">
                            <div class="row " style="height: auto;color: rgb(85, 85, 85); font-weight: normal">
                                <div class="col-lg-3 col-sm-4 col-xs-1 " style="font-size: 14px;line-height:20px;padding-left: 0;">
                                    <p style="font-weight: 500; padding-left: 0;">Cliente</p>
                                    <p style="margin-top:-5%;">' .$cliente.'</p></div>
                                <div class="col-lg-3 col-sm-4 col-xs-4  ">
                                    <p style="font-weight: 500">Industria</p>
                                     <p style="margin-top:-5%;">'.$industria.'</p>
                                 </div>
                                <div class="col-lg-5 col-sm-4 col-xs-4 ">
                                    <p style="font-weight: 500"   >Servicios</p>
                                     <p style=" font-weight: 400;margin-top:-5%; ">'.$servicios.'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 80%;margin-bottom: 5%"  class="row segunda-fila" >
                        <div class="col-lg-6 col-sm-12 col-xs-12 d-inline" style=" line-height:32px;font-size: 30px; ;color: #EC1C24;padding-left: .2rem!important; "><h2 style="font-family:Chronicle;font-weight: 400;letter-spacing:   -0.5px">' .$categoria. '</h2></div>
                        <div class="col-lg-6 col-sm-12 col-xs-12 d-inline"><p style="margin-left: 0;line-height:28px;font-size:20px;padding-right: 5%;padding-left:.4rem;text-align: left;color: rgb(85, 85, 85);font-weight:300">' .$detalles.'</p></div>
                    </div>
                </div>';
$div_detalles .= '</div>';


/*
 * Sección de proyectos relacionados
 */
$div_relacionados  = '    <div class="col-md-12 "  style=" width:100vw; font-family: Graphik3;">
                                <div class="row">
                        
                            </div>';

$div_relacionados .= '     </div>';


if ($buscar_bloques->rowCount() > 0) {
    $div = "";
    // output data of each row

    while($row = $buscar_bloques->fetch()) {

        /*
         * Escribir el bloque que corresponda según el tipo y los elementos del bloque.
         */
        switch ($row['tipo']){
            case 'un_bloque':
                $div = '<div id="'.$row['idBloque'].'" class="row bloque1">';
                $div .= '<div class="div_bloque col-md-12  "  style="background-image: url(../proyectos/img/bloques/'.$row['img_url1'].'); height: '.$row['altura'].' " align="'.$row['alineacion1'].'">
                                <div >
                                    <div class="contenedor_texto "  >
                                        <p class="texto1b" style="color: '.$row['color1'].'!important;" ><strong class="titulo">'.$row['titulo1'].'</strong><br>
                                        <strong class="subtitulo">'.$row['subtitulo1'].'</strong ><br>
                                        '.$row['texto1'].'</p>
                                    </div>
                                </div>
                            </div>';
                $div .= '</div>';

                echo $div;
                break;
            case 'doble':
                $div = '<div id="'.$row['idBloque'].'" class="row">';
                //bloque 1
                $div .= '<div class="div_bloque col-md-6  flex"  style="color: '.$row['color1'].';background-image: url(../proyectos/img/bloques/'.$row['img_url1'].'); height: '.$row['altura'].' " align="'.$row['alineacion1'].'">
                                <div class="contenedor_texto ">
                                    <p class="texto1"><strong class="titulo">'.$row['titulo1'].'</strong><br>
                                    <strong class="subtitulo">'.$row['subtitulo1'].'</strong ><br>
                                    '.$row['texto1'].'</p>
                                </div>
                            </div>';

                $div .= '<div class="div_bloque col-md-6 flex"  style="color: '.$row['color2'].';background-image: url(../proyectos/img/bloques/'.$row['img_url2'].'); height: '.$row['altura'].' " align="'.$row['alineacion2'].'">
                                <div class="contenedor_texto">
                                    <p class="texto1"><strong class="titulo">'.$row['titulo2'].'</strong><br>
                                    <strong class="subtitulo">'.$row['subtitulo2'].'</strong ><br>
                                    '.$row['texto2'].'</p>
                                </div>
                            </div>';
                $div .= '</div>';

                echo $div;
                break;
            case 'triple_a':
                $div = '<div id="'.$row['idBloque'].'" class="row">';
                //bloque 1
                $div .= '<div class="col-md-6">';
                $div .= '   <div class="div_bloque col-md-12 flex"  style="color: '.$row['color1'].';background-image: url(../proyectos/img/bloques/'.$row['img_url1'].'); height: 50% " align="'.$row['alineacion1'].'">
                                    <div class="contenedor_texto">
                                        <p class="texto1"><strong class="titulo">'.$row['titulo1'].'</strong><br>
                                        <strong class="subtitulo">'.$row['subtitulo1'].'</strong ><br>
                                        '.$row['texto1'].'</p>
                                    </div>
                                </div>
                                <div class="div_bloque col-md-12 flex"  style="color: '.$row['color2'].';background-image: url(../proyectos/img/bloques/'.$row['img_url2'].'); height: 50% " align="'.$row['alineacion2'].'">
                                    <div class="contenedor_texto">
                                        <p class="texto1"><strong class="titulo">'.$row['titulo2'].'</strong><br>
                                        <strong class="subtitulo">'.$row['subtitulo2'].'</strong ><br>
                                        '.$row['texto2'].'</p>
                                    </div>
                                </div>
                            </div>';

                $div .= '<div class="div_bloque col-md-6 flex "  style="color: '.$row['color3'].';background-image: url(../proyectos/img/bloques/'.$row['img_url3'].'); height: '.$row['altura'].' " align="'.$row['alineacion3'].'">
                                <div class="contenedor_texto">
                                    <p class="texto1"><strong class="titulo">'.$row['titulo3'].'</strong><br>
                                    <strong class="subtitulo">'.$row['subtitulo3'].'</strong ><br>
                                    '.$row['texto3'].'</p>
                                </div>
                             </div>';
                $div .= '</div>';

                echo $div;
                break;
            case 'triple_b':
                $div = '<div id="'.$row['idBloque'].'" class="row">';
                //bloque 1
                $div .= '   <div class="div_bloque col-md-6 bloque3b-1 flex"  style="color: '.$row['color1'].';background-image: url(../proyectos/img/bloques/'.$row['img_url1'].'); height: '.$row['altura'].'" align="'.$row['alineacion1'].'">
                                 <div class="contenedor_texto">
                                    <p class="texto1"><strong class="titulo">'.$row['titulo1'].'</strong><br>
                                    <strong class="subtitulo">'.$row['subtitulo1'].'</strong ><br>
                                    '.$row['texto1'].'</p>
                                </div>
                            </div>';
                $div .=   '<div class="col-md-6">
                                <div class="div_bloque col-md-12 bloque3b-2 flex"  style="color: '.$row['color2'].';background-image: url(../proyectos/img/bloques/'.$row['img_url2'].'); height: 50% " align="'.$row['alineacion2'].'">
                                    <div class="contenedor_texto">
                                        <p class="texto1"><strong class="titulo">'.$row['titulo2'].'</strong><br>
                                        <strong class="subtitulo">'.$row['subtitulo2'].'</strong ><br>
                                        '.$row['texto2'].'</p>
                                    </div>
                                </div>
                                <div class="div_bloque col-md-12 bloque3b-3 flex"  style="color: '.$row['color3'].';background-image: url(../proyectos/img/bloques/'.$row['img_url3'].'); height: 50% " align="'.$row['alineacion3'].'">
                                    <div class="contenedor_texto">
                                        <p class="texto1"><strong class="titulo">'.$row['titulo3'].'</strong><br>
                                        <strong class="subtitulo">'.$row['subtitulo3'].'</strong ><br>
                                        '.$row['texto3'].'</p>
                                    </div>
                                </div>
                            </div>';
                $div .= '</div>';

                echo $div;
                break;
            default:
                break;
        }
        if ($contador == 0 ) {
            echo $div_detalles;
        }

        $contador++;
    }

} else {
    if ($contador == 0 ) {
        $div = $div_detalles;
    }
    echo $div;

    //echo " <tr>No hay resultados</tr> ";
}



?>