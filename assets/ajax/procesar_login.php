<?php
session_start();
require_once "../config/config.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $array_devolver['error']='<i class="fas fa-exclamation-triangle"></i>  ' ;

    $usuario = strtolower($_POST['usuario']);
    $password = $_POST['password'];
    $array_devolver['script'] ="SELECT * FROM usuario  WHERE usuario = '$usuario'";

    //Comrpobar su el usuario existe

    try{
        $buscar_user = $con->prepare("SELECT * FROM usuario  WHERE usuario = '$usuario'  LIMIT 1");
        $buscar_user->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $buscar_user->execute();

        // COmprobar que el usuario exista en la base de datos
        if ($buscar_user->rowCount() == 1){
            // Si existe
            $user = $buscar_user->fetch(PDO::FETCH_ASSOC);
            $idUsuario = (int) $user['idUsuario'];
            $nombre = (string) $user['nombre'];
            $hash = (string) $user['contraseña'];
            $admin = (string) $user['admin'];
          if(password_verify($password,$hash)){
               $_SESSION['idUsuario']=$idUsuario;
               $_SESSION['nombre'] = $nombre;
               $_SESSION['admin'] = $admin;
               $array_devolver['redirect'] ='admin.php'; //Redirigir
               $array_devolver['is_login'] = true;
            }else{
               $array_devolver['error'].="Los datos no son validos. " ;
               echo json_encode($array_devolver);
           }

        } else {
          $array_devolver['error'].="No tienes cuenta.";

        }
        echo json_encode($array_devolver);
    }catch(PDOException $e ){
        $array_devolver['error'] .= 'Usuario no encontrado.';
        echo json_encode($array_devolver);
    }
}