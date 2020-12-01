<?php 
if (isset($_GET["id"])) {


$idProyecto = $_GET["id"];

?>
<!DOCTYPE html>
                        <html>
                        
                        <?php include '../comunes/head.php'; ?>
                        
                        <body>
                        <div class="d-flex" id="wrapper">

                            <?php include '../comunes/navbar_admin.php'; ?>
                            
                            
                            <!-- Page Content -->
                            <div id="page-content-wrapper">
                                    <?php   include '../comunes/navbar.php';?>
                                <!-- Contenido de la página-->
                        
                                <?php include '../comunes/contenido_proyecto.php'; ?>                        
                                <?php include '../comunes/proyectos_relacionados.php'; ?>

                                
                                <?php include '../comunes/footer.php';?>
                                <!-- /Contenido de la página-->
                        
                        
                            </div>
                            <!-- /#page-content-wrapper -->
                        </div>
                         
                            <script src="../assets/js/jquery.min.js"></script>
                            <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
                            <script src="../assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
                            <script src="../assets/js/Simple-Slider.js"></script>
                            <script src="../assets/js/theme.js"></script>
                        <?php include '../comunes/bloque_admin.php'; ?>
                        </body>
                    </html>
                    
                    
                    <style>
                        /*!
                         * Start Bootstrap - Simple Sidebar (https://startbootstrap.com/template-overviews/simple-sidebar)
                         * Copyright 2013-2019 Start Bootstrap
                         * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/master/LICENSE)
                         */
                        body {
                            overflow-x: hidden;
                        }
                    
                        #sidebar-wrapper2 {
                            min-height: 100vh;
                            /*margin-left: -15rem;*/
                            position: fixed;
                            z-index: 1;
                            -webkit-transition: margin .25s ease-out;
                            -moz-transition: margin .25s ease-out;
                            -o-transition: margin .25s ease-out;
                            transition: margin .25s ease-out;
                        }
                    
                        #sidebar-wrapper2 .sidebar-heading {
                            padding: 0.875rem 1.25rem;
                            font-size: 1.2rem;
                        }
                    
                        #sidebar-wrapper2 .list-group {
                            overflow: scroll;
                            max-height:  80vh;
                        }
                    
                        #page-content-wrapper {
                            min-width: 70%;
                        }
                    
                        #wrapper.toggled #sidebar-wrapper2 {
                            margin-left: 0;
                        }
                    
                        @media (min-width: 768px) {
                            #sidebar-wrapper2 {
                                margin-left: 0;
                            }
                    
                            #page-content-wrapper {
                                min-width: 0;
                                width: 100%;
                            }
                    
                            #wrapper.toggled #sidebar-wrapper2 {
                                margin-left: -15rem;
                            }
                        }
                    
                        #page-content-wrapper {
                            width: 100%;
                            padding-left: 200px;
                    
                        }
                        .sidebar-heading{
                            height: 50px;
                            font-size: 30px;
                            text-align: center;
                        }
                    
                    </style>
                    <?php
                    }
                    ?>