<?php
/*
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
$link = "https"; 
else
$link = "http"; 
$link .= "://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; */

//echo $_SERVER['REQUEST_URI'];
if( strpos($_SERVER['REQUEST_URI'],"proyecto.php")!= 0 || strpos($_SERVER['REQUEST_URI'],"proyecto_admin.php")!= 0){
    $link = "../";
}else 
    $link = "";
//else echo "NO".strpos($_SERVER['REQUEST_URI'],"proyectos.php");

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Munich Branding Chile</title>
    <link rel="stylesheet" href="<?php echo $link; ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="<?php echo $link; ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $link; ?>assets/css/-Filterable-Gallery-with-Lightbox-BS4-.css?v=1.4">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="   <?php echo $link; ?>/assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="<?php echo $link; ?>assets/css/style.css?v=1.2" >
    <link rel="stylesheet" href="<?php echo $link; ?>assets/css/fonts.css?v=1.5">
    <link rel="stylesheet" href="<?php echo $link; ?>assets/css/flechas.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script src="https://kit.fontawesome.com/32387264c8.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Barlow&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <meta http-equiv="Expires" content="0">

    <meta http-equiv="Last-Modified" content="0">

    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">

    <meta http-equiv="Pragma" content="no-cache">
</head>