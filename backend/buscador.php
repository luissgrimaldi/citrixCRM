<?php
include 'connect.php';

$campo = trim($_POST['campo']);

$sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE `calle` LIKE ? OR `referencia_interna` LIKE ?") or die('query failed');
$sentencia->execute([$campo . '%', $campo . '%']);
$sentencia2 = $connect->prepare("SELECT * FROM `wp_contactos` WHERE CONCAT(trim(nombre), ' ', trim(apellido)) LIKE ?") or die('query failed');
$sentencia2->execute([$campo . '%']);
$sentencia3 = $connect->prepare("SELECT * FROM `wp_consultas` WHERE id LIKE ? OR CONCAT(trim(nombre), ' ', trim(apellido)) LIKE ?") or die('query failed');
$sentencia3->execute([$campo . '%', $campo . '%']);

$html = "";
$cuenta = $sentencia->rowCount();
if ($cuenta > 0){
    $html .= '<li class="header__form__ul__li header__form__ul__li--titulo">Propiedades</li>';
    while($row = $sentencia->fetch()){    
        $imgPropiedad = strval($row['foto_portada']);
        $imgPropiedad = str_replace('"', '', $imgPropiedad);;
        $imgPropiedad = str_replace("[", "", $imgPropiedad);
        $imgPropiedad = str_replace("]", "", $imgPropiedad);
    
        $html .= '<li class="header__form__ul__li" onclick="window.location.href=\'propiedadesinfo.php?ref='.$row["referencia_interna"].'\'"><img class="header__form__ul__li__img" src="https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__'.$imgPropiedad.'"><a href="propiedadesinfo.php?ref='.$row["referencia_interna"].'">'.$row["calle"]." ".$row["referencia_interna"].'</a></li>';
    	$html .= "<script>
document.querySelector('.header__form__ul__li').addEventListener('click', function() {
  var link = this.querySelector('a').getAttribute('href');
  window.location.href = link;
console.log(link);
});
</script>";
    };      
}               

$cuenta = $sentencia2->rowCount();
if ($cuenta > 0){
    $html .= '<li class="header__form__ul__li header__form__ul__li--titulo">Contactos</li>';
    while($row = $sentencia2->fetch()){
        $html .= '<li class="header__form__ul__li"><a href="contactosinfo.php?contacto='.$row["id"].'">'.$row["nombre"]." ".$row["apellido"].'</a></li>';
    };      
}

$cuenta = $sentencia3->rowCount();
if ($cuenta > 0){
    $html .= '<li class="header__form__ul__li header__form__ul__li--titulo">Consultas</li>';
    while($row = $sentencia3->fetch()){
        $html .= '<li class="header__form__ul__li consulta__li"><a href="consultasinfo.php?consulta='.$row["id"].'"><i class="fa-solid fa-image-portrait consulta--user-img"></i><div><span>'.trim($row["id"]).'</span><span>'.trim($row["nombre"])." ".trim($row["apellido"]).'</span></div></a></li>';

    };      
}


echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>



  
