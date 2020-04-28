<?php


// Buscar proyectos en base de datos
include_once 'assets/config/config.php';

$galeria = '<section class="py-5">
                <div class="container">            
                    <div class="row filtr-container">';

//Comrpobar su el usuario existe
$buscar_proyectos = $con->prepare("SELECT * FROM proyecto order by orden");
$buscar_proyectos->execute();



if ($buscar_proyectos->rowCount() > 0) { // si existen proyectos:
    // output data of each row
    $contador = 1;

    while ($row = $buscar_proyectos->fetch() ) { // por cada proyecto

        $nombre = $row['nombre'];
        $href = str_replace(" ","_", $row["nombre"]).".php";
        if ($row["categoria"] == 'branding' || $row["categoria"] == 'Branding') $categoria = 1;
        if ($row["categoria"] == 'editorial' || $row["categoria"] == 'Diseño Editorial') $categoria = 2;
        if ($row["categoria"] == 'packaging'|| $row["categoria"] == 'Packaging') $categoria = 3;
        if ($row["categoria"] == 'espacios' || $row["categoria"] == 'Diseño Espacios') $categoria = 4;
        if ($row["categoria"] == 'digital' || $row["categoria"] == 'Digital') $categoria = 5;
        if ($row["categoria"] == 'Diseño de información' || $row["categoria"] == 'Diseño de información') $categoria = 6;


        if ($row["categoria"] == 'branding') $categoria_label = 'Branding';
        if ($row["categoria"] == 'editorial') $categoria_label = 'Diseño Editorial';
        if ($row["categoria"] == 'packaging') $categoria_label = 'Packaging';
        if ($row["categoria"] == 'espacios') $categoria_label = 'Diseño Espacios';
        if ($row["categoria"] == 'digital') $categoria_label = 'Digital';

        $descripcion = $row["descripcion"];
        $thumnail = str_replace(" ", "_",$row["thumbnail"]);



        //imprimir cuadro del proyecto.
        $galeria .= '<div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="'.$categoria.'">
                        <a href="'.$href.'">
                            <div class="img-portafolio" style="background-image: url(&quot;img/'.$thumnail.'&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                                <div id="div-hover" class="img-hover" style="background-color: rgba(255, 255, 255, 0.95);">
                                    <p class="img-hover">'.$categoria_label.'<span class="img-hover">'.$nombre.'</span></p>
                                </div>
                            </div>
                        </a>
                    </div>';

    }
}
$galeria .= '</div></div></section>';


echo $galeria;






?>



