<?php
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    $userId = $_SESSION['usuario'];

    $sentencia = $connect->prepare("SELECT e.id, e.asunto, e.fecha, e.tipo_tarea_id,
        t.tipo_tarea_id, t.color_background, t.user_id,
        e.id as id, e.asunto as title, e.fecha as start,
        t.color_background as backgroundColor
        FROM wp_agenda e
        LEFT JOIN wp_agenda_tipo_tarea_custom_colors t ON  e.tipo_tarea_id =t.tipo_tarea_id
        WHERE t.user_id=?") or die('query failed');
        $sentencia->execute([$userId]);       
        $eventos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    if(!$eventos){
        $sentencia2 = $connect->prepare("SELECT e.id, e.asunto, e.fecha, e.tipo_tarea_id,
        t.id, t.color_background_default, 
        e.id as id, e.asunto as title, e.fecha as start,
        t.color_background_default as backgroundColor
        FROM wp_agenda e
        LEFT JOIN wp_agenda_tipo_tarea t ON  e.tipo_tarea_id =t.id") or die('query failed');
        $sentencia2->execute();
        $eventos = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode($eventos);  
}else{
    echo '<script>alert("Debes Iniciar sesión"); window.location = "../login.php"</script>';
}                     
?>