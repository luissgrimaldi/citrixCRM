<?php 
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){

    // Variables generales de la sesión //
    $idAgente= $_SESSION['usuario'];
    $datos= $connect-> prepare ("SELECT * FROM usuarios WHERE user_id = ?");
    $datos->execute([$idAgente]);
    $agente = $datos->fetch(PDO::FETCH_ASSOC);
    $nickname = $agente['nickname'];
    $nombreAgente = $agente['nombre'];
    $apellidoAgente = $agente['apellido'];
    $rolAgente = $agente['rol'];
    $fotoAgente = $agente['foto'];
    $sucursalId = $agente['sucursal_id'];
    $celularAgente = $agente['celular'];
    $emailAgente = $agente['email'];
    $sobreMiAgente = $agente['sobre_mi'];


    // Variables de sección información //
    $nicknameNuevo = $_POST['nickname'];
    $nombreAgenteNuevo = $_POST['nombre'];
    $apellidoAgenteNuevo = $_POST['apellido'];
    $emailAgenteNuevo = $_POST['email'];
    $celularAgenteNuevo = $_POST['celular'];  

    // IF para ver si cumple los requisitos //
    if($nicknameNuevo != $nickname AND $nicknameNuevo!= '' AND $nicknameNuevo!=NULL OR $nombreAgenteNuevo != $nombreAgente AND $nombreAgenteNuevo!= '' AND $nombreAgenteNuevo!=NULL OR $apellidoAgenteNuevo != $apellidoAgente AND $apellidoAgenteNuevo!= '' AND $apellidoAgenteNuevo!=NULL OR $emailAgenteNuevo != $emailAgente AND $emailAgenteNuevo!= '' AND $emailAgenteNuevo!=NULL OR $celularAgenteNuevo != $celularAgente AND $celularAgenteNuevo!= '' AND $celularAgenteNuevo!=NULL){  
        

        // Update en mi información //
        $update = " habilitado = 1";

        if($nicknameNuevo != $nickname AND $nicknameNuevo!= '' AND $nicknameNuevo!=NULL){
            $update .= ", nickname = '".$nicknameNuevo."'";
        }
        if($nombreAgenteNuevo != $nombreAgente AND $nombreAgenteNuevo!= '' AND $nombreAgenteNuevo!=NULL){
            $update .= ", nombre = '".$nombreAgenteNuevo."'";
        }
        if($apellidoAgenteNuevo != $apellidoAgente AND $apellidoAgenteNuevo!= '' AND $apellidoAgenteNuevo!=NULL){
            $update .= ", apellido = '".$apellidoAgenteNuevo."'";
        }
        if($emailAgenteNuevo != $emailAgente AND $emailAgenteNuevo!= '' AND $emailAgenteNuevo!=NULL){
            $update .= ", email = '".$emailAgenteNuevo."'";
        }
        if($celularAgenteNuevo != $celularAgente AND $celularAgenteNuevo!= '' AND $celularAgenteNuevo!=NULL){
            $update .= ", celular = '".$celularAgenteNuevo."'";
        }

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE usuarios SET $update WHERE user_id = $idAgente");
        $query->execute();

        if($query){
            echo '<script> alert("Cambios Realizados con éxito"); window.location = "../perfil.php"; </script>';
        }else{
            echo '<script> alert("Ha ocurrido un error al editar el perfil"); window.location = "../perfil.php"; </script>';
        }

    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../perfil.php"; </script>';}
    





}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>
