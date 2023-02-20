<?php
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    if(!isset($_POST['tipo_tarea_id'])){$_POST['tipo_tarea_id']= '0';};
    if(!isset($_POST['asunto'])){$_POST['asunto']= 'No se establecio asunto';};
    if(!isset($_POST['fecha'])){$_POST['fecha']= ' ';};
    if(!isset($_POST['observaciones'])){$_POST['observaciones']= ' ';};
    if(!isset($_POST['hora_inicio'])){$_POST['hora_inicio']= ' ';};
    if($_POST['tarea_terminada'] == ''){$_POST['tarea_terminada']= 0;};

    $tipoTareaId = $_POST['tipo_tarea_id'];
    $asiganadaPor = $_SESSION['usuario'];
    $asunto = $_POST['asunto'];
    $fecha = $_POST['fecha'];
    $observaciones = $_POST['observaciones'];
    $horaInicio = $_POST['hora_inicio'];
    $tareaTerminada = $_POST['tarea_terminada'];

    $query = $connect-> prepare ("INSERT INTO wp_agenda (tipo_tarea_id, asunto, fecha, observaciones, hora_inicio, tarea_terminada, asignada_por) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$tipoTareaId, $asunto, $fecha, $observaciones, $horaInicio, $tareaTerminada, $asiganadaPor]);
    if($query){
        echo json_encode("Evento agregado con exito");
    }else{
        echo json_encode("Ha ocurrido un error al agregar el evento");
    }
}else{
    echo '<script>alert("Debes Iniciar sesión"); window.location = "../login.php"</script>';
}
?>