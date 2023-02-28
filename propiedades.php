<?php include 'header.php' ?>
<?php  $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 40;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
        if(!isset($_POST['seleccionarOperacion'])){$_POST['seleccionarOperacion'] = '';}; if(!isset($_POST['seleccionarTipo'])){$_POST['seleccionarTipo'] = '';}; if(!isset($_POST['seleccionarCiudad'])){$_POST['seleccionarCiudad'] = '';}; if(!isset($_POST['seleccionarZona'])){$_POST['seleccionarZona'] = '';};  if(!isset($_POST['buscarPrecioDesde'])){$_POST['buscarPrecioDesde'] = '';}; if(!isset($_POST['buscarPrecioHasta'])){$_POST['buscarPrecioHasta'] = '';}; if(!isset($_POST['buscarHabitacionesDesde'])){$_POST['buscarHabitacionesDesde'] = '';}; if(!isset($_POST['buscarHabitacionesHasta'])){$_POST['buscarHabitacionesHasta'] = '';}; if(!isset($_POST['buscarDomicilio'])){$_POST['buscarDomicilio'] = '';}; if(!isset($_POST['buscarReferencia'])){$_POST['buscarReferencia'] = '';}; if(!isset($_POST['buscarPileta'])){$_POST['buscarPileta'] = '';}; if(!isset($_POST['buscarLlaves'])){$_POST['buscarLlaves'] = '';}; if(!isset($_POST['buscarOcupada'])){$_POST['buscarOcupada'] = '';}; if(!isset($_POST['buscarPlantaBaja'])){$_POST['buscarPlantaBaja'] = '';}; if(!isset($_POST['buscarEstado'])){$_POST['buscarEstado'] = '';};
        if(!$_GET || $_GET["pagina"]<1){header('Location:propiedades.php?pagina=1&op='.$_POST['seleccionarOperacion'].'&tipo='.$_POST['seleccionarTipo'].'&ciudad='.$_POST['seleccionarCiudad'].'&zona='.$_POST['seleccionarZona'].'&preciodesde='.$_POST['buscarPrecioDesde'].'&preciohasta='.$_POST['buscarPrecioHasta'].'&habitacionesdesde='.$_POST['buscarHabitacionesDesde'].'&habitacioneshasta='.$_POST['buscarHabitacionesHasta'].'&domicilio='.$_POST['buscarDomicilio'].'&ref='.$_POST['buscarReferencia'].'&pileta='.$_POST['buscarPileta'].'&llaves='.$_POST['buscarLlaves'].'&ocupada='.$_POST['buscarOcupada'].'&plantabaja='.$_POST['buscarPlantaBaja'].'&estado='.$_POST['buscarEstado']);}elseif($_GET['pagina']>$paginas){header('Location:propiedades.php?pagina=1&op='.$_POST['seleccionarOperacion'].'&tipo='.$_POST['seleccionarTipo'].'&ciudad='.$_POST['seleccionarCiudad'].'&zona='.$_POST['seleccionarZona'].'&preciodesde='.$_POST['buscarPrecioDesde'].'&preciohasta='.$_POST['buscarPrecioHasta'].'&habitacionesdesde='.$_POST['buscarHabitacionesDesde'].'&habitacioneshasta='.$_POST['buscarHabitacionesHasta'].'&domicilio='.$_POST['buscarDomicilio'].'&ref='.$_POST['buscarReferencia'].'&pileta='.$_POST['buscarPileta'].'&llaves='.$_POST['buscarLlaves'].'&ocupada='.$_POST['buscarOcupada'].'&plantabaja='.$_POST['buscarPlantaBaja'].'&estado='.$_POST['buscarEstado']);}
        else if (!isset($_GET['op']) || !isset($_GET['tipo']) || !isset($_GET['ciudad']) || !isset($_GET['zona']) || !isset($_GET['preciodesde']) || !isset($_GET['preciohasta']) || !isset($_GET['habitacionesdesde']) || !isset($_GET['habitacioneshasta']) || !isset($_GET['domicilio']) || !isset($_GET['ref']) || !isset($_GET['pileta']) || !isset($_GET['llaves']) || !isset($_GET['ocupada']) || !isset($_GET['plantabaja']) || !isset($_GET['estado'])){header('Location:propiedades.php?pagina=1&op='.$_POST['seleccionarOperacion'].'&tipo='.$_POST['seleccionarTipo'].'&ciudad='.$_POST['seleccionarCiudad'].'&zona='.$_POST['seleccionarZona'].'&preciodesde='.$_POST['buscarPrecioDesde'].'&preciohasta='.$_POST['buscarPrecioHasta'].'&habitacionesdesde='.$_POST['buscarHabitacionesDesde'].'&habitacioneshasta='.$_POST['buscarHabitacionesHasta'].'&domicilio='.$_POST['buscarDomicilio'].'&ref='.$_POST['buscarReferencia'].'&pileta='.$_POST['buscarPileta'].'&llaves='.$_POST['buscarLlaves'].'&ocupada='.$_POST['buscarOcupada'].'&plantabaja='.$_POST['buscarPlantaBaja'].'&estado='.$_POST['buscarEstado']);};
        ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-building main__h1--emoji"></i><h1 class="main__h1">Propiedades</h1></div>
                    <div class="main__buttons">
                        <a href="agregarpropiedad.php" class="main__buttons__button">Agregar Propiedad</a>
                        <a class="main__buttons__button">Descargar Ficha</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">
                    <form class="form__busqueda-propiedad form" name="form" method="POST" action="propiedades.php">
                        <div class="form__bloque">
                            <div class="form__bloque__content content"> 
                                <label  class="form__label content__label" for="">Operación</label>
                                <select class="form__select content__select" name="seleccionarOperacion" id="">                      
                                    <option value>Todas</option>
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
                                <label  class="form__label content__label" for="">Tipo</label>
                                <select class="form__select content__select" name="seleccionarTipo" id="">    
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
                                <label  class="form__label content__label" for="">Ciudad</label>
                                <select class="form__select content__select" name="seleccionarCiudad" id="">
                                    <option value>Todas</option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                            foreach($list_propiedadesOperacion as $propiedad){
                                            $idPropiedad = $propiedad['id'];
                                            $propiedadNombre = $propiedad['nombre'];
                                            ?>
                                        <option <?php if($_GET['ciudad']==$idPropiedad){echo 'selected';}?> value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zona</label>
                                <select class="form__select content__select" name="seleccionarZona" id="">
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
                        <div class="form__bloque form__bloque--2">
                            <div class="form__bloque__precio precio">
                                <h2 class="precio__h2">Precio</h2>
                                <div class="precio__container">
                                    <div class="form__bloque__content precio__container__content">
                                        <label  class="form__label precio__container__content__label" for="">Desde</label>
                                    <input class="form__text precio__container__content__text" name="buscarPrecioDesde" value="<?php echo trim($_GET['preciodesde'])?>" type="text">
                                    </div>
                                    <div class="form__bloque__content precio__container__content">
                                        <label  class="form__label precio__container__content__label" for="">Hasta</label>
                                        <input class="form__text precio__container__content__text" name="buscarPrecioHasta" value="<?php echo trim($_GET['preciohasta'])?>" type="text">
                                    </div>
                                </div>                            
                            </div>
                            <div class="form__bloque__habitaciones habitaciones">
                                <h2 class="habitaciones__h2">Habitaciones</h2>
                                <div class="habitaciones__container">
                                    <div class="form__bloque__content habitaciones__container__content">
                                        <label  class="form__label habitaciones__container__content__label" for="">Desde</label>
                                        <input class="form__text habitaciones__container__content__text" name="buscarHabitacionesDesde" value="<?php echo trim($_GET['habitacionesdesde'])?>"  type="text">
                                    </div>
                                    <div class="form__bloque__content habitaciones__container__content">
                                        <label  class="form__label habitaciones__container__content__label" for="">Hasta</label>
                                        <input class="form__text habitaciones__container__content__text" name="buscarHabitacionesHasta" value="<?php echo trim($_GET['habitacioneshasta'])?>" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Domicilio</label>
                                <input class="form__text habitaciones__container__content__text" name="buscarDomicilio" value="<?php echo trim($_GET['domicilio'])?>" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Referencia</label>
                                <input class="form__text habitaciones__container__content__text" name="buscarReferencia" value="<?php echo trim($_GET['ref'])?>" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Pileta</label>
                            <input class="form__checkbox content__checkbox" type="checkbox" name="buscarPileta" value="1" <?php if($_GET['pileta']==1){ echo 'checked="check"';}?>>
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Llaves</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="buscarLlaves" value="si" <?php if($_GET['llaves']=='si'){ echo 'checked="check"';}?>>
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Ocupada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="buscarOcupada" value="1" <?php if($_GET['ocupada']==1){ echo 'checked="check"';}?>>
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Planta baja</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="buscarPlantaBaja" value="1" <?php if($_GET['plantabaja']==1){ echo 'checked="check"';}?>>
                            </div>
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado de publicación</label>
                                <select class="form__select" name="buscarEstado">
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_estados_publicacion` WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                            foreach($list_propiedadesOperacion as $propiedad){
                                            $idPropiedad = $propiedad['id'];
                                            $propiedadNombre = $propiedad['nombre'];
                                            ?>
                                        <option <?php if($_GET['estado']==$idPropiedad){echo 'selected';}?> value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };?>
                                </select>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--5">
                            <input type="submit" class="form__button form__bloque__button" value="Buscar">
                        </div>
                    </form>
                </div>
                <div class="main__decoration"></div>
                <div class="propiedades">
                    <ul class="propiedades__ul">
                    <?php
			        $whereOp=" AND op.id = ".$_GET['op'];         
                    $whereTipo=" AND tipo.id = ".$_GET['tipo'];
                    $whereCiudad=" AND ciudad.id = ".$_GET['ciudad'];
                    $whereZona=" AND zona.id = ".$_GET['zona'];
                    $wherePrecio=" AND prop.precio_propietario BETWEEN '".$_GET['preciodesde']."' AND '".$_GET['preciohasta']."'";
                    $whereHabitaciones=" AND prop.cant_habitaciones BETWEEN '".$_GET['habitacionesdesde']."' AND '".$_GET['habitacioneshasta']."'";
                    $whereDomicilio=" AND prop.calle LIKE '%".trim($_GET['domicilio'])."%'";
                    $whereRef=" AND prop.referencia_interna LIKE '%".trim($_GET['ref'])."%'";
                    $wherePileta=" AND prop.pileta_propia = ('".$_GET['pileta']."' OR  prop.pileta_compartida ='".$_GET['pileta']."')";
                    $whereLlaves=" AND prop.llavero = '".$_GET['llaves']."'";
                    $whereOcupada=" AND prop.ocupada = ".$_GET['ocupada'];
                    $wherePlantaBaja=" AND prop.planta_baja = ".$_GET['plantabaja'];
                    $whereEstado=" AND prop.visible_web = ".$_GET['estado'];
                    if($_GET['op'] == '' AND $_GET['tipo'] == '' AND $_GET['ciudad'] == '' AND $_GET['zona'] == '' AND $_GET['preciodesde'] == '' AND $_GET['habitacionesdesde'] == '' AND $_GET['domicilio'] == '' AND $_GET['ref'] == '' AND $_GET['pileta'] == '' AND $_GET['llaves'] == '' AND $_GET['ocupada'] == '' AND $_GET['plantabaja'] == '' AND $_GET['estado'] == ''){$filtro = '';}else{ 
                        
                        $filtro = "WHERE status_id= 1 ";

                        if($_GET['pileta'] != ''){$filtro .= $wherePileta;};
                        if($_GET['op'] != ''){$filtro .= $whereOp;};
                        if($_GET['tipo'] != ''){$filtro .= $whereTipo;};
                        if($_GET['ciudad'] != ''){$filtro .= $whereCiudad;};
                        if($_GET['zona'] != ''){$filtro .= $whereZona;};
                        if($_GET['preciodesde'] != ''){$filtro .= $wherePrecio;};
                        if($_GET['habitacionesdesde'] != ''){$filtro .= $whereHabitaciones;};
                        if($_GET['domicilio'] != ''){$filtro .= $whereDomicilio;};
                        if($_GET['ref'] != ''){$filtro .= $whereRef;};
                        if($_GET['llaves'] != ''){$filtro .= $whereLlaves;};
                        if($_GET['ocupada'] != ''){$filtro .= $whereOcupada;};
                        if($_GET['plantabaja'] != ''){$filtro .= $wherePlantaBaja;};
                        if($_GET['estado'] != ''){$filtro .= $whereEstado;};
                        
                        
                        
                    }
                        $sentencia = $connect->prepare("SELECT prop.id, prop.foto_portada, prop.tipo_propiedad_id, prop.operacion_id, prop.zona_id, prop.metros_utiles, prop.cant_habitaciones, prop.nro_banios, prop.precio_propietario, prop.visible_web, prop.ciudad_id, prop.calle, prop.referencia_interna, prop.llavero, prop.ocupada, prop.planta_baja, prop.status_id, prop.pileta_propia, prop.pileta_compartida,
                        tipo.id, tipo.nombre,
                        op.id, op.nombre,
                        zona.id, zona.nombre,
                        ciudad.id,
                        prop.id as prop_id, prop.foto_portada as prop_foto_portada, prop.tipo_propiedad_id as prop_tipo_propiedad_id, prop.operacion_id as prop_operacion_id, prop.zona_id as prop_zona_id, prop.metros_utiles as prop_metros_utiles, prop.cant_habitaciones as prop_cant_habitaciones, prop.nro_banios as prop_nro_banios, prop.precio_propietario as prop_precio_propietario, prop.visible_web as prop_visible_web, prop.ciudad_id as prop_ciudad_id, prop.calle as prop_calle, prop.referencia_interna as prop_referencia_interna, prop.llavero as prop_llavero, prop.ocupada as prop_ocupada, prop.planta_baja as prop_planta_baja,
                        tipo.id as tipo_id, tipo.nombre as tipo_nombre,
                        op.id as op_id, op.nombre as op_nombre,
                        zona.id as zona_id, zona.nombre as zona_nombre,
                        ciudad.id as ciudad_id  
                        FROM wp_propiedades prop 
                        LEFT JOIN wp_propiedad_tipo tipo ON  prop.tipo_propiedad_id =tipo.id
                        LEFT JOIN wp_propiedad_operacion op ON  prop.operacion_id=op.id
                        LEFT JOIN wp_zonas zona ON  prop.zona_id=zona.id
                        LEFT JOIN wp_ciudades ciudad ON  prop.ciudad_id=ciudad.id
                        $filtro") or die('query failed');
                        $sentencia->execute();
                        $consultasTotales = $sentencia->rowCount();
                        $paginas = $consultasTotales/$consultasXpagina;
                        $paginas = ceil($paginas);?> 


                    <?php           
                        $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;
                        $sentencia = $connect->prepare("SELECT prop.id, prop.foto_portada, prop.tipo_propiedad_id, prop.operacion_id, prop.zona_id, prop.metros_utiles, prop.cant_habitaciones, prop.nro_banios, prop.precio_propietario, prop.visible_web, prop.ciudad_id, prop.calle, prop.referencia_interna, prop.llavero, prop.ocupada, prop.planta_baja, prop.pileta_propia, prop.pileta_compartida,
                        tipo.id, tipo.nombre,
                        op.id, op.nombre,
                        zona.id, zona.nombre,
                        ciudad.id,
                        prop.id as prop_id, prop.foto_portada as prop_foto_portada, prop.tipo_propiedad_id as prop_tipo_propiedad_id, prop.operacion_id as prop_operacion_id, prop.zona_id as prop_zona_id, prop.metros_utiles as prop_metros_utiles, prop.cant_habitaciones as prop_cant_habitaciones, prop.nro_banios as prop_nro_banios, prop.precio_propietario as prop_precio_propietario, prop.visible_web as prop_visible_web, prop.ciudad_id as prop_ciudad_id, prop.calle as prop_calle, prop.referencia_interna as prop_referencia_interna, prop.llavero as prop_llavero, prop.ocupada as prop_ocupada, prop.planta_baja as prop_planta_baja,
                        tipo.id as tipo_id, tipo.nombre as tipo_nombre,
                        op.id as op_id, op.nombre as op_nombre,
                        zona.id as zona_id, zona.nombre as zona_nombre,
                        ciudad.id as ciudad_id  
                        FROM wp_propiedades prop 
                        LEFT JOIN wp_propiedad_tipo tipo ON  prop.tipo_propiedad_id =tipo.id
                        LEFT JOIN wp_propiedad_operacion op ON  prop.operacion_id=op.id
                        LEFT JOIN wp_zonas zona ON  prop.zona_id=zona.id
                        LEFT JOIN wp_ciudades ciudad ON  prop.ciudad_id=ciudad.id
                        $filtro ORDER BY prop_id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                        $sentencia->execute();
                        $list_propiedades = $sentencia->fetchAll();
                        foreach($list_propiedades as $propiedad){
                            $idPropiedad = $propiedad['prop_id'];
                            $imgPropiedad = strval($propiedad['prop_foto_portada']);
                            $imgPropiedad = str_replace('"', '', $imgPropiedad);;
                            $imgPropiedad = str_replace("[", "", $imgPropiedad);
                            $imgPropiedad = str_replace("]", "", $imgPropiedad);
                            $metrosPropiedad = floatval($propiedad['prop_metros_utiles']);
                            $habitacionesPropiedad = $propiedad['prop_cant_habitaciones'];
                            $baniosPropiedad = $propiedad['prop_nro_banios'];
                            $precioPropiedad = intval($propiedad['prop_precio_propietario']);
                            $refPropiedad = $propiedad['prop_referencia_interna'];
                            $enWeb = intval($propiedad['prop_visible_web']);
                            $tipoPropiedad = $propiedad['tipo_nombre'];
                            $operacionPropiedad = $propiedad['op_nombre'];
                            $zonaPropiedad = $propiedad['zona_nombre'];                                                                   
                        ?>                           
                        <li class="propiedades__li" id="li<?php echo $idPropiedad;?>">
                            <img class="propiedades__img" src="<?php echo 'https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__'.$imgPropiedad?>" alt="">
                            <div class="propiedades__nombre-detalles-precio">
                                <span class="propiedades__nombre"><?php echo $tipoPropiedad.' en '.$operacionPropiedad.' '.$zonaPropiedad. ' '.$refPropiedad;?></span>
                                <span class="propiedades__detalles"><?php echo $metrosPropiedad.'m2 | '.$habitacionesPropiedad,' hab | '.$baniosPropiedad.' Baños'?></span>
                                <span class="propiedades__precio"><?php echo 'U$S '.number_format($precioPropiedad,0,",", ".").' | U$S '.intval($precioPropiedad/$metrosPropiedad).'/m2'?></span>
                            </div>
                            <span class="propiedades__estado"><?php if ($enWeb==1){echo 'En web';}else{echo 'No publicada';}?></span>
                            <div class="propiedades__edit-hide">
                                <a href="editarpropiedad.php?ref=<?php echo $refPropiedad;?>"><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                <a href="propiedadesinfo.php?ref=<?php echo $refPropiedad;?>"><i class="propiedades__accion fa-solid fa-search"></i></a>
                                <a href=""><i class="propiedades__accion fa-solid <?php if ($enWeb==1){echo 'fa-eye-slash';}else{echo 'fa-eye';}?>"></i></a>
                                <i class="propiedades__accion fa-solid fa-trash" onclick="if(confirm('¿Seguro que quieres eliminar esta propiedad?')) delPropiedad(<?php echo $idPropiedad?>)"></i>
                            </div>
                        </li>
                    <?php };?>
                    </ul>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="propiedades.php?pagina=<?php echo $_GET["pagina"]-1?>&op=<?php echo $_GET['op']?>&tipo=<?php echo $_GET['tipo']?>&ciudad=<?php echo $_GET['ciudad']?>&zona=<?php echo $_GET['zona']?>&preciodesde=<?php echo $_GET['preciodesde']?>&preciohasta=<?php echo $_GET['preciohasta']?>&habitacionesdesde=<?php echo $_GET['habitacionesdesde']?>&habitacioneshasta=<?php echo $_GET['habitacioneshasta']?>&domicilio=<?php echo $_GET['domicilio']?>&ref=<?php echo $_GET['ref']?>&pileta=<?php echo $_GET['pileta']?>&llaves=<?php echo $_GET['llaves']?>&ocupada=<?php echo $_GET['ocupada']?>&plantabaja=<?php echo $_GET['plantabaja']?>&estado=<?php echo $_GET['estado']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="propiedades.php?pagina=<?php echo $i+1?>&op=<?php echo $_GET['op']?>&tipo=<?php echo $_GET['tipo']?>&ciudad=<?php echo $_GET['ciudad']?>&zona=<?php echo $_GET['zona']?>&preciodesde=<?php echo $_GET['preciodesde']?>&preciohasta=<?php echo $_GET['preciohasta']?>&habitacionesdesde=<?php echo $_GET['habitacionesdesde']?>&habitacioneshasta=<?php echo $_GET['habitacioneshasta']?>&domicilio=<?php echo $_GET['domicilio']?>&ref=<?php echo $_GET['ref']?>&pileta=<?php echo $_GET['pileta']?>&llaves=<?php echo $_GET['llaves']?>&ocupada=<?php echo $_GET['ocupada']?>&plantabaja=<?php echo $_GET['plantabaja']?>&estado=<?php echo $_GET['estado']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="propiedades.php?pagina=<?php echo $_GET["pagina"]+1?>&op=<?php echo $_GET['op']?>&tipo=<?php echo $_GET['tipo']?>&ciudad=<?php echo $_GET['ciudad']?>&zona=<?php echo $_GET['zona']?>&preciodesde=<?php echo $_GET['preciodesde']?>&preciohasta=<?php echo $_GET['preciohasta']?>&habitacionesdesde=<?php echo $_GET['habitacionesdesde']?>&habitacioneshasta=<?php echo $_GET['habitacioneshasta']?>&domicilio=<?php echo $_GET['domicilio']?>&ref=<?php echo $_GET['ref']?>&pileta=<?php echo $_GET['pileta']?>&llaves=<?php echo $_GET['llaves']?>&ocupada=<?php echo $_GET['ocupada']?>&plantabaja=<?php echo $_GET['plantabaja']?>&estado=<?php echo $_GET['estado']?>"><li>></li></a>
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