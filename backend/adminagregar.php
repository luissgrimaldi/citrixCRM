<?php 
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
if($_GET['page']=='usuario'){
if(!isset($_POST['nickname'])){$_POST['nickname']= ' ';};
if(!isset($_POST['nombre'])){$_POST['nombre']= ' ';};
if(!isset($_POST['apellido'])){$_POST['apellido']= ' ';};
if(!isset($_POST['email'])){$_POST['email']= ' ';};
if(!isset($_POST['celular'])){$_POST['celular']= ' ';};
if(!isset($_POST['contrasenia'])){$_POST['contrasenia']= ' ';};
if(!isset($_POST['repetircontrasenia'])){$_POST['repetircontrasenia']= ' ';};
if(!isset($_POST['rol'])){$_POST['rol']= ' ';};
    // Variables de sección información //
    $nickname = $_POST['nickname'];
    $nombreAgente = $_POST['nombre'];
    $apellidoAgente = $_POST['apellido'];
    $emailAgente = $_POST['email'];
    $celularAgente = $_POST['celular'];
    $contraseña =  $_POST['contrasenia'];
    $Repetircontraseña =  $_POST['repetircontrasenia'];
    $rolAgente =  $_POST['rol'];

    // IF para ver si cumple los requisitos //
    if($contraseña != $Repetircontraseña){
        echo '<script> alert("Las contraseñas no coinciden"); window.location = "../adminagregar.php=page=usuario; </script>';
    }
        // Hago el insert en la DB //
        $contraseña = hash('SHA512', $contraseña);
        $query = $connect-> prepare ("INSERT INTO usuarios (nombre, apellido, nickname, pass, rol, celular, email, habilitado) values (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->execute([$nombreAgente, $apellidoAgente, $nickname, $contraseña, $rolAgente, $celularAgente, $emailAgente, 1]);

        echo '<script> alert("Usuario Agregado con éxito"); window.location = "../controladmin.php?page=usuario"; </script>';
    
};

if($_GET['page']=='zona'){
    if(!isset($_POST['zona']) or $_POST['zona']==' '){echo '<script> alert("El campo no debe estar vacío"); window.location = "../adminagregar.php=page=zona; </script>';};  
        
    // Variables de sección información //
        $zona = $_POST['zona'];
        $ciudad = $_POST['ciudad'];
    
        // IF para ver si cumple los requisitos //

            // Hago el insert en la DB //
            $query = $connect-> prepare ("INSERT INTO wp_zonas (nombre, habilitada, ciudad_id) values (?, ?, ?)");
            $query->execute([$zona, 1, $ciudad]);
    
            echo '<script> alert("Zona agregada con exito"); window.location = "../controladmin.php"; </script>';
        
    };

}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>