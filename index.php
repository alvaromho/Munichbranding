<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1

header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado

include_once 'assets/config/config.php';



?>


<style>
    .img-portafolio{
        background-position: 50% 50%;
        width: inherit;
        height: 100%;
        background-size: cover;
    }

    span {
        font-family: 'QuincyCF', sans-serif;
    }
    span.caption{
        font-size: 17px!important;
        font-family: Graphik3;
        font-weight: 400;
    }
    .description {
        font-size: 20px;

    }
    .project-item.static-item .description{
        background: white;
        font-family: ;
    }
    .resaltado-negro{
        font-family: "Graphik", Helvetica, Roboto, Arial, sans-serif;
        color: black;
        font-weight: 600;
        margin-right: 5px;
    }

    .unstyled{
        list-style-type: none;
        margin-left: 0;
    }
    .unstyled.contacto{
        font-weight: 600;
        margin-top: 12px;
    }
    p {

        margin-bottom: .5rem!important; }
    .awards-titulo{
        font-family: Montserrat;
        font-weight: 600;
        /*position: relative;*/
        /* bottom: 50px;*/
        font-size: 11px;
        line-height: 2rem;
        color: rgb(130, 130, 130);
    }
    .awards-fechas{
        font-family: Montserrat;
        font-weight: 600;
        /*position: relative;*/
        /* bottom: 50px;*/
        font-size: 11px;
        /*line-height: 2rem;*/
        /* color: rgb(130, 130, 130);*/
    }
    .awards{
        color: rgb(130, 130, 130);
        font-family: Montserrat;
        /*position: absolute;*/
        /*bottom: 20px;*/
        font-size: 10px;

    }
    .awards-container{
        position: absolute;
        bottom: 1rem;
    }


    .row-servicios{
        background-color: white;
    }
    .servicios {
        padding: 10px 15px;
        background-color: #e8e8e6;
        flex: 30%;
        width: 95%;
        margin: 2.5px;
    }

    .card-body{

        background-color: #e8e8e6;
        padding: 10px;
        margin-bottom: 1.25rem;

    }

    .servicios>li {
        font-family: 'Raleway', sans-serif ;

    }
    .servicios>h3 {
        font-family: 'Raleway', sans-serif ;

    }
    .card-body > ul, .card-body > p{
        font-family: 'Raleway', sans-serif ;
        font-size: .9rem;
        list-style: none;
        color: #8b8b8c;
        padding-left: 8px;

    }
    .card-header > h3 {
        font-family: 'Raleway', sans-serif ;
        font-weight: 400;
        font-size: 16px!important;
        color: #8b8b8c;
    }
    .card-header > span {
        font-family: 'Raleway', sans-serif ;
        font-size: .9rem;
    }
    .resaltado-negro{
        color: black;
        margin-right: 5px;
    }

    #contenedorIframe{
        margin-top: -80px;
    }
    @media screen and (max-width: 1025px) {
        #contenedorIframe{
            margin-top: 0;
        }


    }
    .negro{
        color:black!important;
    }


</style>




<?php

//Comrpobar su el usuario existe
$buscar_proyectos = $con->prepare("SELECT * FROM proyecto order by orden ");
$buscar_proyectos->execute();
$lista_proyectos = [];



if ($buscar_proyectos->rowCount() > 0) { // si existen proyectos:
    // output data of each row
    $contador = 0;

    while ($row = $buscar_proyectos->fetch()) { // por cada proyecto
        if ($row["categoria"] == 'branding' || $row["categoria"] == 'Branding') $row["categoria"]  = 'Branding';
        if ($row["categoria"] == 'editorial' || $row["categoria"] == 'Diseño Editorial') $row["categoria"] = 'Diseño Editorial';
        if ($row["categoria"] == 'packaging'|| $row["categoria"] == 'Packaging') $row["categoria"] = 'Packaging';
        if ($row["categoria"] == 'espacios' || $row["categoria"] == 'Diseño Espacios') $row["categoria"]  = 'Diseño Espacios';
        if ($row["categoria"] == 'digital' || $row["categoria"] == 'Digital') $row["categoria"]  = 'Digital';
        $lista_proyectos[$contador] = $row;
        //$nombre = $row['nombre'];

        //$href = str_replace(" ","_", $row["nombre"]).".php";


        $descripcion = $row["descripcion"];
        $thumnail = str_replace(" ", "_",$row["thumbnail"]);
        $contador++;
    }
}

