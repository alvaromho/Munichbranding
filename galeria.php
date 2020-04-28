<?php


// Buscar proyectos en base de datos
include_once 'assets/config/config.php';

$galeria = '<section class="portfolio-block photography">
            <div class="container" style="padding: 0px;">';

//Comrpobar su el usuario existe
$buscar_proyectos = $con->prepare("SELECT * FROM proyecto where thumbnail is not null and thumbnail <> ''");
$buscar_proyectos->execute();



if ($buscar_proyectos->rowCount() > 0) { // si existen proyectos:
    // output data of each row
    $contador = 1;

    while ($row = $buscar_proyectos->fetch()) { // por cada proyecto

        $nombre = $row['nombre'];
        $href = str_replace(" ","_", $row["nombre"]).".php";
        if ($row["categoria"] == 'branding' || $row["categoria"] == 'Branding') $categoria_label = 'Branding';
        if ($row["categoria"] == 'editorial' || $row["categoria"] == 'Diseño Editorial') $categoria_label = 'Diseño Editorial';
        if ($row["categoria"] == 'packaging'|| $row["categoria"] == 'Packaging') $categoria_label = 'Packaging';
        if ($row["categoria"] == 'espacios' || $row["categoria"] == 'Diseño Espacios') $categoria_label = 'Diseño Espacios';
        if ($row["categoria"] == 'digital' || $row["categoria"] == 'Digital') $categoria_label = 'Digital';

        $descripcion = $row["descripcion"];
        $thumnail = str_replace(" ", "_",$row["thumbnail"]);
/*
        switch($contador){
            case 1:
                $galeria .= '<div class="row no-gutters">
                                <div class="col-md-6  offset-xl-0 item zoom-on-hover">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                break;

            case 2:
                //imprimir cuadro del proyecto.
                $galeria .= '<div class="col-md-6 offset-xl-0 item zoom-on-hover">
                                <div class="row no-gutters" >
                                    <div class="col-md-6  item zoom-on-hover">
                                        <a href="'.$href.'">
                                            <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                                <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                    <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>';
                break;
            case 3:
                //imprimir cuadro del proyecto.
                        $galeria .= '<div class="col-md-6 item zoom-on-hover">
                                        <a href="'.$href.'">
                                            <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                                <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                    <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>';
                break;
            case 4:
                //imprimir cuadro del proyecto.
                    $galeria .= '<div class="row no-gutters">
                                    <div class="col-md-6 item zoom-on-hover">
                                        <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                        </a>
                                    </div>';
                //imprimir cuadro del proyecto.
                break;
            case 5:
                //imprimir cuadro del proyecto.
                        $galeria .= '<div class="col-md-6  item zoom-on-hover">
                                        <a href="'.$href.'">
                                            <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                                <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                    <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div><!-- row -->
                            </div><!-- -->
                            </div>';
                break;
            //segunda fila
            case 6:
                $galeria .= '<div class="row no-gutters">
                                <div class="col-md-3 item zoom-on-hover">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                break;
            case 7:
            case 8:
                $galeria .= '   <div class="col-md-3 item zoom-on-hover">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                break;
            case 9:
                $galeria .= '   <div class="col-md-3 item zoom-on-hover">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                break;
            //tercera fila
            case 10:
                $galeria .= '<div class="row no-gutters">
                                <div class="col-md-3 item zoom-on-hover">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                break;
            case 11:
            case 12:
                $galeria .= '   <div class="col-md-3 item zoom-on-hover">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                break;
            case 13:
                $galeria .= '   <div class="col-md-3 item zoom-on-hover">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                break;
            // Cuarta fila




            case 14:
                //imprimir cuadro del proyecto.
                $galeria .= '<div class="row no-gutters">
                                <div class="col-md-6 offset-xl-0 item zoom-on-hover">
                                    <div class="row no-gutters" >
                                        <div class="col-md-6  item zoom-on-hover">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                        <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>';
                break;
            case 15:
                //imprimir cuadro del proyecto.
                $galeria .= '           <div class="col-md-6 item zoom-on-hover">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                        <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>';
                break;
            case 16:
                //imprimir cuadro del proyecto.
                        $galeria .= '<div class="row no-gutters">
                                            <div class="col-md-6 item zoom-on-hover">
                                                <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                        <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>';
                //imprimir cuadro del proyecto.
                break;
            case 17:
                //imprimir cuadro del proyecto.
                        $galeria .= '       <div class="col-md-6  item zoom-on-hover">
                                                <a href="'.$href.'">
                                                    <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                            <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                    </div>
                                    </div>'; // <!-- Row -->
                break;
            case 18:
                $galeria .= '   <div class="col-md-6  item zoom-on-hover">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>'; // <!-- Row -->
                break;

        }*/

        switch($contador){
           /* case 1:
                $galeria .= '<div class="row  row-portafolio-simple div-portafolio"  style="height: 40vh;" >
                                <div class="col-md-4  offset-xl-0 item zoom-on-hover" style="height: 40vh;">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style=" background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover; ">
                                            <div id="" class="img-hover" style="background-color: rgba(255,255,255,0.8);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                break;

            case 2:
                //imprimir cuadro del proyecto.
                $galeria .= '   <div class="col-md-4  item zoom-on-hover div-portafolio" style="height: 40vh;">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                            <div id="" class="img-hover" style="background-color: rgba(255,255,255,0.8);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                break;
            case 3:
                //imprimir cuadro del proyecto.
                $galeria .= '   <div class="col-md-4 item zoom-on-hover div-portafolio" style="height: 40vh;">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                            <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>';
                break;*/
//--------------------------

            case 1:
                //imprimir cuadro del proyecto.
                $galeria .= '<div class="row" >
                                <div class="col-md-6  "  >
                                    <div class="row " style="height: 33vh;background-color: white" >
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                                        ';
                break;
            case 2:
                $galeria .='
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                                    ';
                break;
            case 3:
                $galeria .='
                                    <div class="row " style="height: 33vh;background-color: white">
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                                        ';
                break;
            case 4:
                $galeria .='
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- col-md-6 -->
                                                ';
                break;
            case 5:
                $galeria .='
                                <div class="col-md-6 item zoom-on-hover margenes-portafolio" style="height: 66vh;background-color: white">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                            <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- row -->
                ';
                break;
            case 6:
                //imprimir cuadro del proyecto.
                $galeria .= '<div class="row" >


                                <!-- col-md-6 -->
                                <div class="col-md-6 " >
                                    <div class="row">
                                        <div class="col-md-12 item zoom-on-hover margenes-portafolio2" style="height: 66vh;background-color: white">
                                            <a href="'.$href.'">
                                                 <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                                                                 ';
                break;
            case 7:
                $galeria .='
                                    <!-- col-md-6 -->
                                    <div class="row color-fondo" style="height: 33vh;background-color: white" >
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio2">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- /col-md-6 -->
                                                                                     ';
                break;
            case 8:
                $galeria .='
                                        <!-- col-md-6 -->
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio2">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- /col-md-6 -->
                                    </div>
                                </div> <!-- /col-md-6 -->
                                                                             ';
                break;
            case 9:
                $galeria .='
                                <!-- col-md-6 -->
                                <div class="col-md-6 " >
                                    <!-- col-md-6 -->
                                    <div class="row " style="height: 33vh;background-color: white" >
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio2">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- /col-md-6 -->
                                                                                     ';
                break;
            case 10:
                $galeria .='
                                        <!-- col-md-6 -->
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio2">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- /col-md-6 -->
                                    </div>
                                                                                 ';
                break;
            case 11:
                $galeria .='
                                    <div class="row" style="height: 33vh;background-color: white" >
                                        <div class="col-md-12 item zoom-on-hover margenes-portafolio2" style="height: 66vh;background-color: white">
                                            <a href="'.$href.'">
                                                 <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$nombre.'<span class="img-hover">'.$categoria_label.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div> 
                                <!-- /col-md-6 -->
                                

                            </div><!-- row -->
                ';
                break;

            case 12:
                //imprimir cuadro del proyecto.
                $galeria .= '<div class="row" >

                                <div class="col-md-6 item zoom-on-hover margenes-portafolio" style="height: 66vh;background-color: white">
                                    <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                            <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                break;
            case 13:
                $galeria .='     
                                <div class="col-md-6  "  >
                                    <div class="row " style="height: 33vh;background-color: white" >
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                ';
                break;
            case 14:
                $galeria .='

                                        <div class="col-md-6 zoom-on-hover margenes-portafolio">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                ';
                break;
            case 15:
                $galeria .='
                                    <div class="row " style="height: 33vh;background-color: white">
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                ';
                break;
            case 16:
                $galeria .='
                                        <div class="col-md-6 zoom-on-hover margenes-portafolio">
                                            <a href="'.$href.'">
                                                <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                    <div id="div-hover" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                        <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div> <!-- row -->
                                </div> <!-- col-md-6 -->


                                
                            </div><!-- row -->
                ';
                break;

            /*
            case 4:
            case 7:
            case 10:
                //imprimir cuadro del proyecto.
                $galeria .= '<div class="row row-portafolio-doble" style="margin-bottom: 2px">
                                    <div class="col-md-8 item zoom-on-hover div-portafolio" style="height: 80vh;">
                                        <a href="'.$href.'">
                                        <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                            <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                            </div>
                                        </div>
                                        </a>
                                    </div>';
                //imprimir cuadro del proyecto.
                break;
            case 5:
            case 8:
            case 11:
                //imprimir cuadro del proyecto.
                        $galeria .= '<div class="col-md-4  item zoom-on-hover" >
                                        <div class="row row-portfolio-tercio" style="height: 40vh;"">
                                            <div class="col-md-12 zoom-on-hover div-portafolio">
                                                <a href="'.$href.'">
                                                    <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                        <div id="" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                            <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div><!-- row -->
                                    ';
                break;
            //segunda fila
            case 6:
            case 9:
            case 12:
                            $galeria .= '<div class="row row-portfolio-tercio" style="height: 40vh;"">
                                            <div class="col-md-12 zoom-on-hover div-portafolio">
                                                <a href="'.$href.'">
                                                    <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;">
                                                        <div id="div-hover" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                                            <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div> <!-- row -->
                                    </div> <!-- col -->
                                </div><!-- row -->';
                break;

*/
        }


        $contador++;
    }
}
$galeria .= '</div>
                </section>';


echo $galeria;






?>



