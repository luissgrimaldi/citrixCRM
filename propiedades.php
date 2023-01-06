<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php  $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades`") or die('query failed');
        $sentencia->execute();
        $list_consultas = $sentencia->fetchAll();
        $consultasXpagina = 40;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
        if(!isset($_POST['seleccionarOperacion'])){
        $_POST['seleccionarOperacion'] = '';
        if(!$_GET || $_GET["pagina"]<1){header('Location:propiedades.php?pagina=1&op='.$_POST['seleccionarOperacion']);}elseif($_GET['pagina']>$paginas){header('Location:propiedades.php?pagina='.$paginas.'&op='.$_POST['seleccionarOperacion']);};}else{
            if(!$_GET || $_GET["pagina"]<1){header('Location:propiedades.php?pagina=1&op='.$_POST['seleccionarOperacion']);}elseif($_GET['pagina']>$paginas){header('Location:propiedades.php?pagina='.$paginas.'&op='.$_POST['seleccionarOperacion']);};
        }
?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-building main__h1--emoji"></i><h1 class="main__h1">Propiedades</h1></div>
                    <div class="main__buttons">
                        <button class="main__buttons__button">Agregar Propiedad</button>
                        <button class="main__buttons__button">Descargar Ficha</button>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">
                    <form class="form__busqueda-propiedad form" name="form" method="POST" action="propiedades.php">
                        <div class="form__bloque">
                            <div class="form__bloque__content content"> 
                                <label  class="form__label content__label" for="">Operación</label>
                                <select class="form__select content__select" name="seleccionarOperacion" id="">                      
                                    <option value></option>
                                    <?php if($_POST['seleccionarOperacion'] != ''){?>
                                    <option value="<?php echo $_POST['seleccionarOperacion'];?>"><?php echo $_POST['seleccionarOperacion'];?></option>
                                    <?php };?>
                                    <?php                             
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_operacion` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                        foreach($list_propiedadesOperacion as $propiedadOperacion){
                                        $idPropiedadOperacion = $propiedadOperacion['id'];
                                        $propiedadOperacionNombre = $propiedadOperacion['nombre'];
                                    ?>
                                    <option value="<?php echo $idPropiedadOperacion?>"><?php echo $propiedadOperacionNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo</label>
                                <select class="form__select content__select" name="" id="">
                                    <option value></option>
                                    <?php                             
                                    $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE habilitado=1") or die('query failed');
                                    $sentencia->execute();
                                    $list_propiedadesTipo = $sentencia->fetchAll();                         
                                    foreach($list_propiedadesTipo as $propiedadTipo){
                                    $idPropiedadTipo = $propiedadTipo['id'];
                                    $propiedadTipoNombre = $propiedadTipo['nombre'];
                                ?>
                                    <option value="<?php echo $idPropiedadTipo?>"><?php echo $propiedadTipoNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ciudad</label>
                            <select class="form__select content__select" name="" id="">
                                <option value></option>
                                <?php                             
                                    $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE habilitado=1") or die('query failed');
                                    $sentencia->execute();
                                    $list_ciudades = $sentencia->fetchAll(PDO::FETCH_ASSOC);                         
                                    foreach($list_ciudades as $ciudad){
                                    $idCiudad = $ciudad['id'];
                                    $nombreCiudad = $ciudad['nombre'];
                                ?>
                                <option value="<?php echo $idCiudad?>"><?php echo $nombreCiudad?></option>
                                    <?php };?>
                            </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zona</label>
                                <input class="form__text content__text" type="text">
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--2">
                            <div class="form__bloque__precio precio">
                                <h2 class="precio__h2">Precio</h2>
                                <div class="precio__container">
                                    <div class="form__bloque__content precio__container__content">
                                        <label  class="form__label precio__container__content__label" for="">Desde</label>
                                    <input class="form__text precio__container__content__text" type="text">
                                    </div>
                                    <div class="form__bloque__content precio__container__content">
                                        <label  class="form__label precio__container__content__label" for="">Hasta</label>
                                        <input class="form__text precio__container__content__text" type="text">
                                    </div>
                                </div>                            
                            </div>
                            <div class="form__bloque__habitaciones habitaciones">
                                <h2 class="habitaciones__h2">Habitaciones</h2>
                                <div class="habitaciones__container">
                                    <div class="form__bloque__content habitaciones__container__content">
                                        <label  class="form__label habitaciones__container__content__label" for="">Desde</label>
                                        <input class="form__text habitaciones__container__content__text" type="text">
                                    </div>
                                    <div class="form__bloque__content habitaciones__container__content">
                                        <label  class="form__label habitaciones__container__content__label" for="">Hasta</label>
                                        <input class="form__text habitaciones__container__content__text" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Domicilio</label>
                                <input class="form__text content__text" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Referencia</label>
                                <input class="form__text content__text text-referencia" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Pileta</label>
                            <input class="form__checkbox content__checkbox" type="checkbox">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Llaves</label>
                                <input class="form__checkbox content__checkbox" type="checkbox">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Ocupada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Planta baja</label>
                                <input class="form__checkbox content__checkbox" type="checkbox">
                            </div>
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado de publicación</label>
                                <select class="form__select" name="" id="">
                                <option value></option>
                                    <?php                             
                                    $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE habilitado=1") or die('query failed');
                                    $sentencia->execute();
                                    $list_estadoPublicacion = $sentencia->fetchAll(PDO::FETCH_ASSOC);                         
                                    foreach($list_estadoPublicacion as $estadoPublicacion){
                                    $idPropiedadTipo = $estadoPublicacion['id'];
                                    $propiedadTipoNombre = $estadoPublicacion['nombre'];
                                ?>
                                    <option value="<?php echo $idPropiedadTipo?>"><?php echo $propiedadTipoNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--5">
                            <input type="submit" class="form__button form__bloque__button" value="Buscar">
                            <input type="button" class="form__button form__bloque__button" value="Guardar filtros">
                            <input class="form__text form__bloque__text" type="text" placeholder="Nombre del filtro">
                            <select class="form__select form__bloque__select" name="" id="">
                                <option value="1">Filtros guardados</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="main__decoration"></div>
                <div class="propiedades">
                    <ul class="propiedades__ul">
                    <?php

                    if (!isset($_GET['op']) or $_GET['op'] == ''){
                        $filtro = '';
                    }elseif($_GET['op'] != ''){ 
                        $filtro = "WHERE op.id = '".$_GET['op']."'";
                    }
                        $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;
                        $sentencia = $connect->prepare("SELECT prop.id, prop.foto_portada, prop.tipo_propiedad_id, prop.operacion_id, prop.zona_id, prop.metros_utiles, prop.cant_habitaciones, prop.nro_banios, prop.precio_propietario, prop.visible_web,
                        tipo.id, tipo.nombre,
                        op.id, op.nombre,
                        zona.id, zona.nombre,
                        prop.id as prop_id, prop.foto_portada as prop_foto_portada, prop.tipo_propiedad_id as prop_tipo_propiedad_id, prop.operacion_id as prop_operacion_id, prop.zona_id as prop_zona_id, prop.metros_utiles as prop_metros_utiles, prop.cant_habitaciones as prop_cant_habitaciones, prop.nro_banios as prop_nro_banios, prop.precio_propietario as prop_precio_propietario, prop.visible_web as prop_visible_web,
                        tipo.id as tipo_id, tipo.nombre as tipo_nombre,
                        op.id as op_id, op.nombre as op_nombre,
                        zona.id as zona_id, zona.nombre as zona_nombre  
                        FROM wp_propiedades prop 
                        LEFT JOIN wp_propiedad_tipo tipo ON  prop.tipo_propiedad_id =tipo.id
                        LEFT JOIN wp_propiedad_operacion op ON  prop.operacion_id=op.id
                        LEFT JOIN wp_zonas zona ON  prop.zona_id=zona.id
                        $filtro ORDER BY prop_id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                        $sentencia->execute();
                        $list_propiedades = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                        foreach($list_propiedades as $propiedad){
                            $imgPropiedad = strval($propiedad['prop_foto_portada']);
                            $imgPropiedad = str_replace('"', '', $imgPropiedad);;
                            $imgPropiedad = str_replace("[", "", $imgPropiedad);
                            $imgPropiedad = str_replace("]", "", $imgPropiedad);
                            $metrosPropiedad = floatval($propiedad['prop_metros_utiles']);
                            $habitacionesPropiedad = $propiedad['prop_cant_habitaciones'];
                            $baniosPropiedad = $propiedad['prop_nro_banios'];
                            $precioPropiedad = intval($propiedad['prop_precio_propietario']);
                            $enWeb = intval($propiedad['prop_visible_web']);
                            $tipoPropiedad = $propiedad['tipo_nombre'];
                            $operacionPropiedad = $propiedad['op_nombre'];
                            $zonaPropiedad = $propiedad['zona_nombre'];                                                                   
                        ?>                           
                        <li class="propiedades__li">
                            <img class="propiedades__img" src="<?php echo 'https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__'.$imgPropiedad?>" alt="">
                            <div class="propiedades__nombre-detalles-precio">
                                <span class="propiedades__nombre"><?php echo $tipoPropiedad.' en '.$operacionPropiedad.' '.$zonaPropiedad;?></span>
                                <span class="propiedades__detalles"><?php echo $metrosPropiedad.'m2 | '.$habitacionesPropiedad,' hab | '.$baniosPropiedad.' Baños'?></span>
                                <span class="propiedades__precio"><?php echo 'U$S '.number_format($precioPropiedad,0,",", ".").' | U$S '.intval($precioPropiedad/$metrosPropiedad).'/m2'?></span>
                            </div>
                            <span class="propiedades__estado"><?php if ($enWeb==1){echo 'En web';}else{echo 'No publicada';}?></span>
                            <div class="propiedades__edit-hide">
                                <a href=""><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                <a href=""><i class="propiedades__accion fa-solid fa-eye-slash"></i></a>
                            </div>
                        </li>
                    <?php };?>
                    </ul>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="propiedades.php?pagina=<?php echo $_GET["pagina"]-1?>&op=<?php echo $_GET['op']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="propiedades.php?pagina=<?php echo $i+1?>&op=<?php echo $_GET['op']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="propiedades.php?pagina=<?php echo $_GET["pagina"]+1?>&op=<?php echo $_GET['op']?>"><li>></li></a>
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