?>


<!-- COMIENZO DE PAGINA-->


<!doctype html>
<html lang="en-US" class="no-js">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    <link rel='stylesheet' id='main-styles-css'  href='assets/css/mucho-styles.css?v=1.5' media='all' />
    <script type='text/javascript' src='assets/js/modernizr.js'></script>
    <script type='text/javascript' src='assets/js/jquery-1.12.4.js'></script>
    <script type='text/javascript' src='assets/js/tema.js'></script>

    <script type="text/javascript">
        var ajax_url = 0;
        var mucho = {};
        mucho['image_sizes'] = ["-2560x([0-9]{1,5})\\\.","-1920x([0-9]{1,5})\\\.","-1280x([0-9]{1,5})\\\.","-845x([0-9]{1,5})\\\.","-640x([0-9]{1,5})\\\.","-634x452\\\.","-1273x909\\\."];
        mucho['preload_images'] = [];
        mucho['preload_images'].push("https://wearemucho.com/wp-content/themes/mucho-updated/img/arrow-right.svg");
        mucho['preload_images'].push("https://wearemucho.com/wp-content/themes/mucho-updated/img/arrow-left.svg");
        mucho['is_home'] = true;
    </script>


</head>


<?php include 'comunes/head.php'; ?>



<script>
    jQuery(document).ready(function($){

        $('.project-item-container').bind('click', function() {

            $link = $(this).children('a').attr('href');
            window.parent.location = $link;

        });
    });
</script>




<body class="home page-template page-template-page-home page-template-page-home-php page page-id-4 project-cat-select-present">
<?php include "comunes/navbar.php"; ?>

