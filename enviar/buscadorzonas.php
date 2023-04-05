<?php
include 'connect.php';

$campo = trim($_POST['buscadorZonas']);

$sentencia2 = $connect->prepare("SELECT * FROM `wp_zonas` WHERE trim(nombre) LIKE ? AND HABILITADA = 1 AND nombre !='' ") or die('query failed');
$sentencia2->execute([$campo . '%']);
 
$html = "";    

while($row = $sentencia2->fetch()){

    $html .= '<li onclick="agregarZonaSeleccionada('.$row["id"]. ", '".trim($row["nombre"])."'".')">'.trim($row["nombre"]).'</li>';

};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



 