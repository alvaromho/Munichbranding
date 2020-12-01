<style>
    .description {
        font-size: 1.8rem;
        position: absolute;
        bottom: 0;
        left: 2%;
        margin-bottom: 1rem;
    }
    .descripcion-span{
        font-size: 1.5rem !important;
        font-family: Graphik3;
        font-weight: 400;
    }

</style>
<?php


$itemsSlider = 6;
include_once 'assets/config/config.php';
include "funciones.php";

//Comrpobar su el usuario existe
$buscar_proyectos = $con->prepare("SELECT * FROM proyecto WHERE slider IS NOT NULL AND slider <> '' ORDER BY RAND()");
$buscar_proyectos->execute();
$galeria = '';

if ($buscar_proyectos->rowCount() > 0) { // si existen proyectos:
    // output data of each row
    $contador = 1;

    while ($row = $buscar_proyectos->fetch() ) { // por cada proyecto
        $slider = str_replace(" ", "_",$row["slider"]);
        $cliente = $row["nombre"];
        $descripcion =$servicios = agregar_saltos_html($row["descripcion"]);
        $color_descripcion = $row['color_descripcion'];
        //imprimir cuadro del proyecto.
        if ($contador == 1){
            $galeria .= '
                            <div class="carousel-item active" >
                                <a href="http://munichbranding.cl/'.str_replace(" ","_", $cliente).'.php">
                                <div class="carousel-div" style="background-image: url(&quot;img/'.$slider.'&quot;);color: '.$color_descripcion.'">
                                    <div class="description t2">
                                        <h2 style="font-size: inherit">'.$cliente.'</h2>
                                        <span class="descripcion-span"> '.$descripcion.'</span>
                                    </div>
                                </div>
                                </a>
                            </div>
                          ';

        } else {
            $galeria .= '<div class="carousel-item ">
                            <a href="http://munichbranding.cl/'.str_replace(" ","_", $cliente).'.php">
                                <div class="carousel-div" style="background-image: url(&quot;img/'.$slider.'&quot;);color: '.$color_descripcion.'">
                                    <div class="description t2">
                                        <h2 style="font-size: inherit">'.$cliente.'</h2>
                                        <span class="descripcion-span"> '.$descripcion.'</span>
                                    </div>
                                </div>
                                </a>
                        </div>';
        }
        $contador++;

    }
}
?>


<div class="simple-slider">
    <div class="swiper-container">

        <div class="text-right swiper-pagination"></div>
    </div>
    <?php
    if ($contador != 0):
        ?>

        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <?php
                echo $galeria;
                ?>
            </div>

            <ol class="carousel-indicators" >
                <?php
                $i = 0;
                while ($i < $contador-1){
                    echo '<li data-target="#carousel-1" data-slide-to="'.$i.'"></li>';
                    $i++;
                }
                ?>

            </ol>
        </div>
    <?php endif; ?>
</div>


