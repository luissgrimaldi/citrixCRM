<?php
include 'connect.php';

$campo = trim($_POST['buscadorcontactos']);

$sentencia2 = $connect->prepare("SELECT * FROM `wp_contactos` WHERE CONCAT(trim(nombre), ' ', trim(apellido)) LIKE ?") or die('query failed');
$sentencia2->execute([$campo . '%']);
 
$html = "";    

while($row = $sentencia2->fetch(PDO::FETCH_ASSOC)){

    $html .= '<li onclick="seleccionarContacto('.$row["id"]. ", '".trim($row["nombre"])." ".trim($row["apellido"])."'".')">'.trim($row["nombre"])." ".trim($row["apellido"]).'</li>';

};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



 