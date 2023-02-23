<?php 
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){

if(!isset($_POST['tareaEditar'])){$_POST['tareaEditar']= '';};
if(!isset($_POST['asuntoEditar'])){$_POST['asuntoEditar']= '';};
if(!isset($_POST['fechaEditar'])){$_POST['fechaEditar']= '';};
if(!isset($_POST['observacionesEditar'])){$_POST['observacionesEditar']= '';};
if(!isset($_POST['horaEditar'])){$_POST['horaEditar']= '';};
if(!isset($_POST['finalizadaEditar'])){$_POST['finalizadaEditar']= '0';};

    // Variables generales de la sesión //
    $idEditar= $_POST['idEditar'];
    $datos= $connect-> prepare ("SELECT * FROM wp_agenda WHERE id = ?");
    $datos->execute([$idEditar]);
    $eventos = $datos->fetchAll();                         
    foreach($eventos as $evento){
        $tarea = $evento['tipo_tarea_id'];
        $asunto = $evento['asunto'];
        $fecha = $evento['fecha'];
        $observaciones = $evento['observaciones'];
        $hora = $evento['hora_inicio'];
        $finalizada = $evento['tarea_terminada'];
    }

    // Variables del formulario //
    $tareaNuevo = $_POST['tareaEditar'];
    $asuntoNuevo = $_POST['asuntoEditar'];
    $fechaNuevo = $_POST['fechaEditar'];
    $observacionesNuevo = $_POST['observacionesEditar'];
    $horaNuevo = $_POST['horaEditar'];
    $finalizadaNuevo = $_POST['finalizadaEditar']; 


   // IF para ver si cumple los requisitos //
    if($tareaNuevo != $tarea AND $tareaNuevo!= '' AND $tareaNuevo!=NULL OR $asuntoNuevo != $asunto AND $asuntoNuevo!= '' AND $asuntoNuevo!=NULL OR $fechaNuevo != $fecha AND $fechaNuevo!= '' AND $fechaNuevo!=NULL OR $observacionesNuevo != $observaciones AND $observacionesNuevo!= '' AND $observacionesNuevo!=NULL OR $horaNuevo != $hora AND $horaNuevo!= '' AND $horaNuevo!=NULL OR $finalizadaNuevo != $finalizada AND $finalizadaNuevo!= '' AND $finalizadaNuevo!=NULL){  
        

        // Update en mi información //
        $update = " titulo = NULL";

        if($tareaNuevo != $tarea AND $tareaNuevo!= '' AND $tareaNuevo!=NULL){
            $update .= ", tipo_tarea_id = '".$tareaNuevo."'";
        }
        if($asuntoNuevo != $asunto AND $asuntoNuevo!= '' AND $asuntoNuevo!=NULL){
            $update .= ", asunto = '".$asuntoNuevo."'";
        }
        if($fechaNuevo != $fecha AND $fechaNuevo!= '' AND $fechaNuevo!=NULL){
            $update .= ", fecha = '".$fechaNuevo."'";
        }
        if($observacionesNuevo != $observaciones AND $observacionesNuevo!= '' AND $observacionesNuevo!=NULL){
            $update .= ", observaciones = '".$observacionesNuevo."'";
        }
        if($horaNuevo != $hora AND $horaNuevo!= '' AND $horaNuevo!=NULL){
            $update .= ", hora_inicio = '".$horaNuevo."'";
        }
        if($finalizadaNuevo != $finalizada AND $finalizadaNuevo!= '' AND $finalizadaNuevo!=NULL){
            $update .= ", tarea_terminada = '".$finalizadaNuevo."'";
        }

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE wp_agenda SET $update WHERE id = $idEditar");
        $query->execute();

        if($query){
            echo json_encode("Cambios Realizados con éxito");
        }else{
            echo json_encode("Ha ocurrido un error");
        }

    }else{echo json_encode ("No se han realizado cambios");}
    





}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>

