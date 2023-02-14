<?php
include 'connect.php';

$campo = trim($_POST['campo']);

$sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE `calle` LIKE ? OR `referencia_interna` LIKE ?") or die('query failed');
$sentencia->execute([$campo . '%', $campo . '%']);
$sentencia2 = $connect->prepare("SELECT * FROM `wp_contactos` WHERE CONCAT(trim(nombre), ' ', trim(apellido)) LIKE ?") or die('query failed');
$sentencia2->execute([$campo . '%']);

$html = "";                   
while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){

    $html .= '<li><a href="editarpropiedad.php?ref='.$row["referencia_interna"].'">'.$row["calle"]." ".$row["referencia_interna"].'</a></li>';

};      
                 
while($row = $sentencia2->fetch(PDO::FETCH_ASSOC)){

    $html .= '<li>'.$row["nombre"]." ".$row["apellido"].'</li>';

};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



 