<?php 
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){

if($_GET['page']=='usuario'){
    $id = $_GET['id'];
    
    $query = $connect-> prepare ("DELETE FROM usuarios WHERE user_id=?");
    $query->execute([$id]);
    
        
};

if($_GET['page']=='ciudad'){
    $id = $_GET['id'];
    
    $query = $connect-> prepare ("DELETE FROM wp_ciudades WHERE id=?");
    $query->execute([$id]);
   
        
};

if($_GET['page']=='zona'){
    $id = $_GET['id'];
    
    $query = $connect-> prepare ("DELETE FROM wp_zonas WHERE id=?");
    $query->execute([$id]);
    
};

}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>
