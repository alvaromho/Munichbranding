<?php 
if (isset($_GET["id"])) {
    $idProyecto = $_GET["id"];
}
 ?>

    <!DOCTYPE html>
    <html>
    
    <?php include '../comunes/head.php'; ?>
    
    <body>
    <?php include '../comunes/navbar.php'; ?>
    <?php include '../comunes/contenido_proyecto.php'; ?>
    <?php include '../comunes/proyectos_relacionados.php'; ?>

    
        <?php include '../comunes/footer.php';?>
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/-Filterable-Gallery-with-Lightbox-BS4-.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
        <script src="../assets/js/Simple-Slider.js"></script>
        <script src="../assets/js/theme.js"></script>
    </body>
  </html>