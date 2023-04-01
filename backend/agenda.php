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
    if($_GET['agente']!=4){
        $whereAgente=" AND e.user_id = ".$_GET['agente'];         
    }else{
        $whereAgente=" AND (e.user_id = 4 OR e.consulta_id > 0 OR e.propiedad_id > 0)";
    }
    $whereAsuntos=" AND e.asunto LIKE '%".trim($_GET['asunto'])."%'";
    if($getRealizadas==2){$whereRealizadas=" AND e.tarea_terminada = 1";}else if($getRealizadas==1){$whereRealizadas=" AND e.tarea_terminada = 0";}else{$whereRealizadas="";};  
    
    
    if($_GET['tipo'] == '0' AND $_GET['agente'] == '' AND $_GET['realizadas'] == '' AND $_GET['asunto'] == ''){$filtro = '';}else{ 
        
        /*if($_GET['agente'] == 4){

        }*/
        $filtro = "WHERE t.user_id=".$userId;

        if($_GET['realizadas'] != ''){$filtro .= $whereRealizadas;};
        if($_GET['tipo'] != '0'){$filtro .= $whereTipo;};
        if($_GET['agente'] != ''){$filtro .= $whereAgente;};
        if($_GET['asunto'] != ''){$filtro .= $whereAsuntos;};
    }

    $sentencia = $connect->prepare("SELECT e.id, e.asunto, e.fecha, e.tipo_tarea_id, e.user_id, e.tarea_terminada, e.observaciones, e.hora_inicio, e.propiedad_id, e.consulta_id,
        t.tipo_tarea_id, t.color_background, t.user_id,
        p.id, p.referencia_interna, p.calle,
        c.id, c.nombre, c.apellido, 
        e.id as id, CONCAT(DATE_FORMAT(e.hora_inicio, '%H:%i'), ' - ', e.asunto) as title, e.fecha as start, e.observaciones as descripcion, e.tipo_tarea_id as tarea_id, e.tarea_terminada as tarea_terminada, e.hora_inicio as hora, e.propiedad_id as e_propiedad_id, e.consulta_id as e_consulta_id,
        t.color_background as backgroundColor,
        p.id as p_id, p.referencia_interna as p_referencia_interna, p.calle as p_calle,
        c.id as c_id, c.nombre as c_nombre, c.apellido as c_apellido
        FROM wp_agenda e
        LEFT JOIN wp_agenda_tipo_tarea_custom_colors t ON  e.tipo_tarea_id =t.tipo_tarea_id
        LEFT JOIN wp_propiedades p ON  e.propiedad_id =p.id
        LEFT JOIN wp_consultas c ON  e.consulta_id =c.id
        $filtro") or die('query failed');
        $sentencia->execute();       
        $eventos = $sentencia->fetchAll();
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


        $sentencia2 = $connect->prepare("SELECT e.id, e.asunto, e.fecha, e.tipo_tarea_id, e.user_id, e.tarea_terminada, e.observaciones, e.hora_inicio, e.propiedad_id, e.consulta_id,
        t.id, t.color_background_default, 
        p.id, p.referencia_interna, p.calle,
        c.id, c.nombre, c.apellido,
        e.id as id, CONCAT(DATE_FORMAT(e.hora_inicio, '%H:%i'), ' - ', e.asunto) as title, e.fecha as start, e.observaciones as descripcion, e.tipo_tarea_id as tarea_id, e.tarea_terminada as tarea_terminada, e.hora_inicio as hora, e.propiedad_id as e_propiedad_id, e.consulta_id as e_consulta_id,
        t.color_background_default as backgroundColor,
        p.id as p_id, p.referencia_interna as p_referencia_interna, p.calle as p_calle,
        c.id as c_id, c.nombre as c_nombre, c.apellido as c_apellido
        FROM wp_agenda e
        LEFT JOIN wp_agenda_tipo_tarea t ON  e.tipo_tarea_id =t.id
        LEFT JOIN wp_propiedades p ON  e.propiedad_id =p.id
        LEFT JOIN wp_consultas c ON  e.consulta_id =c.id
        $filtro") or die('query failed');
        $sentencia2->execute();
        $eventos = $sentencia2->fetchAll();
    }

    echo json_encode($eventos);  
}else{
    echo '<script>alert("Debes Iniciar sesión"); window.location = "../login.php"</script>';
}                     
?>
