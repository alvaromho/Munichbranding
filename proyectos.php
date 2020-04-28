<?php
    $pagina = 'proyectos';
?>
<!DOCTYPE html>
<html>

<?php include 'head.php'; ?>

<body>
    <?php include 'navbar.php'; ?>

    <!--<div>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-4 col-xl-3">
                    <div class="filtr-controls"><span class="active" data-filter="all">all </span></div>
                </div>
                <div class="col-md-10 col-lg-9 col-xl-9">
                    <div class="filtr-controls">
                        <span data-filter="1">BRANDING</span>
                        <span data-filter="2">DISEÑO EDITORIAL&nbsp;</span>
                        <span data-filter="3">PACKAGING&nbsp;</span>
                        <span data-filter="4">DISEÑO DE ESPACIOS</span>
                        <span data-filter="5">DIGITAL</span>
                        <span data-filter="6">DISEÑO DE INFORMACIÓN</span></div>

            </div>
            </div>
        </div>
    </div>-->

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

    <script>
        function resizeIframe(obj) {
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
            /*alert('load');*/
        }

        window.onresize = function(){
            /*alert('resize');*/
            $("#contenedorIframe").load('iframe.php').fadeIn();
            /*$("#contenedorIframe").focus();*/
            /*$("#tex").reload(true);*/
            /*$("#tex").style.height =  document.body.scrollHeight + 'px';
            $(".tex" ).trigger( "load" );*/


        }

    </script>
    <?php /*include 'galeria_proyectos.php';*/?>

    <div id="contenedorIframe" >
        <iframe id="tex" src="iframe_proyectos.php" style="width: 100%; " frameborder="0" scrolling="no" onload="resizeIframe(this)" ></iframe>
    </div>
    <!--<section class="py-5">
        <div class="container">
            <div class="row filtr-container">
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a>
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/chileanpacific.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/CO%201.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/evoke.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/urbancuisine.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/ESTO%20ES%20DISEÑO.001.jpeg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/amara_bodyoil.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/slide.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/binh_coffee.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/3.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;Captura de pantalla 2018-09-04 a la(s) 15.16.00.png&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/coccolino_pielimon.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/Culinary_Alta-9.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/PapeleriaTierraUrbana%20-%20copia.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2">
                    <div class="img-portafolio" style="background-image: url(&quot;assets/img/proyecto%20tvn.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                        <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                            <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/theyoungbrewery_both.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/vino_2_tierravientos.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/chileanpacific.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/port14.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/port13.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/port10.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/binh_coffee.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/port15.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="1, 3">
                    <a href="https://source.unsplash.com/ZbMJ5VLrpQ4/900x1200.jpg">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/port2.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 filtr-item" data-category="2, 3">
                    <a href="proyecto1.html">
                        <div class="img-portafolio" style="background-image: url(&quot;assets/img/CATALOGO%20COMPOSIT.jpg&quot;);background-position: 50% 50%;width: inherit;height: 100%;background-size: cover;padding-top: 100%;">
                            <div id="div-hover" class="img-hover" style="background-color: rgba(221,221,221,0.65);">
                                <p class="img-hover">Diseño Editorial<span class="img-hover">Titulo</span></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>-->

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