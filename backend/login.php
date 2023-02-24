<?php 
include 'connect.php';
    $nickname = $_POST['nickname'];
    $password = $_POST['pass'];
    $password = hash('SHA512', $password);

    
    $validate_login = $connect-> prepare ("SELECT * FROM usuarios WHERE nickname = ? and pass = ? and habilitado = 1");
    $validate_login->execute([$nickname, $password]);
    $row = $validate_login->fetch();

    if($row){ 
        session_start();
        $_SESSION['usuario'] = $row['user_id'];
        header("location: ../index.php");
        exit;
    }
    else{
        echo '
            <script>
            alert("Usuario y/o Contraseña incorrecto/s, por favor verifique los datos");
            window.location = "../login.php";
            </script>
        ';
        exit;
    }
?>

