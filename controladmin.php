<?php include 'header.php' ?>
<?php if($rolAgente == 1 or $rolAgente == 3){if (!$_GET){header('Location:controladmin.php?page=usuario');};}else{if (!$_GET){header('Location:controladmin.php?page=contacto');}}?>
<?php include 'sidebar.php' ?>
<?php if ($_GET['page']  == 'usuario'){
    if($rolAgente == 1 or $rolAgente == 3){?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-user main__h1--emoji"></i><h1 class="main__h1">Usuarios</h1></div>
                    <div class="main__buttons">
                    <?php if($rolAgente == 1 or $rolAgente == 3){?>
                        <a class="main__buttons__button <?php if($_GET['page']=='usuario'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=usuario">Usuarios</a>
                        <a class="main__buttons__button <?php if($_GET['page']=='ciudad'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=ciudad">Ciudades</a>
                        <a class="main__buttons__button <?php if($_GET['page']=='zona'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=zona">Zonas</a>
                    <?php ;}?>
                        <a class="main__buttons__button <?php if($_GET['page']=='contacto'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=contacto">Contactos</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="menu__main__buttons">
                    <div class="main__buttons">
                        <a class="main__buttons__button" href="adminagregar.php?page=usuario">Agregar usuario</a>
                    </div>
                </div>
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php           
                                $sentencia = $connect->prepare("SELECT us.user_id, us.nombre, us.apellido, us.nickname, us.pass, us.habilitado, us.rol, us.foto, us.celular, us.email, 
                                rol.role_id, rol.name,
                                us.user_id as us_user_id, us.nombre as us_nombre, us.apellido as us_apellido, us.nickname as us_nickname, us.pass as us_pass, us.habilitado as us_habilitado, us.rol as us_rol, us.foto as us_foto, us.celular as us_celular, us.email as us_email,
                                rol.role_id as rol_role_id, rol.name as rol_name                          
                                FROM usuarios us 
                                LEFT JOIN roles rol ON  us.rol = rol.role_id
                                ORDER BY us_user_id DESC") or die('query failed');
                                $sentencia->execute();
                                $list_usuarios = $sentencia->fetchAll();
                                foreach($list_usuarios as $usuario){
                                    $id = $usuario['us_user_id'];                                                             
                                    $nombre = $usuario['us_nombre'];                                                             
                                    $apellido = $usuario['us_apellido'];                                                             
                                    $celular = $usuario['us_celular'];                                                             
                                    $email = $usuario['us_email'];                                                             
                                    $rol = $usuario['rol_role_id'];                                                             
                                    $rolNombre = ucfirst($usuario['rol_name']);                                                             
                                ?> 
                                <li class="propiedades__li" id="li<?php echo $id?>">
                                    <div class="propiedades__nombre-detalles-precio">
                                        <span class="propiedades__nombre"><?php echo $nombre.' '.$apellido.' ('.$rolNombre.')';?></span>
                                        <span class="propiedades__detalles"><?php echo '('.$email.' -'.$celular. ') '?></span>
                                    </div>            
                                    <div class="propiedades__edit-hide">
                                        <a href="admineditar.php?page=usuario&id=<?php echo $id?>"><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                        <i class="propiedades__accion fa-solid fa-trash" onclick="if(confirm('¿Seguro que quieres eliminar este usuario?')) delUser(<?php echo $id?>)"></i>
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>     
                    </div>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>

<?php if ($_GET['page']  == 'ciudad'){
    if($rolAgente == 1 or $rolAgente == 3){?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-city main__h1--emoji"></i><h1 class="main__h1">Ciudades</h1></div>
                    <div class="main__buttons">
                    <?php if($rolAgente == 1 or $rolAgente == 3){?>
                        <a class="main__buttons__button <?php if($_GET['page']=='usuario'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=usuario">Usuarios</a>
                        <a class="main__buttons__button <?php if($_GET['page']=='ciudad'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=ciudad">Ciudades</a>
                        <a class="main__buttons__button <?php if($_GET['page']=='zona'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=zona">Zonas</a>
                    <?php ;}?>
                        <a class="main__buttons__button <?php if($_GET['page']=='contacto'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=contacto">Contactos</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="menu__main__buttons">
                    <div class="main__buttons">
                        <a class="main__buttons__button" href="adminagregar.php?page=ciudad">Agregar ciudad</a>
                    </div>
                </div>
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php           
                                $sentencia = $connect->prepare("SELECT * from wp_ciudades ORDER BY id DESC") or die('query failed');
                                $sentencia->execute();
                                $list_ciudades = $sentencia->fetchAll();
                                foreach($list_ciudades as $ciudad){
                                    $id = $ciudad['id'];                                                             
                                    $nombre = $ciudad['nombre'];                                                             
                                    $habilitado = $ciudad['habilitado'];                                                                                                                        
                                ?> 
                                <li class="propiedades__li" id="li<?php echo $id?>">
                                    <div class="propiedades__nombre-detalles-precio">
                                        <span class="propiedades__nombre"><?php echo $nombre;?></span>
                                        <span class="ciudad__detalles"><?php if($habilitado == 1){echo ' Habilitada';}else{echo 'Deshabilitada';}?></span>
                                    </div>            
                                    <div class="propiedades__edit-hide">
                                        <a href="admineditar.php?page=ciudad&id=<?php echo $id?>"><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                        <i class="propiedades__accion fa-solid fa-trash" onclick="if(confirm('¿Seguro que quieres eliminar esta ciudad?')) delCiudad(<?php echo $id?>)"></i>
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>     
                    </div>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>
<?php if ($_GET['page']  == 'zona'){
    if($rolAgente == 1 or $rolAgente == 3){?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-road main__h1--emoji"></i><h1 class="main__h1">Zonas</h1></div>
                    <div class="main__buttons">
                    <?php if($rolAgente == 1 or $rolAgente == 3){?>
                        <a class="main__buttons__button <?php if($_GET['page']=='usuario'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=usuario">Usuarios</a>
                        <a class="main__buttons__button <?php if($_GET['page']=='ciudad'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=ciudad">Ciudades</a>
                        <a class="main__buttons__button <?php if($_GET['page']=='zona'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=zona">Zonas</a>
                    <?php ;}?>
                        <a class="main__buttons__button <?php if($_GET['page']=='contacto'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=contacto">Contactos</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="menu__main__buttons">
                    <div class="main__buttons">
                        <a class="main__buttons__button" href="adminagregar.php?page=zona">Agregar zona</a>
                    </div>
                </div>
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php           
                                $sentencia = $connect->prepare("SELECT z.id, z.nombre, z.habilitada, z.ciudad_id,
                                c.nombre, c.id,
                                z.id as z_id, z.nombre as z_nombre, z.habilitada as z_habilitada, z.ciudad_id as z_ciudad_id,
                                c.nombre as c_nombre, c.id as c_id                      
                                from wp_zonas z
                                LEFT JOIN wp_ciudades c ON z.ciudad_id = c.id
                                ORDER BY z.id DESC") or die('query failed');
                                $sentencia->execute();
                                $list_zonas = $sentencia->fetchAll();
                                foreach($list_zonas as $zona){
                                    $id = $zona['z_id'];                                                             
                                    $nombre = $zona['z_nombre'];                                                             
                                    $habilitado = $zona['z_habilitada'];                                                                                                                        
                                    $ciudad = $zona['c_nombre'];                                                                                                                        
                                ?> 
                                <li class="propiedades__li" id="li<?php echo $id?>">
                                    <div class="propiedades__nombre-detalles-precio">
                                        <span class="propiedades__nombre"><?php if($ciudad > 0){echo $nombre.' ('.$ciudad.')';}else{echo $nombre;};?></span>
                                        <span class="ciudad__detalles"><?php if($habilitado == 1){echo ' Habilitada';}else{echo 'Deshabilitada';}?></span>
                                    </div>            
                                    <div class="propiedades__edit-hide">
                                        <a href="admineditar.php?page=zona&id=<?php echo $id?>"><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                        <i class="propiedades__accion fa-solid fa-trash" onclick="if(confirm('Seguro que quieres eliminar esta zona?')) delZona(<?php echo $id?>)"></i>
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>     
                    </div>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>
<?php if ($_GET['page']  == 'contacto'){?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-address-book main__h1--emoji"></i><h1 class="main__h1">Contactos</h1></div>
                    <div class="main__buttons">
                    <?php if($rolAgente == 1 or $rolAgente == 3){?>
                        <a class="main__buttons__button <?php if($_GET['page']=='usuario'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=usuario">Usuarios</a>
                        <a class="main__buttons__button <?php if($_GET['page']=='ciudad'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=ciudad">Ciudades</a>
                        <a class="main__buttons__button <?php if($_GET['page']=='zona'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=zona">Zonas</a>
                    <?php ;}?>
                        <a class="main__buttons__button <?php if($_GET['page']=='contacto'){echo 'main__buttons__button--active';};?>" href="controladmin.php?page=contacto">Contactos</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="menu__main__buttons">
                    <div class="main__buttons">
                        <a class="main__buttons__button" href="adminagregar.php?page=contacto">Agregar contacto</a>
                    </div>
                </div>
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php           
                                $sentencia = $connect->prepare("SELECT * from wp_contactos ORDER BY id DESC") or die('query failed');
                                $sentencia->execute();
                                $list_usuarios = $sentencia->fetchAll();
                                foreach($list_usuarios as $usuario){
                                    $id = $usuario['id'];                                                             
                                    $nombre = $usuario['nombre'];                                                             
                                    $apellido = $usuario['apellido'];                                                             
                                    $celular = $usuario['telefono'];                                                             
                                    $email = $usuario['email'];                                                                                                                       
                                ?> 
                                <li class="propiedades__li" id="li<?php echo $id?>">
                                    <div class="propiedades__nombre-detalles-precio">
                                        <span class="propiedades__nombre"><?php echo $nombre.' '.$apellido;?></span>
                                        <span class="propiedades__detalles"><?php echo '('.$email.' -'.$celular. ') '?></span>
                                    </div>            
                                    <div class="propiedades__edit-hide">
                                        <a href="admineditar.php?page=contacto&id=<?php echo $id?>"><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                        <a href="contactosinfo.php?contacto=<?php echo $id?>"><i class="propiedades__accion fa-solid fa-search"></i></a>
                                        <i class="propiedades__accion fa-solid fa-trash" onclick="if(confirm('¿Seguro que quieres eliminar este contacto?')) delContacto(<?php echo $id?>)"></i>
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>     
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