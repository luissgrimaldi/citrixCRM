<?php 
if(!isset($_SESSION)) {session_start();};
include 'backend/connect.php';
if(isset($_SESSION['usuario'])){
    $idAgente= $_SESSION['usuario'];
    $datos= $connect-> prepare ("SELECT * FROM usuarios WHERE user_id= ?");
    $datos->execute([$idAgente]);
    $agente = $datos->fetch();
    $nickname = $agente['nickname'];
    $nombreAgente = $agente['nombre'];
    $apellidoAgente = $agente['apellido'];
    $rolAgente = $agente['rol'];
    $fotoAgente = $agente['foto'];
    $sucursalId = $agente['sucursal_id'];
    $celularAgente = $agente['celular'];
    $emailAgente = $agente['email'];
    $sobreMiAgente = $agente['sobre_mi'];
    define('citrixCRMversion', 'CitrixCRMv-3');
    }else{echo '<script> alert("Por favor inicie sesión"); window.location = "login.php"; </script>'; session_destroy(); die();}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>citrixCRM</title>
    <link rel="stylesheet" href="reset.css?<?php echo citrixCRMversion;?>">
    <link rel="stylesheet" href="global.css?<?php echo citrixCRMversion;?>">
    <link rel="stylesheet" href="<?php echo (basename($_SERVER['PHP_SELF'], ".php"))?>.css?<?php echo citrixCRMversion;?>">
    <script src="https://kit.fontawesome.com/53d0376852.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/5azxqpycehfxf9dacvhqmvviotrflw6k4ph59e5tlb79x8pd/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
</head>
<body>
    <div class="body__container">
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Header */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <header class="header">
            <div class="header__container">
                <div class="header__logo">
                    <h2>CITRIXcrm</h2>     
                </div>
                <form action="" method="POST" class="header__form" autocomplete="off">
                    <input class="header__form__input header__search" name="campo" placeholder="&#XF002" id="campo" type="text">
                    <ul class="header__form__ul" id="lista"></ul>
                </form>           

                <button class="header__plus" id="header__plus">
                    <i class="fa-solid fa-plus"></i>
                </button>
                <nav class="header__nav" id="header__nav">
                    <ul class="header__ul">
                        <?php if($fotoAgente != NULL){?>
                        <li class="header__li header__li-user header__li-user--foto ">                           
                        <img class="header__li__foto" src="https://projectandbrokers.com/wp-content/uploads/asesores/<?php echo $fotoAgente?>" alt="">
                        <?php ;}else{?>
                            <li class="header__li header__li-user ">
                            <span class="header__span"><i class="fa-solid fa-user"></i></span>
                        <?php ;}?>
                            <ul class="header__li-user__ul <?php if($fotoAgente != NULL){echo 'header__li-user__ul--foto';}?> header__li-user__ul--toggle user">
                                <li class="user__li"><span class="user__span" href="profile.php"><?php echo $nombreAgente.' '.$apellidoAgente?></span></li>
                                <li class="user__li"><a class="user__a" href="perfil.php">Ver mi perfil</a></li>
                                <li class="user__li"><a class="user__a" onclick="return confirm('Seguro que quieres cerrar sesión?');" href="backend/logout.php">Cerrar sesión</a></li>
                            </ul>
                        </li>
                        <?php                     
                        $sentencia = $connect->prepare("SELECT * FROM `wp_notificaciones` WHERE user_id=$idAgente AND seen = 0") or die('query failed');
                        $sentencia->execute();
                        $cantNotificaciones = $sentencia->rowCount();?>
                        <li class="header__li"><a href="notificaciones.php" id="notificacionesCampana" class="header__a <?php if($cantNotificaciones>0){echo 'header__a--notificacion';}?>"><i class="fa-solid fa-bell"></i><span class="notificacion__numero" style="display:<?php if($cantNotificaciones>0){ echo 'block';}else{echo 'none';}?>"><?php if($cantNotificaciones<100){echo $cantNotificaciones;}else{echo '99';}?></span></a></li>
                        <li class="header__li"><a href="" class="header__a"><i class="fa-solid fa-earth-americas"></i></a></li>
                    </ul>    
                </nav>
            </div>
            
        </header>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Header */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
