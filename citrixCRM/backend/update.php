<?php 
include 'connect.php';
    $nickname = $_POST['nickname'];
    $password = $_POST['pass'];
    $password = hash('SHA512', $password);

    
    $validate_login = $connect-> prepare ("UPDATE usuarios SET pass = ?");
    $validate_login->execute([$password]);
    
?>
