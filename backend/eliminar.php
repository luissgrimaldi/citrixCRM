<?php 
include 'connect.php';
include 'connect2.php';
include 'funciones.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){

    if($_GET['page']=='propiedad'){
        eliminarPropiedad($connect,$connect2);
    };

    if($_GET['page']=='consulta'){
        eliminarConsulta($connect);
    };
        
    if($_GET['page']=='usuario'){
        eliminarUsuario($connect,$connect2);
    };
    
    if($_GET['page']=='ciudad'){
        eliminarCiudad($connect,$connect2);           
    };
    
    if($_GET['page']=='zona'){
        eliminarZona($connect,$connect2); 
    };
        
    if($_GET['page']=='contacto'){
        eliminarContacto($connect); 
    };  

    if($_GET['page']=='documento'){
        eliminarDocumento($connect); 
    };      


}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>