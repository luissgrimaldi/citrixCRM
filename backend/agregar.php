<?php 
include 'connect.php';
include 'funciones.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    if(isset($_POST['submit'])){

        if($_GET['page']=='propiedad'){
            agregarPropiedad($connect);
        };

        if($_GET['page']=='consulta'){
            agregarConsulta($connect);
        };

        if($_GET['page']=='evento'){
            agregarEvento($connect);
        };
        
        if($_GET['page']=='usuario'){
            agregarUsuario($connect);
        };
    
        if($_GET['page']=='ciudad'){
            agregarCiudad($connect);           
        };
    
        if($_GET['page']=='zona'){
            agregarZona($connect); 
        };
    
        if($_GET['page']=='contacto'){
            agregarContacto($connect); 
        };

        if($_GET['page']=='perfilagenda'){
            agregarPerfilAgenda($connect); 
        };

    }else{
        echo '<script> alert("Ha ocurrido un error"); window.location = "../index.php"; </script>';
    }

}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>