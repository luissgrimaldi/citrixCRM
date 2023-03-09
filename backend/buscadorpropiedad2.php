<?php
include 'connect.php';

$campo = trim($_POST['buscadorpropiedad2']);

$sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE `calle` LIKE ? OR `referencia_interna` LIKE ?") or die('query failed');
$sentencia->execute([$campo . '%', $campo . '%']);
 
$html = "";    

while($row = $sentencia->fetch()){
    $imgPropiedad = strval($row['foto_portada']);
    $imgPropiedad = str_replace('"', '', $imgPropiedad);;
    $imgPropiedad = str_replace("[", "", $imgPropiedad);
    $imgPropiedad = str_replace("]", "", $imgPropiedad);
    
    $html .= '<li onclick="seleccionarPropiedad2('.$row["id"]. ", '".trim($row["calle"])."'". ", '".trim($row["referencia_interna"])."'".')" class="header__form__ul__li"><img class="header__form__ul__li__img" src="https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__'.$imgPropiedad.'"><span>'.$row["calle"]." ".$row["referencia_interna"].'</span></li>';
};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>