<div class="page-wrapper desktop-wrapper" style="">


    <main role="main">
        <?php //include "slider.php";?>
        <div class="project-list-wrapper">
            <div class="projects-list" id="projects-list">
                <div class="full-width-row projects-list-placeholder" id="home-projects-list">
                    <div class="dummy-project-column"></div>
                    <!-- Proyecto -->
                    <?php if (isset($lista_proyectos[0])){
                        foreach ($lista_proyectos as &$proyecto){
                            $proyecto['descripcion'] = str_replace("2020","<span class='awards-fechas'>2020</span>",$proyecto['descripcion']);
                            $proyecto['descripcion'] = str_replace("2019","<span class='awards-fechas'>2019</span>",$proyecto['descripcion']);
                            $proyecto['descripcion'] = str_replace("2018","<span class='awards-fechas'>2018</span>",$proyecto['descripcion']);
                            $proyecto['descripcion'] = str_replace("2017","<span class='awards-fechas'>2017</span>",$proyecto['descripcion']);
                            $proyecto['descripcion'] = str_replace("2016","<span class='awards-fechas'>2016</span>",$proyecto['descripcion']);
                            $proyecto['descripcion'] = str_replace("2015","<span class='awards-fechas'>2015</span>",$proyecto['descripcion']);

                        }
                        //$lista_proyectos[0]['descripcion'] = str_replace("2019","<span class='awards-fechas'>2019</span>",$lista_proyectos[0]['descripcion']);
                        echo '                
                <div class="project-item-column type-standard project-type-project  cat-11 cat-4 cat-39 cat-29 cat-20 cat-21 cat-15 cat-10 cat-19 cat-6" data-id="5260" >
                    <div class="project-item-container "  >
                        <span class="menu_order">3</span>
                        <a href="./proyectos/proyecto.php?id='.$lista_proyectos[0]["idProyecto"].'" class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[0]["thumbnail"].'">
                            <div class="description">
                                <div class="description-container t2">
                                    <h2>
                                        <span class="caption negro"> '.$lista_proyectos[0]['nombre'].'</span>    
                                        <span class="caption"> '.$lista_proyectos[0]['categoria'].'</span>
                                      
                                    </h2>';
                        /*if ($lista_proyectos[0]['descripcion'] != "") echo'
                                  <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                  <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[0]['descripcion']) .'</span></p>
                                  </div
                            ';*/
                        echo'
                                </div>
                            </div>
                        </a>
                    </div>
                </div>';
                    }

                    if (isset($lista_proyectos[1])){
                        echo '                
                <div class="project-item-column type-standard project-type-project cat-4 cat-39 cat-12" data-id="5221">
                      <div class="project-item-container">
                          <span class="menu_order">4</span>
                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[1]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[1]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                               <span class="caption negro"> '.$lista_proyectos[1]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[1]['categoria'].'</span>
                                                  </h2>';
                        /*if ($lista_proyectos[1]['descripcion'] != "") echo'
                                  <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                  <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[1]['descripcion']).'</span></p>
                                  </div>
                            ';*/
                        echo'
                                          
                                      </div>
                                  </div>
                              </a>
                      </div>
                </div>
';
                    }
                    if (isset($lista_proyectos[2])){
                        echo '                <div class="project-item-column type-standard project-type-project cat-28 cat-4 cat-8 cat-32" data-id="5137">
                      <div class="project-item-container">
                          <span class="menu_order">9</span>



                                <a href="./proyectos/proyecto.php?id='.$lista_proyectos[2]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[2]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                               <span class="caption negro"> '.$lista_proyectos[2]['nombre'].'</span> 

                                                  <span class="caption"> '. $lista_proyectos[2]['categoria'].'</span>
                                                  
</h2>';
                        /* if ($lista_proyectos[2]['descripcion'] != "") echo'
                                   <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                   <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[2]['descripcion']). '</span></span></p></div>
                             ';*/
                        echo'

                                          
                                      </div>
                                  </div>
                              </a>




                      </div>
                  </div>
';
                    }
                    if (isset($lista_proyectos[3])){
                        echo '                
                <div class="project-item-column type-gallery big-project-item project-type-project cat-4 cat-39 cat-31 cat-8 cat-36" data-id="4151">
                      <div class="project-item-container">
                          <span class="menu_order">16</span>




                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[3]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[3]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t3">
                                          <h2>
                                               <span class="caption negro"> '.$lista_proyectos[3]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[3]['categoria'].'</span>
                                                  </h2>';
                        /* if ($lista_proyectos[3]['descripcion'] != "") echo'
                                   <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                   <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[3]['descripcion']). '</span></span></p></div>
                             ';*/
                        echo'
                                          
                                      </div>
                                  </div>
                              </a>



                      </div>
                  </div>
';
                    }

                    if (isset($lista_proyectos[4])){
                        echo '                
                <div class="project-item-column type-standard project-type-project cat-4 cat-18 cat-10 cat-32 cat-22" data-id="4108">
                      <div class="project-item-container">
                          <span class="menu_order">17</span>
                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[4]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[4]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                               <span class="caption negro"> '.$lista_proyectos[4]['nombre'].'</span>   
                                              <span class="caption"> '. $lista_proyectos[4]['categoria'].'</span>
        

                                          </h2>
                                                                               ';
                        /* if ($lista_proyectos[4]['descripcion'] != "") echo'
                                   <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                       <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[4]['descripcion']). '</span></span></p></div>
                             ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>
';
                    }
                    if (isset($lista_proyectos[5])){
                        echo '                
                <div class="project-item-column type-gallery big-project-item project-type-project cat-4 cat-39 cat-7 cat-40 cat-10 cat-32 cat-22 cat-36" data-id="4031">
                      <div class="project-item-container">
                          <span class="menu_order">19</span>
                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[5]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[5]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                              <span class="caption negro"> '.$lista_proyectos[5]['nombre'].'</span> 
                                              <span class="caption"> '. $lista_proyectos[5]['categoria'].'</span>
                                          </h2>
                                          
                                                                                           ';
                        /*if ($lista_proyectos[5]['descripcion'] != "") echo'
                                  <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                  <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[5]['descripcion']). '</span></span></p></div>
                            ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>
';
                    }
                    if (isset($lista_proyectos[6])){
                        echo '                
                <div class="project-item-column type-standard project-type-project cat-28 cat-11 cat-4 cat-21 cat-36 cat-6 " data-id="3908">
                      <div class="project-item-container">
                          <span class="menu_order">26</span>


                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[6]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[6]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                                 <h2> <span class="caption negro"> '.$lista_proyectos[6]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[6]['categoria'].'</span>
                                                </h2>';
                        /*if ($lista_proyectos[6]['descripcion'] != "") echo'
                                          <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                          <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[6]['descripcion']). '</span></span></p></div>
                                    ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>





                      </div>
                  </div>
';}
                    if (isset($lista_proyectos[7])){
                        echo '                
                <div class="project-item-column type-standard project-type-project cat-4 cat-40 cat-22 cat-19" data-id="3651">
                      <div class="project-item-container">
                          <span class="menu_order">29</span>



                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[7]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[7]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                           <span class="caption negro"> '.$lista_proyectos[7]['nombre'].'</span> 
                                          <span class="caption"> '. $lista_proyectos[7]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                        /* if ($lista_proyectos[7]['descripcion'] != "") echo'
                                   <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                   <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[7]['descripcion']). '</span></span></p></div>
                             ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>

                      </div>
                  </div>
';}
                    if (isset($lista_proyectos[8])){
                        echo '                
                <div class="project-item-column type-gallery big-project-item project-type-project cat-4 cat-31 cat-21 cat-3 cat-36 cat-19" data-id="3496">
                      <div class="project-item-container">
                          <span class="menu_order">38</span>

                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[8]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[8]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                   <span class="caption negro"> '.$lista_proyectos[8]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[8]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                        /* if ($lista_proyectos[8]['descripcion'] != "") echo'
                                   <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                   <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[8]['descripcion']). '</span></span></p></div>
                             ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>

                      </div>
                  </div>
';}
                    if (isset($lista_proyectos[9])){echo '                
                <div class="project-item-column type-standard project-type-project cat-28 cat-11 cat-4 cat-21 cat-36 cat-6" data-id="3236">
                      <div class="project-item-container">
                          <span class="menu_order">42</span>

                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[9]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[9]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[9]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[9]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                        /*if ($lista_proyectos[9]['descripcion'] != "") echo'
                                  <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                              <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[9]['descripcion']). '</span></span></p></div>
                            ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>

                      </div>
                  </div>
';}
                    if (isset($lista_proyectos[10])){
                        echo '                
                <div class="project-item-column type-standard project-type-project cat-29 cat-17 cat-9 cat-12 cat-10" data-id="3406">
                      <div class="project-item-container">
                          <span class="menu_order">43</span>



                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[10]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[10]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[10]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[10]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                        /* if ($lista_proyectos[10]['descripcion'] != "") echo'
                                   <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                           <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[10]['descripcion']). '</span></span></p></div>
                             ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>




                      </div>
                  </div>
';}




                    if (isset($lista_proyectos[11])) {
                        echo '
                    <div class="project-item-column type-gallery big-project-item project-type-project cat-4 cat-31 cat-17 cat-9 cat-8 cat-3 cat-10 cat-22 cat-36 cat-6" data-id="2735">
                      <div class="project-item-container">
                          <span class="menu_order">44</span>


                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[11]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[11]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[11]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[11]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                        /*if ($lista_proyectos[11]['descripcion'] != "") echo'
                                  <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                  <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[11]['descripcion']). '</span></span></p></div>
                            ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>

                      </div>
                  </div>
';
                    }


                    if (isset($lista_proyectos[12])){
                        echo '
                <div class="project-item-column type-standard project-type-project cat-31 cat-17 cat-25 cat-21 cat-19" data-id="2696">
                      <div class="project-item-container">
                          <span class="menu_order">45</span>
                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[12]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[12]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[12]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[12]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                        /*if ($lista_proyectos[12]['descripcion'] != "") echo'
                                  <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                          <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[12]['descripcion']). '</span></span></p></div>
                            ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>';}
                    if (isset($lista_proyectos[13])){

                        echo '
                <div class="project-item-column type-standard project-type-project cat-4 cat-31 cat-8 cat-36 cat-34" data-id="2607">
                      <div class="project-item-container">
                          <span class="menu_order">91</span>
                           <a href="./proyectos/proyecto.php?id='.$lista_proyectos[13]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[13]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t3">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[13]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[13]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                        /*if ($lista_proyectos[13]['descripcion'] != "") echo'
                                  <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                  <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[13]['descripcion']). '</span></span></p></div>
                            ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>';
                    }
                    if (isset($lista_proyectos[14])){

                        echo '<div class="project-item-column type-standard project-type-project cat-11 cat-31 cat-7 cat-9 cat-19" data-id="2566">
                      <div class="project-item-container">
                          <span class="menu_order">92</span>



                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[14]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[14]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[14]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[14]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                        /*if ($lista_proyectos[14]['descripcion'] != "") echo'
                                  <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                  <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[14]['descripcion']). '</span></span></p></div>
                            ';*/
                        echo'
                                      </div>
                                  </div>
                              </a>




                      </div>
                  </div>';


                        if (isset($lista_proyectos[15])){
                            echo '
                <div class="project-item-column type-standard project-type-project cat-31 cat-17 cat-25 cat-21 cat-19" data-id="2696">
                      <div class="project-item-container">
                          <span class="menu_order">45</span>
                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[15]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[15]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[15]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[15]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                            /*   if ($lista_proyectos[15]['descripcion'] != "") echo'
                                         <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                         <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[15]['descripcion']). '</span></span></p></div>
                                   ';*/
                            echo'
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>';}
                        if (isset($lista_proyectos[16])){

                            echo '
                <div class="project-item-column type-standard project-type-project cat-4 cat-31 cat-8 cat-36 cat-34" data-id="2607">
                      <div class="project-item-container">
                          <span class="menu_order">91</span>
                           <a href="./proyectos/proyecto.php?id='.$lista_proyectos[16]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[16]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t3">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[16]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[16]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                            /* if ($lista_proyectos[16]['descripcion'] != "") echo'
                                       <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                       <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[16]['descripcion']). '</span></span></p></div>
                                 ';*/
                            echo'
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>';
                        }
                        if (isset($lista_proyectos[17])){

                            echo '<div class="project-item-column type-standard project-type-project cat-11 cat-31 cat-7 cat-9 cat-19" data-id="2566">
                      <div class="project-item-container">
                          <span class="menu_order">17</span>



                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[17]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[17]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                  <span class="caption negro"> '.$lista_proyectos[17]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[17]['categoria'].'</span><br/>

                                          </h2>
                                          ';
                            /*  if ($lista_proyectos[17]['descripcion'] != "") echo'
                                        <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                        <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[17]['descripcion']). '</span></span></p></div>
                                  ';*/
                            echo'
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>
                  ';}

                        if (isset($lista_proyectos[18])){
                            echo '                
                <div class="project-item-column type-standard project-type-project cat-11 cat-4 cat-39 cat-29 cat-20 cat-21 cat-15 cat-10 cat-19 cat-6" data-id="5260" >
                    <div class="project-item-container "  >
                        <span class="menu_order">3</span>
                        <a href="./proyectos/proyecto.php?id='.$lista_proyectos[18]["idProyecto"].'" class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[18]["thumbnail"].'">
                            <div class="description">
                                <div class="description-container t2">
                                    <h2>
                                           <span class="caption negro"> '.$lista_proyectos[18]['nombre'].'</span> 
                                        <span class="caption"> '.$lista_proyectos[18]['categoria'].'</span><br/>
                                    </h2>';
                            /*  if ($lista_proyectos[18]['descripcion'] != "") echo'
                                        <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                        <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[18]['descripcion']). '</span></span></p></div>
                                  ';*/
                            echo'
                                </div>
                            </div>
                        </a>
                    </div>
                </div>';
                        }

                        if (isset($lista_proyectos[19])){
                            echo '                
                <div class="project-item-column type-standard project-type-project cat-4 cat-39 cat-12" data-id="5221">
                      <div class="project-item-container">
                          <span class="menu_order">4</span>
                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[19]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[19]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                               <span class="caption negro"> '.$lista_proyectos[19]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[19]['categoria'].'</span><br/>
                                          </h2>';
                            /* if ($lista_proyectos[19]['descripcion'] != "") echo'
                                       <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                       <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[19]['descripcion']). '</span></span></p></div>
                                 ';*/
                            echo'                                      
                                      </div>
                                  </div>
                              </a>
                      </div>
                </div>
';
                        }
                        if (isset($lista_proyectos[20])){
                            echo '                <div class="project-item-column type-standard project-type-project cat-28 cat-4 cat-8 cat-32" data-id="5137">
                      <div class="project-item-container">
                          <span class="menu_order">9</span>



                                <a href="./proyectos/proyecto.php?id='.$lista_proyectos[20]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[20]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                               <span class="caption negro"> '.$lista_proyectos[20]['nombre'].'</span> 

                                                  <span class="caption"> '. $lista_proyectos[20]['categoria'].'</span><br/>


                                          </h2>';
                            /*  if ($lista_proyectos[20]['descripcion'] != "") echo'
                                        <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                                        <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[20]['descripcion']). '</span></span></p></div>
                                  ';*/
                            echo'  
                                      </div>
                                  </div>
                              </a>




                      </div>
                  </div>
';
                        }
                        if (isset($lista_proyectos[21])){
                            echo '                
                <div class="project-item-column type-gallery big-project-item project-type-project cat-4 cat-39 cat-31 cat-8 cat-36" data-id="4151">
                      <div class="project-item-container">
                          <span class="menu_order">16</span>




                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[21]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[21]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t3">
                                          <h2>
                                               <span class="caption negro"> '.$lista_proyectos[21]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[21]['categoria'].'</span><br/>
                                          </h2>';
                            /*  if ($lista_proyectos[21]['descripcion'] != "") echo'
                                        <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                        <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[21]['descripcion']). '</span></span></p></div>
                                  ';*/
                            echo'  
                                      </div>
                                  </div>
                              </a>



                      </div>
                  </div>
';
                        }

                        if (isset($lista_proyectos[22])){
                            echo '                
                <div class="project-item-column type-standard project-type-project cat-4 cat-18 cat-10 cat-32 cat-22" data-id="4108">
                      <div class="project-item-container">
                          <span class="menu_order">17</span>
                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[22]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[22]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                               <span class="caption negro"> '.$lista_proyectos[22]['nombre'].'</span> 
                                              <span class="caption"> '. $lista_proyectos[22]['categoria'].'</span><br/>

                                          </h2>';
                            /* if ($lista_proyectos[22]['descripcion'] != "") echo'
                                       <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                         <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[22]['descripcion']). '</span></span></p></div>
                                 ';*/
                            echo'  
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>
';
                        }
                        if (isset($lista_proyectos[23])){
                            echo '                
                <div class="project-item-column type-gallery big-project-item project-type-project cat-4 cat-39 cat-7 cat-40 cat-10 cat-32 cat-22 cat-36" data-id="4031">
                      <div class="project-item-container">
                          <span class="menu_order">19</span>
                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[23]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[23]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                              <span class="caption negro"> '.$lista_proyectos[23]['nombre'].'</span> 
                                              <span class="caption"> '. $lista_proyectos[23]['categoria'].'</span><br/>

                                          </h2>';
                            /* if ($lista_proyectos[23]['descripcion'] != "") echo'
                                       <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                       <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[23]['descripcion']). '</span></span></p></div>
                                 ';*/
                            echo'  
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>
';
                        }
                        if (isset($lista_proyectos[24])){
                            echo '                
                <div class="project-item-column type-standard project-type " data-id="3908">
                      <div class="project-item-container">
                          <span class="menu_order">26</span>


                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[24]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[24]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                                 <h2> <span class="caption negro"> '.$lista_proyectos[24]['nombre'].'</span> 
                                                  <span class="caption"> '. $lista_proyectos[24]['categoria'].'</span><br/>
                                                </h2>';
                            /* if ($lista_proyectos[24]['descripcion'] != "") echo'
                                       <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                                       <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[24]['descripcion']). '</span></span></p></div>
                                 ';*/
                            echo'  
                                      </div>
                                  </div>
                              </a>





                      </div>
                  </div>
';}
                        if (isset($lista_proyectos[25])){
                            echo '                
                <div class="project-item-column type-standard project-type-project cat-4 cat-40 cat-22 cat-19" data-id="3651">
                      <div class="project-item-container">
                          <span class="menu_order">29</span>



                          <a href="./proyectos/proyecto.php?id='.$lista_proyectos[25]["idProyecto"].'"  class="project-item-link project-item bg-image" target="_self" data-image="proyectos/img/'.$lista_proyectos[25]["thumbnail"].'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                           <span class="caption negro"> '.$lista_proyectos[25]['nombre'].'</span> 
                                          <span class="caption"> '. $lista_proyectos[25]['categoria'].'</span><br/>

                                          </h2>';
                            /*  if ($lista_proyectos[25]['descripcion'] != "") echo'
                                        <div class="awards-container"><p><span class="awards-titulo ">Design Awards</span></p>
                                        <p><span class="awards"> '.str_replace(".",".<br>",$lista_proyectos[25]['descripcion']). '</span></span></p></div>
                                  ';*/
                            echo'   
                                      </div>
                                  </div>
                              </a>




                      </div>
                  </div>
';}
                    }?>


                    <!--Relleno -->
                    <div class="project-item-column">
                        <div class="project-item-container">
                            <span class="menu_order">9997</span>
                            <div class="project-item static-item">
                                <div class="description">
                                    <h3>
                                        <a href="" target="_self">Expertise</a>
                                    </h3>
                                    <div class="text">Somos una oficina especialista en Estrategia, Branding, Diseño editorial, Packaging y Comunicación para marcas
                                        que quieran desafiar sus propios límites y
                                        búsquen posicionarse a través de la disrupción
                                        y la conexión emocional con sus audiencias.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-item-column">
                        <div class="project-item-container">
                            <span class="menu_order">9997</span>
                            <div class="project-item static-item">
                                <div class="description">
                                    <h3>
                                        <a >Design Awards</a>
                                    </h3>
                                    <div class="text">
                                        <ul class="text-left unstyled">
                                            <li><span class="resaltado-negro"></span>2 Price Waterhouse coopers</li>
                                            <li><span class="resaltado-negro"></span>1 Premio Clap Platinum</li>
                                            <li><span class="resaltado-negro"></span>1 Latampack</li>
                                            <li><span class="resaltado-negro"></span>1 Premio Clap Silver</li>
                                        </ul></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-item-column">
                        <div class="project-item-container">
                            <span class="menu_order">9997</span>
                            <div class="project-item static-item">
                                <div class="description">
                                    <h3>
                                        <a href="https://twitter.com/munichbranding" target="_self">Contáctanos </a>
                                    </h3>
                                    <div class="text">
                                        Si tienes un proyecto para tu empresa, eres empredendor o necesitas expertos en marcas, diseño y comunicación, no dudes en contactarnos.
                                        <ul class="unstyled contacto">
                                            <li><a href="mailto:rlopez@munichbranding.com" style="color: black;font-size: 13px">Escribenos un Mail</a></li>
                                            <li><a href="tel:123-456-7890" style="color: black;font-size: 13px">Llámanos</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .projects-list -->
            </div>
        </div>

    </main>



</div><!-- .page-wrapper -->

</body>
</html>

<script>
    jQuery(document).ready(function($){

        $('.project-item-container').bind('click', function() {

            $link = $(this).children('a').attr('href');
            window.parent.location = $link;

        });
    });
</script>


</main>

<?php include 'comunes/footer.php';?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="assets/js/Simple-Slider.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>

