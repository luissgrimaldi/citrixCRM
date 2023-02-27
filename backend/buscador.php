<?php
include 'connect.php';

$campo = trim($_POST['campo']);

$sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE `calle` LIKE ? OR `referencia_interna` LIKE ?") or die('query failed');
$sentencia->execute([$campo . '%', $campo . '%']);
$sentencia2 = $connect->prepare("SELECT * FROM `wp_contactos` WHERE CONCAT(trim(nombre), ' ', trim(apellido)) LIKE ?") or die('query failed');
$sentencia2->execute([$campo . '%']);

$html = "";                   
while($row = $sentencia->fetch()){

    $imgPropiedad = strval($row['foto_portada']);
    $imgPropiedad = str_replace('"', '', $imgPropiedad);;
    $imgPropiedad = str_replace("[", "", $imgPropiedad);
    $imgPropiedad = str_replace("]", "", $imgPropiedad);

    $html .= '<li class="header__form__ul__li"><img class="header__form__ul__li__img" src="https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__'.$imgPropiedad.'"><a href="editarpropiedad.php?ref='.$row["referencia_interna"].'">'.$row["calle"]." ".$row["referencia_interna"].'</a></li>';

};      
                 
while($row = $sentencia2->fetch()){

    $html .= '<li class="header__form__ul__li"><a href="contactosinfo.php?contacto='.$row["id"].'">'.$row["nombre"]." ".$row["apellido"].'</a></li>';

};      
 
echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



  