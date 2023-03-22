<?php 
include 'connect.php';
include 'connect2.php';
include 'funciones.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    if(isset($_POST['submit'])){

        if($_GET['page']=='propiedad'){
            editarPropiedad($connect,$connect2);
        };

        if($_GET['page']=='consulta'){
            editarConsulta($connect);
        };

        if($_GET['page']=='evento'){
            editarEvento($connect);
        };
        
        if($_GET['page']=='usuario'){
            editarUsuario($connect);
        };
    
        if($_GET['page']=='ciudad'){
            editarCiudad($connect);           
        };
    
        if($_GET['page']=='zona'){
            editarZona($connect); 
        };
        
        if($_GET['page']=='contacto'){
            editarContacto($connect); 
        };
        
        if($_GET['page']=='perfilagenda'){
            editarPerfilAgenda($connect); 
        };
        
        if($_GET['page']=='perfilcontrasena'){
            editarPerfilContrasena($connect); 
        };
        
        if($_GET['page']=='perfilinformacion'){
            editarPerfilInformacion($connect); 
        };

    }else{
        echo '<script> alert("Ha ocurrido un error"); window.location = "../index.php"; </script>';
    }

}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>