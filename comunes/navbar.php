<?php 
if( strpos($_SERVER['REQUEST_URI'],"proyecto.php")!= 0 || strpos($_SERVER['REQUEST_URI'],"proyecto_admin.php")!= 0){
    $link = "../";
}else 
    $link = "./";
//else echo "NO".strpos($_SERVER['REQUEST_URI'],"proyectos.php");

?>
<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        var currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-50px";
        }
        prevScrollpos = currentScrollPos;
    }


</script>


<nav  id="navbar" class="navbar navbar-light navbar-expand-md menu">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img src="<?php echo $link;?>assets/img/logo-munich900x300.jpg" >
        </a>
        <button data-toggle="collapse" class="navbar-toggler border rounded" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--<div class="about-munich ">
            <span class="text-about-munich" >Somos una oficina de experiencia de marca,</span>
            <span class="text-about-munich" >gestinamos estrategicamente la creatividad a través de una asesoria colaborativa y </span>
            <span class="text-about-munich" > centrada en los usuarios. nos guia el pensamiento estrategico, </span>
            <span class="text-about-munich" > alineado conlos objetivos comerciales de nuestros clientes</span>
        </div>-->
        <div class="collapse navbar-collapse  text-right d-xl-flex justify-content-xl-end menu-" id="navcol-1">
            <ul class="nav navbar-nav text-right">
                <li class="nav-item" role="presentation"><a class="nav-link <?php if($pagina == 'nosotros') echo 'active';?>" href="nosotros.php" >NOSOTROS</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link <?php if($pagina == 'proyectos') echo 'active';?>" href="proyectos.php">PROYECTOS</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link <?php if($pagina == 'servicios') echo 'active';?>" href="servicios.php" hidden>Servicios</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link <?php if($pagina == 'contacto') echo 'active';?>" href="contacto.php" >CONTACTO</a></li>
            </ul>
        </div>
    </div>
</nav>


<style>
    .navbar-brand > img{
        max-height: 40px;
    }

    }
    .nav-item {
        /*font-family: 'Barlow', sans-serif;*/
        font-family: Graphik3!important;
        color: #bcbcbc !important;
    }

    .navbar-light .navbar-nav .nav-link {
        color: #cbcbcb;
        font-size: .9rem!important;
        font-family: Graphik3!important;

    }
    /*.about-munich{
        color: #AEAEAE;
        font-size: 14px;
        line-height: (26/20);
        width: 430px;
        position: absolute;
        top: 50px;
        left: 250px;
        text-align: center;
    }

    .about-munich > span {
        text-align: center;
        font-weight: 500;

    }*/

</style>