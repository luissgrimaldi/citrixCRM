<?php
include 'connect.php';

$campo = trim($_POST['buscadorpropiedad']);

$sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE `calle` LIKE ? OR `referencia_interna` LIKE ?") or die('query failed');
$sentencia->execute([$campo . '%', $campo . '%']);
 
$html = "";    

while($row = $sentencia->fetch(PDO::FETCH_ASSOC)){

    $html .= '<li onclick="seleccionarContacto2('.$row["id"]. ", '".trim($row["nombre"])."'". ", '".trim($row["apellido"])."'". ", '".trim($row["email"])."'". ", '".trim($row["telefono"])."'".')">'.trim($row["nombre"])." ".trim($row["apellido"]).'</li>';

};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



 