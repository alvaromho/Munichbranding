<?php
$itemsSlider = 6;
include_once 'assets/config/config.php';


//Comrpobar su el usuario existe
$buscar_proyectos = $con->prepare("SELECT * FROM proyecto WHERE slider IS NOT NULL AND slider <> '' ORDER BY RAND()");
$buscar_proyectos->execute();
$galeria = '';

if ($buscar_proyectos->rowCount() > 0) { // si existen proyectos:
    // output data of each row
    $contador = 1;

    while ($row = $buscar_proyectos->fetch() ) { // por cada proyecto
        $slider = str_replace(" ", "_",$row["slider"]);
        //imprimir cuadro del proyecto.
        if ($contador == 1){
            $galeria .= '<div class="carousel-item active">
                                        <div class="carousel-div" style="background-image: url(&quot;img/'.$slider.'&quot;);"></div>
                                    </div>';

        } else {
            $galeria .= '<div class="carousel-item ">
                                        <div class="carousel-div" style="background-image: url(&quot;img/'.$slider.'&quot;);"></div>
                                    </div>';
        }
        $contador++;

    }
}
?>


<div class="simple-slider">
    <div class="swiper-container">
        <div class="swiper-wrapper"></div>
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

            <ol class="carousel-indicators">
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


