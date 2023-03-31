<?php include 'header.php' ?>
<?php if($rolAgente == 1 or $rolAgente == 3){if (!$_GET){header('Location:controladmin.php?page=usuario&pagina=1');};}else{if (!$_GET){header('Location:controladmin.php?page=contacto&pagina=1');}}?>

<?php if ($_GET['page']  == 'usuario'){
    if(!isset($_POST['order'])){$_POST['order'] = 1;}
    // ORDER
    if($_GET['order'] == 1){$order = "us_user_id DESC";};
    if($_GET['order'] == 2){$order = "us_user_id ASC";};
    if($_GET['order'] == 3){$order = "trim(us_nombre) ASC";};
    if($_GET['order'] == 4){$order = "trim(us_nombre) DESC";};
    $sentencia = $connect->prepare("SELECT * FROM `usuarios`") or die('query failed');
    $sentencia->execute();
    $consultasXpagina = 25;
    $consultasTotales = $sentencia->rowCount();
    $paginas = $consultasTotales/$consultasXpagina;
    $paginas = ceil($paginas);
    if(!$_GET ||$_GET["pagina"]<1){header('Location:controladmin.php?page=usuario&pagina=1&order='.$_POST['order']);}elseif($_GET['pagina']>$paginas){header('Location:controladmin.php?page=usuario&pagina=1&order='.$_POST['order']);}
    else if (!isset($_GET['order'])){header('Location:controladmin.php?page=usuario&pagina=1&order='.$_POST['order']);};
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
                <div class="main__decoration"></div>
                <form class="form__busqueda-consulta form" id="usuarioForm" name="form" method="POST" action="controladmin.php?page=usuario" autocomplete="off">
                    <div class="form__bloque form__bloque--1">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ordenar por</label>
                                <select id="usuarioOrder" class="form__select" name="order">
                                        <option <?php if ($_GET['order'] == 1){echo 'selected';}?> value="1">Mas recientes</option>
                                        <option <?php if ($_GET['order'] == 2){echo 'selected';}?> value="2">Mas antiguos</option>                                                                       
                                        <option <?php if ($_GET['order'] == 3){echo 'selected';}?> value="3">Nombre A-Z</option>                                     
                                        <option <?php if ($_GET['order'] == 4){echo 'selected';}?> value="4">Nombre Z-A</option>                                                                     
                                </select>
                            </div>                          
                        </div>
                    <div style="display:none" class="form__bloque form__bloque--2">
                        <input type="submit" class="form__button form__bloque__button" value="Buscar">
                    </div>
                </form>            
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
                                ORDER BY $order LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                                $sentencia->execute();
                                $list_usuarios = $sentencia->fetchAll();
                                $consultasTotalesActuales = $sentencia->rowCount();
                                echo  '<span class="resultados">';if(($inicioConsultasXpagina + $consultasTotalesActuales) > 0){echo ($inicioConsultasXpagina + 1);}else{echo 0;}; echo'-'.($inicioConsultasXpagina + $consultasTotalesActuales). ' de '. $consultasTotales. ' resultados'.'</span>';
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
                                    <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                        <div class="consultas__bloque__content consultas__edit-search-reload">
                                            <a class="consultas__edit-search-reload__content" href="admineditar.php?page=usuario&id=<?php echo $id?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Editar</span></a>                                       
                                            <a onclick="if(confirm('¿Seguro que quieres eliminar este contacto?')) delUser(<?php echo $id?>)" class="consultas__edit-search-reload__content"><i class="consultas__accion fa-solid fa-trash"></i><span>Eliminar</span></a>
                                        </div>   
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>     
                    </div>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="controladmin.php?page=usuario&pagina=<?php echo $_GET["pagina"]-1?>&order=<?php echo $_GET['order']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="controladmin.php?page=usuario&pagina=<?php echo $i+1?>&order=<?php echo $_GET['order']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="controladmin.php?page=usuario&pagina=<?php echo $_GET["pagina"]+1?>&order=<?php echo $_GET['order']?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>

<?php if ($_GET['page']  == 'ciudad'){
        if(!isset($_POST['order'])){$_POST['order'] = 1;}
        // ORDER
        if($_GET['order'] == 1){$order = "id DESC";};
        if($_GET['order'] == 2){$order = "id ASC";};
        if($_GET['order'] == 3){$order = "trim(nombre) ASC";};
        if($_GET['order'] == 4){$order = "trim(nombre) DESC";};
        $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 25;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
    if(!$_GET ||$_GET["pagina"]<1){header('Location:controladmin.php?page=ciudad&pagina=1&order='.$_POST['order']);}elseif($_GET['pagina']>$paginas){header('Location:controladmin.php?page=ciudad&pagina=1&order='.$_POST['order']);}
    else if (!isset($_GET['order'])){header('Location:controladmin.php?page=ciudad&pagina=1&order='.$_POST['order']);};
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
                <div class="main__decoration"></div>
                <form class="form__busqueda-consulta form" id="ciudadForm" name="form" method="POST" action="controladmin.php?page=ciudad" autocomplete="off">
                    <div class="form__bloque form__bloque--1">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ordenar por</label>
                                <select id="ciudadOrder" class="form__select" name="order">
                                        <option <?php if ($_GET['order'] == 1){echo 'selected';}?> value="1">Mas recientes</option>
                                        <option <?php if ($_GET['order'] == 2){echo 'selected';}?> value="2">Mas antiguos</option>                                                                       
                                        <option <?php if ($_GET['order'] == 3){echo 'selected';}?> value="3">Nombre A-Z</option>                                     
                                        <option <?php if ($_GET['order'] == 4){echo 'selected';}?> value="4">Nombre Z-A</option>                                                                     
                                </select>
                            </div>                          
                        </div>
                    <div style="display:none" class="form__bloque form__bloque--2">
                        <input type="submit" class="form__button form__bloque__button" value="Buscar">
                    </div>
                </form>
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php
                                $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina; 
                                $sentencia = $connect->prepare("SELECT * from wp_ciudades ORDER BY $order LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                                $sentencia->execute();
                                $list_ciudades = $sentencia->fetchAll();
                                $consultasTotalesActuales = $sentencia->rowCount();
                                echo  '<span class="resultados">';if(($inicioConsultasXpagina + $consultasTotalesActuales) > 0){echo ($inicioConsultasXpagina + 1);}else{echo 0;}; echo'-'.($inicioConsultasXpagina + $consultasTotalesActuales). ' de '. $consultasTotales. ' resultados'.'</span>';
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
                                    <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                        <div class="consultas__bloque__content consultas__edit-search-reload">
                                            <a class="consultas__edit-search-reload__content" href="admineditar.php?page=ciudad&id=<?php echo $id?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Editar</span></a>                                       
                                            <a onclick="if(confirm('¿Seguro que quieres eliminar este contacto?')) delCiudad(<?php echo $id?>)" class="consultas__edit-search-reload__content"><i class="consultas__accion fa-solid fa-trash"></i><span>Eliminar</span></a>
                                        </div>   
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>     
                    </div>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="controladmin.php?page=ciudad&pagina=<?php echo $_GET["pagina"]-1?>&order=<?php echo $_GET['order']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="controladmin.php?page=ciudad&pagina=<?php echo $i+1?>&order=<?php echo $_GET['order']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="controladmin.php?page=ciudad&pagina=<?php echo $_GET["pagina"]+1?>&order=<?php echo $_GET['order']?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>
<?php if ($_GET['page']  == 'zona'){
        if(!isset($_POST['order'])){$_POST['order'] = 1;}
        // ORDER
        if($_GET['order'] == 1){$order = "z_id DESC";};
        if($_GET['order'] == 2){$order = "z_id ASC";};
        if($_GET['order'] == 3){$order = "trim(z_nombre) ASC";};
        if($_GET['order'] == 4){$order = "trim(z_nombre) DESC";};
        $sentencia = $connect->prepare("SELECT * FROM `wp_zonas`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 25;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
    if(!$_GET ||$_GET["pagina"]<1){header('Location:controladmin.php?page=zona&pagina=1&order='.$_POST['order']);}elseif($_GET['pagina']>$paginas){header('Location:controladmin.php?page=zona&pagina=1&order='.$_POST['order']);}
    else if (!isset($_GET['order'])){header('Location:controladmin.php?page=zona&pagina=1&order='.$_POST['order']);};
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
                <div class="main__decoration"></div>
                <form class="form__busqueda-consulta form" id="zonaForm" name="form" method="POST" action="controladmin.php?page=zona" autocomplete="off">
                    <div class="form__bloque form__bloque--1">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ordenar por</label>
                                <select id="zonaOrder" class="form__select" name="order">
                                        <option <?php if ($_GET['order'] == 1){echo 'selected';}?> value="1">Mas recientes</option>
                                        <option <?php if ($_GET['order'] == 2){echo 'selected';}?> value="2">Mas antiguos</option>                                                                       
                                        <option <?php if ($_GET['order'] == 3){echo 'selected';}?> value="3">Nombre A-Z</option>                                     
                                        <option <?php if ($_GET['order'] == 4){echo 'selected';}?> value="4">Nombre Z-A</option>                                                                     
                                </select>
                            </div>                          
                        </div>
                    <div style="display:none" class="form__bloque form__bloque--2">
                        <input type="submit" class="form__button form__bloque__button" value="Buscar">
                    </div>
                </form>
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
                                ORDER BY $order LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                                $sentencia->execute();
                                $list_zonas = $sentencia->fetchAll();
                                $consultasTotalesActuales = $sentencia->rowCount();
                                echo  '<span class="resultados">';if(($inicioConsultasXpagina + $consultasTotalesActuales) > 0){echo ($inicioConsultasXpagina + 1);}else{echo 0;}; echo'-'.($inicioConsultasXpagina + $consultasTotalesActuales). ' de '. $consultasTotales. ' resultados'.'</span>';
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
                                    <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                        <div class="consultas__bloque__content consultas__edit-search-reload">
                                            <a class="consultas__edit-search-reload__content" href="admineditar.php?page=zona&id=<?php echo $id?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Editar</span></a>                                       
                                            <a onclick="if(confirm('¿Seguro que quieres eliminar este contacto?')) delZona(<?php echo $id?>)" class="consultas__edit-search-reload__content"><i class="consultas__accion fa-solid fa-trash"></i><span>Eliminar</span></a>
                                        </div>   
                                    </div>
                                    
                                </li> 
                                <?php };?>
                            </ul>     
                    </div>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="controladmin.php?page=zona&pagina=<?php echo $_GET["pagina"]-1?>&order=<?php echo $_GET['order']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="controladmin.php?page=zona&pagina=<?php echo $i+1?>&order=<?php echo $_GET['order']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="controladmin.php?page=zona&pagina=<?php echo $_GET["pagina"]+1?>&order=<?php echo $_GET['order']?>"><li>></li></a>
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
        $consultasXpagina = 25;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);

        if(!isset($_POST['nombre'])){$_POST['nombre'] = '';}
        if(!isset($_POST['email'])){$_POST['email'] = '';}
        if(!isset($_POST['telefono'])){$_POST['telefono'] = '';}
        if(!isset($_POST['celular'])){$_POST['celular'] = '';}
        if(!isset($_POST['direccion'])){$_POST['direccion'] = '';}
        if(!isset($_POST['medioContacto'])){$_POST['medioContacto'] = '';}
        if(!isset($_POST['agenteAsignado'])){$_POST['agenteAsignado'] = '';}
        if(!isset($_POST['order'])){$_POST['order'] = 1;}

        if(!$_GET || $_GET["pagina"]<1){header('Location:controladmin.php?page=contacto&pagina=1&nombre='.$_POST['nombre'].'&email='.$_POST['email'].'&telefono='.$_POST['telefono'].'&celular='.$_POST['celular'].'&direccion='.$_POST['direccion'].'&medioContacto='.$_POST['medioContacto'].'&agenteAsignado='.$_POST['agenteAsignado'].'&order='.$_POST['order']);}elseif($_GET['pagina']>$paginas){header('Location:controladmin.php?page=contacto&pagina=1&nombre='.$_POST['nombre'].'&email='.$_POST['email'].'&telefono='.$_POST['telefono'].'&celular='.$_POST['celular'].'&direccion='.$_POST['direccion'].'&medioContacto='.$_POST['medioContacto'].'&agenteAsignado='.$_POST['agenteAsignado'].'&order='.$_POST['order']);}
        else if (!isset($_GET['nombre']) || !isset($_GET['email']) || !isset($_GET['telefono']) || !isset($_GET['celular']) || !isset($_GET['direccion']) || !isset($_GET['medioContacto']) || !isset($_GET['order'])){header('Location:controladmin.php?page=contacto&pagina=1&nombre='.$_POST['nombre'].'&email='.$_POST['email'].'&telefono='.$_POST['telefono'].'&celular='.$_POST['celular'].'&direccion='.$_POST['direccion'].'&medioContacto='.$_POST['medioContacto'].'&agenteAsignado='.$_POST['agenteAsignado'].'&order='.$_POST['order']);};


        $whereNombre=" AND CONCAT(trim(a.nombre), ' ', trim(a.apellido)) = '".$_POST['nombre']."'";         
        $whereEmail=" AND a.email = '".$_GET['email']."'";
        $whereTel=" AND a.telefono = '".$_GET['telefono']."'";
        $whereCel=" AND a.celular = '".$_GET['celular']."'";
        $whereDireccion=" AND a.direccion = '".$_GET['direccion']."'";
        $whereMedio=" AND a.medio_contacto_id = '".$_GET['medioContacto']."'";;
        $whereAgente=" AND a.agente_asignado_id = ".$_GET['agenteAsignado'];

        // ORDER
        if($_GET['order'] == 1){$order = "a_id DESC";};
        if($_GET['order'] == 2){$order = "a_id ASC";};
        if($_GET['order'] == 3){$order = "trim(a_nombre) ASC";};
        if($_GET['order'] == 4){$order = "trim(a_nombre) DESC";};

if($_GET['nombre'] == '' AND $_GET['email'] == '' AND $_GET['telefono'] == '' AND $_GET['celular'] == '' AND $_GET['direccion'] == '' AND $_GET['medioContacto'] == '' AND $_GET['agenteAsignado'] == ''){$filtro = '';}else{ 
    
    $filtro = "WHERE a.id > 0 ";
    
    if($_GET['nombre'] != ''){$filtro .= $whereNombre;};
    if($_GET['email'] != ''){$filtro .= $whereEmail;};
    if($_GET['telefono'] != ''){$filtro .= $whereTel;};
    if($_GET['celular'] != ''){$filtro .= $whereCel;};
    if($_GET['direccion'] != ''){$filtro .= $whereDireccion;};
    if($_GET['medioContacto'] != ''){$filtro .= $whereMedio;};
    if($_GET['agenteAsignado'] != ''){$filtro .= $whereAgente;};
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
                <form class="form__busqueda-consulta form" id="contactoForm" name="form" method="POST" action="controladmin.php?page=contacto" autocomplete="off">
                    <div class="form__bloque form__bloque--1">
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Nombre Completo</label>
                            <input class="form__text content__text" name="nombre" value="<?php echo $_GET['nombre']?>" type="text">
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Email</label>
                            <input class="form__text content__text" name="email" value="<?php echo $_GET['email']?>" type="text">
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Telefono</label>
                            <input class="form__text content__text" name="telefono" value="<?php echo $_GET['telefono']?>" type="text">
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Celular</label>
                            <input class="form__text content__text" name="celular" value="<?php echo $_GET['celular']?>" type="text">
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Dirección</label>
                            <input class="form__text content__text" name="direccion" value="<?php echo $_GET['direccion']?>" type="text">
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
                                    <option <?php if($_GET['medioContacto'] == $id){echo 'selected';}?> value="<?php echo $id?>"><?php echo $nombre?></option>
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
                                    <option <?php if($_GET['agenteAsignado'] == $id){echo 'selected';}?> value="<?php echo $id?>"><?php echo $nombre?></option>
                                <?php };?>
                            </select>
                        </div>
                    </div>
                    <div class="form__bloque form__bloque--4">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ordenar por</label>
                                <select id="order" class="form__select" name="order">
                                        <option <?php if ($_GET['order'] == 1){echo 'selected';}?> value="1">Mas recientes</option>
                                        <option <?php if ($_GET['order'] == 2){echo 'selected';}?> value="2">Mas antiguos</option>                                                                       
                                        <option <?php if ($_GET['order'] == 3){echo 'selected';}?> value="3">Nombre A-Z</option>                                     
                                        <option <?php if ($_GET['order'] == 4){echo 'selected';}?> value="4">Nombre Z-A</option>                                                                     
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
                            $sentencia = $connect->prepare("SELECT a.id as a_id, a.nombre as a_nombre, a.apellido, a.telefono, a.celular, a.email as a_email, a.direccion as a_direccion, a.medio_contacto_id, a.agente_asignado_id,
                            b.id, b.nombre as b_nombre,
                            c.user_id, c.nombre as c_nombre, c.apellido as c_apellido
                            from wp_contactos a
                            LEFT JOIN wp_medios_contacto b ON  a.medio_contacto_id =b.id
                            LEFT JOIN usuarios c ON  a.agente_asignado_id = c.user_id
                            $filtro") or die('query failed');
                            $sentencia->execute();
                            $consultasTotales = $sentencia->rowCount();
                            $paginas = $consultasTotales/$consultasXpagina;
                            $paginas = ceil($paginas);
                                
                                
                            $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;      
                            $sentencia = $connect->prepare("SELECT a.id as a_id, a.nombre as a_nombre, a.apellido, a.telefono, a.celular, a.email as a_email, a.direccion as a_direccion, a.medio_contacto_id, a.agente_asignado_id,
                            b.id, b.nombre as b_nombre,
                            c.user_id, c.nombre as c_nombre, c.apellido as c_apellido
                            from wp_contactos a
                            LEFT JOIN wp_medios_contacto b ON  a.medio_contacto_id =b.id
                            LEFT JOIN usuarios c ON  a.agente_asignado_id = c.user_id
                            $filtro ORDER BY $order LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                            $sentencia->execute();
                            $list_usuarios = $sentencia->fetchAll();
                            $consultasTotalesActuales = $sentencia->rowCount();
                            echo  '<span class="resultados">';if(($inicioConsultasXpagina + $consultasTotalesActuales) > 0){echo ($inicioConsultasXpagina + 1);}else{echo 0;}; echo'-'.($inicioConsultasXpagina + $consultasTotalesActuales). ' de '. $consultasTotales. ' resultados'.'</span>';
                            foreach($list_usuarios as $usuario){
                                $id = $usuario['a_id'];                                                             
                                $nombre = $usuario['a_nombre'];                                                             
                                $apellido = $usuario['apellido'];                                                                                                                        
                                $email = $usuario['a_email'];
                                $direccion = $usuario['a_direccion'];
                                $medioContacto = $usuario['b_nombre'];                                                                                                                        
                                $agenteAsignado = $usuario['c_nombre'].' '.$usuario['c_apellido'];                                                                                                                        
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
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="controladmin.php?page=contacto&pagina=<?php echo $_GET["pagina"]-1?>&nombre=<?php echo $_GET['nombre']?>&email=<?php echo $_GET['email']?>&telefono=<?php echo $_GET['telefono']?>&celular=<?php echo $_GET['celular']?>&direccion=<?php echo $_GET['direccion']?>&medioContacto=<?php echo $_GET['medioContacto']?>&agenteAsignado=<?php echo $_GET['agenteAsignado']?>&order=<?php echo $_GET['order']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="controladmin.php?page=contacto&pagina=<?php echo $i+1?>&nombre=<?php echo $_GET['nombre']?>&email=<?php echo $_GET['email']?>&telefono=<?php echo $_GET['telefono']?>&celular=<?php echo $_GET['celular']?>&direccion=<?php echo $_GET['direccion']?>&medioContacto=<?php echo $_GET['medioContacto']?>&agenteAsignado=<?php echo $_GET['agenteAsignado']?>&order=<?php echo $_GET['order']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="controladmin.php?page=contacto&pagina=<?php echo $_GET["pagina"]+1?>&nombre=<?php echo $_GET['nombre']?>&email=<?php echo $_GET['email']?>&telefono=<?php echo $_GET['telefono']?>&celular=<?php echo $_GET['celular']?>&direccion=<?php echo $_GET['direccion']?>&medioContacto=<?php echo $_GET['medioContacto']?>&agenteAsignado=<?php echo $_GET['agenteAsignado']?>&order=<?php echo $_GET['order']?>"><li>></li></a>
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
    <script src="index.js?<?php echo time(); ?>"></script>
    <script>
        order = document.getElementById("order");
        contactoForm = document.getElementById("contactoForm");

        if(order){
            order.addEventListener("change", function(){
                contactoForm.submit();
            });
        }

        zonaOrder = document.getElementById("zonaOrder");
        zonaForm = document.getElementById("zonaForm");
        if(zonaOrder){
            zonaOrder.addEventListener("change", function(){
                zonaForm.submit();
            });
        }

        ciudadOrder = document.getElementById("ciudadOrder");
        ciudadForm = document.getElementById("ciudadForm");
        if(ciudadOrder){
            ciudadOrder.addEventListener("change", function(){
                ciudadForm.submit();
            });
        }

        usuarioOrder = document.getElementById("usuarioOrder");
        usuarioForm = document.getElementById("usuarioForm");
        if(usuarioOrder){
            usuarioOrder.addEventListener("change", function(){
                usuarioForm.submit();
            });
        }   

    </script>
</body>
</html>
