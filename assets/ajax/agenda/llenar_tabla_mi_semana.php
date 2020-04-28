<?php

require_once  "/var/www/html/Registro_Actividades/assets/config/config.php";
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $contenido = "";
    $suma_horas = 0;
    $fecha = $_POST['fecha'];
    $idUsuario = $_SESSION["idUsuario"];

    //Comrpobar su el usuario existe
    $buscar_agenda = $con->prepare("SELECT * FROM todo_agenda WHERE idUsuario = '$idUsuario' and fecha between  '$fecha' and DATE_ADD('$fecha', INTERVAL 7 DAY) ORDER BY fecha ASC");
    try {
        $buscar_agenda->execute();
    } catch(Exception $e) {
        $array_devolver["error"] = $e;
    }
    if ($buscar_agenda->rowCount() > 0) {
    // output data of each row
      while($row = $buscar_agenda->fetch()) {

          $contenido .= '<tr>
                        <td> ' . $row["idAgenda"]. ' </td>
                        <td>  '. $row["nombre"]. '</td>
                        <td>  '. $row["Duración_estimada"]. ' h</td>
                        <td>  '.$row["fecha"]. '</td>
                        <td>  '.$row["Duración_estimada"]. '</td>
                        <td>  '.$row["Duracion_real"]. '</td>
                        </tr>';

      }
      $array_devolver['contenido'] = $contenido;
      } else {
            $array_devolver['error'] = 'No hay resultados';
      }


    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
