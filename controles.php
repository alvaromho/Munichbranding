<?php
include_once 'funciones.php';
include 'assets/config/config.php';

$prev_url = str_replace(" ", "_", get_prev_proyect_url($idProyecto));
$next_url = str_replace(" ", "_", get_next_proyect_url($idProyecto));
$proyecto = getProyecto($idProyecto);
?>
<style ></style>
<style>
    .proyectos-nav{
        height: 120px;
        display: flex;
        padding:  50px 0;

        font-size: 1.5rem;
        line-height: 3rem;
        color black;
        font-weight: 400;
        font-family: 'Montserrat', sans-serif;
    }

    .center, .center>a {
        text-align: center;
        vertical-align: middle;
        color: #676767;
        font-family: Raleway;
    }
    .icon{
        font-size: 2rem;
        position: relative;
        top: 5px;
        left: 5px;
    }
    a.proyect-nav{
        color: #676767;
        text-decoration: none;
    }
    a.proyect-nav:hover{
        color: #FFC723;
    }
    a {
        text-decoration: none;
    }
</style>
<div class="row proyectos-nav" style=" margin: 0" >

    <div class="col col-md-4 " style="text-align: left; padding-left: 0" >
        <a class="proyect-nav" href="<?php echo $prev_url ?> ">
            <i class="material-icons">arrow_back</i>
        </a>
    </div>
    <div class="col col-md-4 center" >
        <a style="margin-right: 10px" class="proyect-nav" >
            <?php echo $proyecto['nombre']?>
        </a>
    </div>
    <div class="col col-md-4 " style="text-align: right; padding-right: 0">
        <a class="proyect-nav" href="<?php echo $next_url ?> ">
            <i class="material-icons">arrow_forward</i>
        </a>
    </div>

</div>

