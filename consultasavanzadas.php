<?php include 'header.php' ?>
<?php  $sentencia = $connect->prepare("SELECT * FROM `wp_consultas`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 40;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
        if(!isset($_POST['buscarPrecioDesde'])){$_POST['buscarPrecioDesde'] = '';}; if(!isset($_POST['buscarPrecioHasta'])){$_POST['buscarPrecioHasta'] = '';};
        if(!$_GET ||$_GET["pagina"]<1){header('Location:consultasavanzadas.php?pagina=1&preciodesde='.$_POST['buscarPrecioDesde'].'&preciohasta='.$_POST['buscarPrecioHasta']);}elseif($_GET['pagina']>$paginas){header('Location:consultasavanzadas.php?pagina=1&preciodesde='.$_POST['buscarPrecioDesde'].'&preciohasta='.$_POST['buscarPrecioHasta']);}
        else if (!isset($_GET['preciodesde']) || !isset($_GET['preciohasta'])){header('Location:consultasavanzadas.php?pagina=1&fechadesde='.$_POST['buscarPrecioDesde'].'&fechahasta='.$_POST['buscarPrecioHasta']);};
        
        ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-circle-question main__h1--emoji"></i><h1 class="main__h1">Consultas avanzadas</h1></div>
                    <div class="main__buttons">
                        <a href="agregarconsulta.php" class="main__buttons__button">Nueva consulta</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__buttons main__buttons--avanzada">
                        <a href="consultas.php" class="main__buttons__button">Consultas</a>
                    </div>
                <div class="main__busqueda-consulta">
                    <form class="form__busqueda-consulta form" name="form" autocomplete="off" method="POST" action="consultasavanzadas.php">
                        <div class="form__bloque form__bloque--1">
                            <div class="form__bloque__fecha fecha">
                                <h2 class="fecha__h2">Precio</h2>
                                <div class="fecha__container">
                                    <div class="form__bloque__content fecha__container__content">
                                        <label  class="form__label fecha__container__content__label" for="">Desde</label>
                                        <input class="form__text fecha__container__content__text" name="buscarPrecioDesde" value="<?php echo trim($_GET['preciodesde'])?>" type="text">
                                    </div>
                                    <div class="form__bloque__content fecha__container__content">
                                        <label  class="form__label fecha__container__content__label" for="">Hasta</label>
                                        <input class="form__text fecha__container__content__text" name="buscarPrecioHasta" value="<?php echo trim($_GET['preciohasta'])?>" type="text">
                                    </div>
                                </div>                            
                            </div>
                        </div>                       
                        <div class="form__bloque form__bloque--4">
                            <input type="submit" class="form__button form__bloque__button" value="Buscar">
                        </div>
                    </form>
                </div>
                <div class="main__decoration"></div>
                <div class="consultas">
                    <ul class="consultas__ul">
                        <?php
                        $wherePrecio=" AND (con.precio_venta_desde >= '".$_GET['preciodesde']."') AND (con.precio_venta_hasta <= '".$_GET['preciohasta']."')";         
                        if($_GET['preciodesde'] == '' AND $_GET['preciohasta'] == ''){$filtro = '';}else{ 
                            
                            $filtro = "WHERE con.id > 0 ";
                            
                            if($_GET['preciodesde'] != '' AND $_GET['preciohasta'] != ''){$filtro .= $wherePrecio;};
                        }

                        $sentencia = $connect->prepare("SELECT con.id, con.consulta, con.propiedad_id, con.nombre, con.apellido, con.email, con.telefono, CAST(con.created AS DATE) , con.situacion, con.canal_id, con.status_id, con.precio_venta_desde, con.precio_venta_hasta,
                        prop.id, prop.referencia_interna, prop.calle, prop.altura, prop.descripcion_corta, prop.operacion_id,
                        sit.id, sit.nombre,
                        canal.id,
                        con.id as con_id, con.consulta as con_consulta, con.nombre as con_nombre, con.apellido as con_apellido, con.email as con_email, con.telefono as con_telefono, con.created as con_created, con.canal_id as con_canal_id, con.status_id as con_status_id,
                        prop.referencia_interna as prop_referencia_interna, prop.calle as prop_calle, prop.altura as prop_altura, prop.descripcion_corta as prop_descripcion_corta, prop.operacion_id as prop_operacion_id,
                        sit.nombre as sit_nombre,
                        canal.id as canal_id      
                        FROM wp_consultas con
                        LEFT JOIN wp_propiedades prop ON  con.propiedad_id =prop.id
                        LEFT JOIN wp_situaciones sit ON  con.situacion=sit.id
                        LEFT JOIN wp_medios_contacto canal ON  con.canal_id=canal.id
                        $filtro") or die('query failed');
                        $sentencia->execute();
                        $list_propiedades = $sentencia->fetchAll();
                        $consultasTotales = $sentencia->rowCount();
                        $paginas = $consultasTotales/$consultasXpagina;
                        $paginas = ceil($paginas);
                        $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;
                        $sentencia = $connect->prepare("SELECT con.id, con.consulta, con.propiedad_id, con.nombre, con.apellido, con.email, con.telefono, con.created, con.situacion, con.canal_id, con.status_id,
                        prop.id, prop.referencia_interna, prop.calle, prop.altura, prop.descripcion_corta, prop.operacion_id,
                        sit.id, sit.nombre,
                        canal.id,
                        con.id as con_id, con.consulta as con_consulta, con.nombre as con_nombre, con.apellido as con_apellido, con.email as con_email, con.telefono as con_telefono, con.created as con_created, con.canal_id as con_canal_id, con.status_id as con_status_id,
                        prop.referencia_interna as prop_referencia_interna, prop.calle as prop_calle, prop.altura as prop_altura, prop.descripcion_corta as prop_descripcion_corta, prop.operacion_id as prop_operacion_id,
                        sit.nombre as sit_nombre,
                        canal.id as canal_id      
                        FROM wp_consultas con
                        LEFT JOIN wp_propiedades prop ON  con.propiedad_id =prop.id
                        LEFT JOIN wp_situaciones sit ON  con.situacion=sit.id
                        LEFT JOIN wp_medios_contacto canal ON  con.canal_id=canal.id
                        $filtro ORDER BY con_id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                        $sentencia->execute();
                        $list_consultas = $sentencia->fetchAll();
                        foreach($list_consultas as $consulta){   
                            $idConsulta = $consulta['con_id'];
                            $tipoConsulta = $consulta['con_consulta'];
                            $nombreConsulta = $consulta['con_nombre'];
                            $apellidoConsulta = $consulta['con_apellido'];
                            $emailConsulta = $consulta['con_email'];
                            $telefonoConsulta = $consulta['con_telefono'];
                            $fechaConsulta = $consulta['con_created'];
                            $fechaConsulta = date("d-m-Y", strtotime($fechaConsulta)); 
                            $refPropiedad = $consulta['prop_referencia_interna'];
                            $callePropiedad = $consulta['prop_calle'];
                            $alturaPropiedad = $consulta['prop_altura'];
                            $situacionConsulta = $consulta['sit_nombre'];                             
                        ?>                          
                        <li class="consultas__li" id="li<?php echo $idConsulta;?>">
                            <div class="consultas__bloque">
                                <div class="consultas__bloque__content">
                                <a href="consultasinfo.php?consulta=<?php echo $idConsulta?>" class="consultas__consulta"> <?php echo $nombreConsulta. ' '. $apellidoConsulta;?></a>
                                </div>
                                <div class="consultas__bloque__content">                           
                                <span class="consultas__datos-cliente"><?php echo ' ('. $telefonoConsulta.')'?></span>
                                </div>
                            </div>
                            <div class="consultas__bloque">
                                <div class="consultas__bloque__content consultas__edit-search-reload">
                                    <?php if (!empty($situacionConsulta)){?><span class="consultas__datos-cliente__situacion"><?php echo $situacionConsulta?></span><?php };?>
                                    <div class="consultas__accion__cruces__container"><i class="consultas__accion__cruces fa-solid fa-rotate"></i><span><?php?> Cruces</span></div>
                                    <span class="consultas__consulta"> <?php echo $fechaConsulta?></span>
                                </div>
                            </div>
                            <div class="consultas__bloque consultas__bloque--edit-search-reload"> 
                                <div class="consultas__bloque__content consultas__edit-search-reload">
                                    <a class="consultas__edit-search-reload__content" href="editarconsulta.php?consulta=<?php echo $idConsulta?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Editar</span></a>
                                    <a class="consultas__edit-search-reload__content" href="consultasinfo.php?consulta=<?php echo $idConsulta?>"><i class="consultas__accion fa-solid fa-search"></i><span>Detalles</span></a>
                                    <a onclick="if(confirm('¿Seguro que quieres eliminar esta consulta?')) delConsulta(<?php echo $idConsulta?>)" class="consultas__edit-search-reload__content"><i class="consultas__accion fa-solid fa-trash"></i><span>Eliminar</span></a>
                                </div>   
                            </div>
                        </li>
                        <?php }; ?>
                    </ul>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="consultasavanzadas.php?pagina=<?php echo $_GET["pagina"]-1?>&preciodesde=<?php echo $_GET['preciodesde']?>&preciohasta=<?php echo $_GET['preciohasta']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="consultasavanzadas.php?pagina=<?php echo $i+1?>&preciodesde=<?php echo $_GET['preciodesde']?>&preciohasta=<?php echo $_GET['preciohasta']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="consultasavanzadas.php?pagina=<?php echo $_GET["pagina"]+1?>&preciodesde=<?php echo $_GET['preciodesde']?>&preciohasta=<?php echo $_GET['preciohasta']?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js"></script>
</body>
</html>