<?php session_start();
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
    $params["path"], $params["domain"],
    $params["secure"], $params["httponly"]
    );
}
session_destroy(); 
define('citrixCRMversion', 'CitrixCRMv-2');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="reset.css?<?php echo citrixCRMversion;?>">
    <link rel="stylesheet" href="login.css?<?php echo citrixCRMversion;?>">
    <script src="https://kit.fontawesome.com/53d0376852.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="body__container">
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Login */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="login">
            <h1 class="login__title">citrixCRM</h1>
            <div class="login__container">
                <div class="login__bloque">
                    <div class="login__frase frase">
                        <span class="frase__span frase__span--1">Cada día es</span>
                        <span class="frase__span frase__span--2">un nuevo Comienzo.</span>
                    </div>
                    <form autocomplete="off" class="login__form" method="POST" action="backend/login.php">
                        <div class="login__form__bloque">
                            <label class="login__form__label" for="">Usuario</label>
                            <input class="login__form__input" name="nickname" type="text" placeholder="Usuario">
                        </div>
                        <div class="login__form__bloque">
                            <label class="login__form__label" for="">Contaseña</label>
                            <input class="login__form__input" name ="pass" type="password" placeholder="Contraseña">
                        </div>
                        <div class="login__form__bloque bloque--3">
                            <input class="login__form__input login__form__input--submit" type="submit" value="Iniciar Sesión">
                        </div>
                    </form>
                </div>
                <div class="login__bloque login__bloque--img">
                    <img class="login__img" src="loginimg.svg" alt="">
                </div>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Login */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js?<?php echo citrixCRMversion;?>"></script>
</body>
</html>
