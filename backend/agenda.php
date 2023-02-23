<?php
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    $userId = $_SESSION['usuario'];
    if(!isset($_GET['tipo'])){$_GET['tipo'] = '0';}; 
    if(!isset($_GET['agente'])){$_GET['agente'] = $userId;}; 
    if(!isset($_GET['realizadas'])){$_GET['realizadas'] = '';}; 
    if(!isset($_GET['asunto'])){$_GET['asunto'] = '';};
    $getRealizadas=$_GET['realizadas'];


    $whereTipo=" AND e.tipo_tarea_id = ".$_GET['tipo'];
    $whereAgente=" AND e.user_id = ".$_GET['agente'];         
    $whereAsuntos=" AND e.asunto LIKE '%".trim($_GET['asunto'])."%'";
    if($getRealizadas==2){$whereRealizadas=" AND e.tarea_terminada = 1";}else if($getRealizadas==1){$whereRealizadas=" AND e.tarea_terminada = 0";}else{$whereRealizadas="";};  
    
    
    if($_GET['tipo'] == '0' AND $_GET['agente'] == '' AND $_GET['realizadas'] == '' AND $_GET['asunto'] == ''){$filtro = '';}else{ 
        
        $filtro = "WHERE t.user_id=".$userId;

        if($_GET['realizadas'] != ''){$filtro .= $whereRealizadas;};
        if($_GET['tipo'] != '0'){$filtro .= $whereTipo;};
        if($_GET['agente'] != ''){$filtro .= $whereAgente;};
        if($_GET['asunto'] != ''){$filtro .= $whereAsuntos;};
    }

    $sentencia = $connect->prepare("SELECT e.id, e.asunto, e.fecha, e.tipo_tarea_id, e.user_id, e.tarea_terminada, e.observaciones, e.hora_inicio,
        t.tipo_tarea_id, t.color_background, t.user_id,
        e.id as id, e.asunto as title, e.fecha as start, e.observaciones as descripcion, e.tipo_tarea_id as tarea_id, e.tarea_terminada as tarea_terminada, e.hora_inicio as hora,
        t.color_background as backgroundColor
        FROM wp_agenda e
        LEFT JOIN wp_agenda_tipo_tarea_custom_colors t ON  e.tipo_tarea_id =t.tipo_tarea_id
        $filtro") or die('query failed');
        $sentencia->execute();       
        $eventos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    if(!$eventos){

        $whereTipo=" AND e.tipo_tarea_id = ".$_GET['tipo'];    
        $whereAsuntos=" AND e.asunto LIKE '%".trim($_GET['asunto'])."%'";
        if($getRealizadas==2){$whereRealizadas=" AND e.tarea_terminada = 1";}else if($getRealizadas==1){$whereRealizadas=" AND e.tarea_terminada = 0";}else{$whereRealizadas="";};        
        
        
        if($_GET['tipo'] == '' AND $_GET['agente'] == '' AND $_GET['realizadas'] == '' AND $_GET['asunto'] == ''){$filtro = '';}else{ 
            
            $filtro = "WHERE e.user_id=".$_GET['agente'];
    
            if($_GET['tipo'] != '0'){$filtro .= $whereTipo;};
            if($_GET['realizadas'] != ''){$filtro .= $whereRealizadas;};
            if($_GET['asunto'] != ''){$filtro .= $whereAsuntos;};
        }


        $sentencia2 = $connect->prepare("SELECT e.id, e.asunto, e.fecha, e.tipo_tarea_id, e.user_id, e.tarea_terminada, e.observaciones, e.hora_inicio,
        t.id, t.color_background_default, 
        e.id as id, e.asunto as title, e.fecha as start, e.observaciones as descripcion, e.tipo_tarea_id as tarea_id, e.tarea_terminada as tarea_terminada, e.hora_inicio as hora,
        t.color_background_default as backgroundColor
        FROM wp_agenda e
        LEFT JOIN wp_agenda_tipo_tarea t ON  e.tipo_tarea_id =t.id
        $filtro") or die('query failed');
        $sentencia2->execute();
        $eventos = $sentencia2->fetchAll(PDO::FETCH_ASSOC);
    }

    echo json_encode($eventos);  
}else{
    echo '<script>alert("Debes Iniciar sesión"); window.location = "../login.php"</script>';
}                     
?>