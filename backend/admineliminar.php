<?php 
include 'connect.php';

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


if($_GET['page']=='contacto'){
    $id = $_GET['id'];
    
    $query = $connect-> prepare ("DELETE FROM wp_contactos WHERE id=?");
    $query->execute([$id]);
    
};

?>
