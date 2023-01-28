<?php
include 'backend/connect.php'

$campo = $_POST["campo"];

$sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE `calle` LIKE ?") or die('query failed');
$sentencia->execute([$buscador . '%']);

$html = "";                   
while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){

    $html .= "<li>".$row['calle']." ".$row['referencia_interna']."</li>";

};      

echo json_encode($html, JSON_UNESCAPED_UNICODE);


?>



