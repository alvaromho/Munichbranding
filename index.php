<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1

header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado
?>


<!DOCTYPE html>
<html>

<?php
include 'head.php'; ?>

<body>
<?php include 'navbar.php'; ?>

<main class="page lanidng-page">

    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
            /*alert('load');*/
        }
        window.mobileCheck = function() {
            let check = false;
            (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
            return check;
        };


        window.onresize = function(){
            /*alert('resize');*/


            if ( !window.mobileCheck){
                //alert('pc');
                $("#contenedorIframe").load('iframe.php').fadeIn();
            }
            /*$("#contenedorIframe").focus();*/
            /*$("#tex").reload(true);*/
            /*$("#tex").style.height =  document.body.scrollHeight + 'px';
            $(".tex" ).trigger( "load" );*/


        }

    </script>
    <style>

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


    </style>


    <?php //include 'galeria.php';
    include "slider.php";
    echo '<div id="contenedorIframe" >';
    include 'iframe.php';
    echo '</div> ';
    ?>


</main>

<?php include 'footer.php';?>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="assets/js/Simple-Slider.js"></script>
<script src="assets/js/theme.js"></script>
</body>

</html>

<!-- <section class="portfolio-block skills" style="padding: 2.5px;margin-top: -86px;">
         <div class="container" >
             <div class="heading"></div>
          !--<div class="row row-servicios " >


                 <div class="col-md-4  servicios">
                     <div class="card special-skill-item border-0  bg-transparent" >
                         <div class="card-header border-0 bg-transparent">
                             <h3 class="text-left" ">Expertise</h3>
                         </div>
                         <div class="card-body">
                             <ul class="text-left">
                                 <span>Somos una oficina especialista en Estrategia,
                                         Branding, Diseño y Comunicación para marcas
                                         que quieran desafiar sus propios límites y
                                         búsquen posicionarse a través de la disrrupción
                                         y la conección emocional con sus audiencias.</span>
                             </ul>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-4  servicios">
                     <div class="card special-skill-item border-0 bg-transparent" >
                         <div class="card-header bg-transparent border-0">
                             <h3 class=" text-left" >Design Awards</h3>
                         </div>
                         <div class="card-body" >
                             <ul class="text-left">
                                 <li><span class="resaltado-negro">3</span>A´Design Awards</li>
                                 <li><span class="resaltado-negro">2</span>DNA Paris Design Awards</li>
                                 <li><span class="resaltado-negro">1</span>Top Awards Asia</li>
                                 <li><span class="resaltado-negro">6</span>Premios LatamPack</li>
                                 <li><span class="resaltado-negro">2</span>Premios Clap</li>
                                 <li><span class="resaltado-negro">2</span>Price Waterhouse Coopers</li>
                             </ul>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-4 servicios">
                     <div class="card special-skill-item border-0 bg-transparent text-left" >
                         <div class="card-header bg-transparent border-0">
                             <h3 class=" text-left" >Contáctanos</h3>
                         </div>
                         <div class="card-body" >
                             <p style="text-align: left; "><span >Si tienes un proyecto para tu empresa, eres empredendor o necesitas expertos en marcas, diseño y comunicación, no dudes en contactarnos.</span></p>
                             <ul >
                                 <li><a href="mailto:contacto@munich.cl" style="color: black">Escribenos un Mail</a></li>
                                 <li><a href="tel:123-456-7890" style="color: black;">Llámanos</a></li>
                                 <li style="color: black">Escribenos un Mail</li>
                             </ul>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </section>-->

<!--<section class="portfolio-block photography">
    <div class="container" style="padding: 0px;">
        <div class="row no-gutters">
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/CATALOGO%20COMPOSIT.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/amara_bodyoil.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/urbancuisine.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/chileanpacific.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/CO%201.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/coccolino_pielimon.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/ESTO%20ES%20DISEÑO.001.jpeg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/Culinary_Alta-9.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/PapeleriaTierraUrbana.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/proyecto%20tvn.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/slide.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/theyoungbrewery_both.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/urbancuisine.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/evoke.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/3.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 offset-xl-0 item zoom-on-hover">
                <a href="#">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/vino_2_tierravientos.jpg&quot;);background-position: 50% 50%;width: inherit;height: 300px;background-size: cover;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">COMPOSIT</span></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>-->
<!--<section>
    <div class="row" style="margin-right: 0;margin-left: 0;">
        <div class="col text-center align-self-center" style="background-color: #666666;padding-bottom: 10%;">
            <p style="color: #cccccc;font-size: 150px;margin-bottom: 0;margin-top: 90px; font-weight: bold">+15</p>
            <p style="color: #cccccc;font-size: 20px;">PREMIOS INTERNACIONALES</p>
        </div>
        <div class="col text-center align-self-center" style="background-color: #cccccc;color: #666666;padding-bottom: 10%; font-weight: bold">
            <p style="margin-bottom: 0;color: #666666;font-size: 150px;margin-top: 90px;" >+15</p>
            <p style="color: #666666;font-size: 20px;">PREMIOS INTERNACIONALES</p>
        </div>
    </div>
</section>-->
<!-- <section class="portfolio-block skills" style="padding: 0;margin-top: -86px;">
    <div class="container">
        <div class="heading"></div>
        <div class="row" style="background-color: #4c4c4b;">
            <div class="col-md-4 col-lg-3 col-xl-3 servicios">
                <div class="card special-skill-item border-0" style="background-color: transparent;">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-uppercase text-left" style="padding-left: 15%;color: rgb(251,251,251);">Estrategia</h3>
                    </div>
                    <div class="card-body" style="color: rgb(255,255,255);">
                        <ul class="text-left">
                            <li>Estudios cualitativos</li>
                            <li>Auditoria de marca</li>
                            <li>Relato de marca</li>
                            <li>Propuesta de valor</li>
                            <li>Posicionamiento de marca</li>
                            <li>Modelos de servicio</li>
                            <li>Arquitectura de marca</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 servicios">
                <div class="card special-skill-item border-0" style="background-color: transparent;">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-uppercase text-left" style="padding-left: 15%;color: rgb(251,251,251);">Branding</h3>
                    </div>
                    <div class="card-body" style="color: rgb(255,255,255);">
                        <ul class="text-left">
                            <li>Diseño de idetidad visual</li>
                            <li>Sistemas de marca</li>
                            <li>Naming</li>
                            <li>Estudio de marca</li>
                            <li>Lineamientos de comunicacion</li>
                            <li>Brand Books</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3 col-xl-3 servicios">
                <div class="card special-skill-item border-0" style="background-color: transparent;">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-uppercase text-left" style="padding-left: 15%;color: rgb(251,251,251);">Diseño</h3>
                    </div>
                    <div class="card-body" style="color: rgb(255,255,255);">
                        <ul class="text-left">
                            <li>Packaging</li>
                            <li>Diseño Editorial</li>
                            <li>Diseño de espacios comerciales</li>
                            <li>Ilustraciones Digitales</li>
                            <li>Señalética</li>
                            <li>Gaficas Ambientales</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3 servicios">
                <div class="card special-skill-item border-0" style="background-color: transparent;">
                    <div class="card-header bg-transparent border-0">
                        <h3 class="text-uppercase text-left" style="padding-left: 15%;color: rgb(251,251,251);">Digital</h3>
                    </div>
                    <div class="card-body" style="color: rgb(255,255,255);">
                        <ul class="text-left">
                            <li>Estrategia digital</li>
                            <li>Diseño de sitios web</li>
                            <li>Creacion de e-commerce</li>
                            <li>Posiionamiento digital</li>
                            <li>Comunicación en RRSS</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->