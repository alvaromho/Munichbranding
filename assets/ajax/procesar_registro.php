<?php
session_start();
require_once "../config/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $nombre = $_POST['nombre'];
    $email = strtolower($_POST['email']);

    //Comrpobar su el usuario existe
    $buscar_user = $con->prepare("SELECT * FROM usuario WHERE mail = '$email' LIMIT 1");
    $buscar_user->bindParam(':email', $email, PDO::PARAM_STR, 80);
    $buscar_user->execute();


    // COmprobar que el email exista en la base de datos
    if ($buscar_user->rowCount() == 1){
        // Si existe
        $array_devolver['error'] = "Correo incorrecto.";
        $array_devolver['is_login'] = false;
    } else {
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $nuevo_usuario = $con->prepare("INSERT INTO usuario (nombre, mail, contraseña) VALUES (:nombre, :email, :password)");
      $nuevo_usuario->bindParam(':nombre', $nombre, PDO::PARAM_STR);
      $nuevo_usuario->bindParam(':email', $email, PDO::PARAM_STR);
      $nuevo_usuario->bindParam(':password', $password, PDO::PARAM_STR);
      $nuevo_usuario->execute();

      $idUsuario = $con->lastInsertId();
      $_SESSION['idUsuario'] = (int) $idUsuario;
      $array_devolver['redirect'] = 'index.php';
      $array_devolver['is_login'] = true;
    }
    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
