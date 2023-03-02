<?php include 'header.php' ?>
<?php if($rolAgente == 1 or $rolAgente == 3){if (!$_GET){header('Location:controladmin.php?page=usuario&pagina=1');};}else{if (!$_GET){header('Location:controladmin.php?page=contacto&pagina=1');}}?>

<?php if ($_GET['page']  == 'usuario'){
    $sentencia = $connect->prepare("SELECT * FROM `usuarios`") or die('query failed');
    $sentencia->execute();
    $consultasXpagina = 40;
    $consultasTotales = $sentencia->rowCount();
    $paginas = $consultasTotales/$consultasXpagina;
    $paginas = ceil($paginas);
    if(!$_GET ||$_GET["pagina"]<1){header('Location:controladmin.php?page=usuario&pagina=1');}elseif($_GET['pagina']>$paginas){header('Location:controladmin.php?page=usuario&pagina=1');}
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
                        <a class="main__buttons__button" href="adminagregar.php?page=usuario"><i class="fa-solid fa-plus"></i> Nuevo usuario</a> 
                    </div>
                </div>               
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php
                                $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina; 
                                $sentencia = $connect->prepare("SELECT us.user_id, us.nombre, us.apellido, us.nickname, us.pass, us.habilitado, us.rol, us.foto, us.celular, us.email, 
                                rol.role_id, rol.name,
                                us.user_id as us_user_id, us.nombre as us_nombre, us.apellido as us_apellido, us.nickname as us_nickname, us.pass as us_pass, us.habilitado as us_habilitado, us.rol as us_rol, us.foto as us_foto, us.celular as us_celular, us.email as us_email,
                                rol.role_id as rol_role_id, rol.name as rol_name                          
                                FROM usuarios us 
                                LEFT JOIN roles rol ON  us.rol = rol.role_id
                                ORDER BY us_user_id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
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
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="controladmin.php?page=usuario&pagina=<?php echo $_GET["pagina"]-1?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="controladmin.php?page=usuario&pagina=<?php echo $i+1?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="controladmin.php?page=usuario&pagina=<?php echo $_GET["pagina"]+1?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>

<?php if ($_GET['page']  == 'ciudad'){
        $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 40;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
    if(!$_GET ||$_GET["pagina"]<1){header('Location:controladmin.php?page=ciudad&pagina=1');}elseif($_GET['pagina']>$paginas){header('Location:controladmin.php?page=ciudad&pagina=1');}
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
                        <a class="main__buttons__button" href="adminagregar.php?page=ciudad"><i class="fa-solid fa-plus"></i> Nueva ciudad</a> 
                    </div>
                </div>
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php
                                $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina; 
                                $sentencia = $connect->prepare("SELECT * from wp_ciudades ORDER BY id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
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
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="controladmin.php?page=ciudad&pagina=<?php echo $_GET["pagina"]-1?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="controladmin.php?page=ciudad&pagina=<?php echo $i+1?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="controladmin.php?page=ciudad&pagina=<?php echo $_GET["pagina"]+1?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>
<?php if ($_GET['page']  == 'zona'){
        $sentencia = $connect->prepare("SELECT * FROM `wp_zonas`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 40;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
    if(!$_GET ||$_GET["pagina"]<1){header('Location:controladmin.php?page=zona&pagina=1');}elseif($_GET['pagina']>$paginas){header('Location:controladmin.php?page=zona&pagina=1');}
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
                        <a class="main__buttons__button" href="adminagregar.php?page=zona"><i class="fa-solid fa-plus"></i> Nueva zona</a>                       
                    </div>
                </div>
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php
                                $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;         
                                $sentencia = $connect->prepare("SELECT z.id, z.nombre, z.habilitada, z.ciudad_id,
                                c.nombre, c.id,
                                z.id as z_id, z.nombre as z_nombre, z.habilitada as z_habilitada, z.ciudad_id as z_ciudad_id,
                                c.nombre as c_nombre, c.id as c_id                      
                                from wp_zonas z
                                LEFT JOIN wp_ciudades c ON z.ciudad_id = c.id
                                ORDER BY z.id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
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
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="controladmin.php?page=zona&pagina=<?php echo $_GET["pagina"]-1?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="controladmin.php?page=zona&pagina=<?php echo $i+1?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="controladmin.php?page=zona&pagina=<?php echo $_GET["pagina"]+1?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>
<?php if ($_GET['page']  == 'contacto'){
        $sentencia = $connect->prepare("SELECT * FROM `wp_contactos`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 40;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
    if(!$_GET ||$_GET["pagina"]<1){header('Location:controladmin.php?page=contacto&pagina=1');}elseif($_GET['pagina']>$paginas){header('Location:controladmin.php?page=contacto&pagina=1');}

if(!isset($_POST['nombre'])){$_POST['nombre'] = '';}
if(!isset($_POST['email'])){$_POST['email'] = '';}
if(!isset($_POST['telefono'])){$_POST['telefono'] = '';}
if(!isset($_POST['celular'])){$_POST['celular'] = '';}
if(!isset($_POST['direccion'])){$_POST['direccion'] = '';}
if(!isset($_POST['medioContacto'])){$_POST['medioContacto'] = '';}
if(!isset($_POST['agenteAsignado'])){$_POST['agenteAsignado'] = '';}

$whereNombre=" AND CONCAT(trim(a.nombre), ' ', trim(a.apellido)) = '".$_POST['nombre']."'";         
$whereEmail=" AND a.email = '".$_POST['email']."'";
$whereTel=" AND a.telefono = '".$_POST['telefono']."'";
$whereCel=" AND a.celular = '".$_POST['celular']."'";
$whereDireccion=" AND a.direccion = '".$_POST['direccion']."'";
$whereMedio=" AND a.medio_contacto_id = '".$_POST['medioContacto']."'";;
$whereAgente=" AND a.agente_asignado_id = ".$_POST['agenteAsignado'];
if($_POST['nombre'] == '' AND $_POST['email'] == '' AND $_POST['telefono'] == '' AND $_POST['celular'] == '' AND $_POST['direccion'] == '' AND $_POST['medioContacto'] == '' AND $_POST['agenteAsignado'] == ''){$filtro = '';}else{ 
    
    $filtro = "WHERE a.id > 0 ";
    
    if($_POST['nombre'] != ''){$filtro .= $whereNombre;};
    if($_POST['email'] != ''){$filtro .= $whereEmail;};
    if($_POST['telefono'] != ''){$filtro .= $whereTel;};
    if($_POST['celular'] != ''){$filtro .= $whereCel;};
    if($_POST['direccion'] != ''){$filtro .= $whereDireccion;};
    if($_POST['medioContacto'] != ''){$filtro .= $whereMedio;};
    if($_POST['agenteAsignado'] != ''){$filtro .= $whereAgente;};
}
    ?>
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
                        <a class="main__buttons__button" href="adminagregar.php?page=contacto"><i class="fa-solid fa-plus"></i> Nuevo contacto</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <form class="form__busqueda-consulta form" name="form" method="POST" action="controladmin.php?page=contacto" autocomplete="off">
                    <div class="form__bloque form__bloque--1">
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Nombre Completo</label>
                            <input class="form__text content__text" name="nombre" value="<?php echo $_POST['nombre']?>" type="text">
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Email</label>
                            <input class="form__text content__text" name="email" value="<?php echo $_POST['email']?>" type="text">
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Telefono</label>
                            <input class="form__text content__text" name="telefono" value="<?php echo $_POST['telefono']?>" type="text">
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Celular</label>
                            <input class="form__text content__text" name="celular" value="<?php echo $_POST['celular']?>" type="text">
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Dirección</label>
                            <input class="form__text content__text" name="direccion" value="<?php echo $_POST['direccion']?>" type="text">
                        </div>
                    </div>
                    <div class="form__bloque form__bloque--2">
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Medio contacto</label>
                            <select class="form__select" name="medioContacto">
                                <option value>Todos</option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_medios_contacto` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_consultas = $sentencia->fetchAll();                         
                                        foreach($list_consultas as $consulta){
                                        $id = $consulta['id'];
                                        $nombre = $consulta['nombre'];
                                        ?>
                                    <option <?php if($_POST['medioContacto'] == $id){echo 'selected';}?> value="<?php echo $id?>"><?php echo $nombre?></option>
                                <?php };?>
                            </select>
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Agente asignado</label>
                            <select class="form__select" name="agenteAsignado">
                                <option value>Todos</option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_consultas = $sentencia->fetchAll();                         
                                        foreach($list_consultas as $consulta){
                                        $id = $consulta['user_id'];
                                        $nombre = $consulta['nombre'].' '.$consulta['apellido'];
                                        ?>
                                    <option <?php if($_POST['agenteAsignado'] == $id){echo 'selected';}?> value="<?php echo $id?>"><?php echo $nombre?></option>
                                <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form__bloque form__bloque--4">
                        <input type="submit" class="form__button form__bloque__button" value="Buscar">
                    </div>
                </form>
                <div class="main__decoration"></div>
                <div class="main__perfil">
                    <div class="main__perfil__container">                         
                        <ul class="propiedades__ul">
                        <?php     
                            $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;      
                            $sentencia = $connect->prepare("SELECT a.id, a.nombre as a_nombre, a.apellido, a.telefono, a.celular, a.email, a.direccion, a.medio_contacto_id, a.agente_asignado_id,
                            b.id, b.nombre as b_nombre,
                            c.user_id, c.nombre as c_nombre
                            from wp_contactos a
                            LEFT JOIN wp_medios_contacto b ON  a.medio_contacto_id =b.id
                            LEFT JOIN usuarios c ON  a.agente_asignado_id = c.user_id
                            $filtro") or die('query failed');
                            $sentencia->execute();
                            $consultasTotales = $sentencia->rowCount();
                            $paginas = $consultasTotales/$consultasXpagina;
                            $paginas = ceil($paginas);
                                
                                
                            $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;      
                            $sentencia = $connect->prepare("SELECT a.id, a.nombre as a_nombre, a.apellido, a.telefono, a.celular, a.email, a.direccion, a.medio_contacto_id, a.agente_asignado_id,
                            b.id, b.nombre as b_nombre,
                            c.user_id, c.nombre as c_nombre
                            from wp_contactos a
                            LEFT JOIN wp_medios_contacto b ON  a.medio_contacto_id =b.id
                            LEFT JOIN usuarios c ON  a.agente_asignado_id = c.user_id
                            $filtro ORDER BY a.id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                            $sentencia->execute();
                            $list_usuarios = $sentencia->fetchAll();
                            foreach($list_usuarios as $usuario){
                                $id = $usuario['id'];                                                             
                                $nombre = $usuario['a_nombre'];                                                             
                                $apellido = $usuario['apellido'];                                                                                                                        
                                $email = $usuario['email'];
                                $direccion = $usuario['direccion'];
                                $medioContacto = $usuario['b_nombre'];                                                                                                                        
                                $agenteAsignado = $usuario['c_nombre'];                                                                                                                        
                            ?> 
                            <li class="propiedades__li" id="li<?php echo $id?>">
                                <div class="propiedades__nombre-detalles-precio">
                                    <span class="propiedades__nombre"><?php echo $nombre.' '.$apellido;?></span>
                                    <span class="propiedades__detalles"><?php echo $email?></span>
                                    <span class="propiedades__detalles"><?php echo 'Agente: '; if(!empty($agenteAsignado)){echo $agenteAsignado;}else{echo 'N/A';}?></span>
                                    <span class="propiedades__detalles"><?php echo $direccion?></span>
                                    <span class="propiedades__detalles"><?php echo 'Medio de contacto: '; if(!empty($medioContacto)){echo $medioContacto;}else{echo 'N/A';}?></span>
                                </div>            
                                <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                    <div class="consultas__bloque__content consultas__edit-search-reload">
                                        <a class="consultas__edit-search-reload__content" href="admineditar.php?page=contacto&id=<?php echo $id?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Editar</span></a>
                                        <a class="consultas__edit-search-reload__content" href="contactosinfo.php?contacto=<?php echo $id?>"><i class="consultas__accion fa-solid fa-search"></i><span>Detalles</span></a>
                                        <a onclick="if(confirm('¿Seguro que quieres eliminar este contacto?')) delContacto(<?php echo $id?>)" class="consultas__edit-search-reload__content"><i class="consultas__accion fa-solid fa-trash"></i><span>Eliminar</span></a>
                                    </div>   
                                </div>
                            </li> 
                            <?php };?>
                        </ul>     
                    </div>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="controladmin.php?page=contacto&pagina=<?php echo $_GET["pagina"]-1?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="controladmin.php?page=contacto&pagina=<?php echo $i+1?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="controladmin.php?page=contacto&pagina=<?php echo $_GET["pagina"]+1?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php };?>
<?php include 'sidebar.php';?>
    </div>
    <script src="index.js"></script>
</body>
</html>