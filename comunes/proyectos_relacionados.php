<?php

include_once '../funciones.php';

include_once '../assets/config/config.php';



//Comrpobar su el usuario existe

$buscar_proyectos = $con->prepare("SELECT * FROM proyecto WHERE categoria = '".getCategoria($idProyecto)."' order by rand() limit 4");

$buscar_proyectos->execute();

?>



<style>

    .proyecto-relacionado{

        padding-right: 1.5px;

        padding-left: 1.5px;

    }

    .bg-image{

        background-position: center;

        background-repeat: no-repeat;

        background-size: cover;

        opacity: 1;

        -webkit-transition: opacity .3s ease-out;

        -o-transition: opacity .3s ease-out;

        transition: opacity .3s ease-out;

        width: auto;

        height: 250px;

    }







    /* The overlay effect - lays on top of the container and over the image */

    .overlay {

        position: absolute;

        bottom: 0;

        background: rgb(255, 255, 255);

        background: rgba(255, 255, 255, 0.95);

        width: 100%;

        transition: .5s ease;

        opacity:0;

        color: black;

        height: 250px;

        font-size: 18px;

        text-align: left;

        font-family: Graphik3;

        font-weight: 400;

        padding: 7%;

        line-height: 5px;





    }



    /* When you mouse over the container, fade in the overlay title */

    .proyecto-relacionado:hover .overlay {

        opacity: 1;

    }



    .titulo-relacionados{

        margin-top: 7%;

        display: block;

        margin-bottom: 1%;

        padding-left: 18px;

        margin-left: 10px;

        margin-bottom: 3%;



    }

    .h3-relacionados{

        color: #EC1C24;

        font-size: 20px;

        font-weight: 400;

        word-spacing: 0px;

        font-family: Graphik3;



    }

    .categoria{

        font-weight: 300;

        line-height: 20px;

        font-size: 17px;

        font-family: Graphik3;

        color: #aeaeae;

    }



</style>



<?php if ($buscar_proyectos->rowCount() > 0): ?>





    <div class="row titulo-relacionados" >

        <h3 class="h3-relacionados">Proyectos Relacionados </h3>

    </div>



    <div class="row " style="height: auto;" >

       <?php

        while ($row = $buscar_proyectos->fetch()): ?>

        <div class=" col-lg-3 col-md-6 col-sm-12 proyecto-relacionado " >

            <div class="bg-image" style=" background-image: url('../proyectos/img/<?= $row["thumbnail"]?>')" >

                <a href="<?=str_replace(" ","_", $row["nombre"])?>.php" style=" width: auto; height: 100%">

                    <div class="overlay">

                        <p><?= $row["nombre"]?></p>

                        <span class="categoria"><?= $row["categoria"]?></span>

                    </div>

                </a>

            </div>

        </div>

         <?php  endwhile;  ?>

    </div>



 <?php endif;?>





        <script>

            jQuery(document).ready(function($){



                $('.project-item-container').bind('click', function() {



                    $link = $(this).children('a').attr('href');

                    window.parent.location = $link;



                });

            });

        </script>

