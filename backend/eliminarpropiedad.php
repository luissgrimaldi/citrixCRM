<?php
include 'connect.php';

$id = $_GET['id'];
    
$query = $connect-> prepare ("DELETE FROM wp_propiedades WHERE id=?");
$query->execute([$id]);

?>