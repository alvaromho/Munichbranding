<?php

require_once  "../config/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $contenido = "";
    $suma_horas = 0;
    $fecha = $_POST['fecha'];

    //Comrpobar su el usuario existe
    $buscar_agenda = $con->prepare("SELECT * FROM agenda_registro WHERE fecha between  '$fecha' and DATE_ADD('$fecha', INTERVAL 7 DAY) ORDER BY fecha ASC");
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
                        <td><a  class="btn btn-danger" onclick="confirmarBorrarAgendaReg('. $row['idAgenda'].')"><i class="icon_close_alt2"></i></a>
                        <a  class="btn btn-success" onclick="confirmarAprovarAgendaReg('. $row['idAgenda'].')"><i class="icon_check_alt2"></i></a></td>


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
