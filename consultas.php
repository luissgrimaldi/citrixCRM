<?php include 'header.php' ?>
<?php  $sentencia = $connect->prepare("SELECT * FROM `wp_consultas`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 40;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
        if(!isset($_POST['buscarFechaDesde'])){$_POST['buscarFechaDesde'] = '';}; if(!isset($_POST['buscarFechaHasta'])){$_POST['buscarFechaHasta'] = '';}; if(!isset($_POST['buscarCliente'])){$_POST['buscarCliente'] = '';}; if(!isset($_POST['seleccionarCanal'])){$_POST['seleccionarCanal'] = '';}; if(!isset($_POST['seleccionarOperacion'])){$_POST['seleccionarOperacion'] = '';}; if(!isset($_POST['seleccionarZona'])){$_POST['seleccionarZona'] = '';}; if(!isset($_POST['seleccionarTipo'])){$_POST['seleccionarTipo'] = '';}; if(!isset($_POST['buscarPropiedad'])){$_POST['buscarPropiedad'] = '';}; if(!isset($_POST['seleccionarEstado'])){$_POST['seleccionarEstado'] = '';};
        if(!$_GET ||$_GET["pagina"]<1){header('Location:consultas.php?pagina=1&fechadesde='.$_POST['buscarFechaDesde'].'&fechahasta='.$_POST['buscarFechaHasta'].'&cliente='.$_POST['buscarCliente'].'&canal='.$_POST['seleccionarCanal'].'&op='.$_POST['seleccionarOperacion'].'&zona='.$_POST['seleccionarZona'].'&tipo='.$_POST['seleccionarTipo'].'&propiedad='.$_POST['buscarPropiedad'].'&estado='.$_POST['seleccionarEstado']);}elseif($_GET['pagina']>$paginas){header('Location:consultas.php?pagina=1&fechadesde='.$_POST['buscarFechaDesde'].'&fechahasta='.$_POST['buscarFechaHasta'].'&cliente='.$_POST['buscarCliente'].'&canal='.$_POST['seleccionarCanal'].'&op='.$_POST['seleccionarOperacion'].'&zona='.$_POST['seleccionarZona'].'&tipo='.$_POST['seleccionarTipo'].'&propiedad='.$_POST['buscarPropiedad'].'&estado='.$_POST['seleccionarEstado']);}
        else if (!isset($_GET['fechadesde']) || !isset($_GET['fechahasta']) || !isset($_GET['cliente']) || !isset($_GET['canal']) || !isset($_GET['op']) || !isset($_GET['zona']) || !isset($_GET['tipo']) || !isset($_GET['propiedad']) || !isset($_GET['estado'])){header('Location:consultas.php?pagina=1&fechadesde='.$_POST['buscarFechaDesde'].'&fechahasta='.$_POST['buscarFechaHasta'].'&cliente='.$_POST['buscarCliente'].'&canal='.$_POST['seleccionarCanal'].'&op='.$_POST['seleccionarOperacion'].'&zona='.$_POST['seleccionarZona'].'&tipo='.$_POST['seleccionarTipo'].'&propiedad='.$_POST['buscarPropiedad'].'&estado='.$_POST['seleccionarEstado']);};
        
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
                <div class="main__busqueda-consulta">
                    <form id="form_calc_4" class="form__busqueda-consulta form" name="form" method="POST" action="consultas.php">
                        <div class="form__bloque form__bloque--1">
                            <div class="form__bloque__fecha fecha">
                                <h2 class="fecha__h2">Fecha</h2>
                                <div class="fecha__container">
                                    <div class="form__bloque__content fecha__container__content">
                                        <label  class="form__label fecha__container__content__label" for="">Desde</label>
                                        <input class="form__text fecha__container__content__text" name="buscarFechaDesde" value="<?php echo trim($_GET['fechadesde'])?>" type="text">
                                    </div>
                                    <div class="form__bloque__content fecha__container__content">
                                        <label  class="form__label fecha__container__content__label" for="">Hasta</label>
                                        <input class="form__text fecha__container__content__text" name="buscarFechaHasta" value="<?php echo trim($_GET['fechahasta'])?>" type="text">
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
                                <?php if($_GET['canal'] != ''){
                                        $id= $_GET['canal'];
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_medios_contacto` WHERE id= $id") or die('query failed');
                                        $sentencia->execute();
                                        $list_consultas = $sentencia->fetchAll();                         
                                        foreach($list_consultas as $consulta){
                                        $nombre = $consulta['nombre'];?>
                                        <option value="<?php echo $id;?>"><?php echo $nombre;?></option>
                                    <?php };};?>
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_medios_contacto` WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_consultas = $sentencia->fetchAll();                         
                                            foreach($list_consultas as $consulta){
                                            $id = $consulta['id'];
                                            $nombre = $consulta['nombre'];
                                            if($_GET['canal']!=$id){?>
                                        <option value="<?php echo $id?>"><?php echo $nombre?></option>
                                    <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Operación</label>
                                <select class="form__select" name="seleccionarOperacion" id="">
                                <?php if($_GET['op'] != ''){
                                    $id= $_GET['op'];
                                    $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_operacion` WHERE id= $id") or die('query failed');
                                    $sentencia->execute();
                                    $list_propiedades = $sentencia->fetchAll();                         
                                    foreach($list_propiedades as $propiedad){
                                    $propiedadNombre = $propiedad['nombre'];?>
                                    <option value="<?php echo $_GET['op'];?>"><?php echo $propiedadNombre;?></option>
                                <?php };};?>
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_operacion` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $idPropiedad = $propiedad['id'];
                                        $propiedadNombre = $propiedad['nombre'];
                                        if($_GET['op']!=$idPropiedad){?>
                                    <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zona</label>
                                <select class="form__select" name="seleccionarZona" id="">
                                <?php if($_GET['zona'] != ''){
                                        $id= $_GET['zona'];
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE id= $id") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $propiedadNombre = $propiedad['nombre'];?>
                                        <option value="<?php echo $_GET['zona'];?>"><?php echo $propiedadNombre;?></option>
                                    <?php };};?>
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE habilitada=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                            foreach($list_propiedadesOperacion as $propiedad){
                                            $idPropiedad = $propiedad['id'];
                                            $propiedadNombre = $propiedad['nombre'];
                                            if($_GET['zona']!=$idPropiedad){?>
                                        <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };};?>
                                </select>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--3">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de propiedad</label>
                                <select class="form__select" name="seleccionarTipo" id="">
                                <?php if($_GET['tipo'] != ''){
                                    $id= $_GET['tipo'];
                                    $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE id= $id") or die('query failed');
                                    $sentencia->execute();
                                    $list_propiedades = $sentencia->fetchAll();                         
                                    foreach($list_propiedades as $propiedad){
                                    $propiedadNombre = $propiedad['nombre'];?>
                                    <option value="<?php echo $_GET['tipo'];?>"><?php echo $propiedadNombre;?></option>
                                <?php };};?>
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                        foreach($list_propiedadesOperacion as $propiedad){
                                        $idPropiedad = $propiedad['id'];
                                        $propiedadNombre = $propiedad['nombre'];
                                        if($_GET['tipo']!=$idPropiedad){?>
                                    <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Propiedad</label>
                                <input class="form__text content__text" name="buscarPropiedad" value="<?php echo trim($_GET['propiedad'])?>" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado</label>
                                <select class="form__select" name="seleccionarEstado" id="">
                                <?php if($_GET['estado'] != ''){
                                        $id= $_GET['estado'];
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_molt_multiform_status` WHERE status_id= $id") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $propiedadNombre = $propiedad['name'];?>
                                        <option value="<?php echo $_GET['estado'];?>"><?php echo $propiedadNombre;?></option>
                                    <?php };};?>
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_molt_multiform_status` WHERE table_id=3") or die('query failed');
                                            $sentencia->execute();
                                            $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                            foreach($list_propiedadesOperacion as $propiedad){
                                            $idPropiedad = $propiedad['status_id'];
                                            $propiedadNombre = $propiedad['name'];
                                            if($_GET['estado']!=$idPropiedad){?>
                                        <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };};?>
                                </select>
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
                        $whereFecha=" AND con.created BETWEEN ".$_GET['fechadesde']." AND ".$_GET['fechahasta'];         
                        $whereCliente=" AND con.nombre LIKE '%".trim($_GET['cliente'])."%' OR con.apellido LIKE '%".trim($_GET['cliente'])."%' OR con.email LIKE '%".trim($_GET['cliente'])."%' OR con.telefono LIKE '%".trim($_GET['cliente'])."%'";
                        $whereCanal=" AND canal.id = ".$_GET['canal'];
                        $whereOp=" AND prop.operacion_id = ".$_GET['op'];
                        $whereTipo=" AND prop.tipo_propiedad_id = ".$_GET['tipo'];
                        $wherePropiedad=" AND prop.referencia_interna LIKE '%".trim($_GET['propiedad'])."%' OR prop.calle LIKE '%".trim($_GET['propiedad'])."%' OR prop.altura LIKE '%".trim($_GET['propiedad'])."%'  OR prop.descripcion_corta LIKE '%".trim($_GET['propiedad'])."%'";
                        $whereZona=" AND prop.zona_id = ".$_GET['zona'];
                        $whereEstado=" AND con.status_id = ".$_GET['estado'];
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
                        $filtro") or die('query failed');
                        $sentencia->execute();
                        $list_propiedades = $sentencia->fetchAll(PDO::FETCH_ASSOC);
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
                            $list_consultas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($list_consultas as $consulta){   
                                $idConsulta = $consulta['con_id'];
                                $tipoConsulta = $consulta['con_consulta'];
                                $nombreConsulta = $consulta['con_nombre'];
                                $apellidoConsulta = $consulta['con_apellido'];
                                $emailConsulta = $consulta['con_email'];
                                $telefonoConsulta = $consulta['con_telefono'];
                                $fechaConsulta = $consulta['con_created'];
                                $refPropiedad = $consulta['prop_referencia_interna'];
                                $callePropiedad = $consulta['prop_calle'];
                                $alturaPropiedad = $consulta['prop_altura'];
                                $situacionConsulta = $consulta['sit_nombre'];                             
                            ?>                          
                        <li class="consultas__li" id="li<?php echo $idConsulta;?>">
                            <div class="consultas__bloque">
                                <div class="consultas__bloque__content">
                                <span class="consultas__consulta"> <?php echo $tipoConsulta. ' | '. $refPropiedad.' ('.$callePropiedad.' '.$alturaPropiedad.') | '.$fechaConsulta?></span>
                                </div>
                                <div class="consultas__bloque__content">                           
                                <span class="consultas__datos-cliente"><?php echo $nombreConsulta. ' '. $apellidoConsulta. ' ('. $emailConsulta. ' - '. $telefonoConsulta.') | Situación: '.$situacionConsulta?></span>
                                </div>
                            </div>
                            <div class="consultas__bloque">
                                <div class="consultas__bloque__content consultas__edit-search-reload">
                                    <a href="editarconsulta.php?consulta=<?php echo $idConsulta?>"><i class="consultas__accion fa-solid fa-pencil"></i></a>
                                    <a href=""><i class="consultas__accion fa-solid fa-search"></i></a>
                                    <a href=""><i class="consultas__accion fa-solid fa-rotate"></i></a>
                                    <i class="consultas__accion fa-solid fa-trash" onclick="if(confirm('¿Seguro que quieres eliminar esta consulta?')) delConsulta(<?php echo $idConsulta?>)"></i>
                                </div>   
                            </div>
                        </li>
                        <?php }; ?>
                    </ul>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="consultas.php?pagina=<?php echo $_GET["pagina"]-1?>&fechadesde=<?php echo $_GET['fechadesde']?>&fechahasta=<?php echo $_GET['fechahasta']?>&cliente=<?php echo $_GET['cliente']?>&canal=<?php echo $_GET['canal']?>&op=<?php echo $_GET['op']?>&zona=<?php echo $_GET['zona']?>&tipo=<?php echo $_GET['tipo']?>&propiedad=<?php echo $_GET['propiedad']?>&estado=<?php echo $_GET['estado']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="consultas.php?pagina=<?php echo $i+1?>&fechadesde=<?php echo $_GET['fechadesde']?>&fechahasta=<?php echo $_GET['fechahasta']?>&cliente=<?php echo $_GET['cliente']?>&canal=<?php echo $_GET['canal']?>&op=<?php echo $_GET['op']?>&zona=<?php echo $_GET['zona']?>&tipo=<?php echo $_GET['tipo']?>&propiedad=<?php echo $_GET['propiedad']?>&estado=<?php echo $_GET['estado']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="consultas.php?pagina=<?php echo $_GET["pagina"]+1?>&fechadesde=<?php echo $_GET['fechadesde']?>&fechahasta=<?php echo $_GET['fechahasta']?>&cliente=<?php echo $_GET['cliente']?>&canal=<?php echo $_GET['canal']?>&op=<?php echo $_GET['op']?>&zona=<?php echo $_GET['zona']?>&tipo=<?php echo $_GET['tipo']?>&propiedad=<?php echo $_GET['propiedad']?>&estado=<?php echo $_GET['estado']?>"><li>></li></a>
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