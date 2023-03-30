<?php
include 'connect.php';
$contraseña = 123;
$contraseña = hash('SHA512', $contraseña);
$query = $connect-> prepare ("UPDATE usuarios SET  pass= ?");
$query->execute([$contraseña]);
?>

