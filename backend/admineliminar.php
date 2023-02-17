<?php 
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){

if($_GET['page']=='usuario'){
    $id = $_GET['id'];
    
    $query = $connect-> prepare ("DELETE FROM usuarios WHERE user_id=?");
    $query->execute([$id]);
    echo '<script> alert("Usuario eliminado con éxito"); window.location = "../controladmin.php?page=usuario"; </script>';
        
};

if($_GET['page']=='ciudad'){
    $id = $_GET['id'];
    
    $query = $connect-> prepare ("DELETE FROM wp_ciudades WHERE id=?");
    $query->execute([$id]);
    echo '<script> alert("Ciudad eliminada con éxito"); window.location = "../controladmin.php?page=ciudad"; </script>';
        
};

if($_GET['page']=='zona'){
    $id = $_GET['id'];
    
    $query = $connect-> prepare ("DELETE FROM wp_zonas WHERE id=?");
    $query->execute([$id]);
    echo '<script> alert("Zona eliminada con éxito"); window.location = "../controladmin.php?page=zona"; </script>';
};

}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>
