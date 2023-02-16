<?php
include 'connect.php';

$campo = trim($_POST['buscadorpropiedad']);

$sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE `calle` LIKE ? OR `referencia_interna` LIKE ?") or die('query failed');
$sentencia->execute([$campo . '%', $campo . '%']);
 
$html = "";    

while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){

    $html .= '<li onclick="seleccionarPropiedad('.$row["id"]. ", '".trim($row["referencia_interna"])."'". ", '".trim($row["descripcion_corta"])."'". ", '".trim($row["calle"])."'". ", '".trim($row["altura"])."'".')">'.$row["calle"]." ".$row["referencia_interna"].'</li>';

};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



 