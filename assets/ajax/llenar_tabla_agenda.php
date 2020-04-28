<?php

require_once "../config/config.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    header("Content-Type: application/json");
    $array_devolver=[];
    $contenido_programar = "";
    $contenido_misemana = "";
    $contenido_registrar = "";


    /*$suma_horas = 0;
    $lista =[];*/
    $fecha = $_POST['fecha'];

    //Comrpobar su el usuario existe
    $buscar_agenda = $con->prepare("SELECT * FROM registro_actividades.agenda  a inner join registro_actividades.tarea t on a.idTarea = t.idTarea where a.estado = 0 and  fecha between '$fecha' and DATE_ADD('$fecha', INTERVAL 7 DAY) ORDER BY fecha ASC");
    $buscar_agenda->execute();

    if ($buscar_agenda->rowCount() > 0) {
        // output data of each row
        while($row = $buscar_agenda->fetch()) {
            //$suma_horas += $row["Duración_estimada"];
            //array_push($lista, $row['idAgenda']);
            $contenido_programar .= '<tr>
                        <td> ' . $row["idAgenda"]. ' </td>
                        <td>  '. $row["nombre"]. '</td>
                        <td>  '. $row["descripcion"]. '</td>
                        <td>  '. $row["Duración_estimada"]. ' h</td>
                        <td>  '.$row["fecha"]. '</td>
                        <td>  '.$row["estado"]. '</td>
                        <td>
                            <a  class="btn btn-danger" onclick="confirmarBorrarAgenda('. $row['idAgenda'].')"><i class="icon_close_alt2"></i></a>
                            <a  class="btn btn-success" onclick="confirmarAprovarAgenda('. $row['idAgenda'].')"><i class="icon_check_alt2"></i></a></td>
                        </tr>';
        }
       // $array_devolver['suma_horas'] = $suma_horas;
        $array_devolver['contenido_programar'] = $contenido_programar;

        //$array_devolver['lista'] = $lista;
    } else {
        $array_devolver['error_programar'] = 'No hay resultados';
        $array_devolver['contenido_programar'] = '<tr><td>No hay tareas en el borrador de esta semana.</td></tr>';

    }

    //Comrpobar su el usuario existe
    $buscar_agenda = $con->prepare("SELECT t.nombre as nombre, a.idAgenda as idAgenda, t.descripcion as descripcion, a.duración_estimada as Duración_estimada, a.duracion_real as Duracion_real, a.fecha as fecha, a.estado as estado FROM registro_actividades.agenda  a inner join registro_actividades.tarea t on a.idTarea = t.idTarea where (a.estado = 1 or a.estado = 2)and  fecha between '$fecha' and DATE_ADD('$fecha', INTERVAL 7 DAY) ORDER BY fecha ASC");
    $buscar_agenda->execute();
    //var_dump($buscar_agenda);


    if ($buscar_agenda->rowCount() > 0) {
        // output data of each row
        while($row = $buscar_agenda->fetch()) {
            //$suma_horas += $row["Duración_estimada"];
            //array_push($lista, $row['idAgenda']);
            if ($row["estado"] == 1){
                $estado = "Pendiente";
            } else{
                $estado = 'Finalizado';
            }
            $contenido_misemana .= '<tr>
                        <td> ' . $row["idAgenda"]. ' </td>
                        <td>  '. $row["nombre"]. '</td>
                        <td>  '. $row["descripcion"]. '</td>
                        <td>  '. $row["Duración_estimada"]. ' h</td>
                        <td>  '. $row["Duracion_real"]. ' h</td>
                        <td>  '.$row["fecha"]. '</td>
                        <td>  '.$estado.'</td>
                     </td>
                        </tr>';
        }
        //$array_devolver['suma_horas'] = $suma_horas;
        $array_devolver['contenido_misemana'] = $contenido_misemana;
        //$array_devolver['lista'] = $lista;
    } else {
        $array_devolver['error_misemana'] = 'No hay resultados';
        $array_devolver['contenido_misemana'] = '<tr><td>No hay tareas agendadas.</td></tr>';

    }

    $buscar_agenda = $con->prepare("SELECT t.nombre as nombre, a.idAgenda as idAgenda, t.descripcion as descripcion, a.duración_estimada as Duración_estimada, a.duracion_real as Duracion_real, a.fecha as fecha, a.estado as estado FROM registro_actividades.agenda  a inner join registro_actividades.tarea t on a.idTarea = t.idTarea where a.estado = 1 and  fecha between '$fecha' and DATE_ADD('$fecha', INTERVAL 7 DAY) ORDER BY fecha ASC");
    $buscar_agenda->execute();

    if ($buscar_agenda->rowCount() > 0) {
        // output data of each row
        while($row = $buscar_agenda->fetch()) {
            //$suma_horas += $row["Duración_estimada"];
            //array_push($lista, $row['idAgenda']);
            $contenido_registrar .= '<tr>
                        <td> ' . $row["idAgenda"]. ' </td>
                        <td>  '. $row["nombre"]. '</td>
                        <td>  '. $row["descripcion"]. '</td>
                        <td>  '. $row["Duración_estimada"]. ' h</td>
                        <td>  '.$row["fecha"]. '</td>
                        <td><a  class="btn btn-danger" onclick="confirmarBorrarAgendaReg('. $row['idAgenda'].')"><i class="icon_close_alt2"></i></a>
                        <a  class="btn btn-success" onclick="confirmarAprovarAgendaReg('. $row['idAgenda'].')"><i class="icon_check_alt2"></i></a></td>


                        </tr>';
        }
       // $array_devolver['suma_horas'] = $suma_horas;
        $array_devolver['contenido_registrar'] = $contenido_registrar;
    } else {
        $array_devolver['error_registrar'] = 'No hay resultados';
        $array_devolver['contenido_registrar'] = '<tr><td>No hay tareas agendadas.</td></tr>';

    }

    echo json_encode($array_devolver);
  } else {
    exit("Fuera de aqui");
  }

?>
