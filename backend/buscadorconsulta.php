<?php
include 'connect.php';

$campo = trim($_POST['buscadorconsulta']);

$sentencia2 = $connect->prepare("SELECT * FROM `wp_consultas` WHERE id LIKE ? OR CONCAT(trim(nombre), ' ', trim(apellido)) LIKE ?") or die('query failed');
$sentencia2->execute([$campo . '%', $campo . '%']);
 
$html = "";    

while($row = $sentencia2->fetch()){

    $html .= '<li onclick="seleccionarConsulta('.$row["id"]. ", '".trim($row["nombre"])."'". ", '".trim($row["apellido"])."'".')"><i class="fa-solid fa-image-portrait consulta--user-img"></i><div><span>'.trim($row["id"]).'</span><span>'.trim($row["nombre"])." ".trim($row["apellido"]).'</span></div></li>';

};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>

