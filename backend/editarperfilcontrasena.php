<?php 
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){

    // Variables generales de la sesión //
    $idAgente= $_SESSION['usuario'];
    $datos= $connect-> prepare ("SELECT * FROM usuarios WHERE user_id = ?");
    $datos->execute([$idAgente]);
    $agente = $datos->fetch(PDO::FETCH_ASSOC);
    $nickname = $agente['nickname'];
    $nombreAgente = $agente['nombre'];
    $apellidoAgente = $agente['apellido'];
    $rolAgente = $agente['rol'];
    $fotoAgente = $agente['foto'];
    $sucursalId = $agente['sucursal_id'];
    $celularAgente = $agente['celular'];
    $emailAgente = $agente['email'];
    $sobreMiAgente = $agente['sobre_mi'];

    // Variables de sección Contraseña //
    $query = $connect-> prepare ("SELECT * FROM usuarios WHERE user_id = ?");
    $query->execute([$idAgente]);
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $password = $row['pass'];
    $passwordActual = $_POST['passwordActual'];
    $passwordActual = hash('SHA512', $passwordActual);
    $passwordNew = $_POST['passwordNew'];
    $passwordNewRep = $_POST['passwordNewRep']; 

    // IF para ver si cumple los requisitos //
    if($passwordActual==$password AND $passwordNew == $passwordNewRep){
        
        // Hasheo la contraseña actual //
        $passwordNew = hash('SHA512', $passwordNew);

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE usuarios SET pass = ? WHERE user_id = $idAgente");
        $query->execute([$passwordNew]);
        echo '<script> alert("La contraseña se ha actualizado con éxito"); window.location = "../login.php";</script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al actualizar la contraseña"); window.location = "../editarperfil.php?pagina=contrasena";</script>';
    }
    





}else{
    echo ' <script>
    alert("Error al encontrar la pagina");
    window.location = "../login.php";
    </script>';
}; 
?>
