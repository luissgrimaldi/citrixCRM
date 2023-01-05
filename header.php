<?php include 'backend/connect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="<?php echo basename($_SERVER['PHP_SELF'], ".php")?>.css">
    <script src="https://kit.fontawesome.com/53d0376852.js" crossorigin="anonymous"></script>
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
                <form action="" class="header__form">
                    <input class="header__search" placeholder="&#XF002" type="text">
                </form>

                <button class="header__plus" id="header__plus">
                    <i class="fa-solid fa-plus"></i>
                </button>
                <nav class="header__nav" id="header__nav">
                    <ul class="header__ul">
                        <li class="header__li header__li-user ">
                            <span class="header__span"><i class="fa-solid fa-user"></i></span>
                            <ul class="header__li-user__ul header__li-user__ul--toggle user">
                                <li class="user__li"><span class="user__span" href="profile.html">Fulanito Johnson</span></li>
                                <li class="user__li"><a class="user__a" href="perfil.html">Ver mi perfil</a></li>
                                <li class="user__li"><a class="user__a" href="login.html">Cerrar sesión</a></li>
                            </ul>
                        </li>
                        <li class="header__li"><a href="" class="header__a"><i class="fa-solid fa-bell"></i></a></li>
                        <li class="header__li"><a href="" class="header__a"><i class="fa-solid fa-earth-americas"></i></a></li>
                    </ul>    
                </nav>
            </div>
            
        </header>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Header */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->