 <?php

   // session_start();

    if (isset($_SESSION['nombre'])) {
    // it does; output the message

      $nombre_usuario = $_SESSION['nombre'];
    }

    $_SESSION['idUsuario'] = 0;
    $_SESSION['nombre'] = "";
?>



<!DOCTYPE html>
<html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
     <title>Registro de Actividades</title>
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
     <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
     <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Barlow:300,400,500,600,700,900,900i">
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
     <link rel="stylesheet" href="assets/css/PUSH---Bootstrap-Button-Pack-2.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
     <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
     <link rel="stylesheet" href="assets/css/Modal-Form---with-error-message.css">
     <link rel="stylesheet" href="assets/css/MUSA_panel-table.css">
     <link rel="stylesheet" href="assets/css/Sidemenu-1.css">
     <link rel="stylesheet" href="assets/css/Sidemenu.css">
     <link rel="stylesheet" href="assets/css/styles.css">
     <link rel="stylesheet" href="assets/css/Table-With-Search.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
 </head>

<body>
    <div class="login-dark">
        <form method="post" id="form_login" >
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="usuario" placeholder="Usuario"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Contraseña"></div>
            <div class="alert alert-danger" role="alert" id="msg_error" hidden>

            </div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" id="login_button" >Entrar</button></div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>

</body>
<script>


    /**-------------------------------
     Login
     -------------------------------**/
    $(document).on("submit","#form_login", function (event){

        event.preventDefault();

        var $form = $(this);

        var data_form = {
            usuario: $("input[name='usuario']",$form).val(),
            password: $("input[type='password']",$form).val()
        }

        var url_php = 'assets/ajax/procesar_login.php';

        $.ajax({
            type: 'POST',
            url: url_php,
            data: data_form,
            dataType: 'json',
            async: true,

        })
            .done(function ajaxDone(res) {
                console.log(res);
                /*if(res.error !== undefined){
                    $("#msg_error").html(res.error).removeAttr('hidden');
                    return false;
                }*/
                if(res.redirect !== undefined){
                    window.location = res.redirect;
                }
            })
            .fail(function ajaxError(e) {
                //alert('fail');
                console.log(e);
                if(e.error !== undefined){
                    $("#msg_error").html(e.error).show();
                    return false;
                }
            })
            .always(function ajaxAlways() {
                console.log("'Final de la llamada ajax.'");
            })


    });

</script>
</html>



