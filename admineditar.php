<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php if($_GET["page"]=='usuario'){
    if($rolAgente == 1 or $rolAgente == 3){?>
<?php                          
    $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE user_id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_usuarios = $sentencia->fetchAll();                         
    foreach($list_usuarios as $usuario){   
        $editarId = $_GET['id'];             
        $editarNickname = $usuario['nickname'];
        $editarNombreAgente = $usuario['nombre'];
        $editarApellidoAgente = $usuario['apellido'];
        $editarEmailAgente = $usuario['email'];
        $editarCelularAgente = $usuario['celular'];
        $editarRolAgente =  $usuario['rol'];
        $editarHabilitar = $usuario['habilitado'];               
        $editarSobreMi = $usuario['sobre_mi'];               
    }

    $sentencia2 = $connect->prepare("SELECT * FROM `roles` WHERE role_id= $editarRolAgente") or die('query failed');
    $sentencia2->execute();
    $list_roles = $sentencia2->fetchAll();                         
    foreach($list_roles as $rol){
        $editarRolAgenteNombre = ucfirst($rol['name']);
    }

?>     


        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-user main__h1--emoji"></i><h1 class="main__h1">Editar usuario</h1></div>
                </div>
                <div class="main__decoration"></div>
                    <div class="main__perfil">                   
                        <form class="main__perfil__container" method="POST" action="backend/editar.php?page=usuario&id=<?php echo $editarId?>" enctype="multipart/form-data">
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Username</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="nickname" class="perfil__bloque__content__username" value="<?php echo $editarNickname?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Nombre</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="nombre" class="perfil__bloque__content__nombre" value="<?php echo $editarNombreAgente?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Apellido</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="apellido" class="perfil__bloque__content__apellido" value="<?php echo $editarApellidoAgente?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Email</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="email" class="perfil__bloque__content__email" value="<?php echo $editarEmailAgente?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Telefono celular</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="celular" class="perfil__bloque__content__telefono-celular" value="<?php echo $editarCelularAgente?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Contraseña</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="contrasenia" class="perfil__bloque__content__nombre">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Repetir Contraseña</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="repetircontrasenia" class="perfil__bloque__content__apellido">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Sobre mi</span>
                                <div class="perfil__bloque__content">
                                    <textarea class="form__textarea content__textarea" name="sobre_mi" id=""><?php echo $editarSobreMi;?></textarea>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label--foto">Foto de perfil</span>
                                <div class="perfil__bloque__content--foto">
                                    <input type="file" name="foto" class="perfil__bloque__content__foto">
                                </div>
                            </div>
                            <div class="perfil__bloque"> 
                                <span class="perfil__bloque__fake-label">Rol</span>
                                <div class="perfil__bloque__content">
                                    <select class="perfil__select content__select" name="rol" id="">                                        
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `roles` WHERE role_id = '".$editarRolAgente."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_roles = $sentencia->fetchAll();                         
                                        foreach($list_roles as $rol){
                                        $nombre = ucfirst($rol['name']);?>
                                        <option value="<?php echo $editarRolAgente;?>"><?php echo $nombre;?></option>
                                    <?php };?>                              
                                    <option value="0"></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `roles`") or die('query failed');
                                        $sentencia->execute();
                                        $list_roles = $sentencia->fetchAll();                         
                                        foreach($list_roles as $rol){
                                        $idRol = $rol['role_id'];
                                        $rolNombre = ucfirst($rol['name']);
                                        if($editarRolAgente != $idRol){?>
                                            <option value="<?php echo $idRol?>"><?php echo $rolNombre?></option>
                                    <?php };};?>
                                    </select>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <label class="perfil__bloque__label">Habilitado</span>
                                <div class="perfil__bloque__content--submit">
                                    <input class="form__checkbox content__checkbox" type="checkbox" name="habilitar" value="1" <?php if($editarHabilitar==1){ echo 'checked="check"';}?>>     
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--submit">
                                    <input type="submit" class="perfil__bloque__content__submit" name="submit"  value="Guardar cambios">                            
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" href="controladmin.php?page=usuario">Volver al control de usuarios</a>
                            </div>
                    </div>
                        </div>
                    </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>



<?php if($_GET["page"]=='ciudad'){
    if($rolAgente == 1 or $rolAgente == 3){?>

<?php                          
    $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_usuarios = $sentencia->fetchAll();                         
    foreach($list_usuarios as $usuario){  
        $editarId = $_GET['id'];               
        $editarNombreCiudad = $usuario['nombre'];
        $editarHabilitar = $usuario['habilitado'];               
    }
?>   


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--/* Main */-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<main class="main" id="main">
    <div class="main__container">
        <div class="main__container__top">
            <div class="main__title"><i class="fa-solid fa-city main__h1--emoji"></i><h1 class="main__h1">Editar ciudad</h1></div>
        </div>
        <div class="main__decoration"></div>
            <div class="main__perfil">                   
                <form class="main__perfil__container" method="POST" action="backend/editar.php?page=ciudad&id=<?Php echo $editarId;?>">
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Ciudad</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="ciudad" class="perfil__bloque__content__username" value="<?php echo $editarNombreCiudad?>">
                        </div>                 
                    </div>                                                                 
                    <div class="perfil__bloque">
                        <label class="perfil__bloque__label">Habilitada</span>
                        <div class="perfil__bloque__content--submit">
                            <input class="form__checkbox content__checkbox" type="checkbox" name="habilitar" value="1" <?php if($editarHabilitar==1){ echo 'checked="check"';}?>>                          
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <div class="perfil__bloque__content--submit">
                            <input type="submit" class="perfil__bloque__content__submit" name="submit"  value="Guardar cambios">                         
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <div class="perfil__bloque__content--notsubmit">
                            <a class="perfil__bloque__content__notsubmit" href="controladmin.php?page=ciudad">Volver al control de ciudades</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>  
</main>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--/* End Main */-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>


<?php if($_GET["page"]=='zona'){
    if($rolAgente == 1 or $rolAgente == 3){?>

<?php                          
    $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_zonas = $sentencia->fetchAll();                         
    foreach($list_zonas as $zona){        
        $editarId = $_GET['id'];         
        $editarNombreZona = $zona['nombre'];
        $editarHabilitar = $zona['habilitada'];   
        $editarCiudadId = $zona ['ciudad_id'];         
    }

    $sentencia2 = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE id= $editarCiudadId") or die('query failed');
    $sentencia2->execute();
    $list_ciudades = $sentencia2->fetchAll();                         
    foreach($list_ciudades as $ciudad){                
        $editarCiudadNombe = $ciudad['nombre'];        
    }
?>  


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--/* Main */-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<main class="main" id="main">
    <div class="main__container">
        <div class="main__container__top">
            <div class="main__title"><i class="fa-solid fa-road main__h1--emoji"></i><h1 class="main__h1">Editar zona</h1></div>
        </div>
        <div class="main__decoration"></div>
            <div class="main__perfil">                   
                <form class="main__perfil__container" method="POST" action="backend/editar.php?page=zona&id=<?php echo $editarId;?>">
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Zona</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="zona" class="perfil__bloque__content__username" value="<?php echo $editarNombreZona?>">
                        </div>                 
                    </div>
                    <div class="perfil__bloque"> 
                        <span class="perfil__bloque__fake-label">Ciudad a la que pertenece</span>
                        <div class="perfil__bloque__content">
                            <select class="perfil__select content__select" name="ciudad" id="">                                             


                            <?php
                                $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE id = '".$editarCiudadId."'") or die('query failed');
                                $sentencia->execute();
                                $list_ciudades = $sentencia->fetchAll();                         
                                foreach($list_ciudades as $ciudad){
                                $nombre = ucfirst($ciudad['nombre']);?>
                                <option value="<?php echo $editarCiudadId;?>"><?php echo $nombre;?></option>
                                <?php };?>                              
                                <option value="0"></option>
                                <?php                          
                                    $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades`") or die('query failed');
                                    $sentencia->execute();
                                    $list_ciudades = $sentencia->fetchAll();                         
                                    foreach($list_ciudades as $ciudad){
                                    $idCiudad = $ciudad['id'];
                                    $ciudadNombre = ucfirst($ciudad['nombre']);
                                    if($editarCiudadId != $idCiudad){?>
                                        <option value="<?php echo $idCiudad?>"><?php echo $ciudadNombre?></option>
                            <?php };};?>      
                            </select>
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <label class="perfil__bloque__label">Habilitada</span>
                        <div class="perfil__bloque__content--submit">
                            <input class="form__checkbox content__checkbox" type="checkbox" name="habilitar" value="1" <?php if($editarHabilitar==1){ echo 'checked="check"';}?>>                          
                        </div>
                    </div>                                                                    
                    <div class="perfil__bloque">
                        <div class="perfil__bloque__content--submit">
                            <input type="submit" class="perfil__bloque__content__submit" name="submit" value="Guardar cambios">                            
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <div class="perfil__bloque__content--notsubmit">
                            <a class="perfil__bloque__content__notsubmit" href="controladmin.php?page=zona">Volver al control de zonas</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>  
</main>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--/* End Main */-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>

<?php if($_GET["page"]=='contacto'){

    $sentencia = $connect->prepare("SELECT * FROM `wp_contactos` WHERE id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_contactos = $sentencia->fetchAll();                         
    foreach($list_contactos as $contacto){   
        $editarId = $_GET['id'];             
        $editarNombre = $contacto['nombre'];
        $editarApellido = $contacto['apellido'];
        $editarTelefono = $contacto['telefono'];
        $editarEmail = $contacto['email'];
        $editarDireccion = $contacto['direccion'];
        $editarNoEmails =  $contacto['no_emails'];
        $editarObservaciones = $contacto['observaciones'];               
        $editarConyuge = $contacto['conyuge'];               
        $editarTelefonoConyuge = $contacto['conyuge_tel'];               
        $editarEmailConyuge = $contacto['conyuge_email'];               
    }

?>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--/* Main */-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<main class="main" id="main">
    <div class="main__container">
        <div class="main__container__top">
            <div class="main__title"><i class="fa-solid fa-address-book main__h1--emoji"></i><h1 class="main__h1">Editar contacto</h1></div>
        </div>
        <div class="main__decoration"></div>
            <div class="main__perfil">                   
                <form class="main__perfil__container" method="POST" action="backend/editar.php?page=contacto&id=<?php echo $editarId?>">
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Nombre</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="nombre" class="perfil__bloque__content__nombre" required value="<?php echo $editarNombre;?>">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Apellido</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="apellido" class="perfil__bloque__content__apellido" value="<?php echo $editarApellido;?>">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Telefono</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="telefono" class="perfil__bloque__content__telefono-celular" value="<?php echo $editarTelefono;?>">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Email</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="email" class="perfil__bloque__content__email" value="<?php echo $editarEmail;?>">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Direccion</span>
                        <div class="perfil__bloque__content">
                            <input type="direccion" name="direccion" class="perfil__bloque__content__nombre" value="<?php echo $editarDireccion;?>">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Observaciones</span>
                        <div class="perfil__bloque__content--observaciones">
                            <textarea class="form__textarea content__textarea" name="observaciones" id=""><?php echo $editarObservaciones;?></textarea>
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Conyuge</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="conyuge" class="perfil__bloque__content__nombre" value="<?php echo $editarConyuge;?>">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Telefono conyuge</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="telefono_conyuge" class="perfil__bloque__content__nombre" value="<?php echo $editarTelefonoConyuge;?>">
                        </div>
                    </div>                  
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Email conyuge</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="email_conyuge" class="perfil__bloque__content__nombre" value="<?php echo $editarEmailConyuge;?>">
                        </div>
                    </div>               
                    <div class="perfil__bloque">
                        <label class="perfil__bloque__label">Enviar emails</span>
                        <div class="perfil__bloque__content--submit">
                            <input class="form__checkbox content__checkbox" type="checkbox" name="no_emails" <?php if($editarNoEmails == 0){echo 'checked=check';};?> value="0">                          
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <div class="perfil__bloque__content--submit">
                            <input type="submit" class="perfil__bloque__content__submit" name="submit"  value="Guardar cambios">                            
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <div class="perfil__bloque__content--notsubmit">
                        <a class="perfil__bloque__content__notsubmit" href="controladmin.php?page=contacto">Volver al control de contactos</a>
                    </div>
            </div>
                </div>
            </div>
    </div>  
</main>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--/* End Main */-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php };?>
    </div>
    <script src="index.js"></script>
</body>
</html>