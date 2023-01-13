<?php
    include 'connect.php';

    $nombreAgente = $_POST['nombre'];
    $apellidoAgente = $_POST['apellido'];
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];
    $password = hash('SHA512', $password);
    $habilitado = 1;
    $rolAgente = $_POST['rol'];
    $fotoAgente = $_POST['foto'];
    $sucursalId = $_POST['sucursalId'];
    $celularAgente = $_POST['celular'];
    $emailAgente = $_POST['email'];
    

    
    $registrar = $connect-> prepare ("INSERT INTO usuarios (nombre, apellido , nickname, pass, habilitado, rol, foto, sucursal_id, celular, email) VALUES ($nombreAgente, $apellidoAgente, $nickname, $password, $habilitado, $rolAgente, $fotoAgente, $sucursalId, $celularAgente, $emailAgente)");
    $registrar->execute();

    if ($registrar->execute()){
        echo '
            <script>
            alert("Usuario creado");
            window.location = "../registAdmin";
            </script>
        ';
    }else{
         echo '
            <script>
            alert("Ha ocurrido un error");
            window.location = "../login";
            </script>
        ';
    }

?>