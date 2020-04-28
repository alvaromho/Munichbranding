<style>


    @font-face {
        font-family: ChronicleDisp;
        src: url("assets/fonts/ChronicleDisp-Semibold.ttf") format("truetype");
    }

    @font-face {
        font-family: Play;
        src: url("assets/fonts/PlayfairDisplay-VariableFont_wght.ttf") format("truetype");
    }


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
    p{
        color: #aeaeae;

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
    .font-chronicle{
        font-family: 'ChronicleDisp';

    }




</style>
<?php



include_once 'assets/config/config.php';
include "funciones.php";

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



if ($buscar_bloques->rowCount() > 0) {
    $div = "";
    // output data of each row

    while($row = $buscar_bloques->fetch()) {

        if ($contador == 1 ) {


            $div = '<div id="detalles" style="margin-bottom: 5%" class="row" >';
            $div .= '<div class="col-md-12 modificar "  style="height: 500px; width:100vw">
                    <div style="height: 20%;font-family: Helvetica Neue,Helvetica,Arial,sans-serif;" class="row " >
                        <div class="col-lg-6 col-sm-12 col-xs-12 " style="font-size: 37px;   font-weight: bold">'.$nombre. '</div>
                        <div class="col-lg-6 col-sm-12 col-xs-12 ">
                            <div class="row ">
                                <div class="col-lg-3 col-sm-4 col-xs-1 " style="  font-size: 14px;color: #1d1d1b">
                                    <p style="color: #1d1d1b;font-weight: bold">Cliente</p>
                                    <p style="margin-top:-5%;color: #7a7979">' .$cliente.'</p></div>
                                <div class="col-lg-3 col-sm-4 col-xs-4  ">
                                    <p style="color: #1d1d1b;font-weight: bold">Industria</p>
                                     <p style="margin-top:-5%;color: #7a7979">'.$industria.'</p>
                                 </div>
                                <div class="col-lg-5 col-sm-4 col-xs-4 ">
                                    <p style="color: #1d1d1b;font-weight: bold"   >Servicios</p>
                                     <p style="margin-top:-5%;color: #7a7979">'.$servicios.'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 80%;margin-top: 3%;margin-bottom: 5%"  class="row segunda-fila">
                        <div class="col-lg-6 col-sm-12 col-xs-12 d-inline" style=" font-size: 34px; font-weight: bold;color: #c10000; font-family: ChronicleDisp;">' .$categoria.'</div>
                        <div class="col-lg-6 col-sm-12 col-xs-12 d-inline"><p style="padding-right: 10%;text-align: justify;color: black;font-family: Play">'.$detalles.'</p></div>
                    </div>
                </div>';
            $div .= '</div>';
            echo $div;
        }



        switch ($row['tipo']){
            case 'un_bloque':
                $div = '<div id="'.$row['idBloque'].'" class="row bloque1">';
                $div .= '<div class="div_bloque col-md-12 flex"  style="background-image: url(img/'.str_replace(" ","_",$row['img_url1']).'); height: '.$row['altura'].' " align="'.$row['alineacion1'].'">
                                <div class="flex">
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
                $div .= '<div class="div_bloque col-md-6  flex"  style="color: '.$row['color1'].';background-image: url(img/'.str_replace(" ","_",$row['img_url1']).'); height: '.$row['altura'].' " align="'.$row['alineacion1'].'">
                                <div class="contenedor_texto ">
                                    <p class="texto1"><strong class="titulo">'.$row['titulo1'].'</strong><br>
                                    <strong class="subtitulo">'.$row['subtitulo1'].'</strong ><br>
                                    '.$row['texto1'].'</p>
                                </div>
                            </div>';

                $div .= '<div class="div_bloque col-md-6 flex"  style="color: '.$row['color2'].';background-image: url(img/'.str_replace(" ","_",$row['img_url2']).'); height: '.$row['altura'].' " align="'.$row['alineacion2'].'">
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
                $div .= '   <div class="div_bloque col-md-12 flex"  style="color: '.$row['color1'].';background-image: url(img/'.str_replace(" ","_",$row['img_url1']).'); height: 50% " align="'.$row['alineacion1'].'">
                                    <div class="contenedor_texto">
                                        <p class="texto1"><strong class="titulo">'.$row['titulo1'].'</strong><br>
                                        <strong class="subtitulo">'.$row['subtitulo1'].'</strong ><br>
                                        '.$row['texto1'].'</p>
                                    </div>
                                </div>
                                <div class="div_bloque col-md-12 flex"  style="color: '.$row['color2'].';background-image: url(img/'.str_replace(" ","_",$row['img_url2']).'); height: 50% " align="'.$row['alineacion2'].'">
                                    <div class="contenedor_texto">
                                        <p class="texto1"><strong class="titulo">'.$row['titulo2'].'</strong><br>
                                        <strong class="subtitulo">'.$row['subtitulo2'].'</strong ><br>
                                        '.$row['texto2'].'</p>
                                    </div>
                                </div>
                            </div>';

                $div .= '<div class="div_bloque col-md-6 flex "  style="color: '.$row['color3'].';background-image: url(img/'.str_replace(" ","_",$row['img_url3']).'); height: '.$row['altura'].' " align="'.$row['alineacion3'].'">
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
                $div .= '<div id="'.$row['idBloque'].'" class="row">';
                //bloque 1
                $div = '   <div class="div_bloque col-md-6 bloque3b-1 flex"  style="color: '.$row['color1'].';background-image: url(img/'.str_replace(" ","_",$row['img_url1']).'); height: '.$row['altura'].'" align="'.$row['alineacion1'].'">
                                 <div class="contenedor_texto">
                                    <p class="texto1"><strong class="titulo">'.$row['titulo1'].'</strong><br>
                                    <strong class="subtitulo">'.$row['subtitulo1'].'</strong ><br>
                                    '.$row['texto1'].'</p>
                                </div>
                            </div>';
                $div .=   '<div class="col-md-6">
                                <div class="div_bloque col-md-12 bloque3b-2 flex"  style="color: '.$row['color2'].';background-image: url(img/'.str_replace(" ","_",$row['img_url2']).'); height: 50% " align="'.$row['alineacion2'].'">
                                    <div class="contenedor_texto">
                                        <p class="texto1"><strong class="titulo">'.$row['titulo2'].'</strong><br>
                                        <strong class="subtitulo">'.$row['subtitulo2'].'</strong ><br>
                                        '.$row['texto2'].'</p>
                                    </div>
                                </div>
                                <div class="div_bloque col-md-12 bloque3b-3 flex"  style="color: '.$row['color3'].';background-image: url(img/'.str_replace(" ","_",$row['img_url3']).'); height: 50% " align="'.$row['alineacion3'].'">
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
                break;
            default:
                break;
        }
        $contador++;
    }

} else {
    if ($contador == 0 ) {

        $div = '<div id="detalles" style="margin-bottom: 5%" class="row" >';
        $div .= '<div class="col-md-12 modificar "  style="height: 500px; width:100vw">
                    <div style="height: 20%;font-family: Helvetica Neue,Helvetica,Arial,sans-serif;" class="row " >
                        <div class="col-lg-6 col-sm-12 col-xs-12 " style="font-size: 40px;   font-weight: bold">'.$nombre. '</div>
                        <div class="col-lg-6 col-sm-12 col-xs-12 ">
                            <div class="row ">
                                <div class="col-lg-3 col-sm-4 col-xs-1 " style="  font-size: 17px;color: #1d1d1b">
                                    <p style="color: #1d1d1b;font-weight: bold">Cliente</p>
                                    <p style="margin-top:-5%;color: #7a7979">' .$cliente.'</p></div>
                                <div class="col-lg-3 col-sm-4 col-xs-4  ">
                                    <p style="color: #1d1d1b;font-weight: bold">Industria</p>
                                     <p style="margin-top:-5%;color: #7a7979">'.$industria.'</p>
                                 </div>
                                <div class="col-lg-5 col-sm-4 col-xs-4 ">
                                    <p style="color: #1d1d1b;font-weight: bold"   >Servicios</p>
                                     <p style="margin-top:-5%;color: #7a7979">'.$servicios.'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="height: 80%;margin-top: 3%;margin-bottom: 5%"  class="row segunda-fila">
                        <div class="col-lg-6 col-sm-12 col-xs-12 d-inline" style=" font-size: 37px; font-weight: bold;color: #c10000; font-family: ChronicleDisp">' .$categoria.'</div>
                        <div class="col-lg-6 col-sm-12 col-xs-12 d-inline"><p style="padding-right: 10%;text-align: justify;color: black;font-family: Play">'.$detalles.'</p></div>
                    </div>
                </div>';
        $div .= '</div>';
    }
    echo $div;

    //echo " <tr>No hay resultados</tr> ";
}



?>