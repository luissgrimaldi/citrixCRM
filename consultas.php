<?php include 'header.php' ?>
<?php  $sentencia = $connect->prepare("SELECT * FROM `wp_consultas`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 40;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
        if(!isset($_POST['buscarFechaDesde'])){$_POST['buscarFechaDesde'] = '';}; if(!isset($_POST['buscarFechaHasta'])){$_POST['buscarFechaHasta'] = '';}; if(!isset($_POST['buscarCliente'])){$_POST['buscarCliente'] = '';}; if(!isset($_POST['seleccionarCanal'])){$_POST['seleccionarCanal'] = '';}; if(!isset($_POST['seleccionarOperacion'])){$_POST['seleccionarOperacion'] = '';}; if(!isset($_POST['seleccionarZona'])){$_POST['seleccionarZona'] = '';}; if(!isset($_POST['seleccionarTipo'])){$_POST['seleccionarTipo'] = '';}; if(!isset($_POST['buscarPropiedad'])){$_POST['buscarPropiedad'] = '';}; if(!isset($_POST['seleccionarEstado'])){$_POST['seleccionarEstado'] = '';}; if(!isset($_POST['order'])){$_POST['order'] = 1;};
        if(!$_GET ||$_GET["pagina"]<1){header('Location:consultas.php?pagina=1&fechadesde='.$_POST['buscarFechaDesde'].'&fechahasta='.$_POST['buscarFechaHasta'].'&cliente='.$_POST['buscarCliente'].'&canal='.$_POST['seleccionarCanal'].'&op='.$_POST['seleccionarOperacion'].'&zona='.$_POST['seleccionarZona'].'&tipo='.$_POST['seleccionarTipo'].'&propiedad='.$_POST['buscarPropiedad'].'&estado='.$_POST['seleccionarEstado'].'&order='.$_POST['order']);}elseif($_GET['pagina']>$paginas){header('Location:consultas.php?pagina=1&fechadesde='.$_POST['buscarFechaDesde'].'&fechahasta='.$_POST['buscarFechaHasta'].'&cliente='.$_POST['buscarCliente'].'&canal='.$_POST['seleccionarCanal'].'&op='.$_POST['seleccionarOperacion'].'&zona='.$_POST['seleccionarZona'].'&tipo='.$_POST['seleccionarTipo'].'&propiedad='.$_POST['buscarPropiedad'].'&estado='.$_POST['seleccionarEstado'].'&order='.$_POST['order']);}
        else if (!isset($_GET['fechadesde']) || !isset($_GET['fechahasta']) || !isset($_GET['cliente']) || !isset($_GET['canal']) || !isset($_GET['op']) || !isset($_GET['zona']) || !isset($_GET['tipo']) || !isset($_GET['propiedad']) || !isset($_GET['estado']) || !isset($_GET['order'])){header('Location:consultas.php?pagina=1&fechadesde='.$_POST['buscarFechaDesde'].'&fechahasta='.$_POST['buscarFechaHasta'].'&cliente='.$_POST['buscarCliente'].'&canal='.$_POST['seleccionarCanal'].'&op='.$_POST['seleccionarOperacion'].'&zona='.$_POST['seleccionarZona'].'&tipo='.$_POST['seleccionarTipo'].'&propiedad='.$_POST['buscarPropiedad'].'&estado='.$_POST['seleccionarEstado'].'&order='.$_POST['order']);};
        
        ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-circle-question main__h1--emoji"></i><h1 class="main__h1">Consultas</h1></div>
                    <div class="main__buttons">
                        <a href="agregarconsulta.php" class="main__buttons__button">Nueva consulta</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__buttons main__buttons--avanzada">
                        <a href="consultasavanzadas.php" class="main__buttons__button">Consultas avanzadas</a>
                    </div>
                <div class="main__busqueda-consulta">
                    <form autocomplete="off" id="conForm" class="form__busqueda-consulta form" name="form" method="POST" action="consultas.php">
                        <div class="form__bloque form__bloque--1">
                            <div class="form__bloque__fecha fecha">
                                <h2 class="fecha__h2">Fecha</h2>
                                <div class="fecha__container">
                                    <div class="form__bloque__content fecha__container__content">
                                        <label  class="form__label fecha__container__content__label" for="">Desde</label>
                                        <input class="form__text fecha__container__content__text" name="buscarFechaDesde" value="<?php echo trim($_GET['fechadesde'])?>" type="date">
                                    </div>
                                    <div class="form__bloque__content fecha__container__content">
                                        <label  class="form__label fecha__container__content__label" for="">Hasta</label>
                                        <input class="form__text fecha__container__content__text" name="buscarFechaHasta" value="<?php echo trim($_GET['fechahasta'])?>" type="date">
                                    </div>
                                </div>                            
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Cliente</label>
                                <input class="form__text content__text" name="buscarCliente" value="<?php echo trim($_GET['cliente'])?>" type="text">
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--2">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Canal</label>
                                <select class="form__select" name="seleccionarCanal">
                                    <option value>Todos</option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_medios_contacto` WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_consultas = $sentencia->fetchAll();                         
                                            foreach($list_consultas as $consulta){
                                            $id = $consulta['id'];
                                            $nombre = $consulta['nombre'];
                                            ?>
                                        <option <?php if($_GET['canal']==$id){echo 'selected';}?> value="<?php echo $id?>"><?php echo $nombre?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Operación</label>
                                <select class="form__select" name="seleccionarOperacion" id="">
                                    <option value>Todos</option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_operacion` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $idPropiedad = $propiedad['id'];
                                        $propiedadNombre = $propiedad['nombre'];
                                        ?>
                                    <option <?php if($_GET['op']==$idPropiedad){echo 'selected';}?> value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zona</label>
                                <select class="form__select" name="seleccionarZona" id="">
                                    <option value>Todas</option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE habilitada=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                            foreach($list_propiedadesOperacion as $propiedad){
                                            $idPropiedad = $propiedad['id'];
                                            $propiedadNombre = $propiedad['nombre'];
                                            ?>
                                        <option <?php if($_GET['zona']==$idPropiedad){echo 'selected';}?> value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };?>
                                </select>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--3">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de propiedad</label>
                                <select class="form__select" name="seleccionarTipo" id="">
                                    <option value>Todos</option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                        foreach($list_propiedadesOperacion as $propiedad){
                                        $idPropiedad = $propiedad['id'];
                                        $propiedadNombre = $propiedad['nombre'];
                                        ?>
                                    <option <?php if($_GET['tipo']==$idPropiedad){echo 'selected';}?> value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Propiedad</label>
                                <input class="form__text content__text" name="buscarPropiedad" value="<?php echo trim($_GET['propiedad'])?>" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado</label>
                                <select class="form__select" name="seleccionarEstado" id="">
                                        <option value>Todos</option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_molt_multiform_status` WHERE table_id=3") or die('query failed');
                                            $sentencia->execute();
                                            $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                            foreach($list_propiedadesOperacion as $propiedad){
                                            $idPropiedad = $propiedad['status_id'];
                                            $propiedadNombre = $propiedad['name'];
                                            ?>
                                        <option <?php if($_GET['estado']==$idPropiedad){echo 'selected';}?> value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };?>
                                </select>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--4">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ordenar por</label>
                                <select id="order" class="form__select" name="order">
                                        <option <?php if ($_GET['order'] == 1){echo 'selected';}?> value="1">Mas recientes</option>
                                        <option <?php if ($_GET['order'] == 2){echo 'selected';}?> value="2">Mas antiguas</option>                                     
                                        <option <?php if ($_GET['order'] == 3){echo 'selected';}?> value="3">Mayor precio desde</option>                                     
                                        <option <?php if ($_GET['order'] == 4){echo 'selected';}?> value="4">Menor precio desde</option>                                     
                                        <option <?php if ($_GET['order'] == 5){echo 'selected';}?> value="5">Mayor precio hasta</option>                                     
                                        <option <?php if ($_GET['order'] == 6){echo 'selected';}?> value="6">Menor precio hasta</option>                                     
                                </select>
                            </div>                          
                        </div>
                        <div class="form__bloque form__bloque--5">
                            <input type="submit" class="form__button form__bloque__button" value="Buscar">
                        </div>
                    </form>
                </div>
                <div class="main__decoration"></div>
                <div class="consultas">
                    <ul class="consultas__ul">
                        <?php
                        $whereFecha=" AND DATE(con.created) BETWEEN '".$_GET['fechadesde']."' AND '".$_GET['fechahasta']."'";         
                        $whereCliente=" AND con.nombre LIKE '%".trim($_GET['cliente'])."%' OR con.apellido LIKE '%".trim($_GET['cliente'])."%' OR con.email LIKE '%".trim($_GET['cliente'])."%' OR con.telefono LIKE '%".trim($_GET['cliente'])."%'";
                        $whereCanal=" AND canal.id = ".$_GET['canal'];
                        $whereOp=" AND prop.operacion_id = ".$_GET['op'];
                        $whereTipo=" AND prop.tipo_propiedad_id = ".$_GET['tipo'];
                        $wherePropiedad=" AND prop.referencia_interna LIKE '%".trim($_GET['propiedad'])."%' OR prop.calle LIKE '%".trim($_GET['propiedad'])."%' OR prop.altura LIKE '%".trim($_GET['propiedad'])."%'  OR prop.descripcion_corta LIKE '%".trim($_GET['propiedad'])."%'";
                        $whereZona=" AND prop.zona_id = ".$_GET['zona'];
                        $whereEstado=" AND con.status_id = ".$_GET['estado'];

                        // ORDER
                        if($_GET['order'] == 1){$order = "con_id DESC";};
                        if($_GET['order'] == 2){$order = "con_id ASC";};
                        if($_GET['order'] == 3){$order = "con_precio_venta_desde DESC";};
                        if($_GET['order'] == 4){$order = "con_precio_venta_desde ASC";};
                        if($_GET['order'] == 5){$order = "con_precio_venta_hasta DESC";};
                        if($_GET['order'] == 6){$order = "con_precio_venta_hasta ASC";};

                        if($_GET['fechadesde'] == '' AND $_GET['cliente'] == '' AND $_GET['canal'] == '' AND $_GET['op'] == '' AND $_GET['tipo'] == '' AND $_GET['propiedad'] == '' AND $_GET['zona'] == '' AND $_GET['estado'] == ''){$filtro = '';}else{ 
                            
                            $filtro = "WHERE con.id > 0 ";
                            
                            if($_GET['fechadesde'] != ''){$filtro .= $whereFecha;};
                            if($_GET['cliente'] != ''){$filtro .= $whereCliente;};
                            if($_GET['canal'] != ''){$filtro .= $whereCanal;};
                            if($_GET['op'] != ''){$filtro .= $whereOp;};
                            if($_GET['tipo'] != ''){$filtro .= $whereTipo;};
                            if($_GET['propiedad'] != ''){$filtro .= $wherePropiedad;};
                            if($_GET['zona'] != ''){$filtro .= $whereZona;};
                            if($_GET['estado'] != ''){$filtro .= $whereEstado;};
                        }

                        $sentencia = $connect->prepare("SELECT con.id, con.consulta, con.propiedad_id, con.nombre, con.apellido, con.email, con.telefono, CAST(con.created AS DATE) , con.situacion, con.canal_id, con.status_id,
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
                            $sentencia = $connect->prepare("SELECT con.id, con.consulta, con.propiedad_id, con.nombre, con.apellido, con.email, con.telefono, con.created, con.situacion, con.canal_id, con.status_id, con.precio_venta_desde, con.precio_venta_hasta, con.superficie_construida_desde, con.superficie_construida_hasta, con.planta_baja, con.garaje, con.garaje_doble, con.amueblada, con.balcon, con.pileta, con.zonas, con.tipos_propiedad,
                            prop.id, prop.referencia_interna, prop.calle, prop.altura, prop.descripcion_corta, prop.operacion_id,
                            sit.id, sit.nombre,
                            canal.id,
                            con.id as con_id, con.consulta as con_consulta, con.propiedad_id as con_propiedad_id, con.nombre as con_nombre, con.apellido as con_apellido, con.email as con_email, con.telefono as con_telefono, con.created as con_created, con.canal_id as con_canal_id, con.status_id as con_status_id, con.precio_venta_desde as con_precio_venta_desde, con.precio_venta_hasta as con_precio_venta_hasta, con.superficie_construida_desde as con_superficie_construida_desde, con.superficie_construida_hasta as con_superficie_construida_hasta, con.planta_baja as con_planta_baja, con.garaje as con_garaje, con.garaje_doble as con_garaje_doble, con.amueblada  as con_amueblada, con.balcon as con_balcon, con.pileta as con_pileta, con.zonas as con_zonas, con.tipos_propiedad as con_tipos_propiedad,
                            prop.referencia_interna as prop_referencia_interna, prop.calle as prop_calle, prop.altura as prop_altura, prop.descripcion_corta as prop_descripcion_corta, prop.operacion_id as prop_operacion_id,
                            sit.nombre as sit_nombre,
                            canal.id as canal_id      
                            FROM wp_consultas con
                            LEFT JOIN wp_propiedades prop ON  con.propiedad_id =prop.id
                            LEFT JOIN wp_situaciones sit ON  con.situacion=sit.id
                            LEFT JOIN wp_medios_contacto canal ON  con.canal_id=canal.id
                            $filtro ORDER BY $order LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                            $sentencia->execute();
                            $consultasTotalesActuales = $sentencia->rowCount();
                            $list_consultas = $sentencia->fetchAll();
                            echo  '<span class="resultados">'.($inicioConsultasXpagina + 1).'-'.($inicioConsultasXpagina + $consultasTotalesActuales). ' de '. $consultasTotales. ' resultados'.'</span>';
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
                                $editarSupDesde = $consulta['con_superficie_construida_desde'];
                                $editarSupHasta = $consulta['con_superficie_construida_hasta'];
                                $editarPrecioDesde = $consulta['con_precio_venta_desde'];
                                $editarprecioHasta = $consulta['con_precio_venta_hasta'];
                                $editarPlantaBaja = $consulta['con_planta_baja'];
                                $editarGaraje = $consulta['con_garaje'];
                                $editargarajeDoble = $consulta['con_garaje_doble'];
                                $editarAmueblada = $consulta['con_amueblada'];
                                $editarBalcon = $consulta['con_balcon'];
                                $editarPileta = $consulta['con_pileta'];
                                $editarBuscarZona = $consulta['con_zonas'];               
                                $editarBuscarTipo = $consulta['con_tipos_propiedad'];     
                                
                                
                                $whereZonas=" AND zona_id in('".$editarBuscarZona."')";         
                                $whereTipo=" AND tipo_propiedad_id in('".$editarBuscarTipo."')";
                                $wherePrecio=" AND precio_propietario BETWEEN '".$editarPrecioDesde."' AND '".$editarprecioHasta."'";
                                $whereSuperficie=" AND supeficie_construida BETWEEN '".$editarSupDesde."' AND '".$editarSupHasta."'";
                                $wherePlantaBaja=" AND planta_baja = '".$editarPlantaBaja."'";
                                $whereGaraje=" AND garaje = '".$editarGaraje."'";
                                $whereGarajeDoble=" AND garaje_doble = '".$editargarajeDoble."'";
                                $whereAmueblada=" AND amueblado = '".$editarAmueblada."'";
                                $whereBalcon=" AND balcon = '".$editarBalcon."'";
                                $wherePileta=" AND pileta_propia = ('".$editarPileta."' OR  pileta_compartida ='".$editarPileta."')";
            
                                if((empty($editarBuscarZona))AND(empty($editarBuscarTipo))AND(empty($editarPrecioDesde))AND(empty($editarSupDesde))AND(empty($editarPlantaBaja))AND(empty($editarGaraje))AND(empty($editargarajeDoble))AND(empty($editarAmueblada))AND(empty($editarBalcon))AND(empty($editarPileta))){$filtro = '';}else{
                                }
                                $filtro = "WHERE id > 0 ";
                                if(!empty($editarBuscarZona)){$filtro .= $whereZonas;};
                                if(!empty($editarBuscarTipo)){$filtro .= $whereTipo;};
                                if(!empty($editarPrecioDesde)){$filtro .= $wherePrecio;};
                                if(!empty($editarSupDesde)){$filtro .= $whereSuperficie;};
                                if(!empty($editarPlantaBaja)){$filtro .= $wherePlantaBaja;};
                                if(!empty($editarGaraje)){$filtro .= $whereGaraje;};
                                if(!empty($editargarajeDoble)){$filtro .= $whereGarajeDoble;};
                                if(!empty($editarAmueblada)){$filtro .= $whereAmueblada;};
                                if(!empty($editarBalcon)){$filtro .= $whereBalcon;};
                                if(!empty($editarPileta)){$filtro .= $wherePileta;};           
                                $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` $filtro") or die('query failed');
                                $sentencia->execute();
                                $crucesActuales = $sentencia->rowCount();
                                $list_propiedadesOperacion = $sentencia->fetchAll();?>                       
                                <div id="modal<?php echo $idConsulta?>" class="modal-BG">
                                    <div class="modal">
                                        <div class="modalCantidadCruces">
                                            <span><?php if($crucesActuales==1){echo $crucesActuales.' Cruce';}else{echo $crucesActuales.' Cruces';}?></span>
                                        </div>
                                        <div class="modal__container">
                                     
                                <?php             
                                foreach($list_propiedadesOperacion as $propiedad){
                                $idPropiedadCruces = $propiedad['id'];
                                $propiedadRefCruces = $propiedad['referencia_interna'];
                                $propiedadTituloCruces = $propiedad['descripcion_corta'];
                                $propiedadNombreCruces = $propiedad['calle'];
                                $propiedadImagenCruces = $propiedad['foto_portada'];
                                $propiedadImagenCruces = str_replace('"', '', $propiedadImagenCruces);;
                                $propiedadImagenCruces = str_replace("[", "", $propiedadImagenCruces);
                                $propiedadImagenCruces = str_replace("]", "", $propiedadImagenCruces);
                                $propiedadAlturaCruces = $propiedad['altura'];?>
                                            <div class="modal__cruces">
                                                <img class="modal__cruces__img" src="<?php echo 'https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__'.$propiedadImagenCruces?>" alt="">
                                                <a  class="modal__cruces__a" href="propiedadesinfo.php?ref=<?php echo $propiedadRefCruces?>"><?php echo $propiedadNombreCruces .' '. $propiedadAlturaCruces.' ('.$propiedadRefCruces.')'?></a>                                                           
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="modal__cerrar">
                                            <button onclick="cerrarCruces(<?php echo $idConsulta;?>)" class="form__button form__bloque__button modal__cerrar__btn">Cerrar ventana</button>                                       
                                        </div>
                                    </div>
                                </div>                                                   
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
                                <div class="consultas__bloque__content consultas__edit-search-reload" onclick="abrirCruces(<?php echo $idConsulta;?>)">
                                    <?php if (!empty($situacionConsulta)){?><span class="consultas__datos-cliente__situacion"><?php echo $situacionConsulta?></span><?php };?>
                                    <div class="consultas__accion__cruces__container"><i class="consultas__accion__cruces fa-solid fa-rotate"></i><span><?php if($crucesActuales==1){echo $crucesActuales.' Cruce';}else{echo $crucesActuales.' Cruces';}?></span></div>
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
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="consultas.php?pagina=<?php echo $_GET["pagina"]-1?>&fechadesde=<?php echo $_GET['fechadesde']?>&fechahasta=<?php echo $_GET['fechahasta']?>&cliente=<?php echo $_GET['cliente']?>&canal=<?php echo $_GET['canal']?>&op=<?php echo $_GET['op']?>&zona=<?php echo $_GET['zona']?>&tipo=<?php echo $_GET['tipo']?>&propiedad=<?php echo $_GET['propiedad']?>&estado=<?php echo $_GET['estado']?>&order=<?php echo $_GET['order']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="consultas.php?pagina=<?php echo $i+1?>&fechadesde=<?php echo $_GET['fechadesde']?>&fechahasta=<?php echo $_GET['fechahasta']?>&cliente=<?php echo $_GET['cliente']?>&canal=<?php echo $_GET['canal']?>&op=<?php echo $_GET['op']?>&zona=<?php echo $_GET['zona']?>&tipo=<?php echo $_GET['tipo']?>&propiedad=<?php echo $_GET['propiedad']?>&estado=<?php echo $_GET['estado']?>&order=<?php echo $_GET['order']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="consultas.php?pagina=<?php echo $_GET["pagina"]+1?>&fechadesde=<?php echo $_GET['fechadesde']?>&fechahasta=<?php echo $_GET['fechahasta']?>&cliente=<?php echo $_GET['cliente']?>&canal=<?php echo $_GET['canal']?>&op=<?php echo $_GET['op']?>&zona=<?php echo $_GET['zona']?>&tipo=<?php echo $_GET['tipo']?>&propiedad=<?php echo $_GET['propiedad']?>&estado=<?php echo $_GET['estado']?>&order=<?php echo $_GET['order']?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js"></script>
    <script>
    function abrirCruces(id){
        let modal = document.getElementById('modal'+id);  
        modal.style.display='block';
    }
    function cerrarCruces(id){
        let modal = document.getElementById('modal'+id);  
        modal.style.display='block';
        modal.removeAttribute('style'); 
    }

        order = document.getElementById("order");
        propForm = document.getElementById("conForm");
        order.addEventListener("change", function(){
            propForm.submit();
        })
    </script>
</body>
</html>