<?php
include_once 'assets/config/config.php';

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


<style>
    .img-portafolio{
        background-position: 50% 50%;
        width: inherit;
        height: 100%;
        background-size: cover;
    }

    @font-face {
        font-family: QuincyCF;
        src: url("assets/fonts/QuincyCF-Light.otf") format("opentype");
    }
    span {
        font-family: 'QuincyCF', sans-serif;
    }
    span.caption{
        font-size: 17px!important;
    }
    .description-container {
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
        margin-top: 15px;
    }

</style>

<!doctype html>
<html lang="en-US" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    <link rel='stylesheet' id='main-styles-css'  href='/assets/css/mucho-styles.css' media='all' />
    <script type='text/javascript' src='/assets/js/modernizr.js'></script>
    <script type='text/javascript' src='/assets/js/jquery-1.12.4.js'></script>
    <script type='text/javascript' src='/assets/js/tema.js'></script>

    <script type="text/javascript">
        var mucho = {};
    </script>


</head>
<body class="home page-template page-template-page-home page-template-page-home-php page page-id-4 project-cat-select-present">
<div class="page-wrapper desktop-wrapper">


    <main role="main">
        <div class="project-list-wrapper">
            <div class="projects-list" id="projects-list">
                <div class="full-width-row projects-list-placeholder" id="home-projects-list">
                    <div class="dummy-project-column"></div>
                    <!-- Proyecto -->
                    <?php if (isset($lista_proyectos[0])){
                        echo '                
                <div class="project-item-column type-standard project-type-project cat-11 cat-4 cat-39 cat-29 cat-20 cat-21 cat-15 cat-10 cat-19 cat-6" data-id="5260" >
                    <div class="project-item-container "  >
                        <span class="menu_order">3</span>
                        <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[0]["nombre"]).'.php" class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[0]["thumbnail"]).'">
                            <div class="description">
                                <div class="description-container t2">
                                    <h2>
                                          '.$lista_proyectos[0]['nombre'].'
                                        <span class="caption"> '.$lista_proyectos[0]['categoria'].'</span><br/>
                                    </h2>
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
                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[1]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[1]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                              '.  $lista_proyectos[1]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[1]['categoria'].'</span><br/>
                                          </h2>
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



                                <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[2]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[2]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                              '. $lista_proyectos[2]['nombre'].'

                                                  <span class="caption"> '. $lista_proyectos[2]['categoria'].'</span><br/>


                                          </h2>
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




                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[3]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[3]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t3">
                                          <h2>
                                              '.  $lista_proyectos[3]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[3]['categoria'].'</span><br/>
                                          </h2>
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
                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[4]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[4]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                              '.  $lista_proyectos[4]['nombre'].'
                                              <span class="caption"> '. $lista_proyectos[4]['categoria'].'</span><br/>

                                          </h2>
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
                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[5]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[5]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                             '.  $lista_proyectos[5]['nombre'].'
                                              <span class="caption"> '. $lista_proyectos[5]['categoria'].'</span><br/>

                                          </h2>
                                      </div>
                                  </div>
                              </a>
                      </div>
                  </div>
';
                    }
                    if (isset($lista_proyectos[6])){
                        echo '                
                <div class="project-item-column type-standard project-type " data-id="3908">
                      <div class="project-item-container">
                          <span class="menu_order">26</span>


                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[6]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[6]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                                 <h2>'.  $lista_proyectos[6]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[6]['categoria'].'</span><br/>
                                                </h2>
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



                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[7]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[7]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                          '.  $lista_proyectos[7]['nombre'].'
                                          <span class="caption"> '. $lista_proyectos[7]['categoria'].'</span><br/>

                                          </h2>
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



                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[8]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[8]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                  '.  $lista_proyectos[8]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[8]['categoria'].'</span><br/>

                                          </h2>
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



                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[9]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[9]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                 '.  $lista_proyectos[9]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[9]['categoria'].'</span><br/>

                                          </h2>
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



                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[10]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[10]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                 '.  $lista_proyectos[10]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[10]['categoria'].'</span><br/>

                                          </h2>
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



                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[11]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[11]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                 '.  $lista_proyectos[11]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[11]['categoria'].'</span><br/>

                                          </h2>
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
                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[12]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[12]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                 '.  $lista_proyectos[12]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[12]['categoria'].'</span><br/>

                                          </h2>
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
                           <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[13]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[13]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t3">
                                          <h2>
                                                 '.  $lista_proyectos[13]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[13]['categoria'].'</span><br/>

                                          </h2>
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



                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[14]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[14]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                 '.  $lista_proyectos[14]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[14]['categoria'].'</span><br/>

                                          </h2>
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
                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[15]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[15]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                 '.  $lista_proyectos[15]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[15]['categoria'].'</span><br/>

                                          </h2>
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
                           <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[16]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[16]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t3">
                                          <h2>
                                                 '.  $lista_proyectos[16]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[16]['categoria'].'</span><br/>

                                          </h2>
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



                          <a href="http://munich.desarrollo.alvaro-munoz.com/'.str_replace(" ","_", $lista_proyectos[17]["nombre"]).'.php"  class="project-item-link project-item bg-image" target="_blank" data-image="img/'.str_replace(" ", "_",$lista_proyectos[17]["thumbnail"]).'">
                                  <div class="description">
                                      <div class="description-container t2">
                                          <h2>
                                                 '.  $lista_proyectos[17]['nombre'].'
                                                  <span class="caption"> '. $lista_proyectos[17]['categoria'].'</span><br/>

                                          </h2>
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
                                        <a href="" target="_blank">Expertise</a>
                                    </h3>
                                    <div class="text">Somos una oficina especialista en Estrategia,
                                        Branding, Diseño y Comunicación para marcas
                                        que quieran desafiar sus propios límites y
                                        búsquen posicionarse a través de la disrrupción
                                        y la conección emocional con sus audiencias.</div>
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
                                            <li><span class="resaltado-negro">3</span>A´Design Awards</li>
                                            <li><span class="resaltado-negro">2</span>DNA Paris Design Awards</li>
                                            <li><span class="resaltado-negro">1</span>Top Awards Asia</li>
                                            <li><span class="resaltado-negro">6</span>Premios LatamPack</li>
                                            <li><span class="resaltado-negro">2</span>Premios Clap</li>
                                            <li><span class="resaltado-negro">2</span>Price Waterhouse Coopers</li>
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
                                        <a href="https://twitter.com/munichbranding" target="_blank">Contáctanos </a>
                                    </h3>
                                    <div class="text">
                                        Si tienes un proyecto para tu empresa, eres empredendor o necesitas expertos en marcas, diseño y comunicación, no dudes en contactarnos.
                                        <ul class="unstyled contacto">
                                            <li><a href="mailto:rlopez@munichbranding.com" style="color: black">Escribenos un Mail</a></li>
                                            <li><a href="tel:123-456-7890" style="color: black;">Llámanos</a></li>
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

