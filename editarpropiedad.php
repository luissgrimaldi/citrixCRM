<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-envelope main__h1--emoji"></i><h1 class="main__h1">Editar propiedad</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">
                <?php                          
                    $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE referencia_interna= '".$_GET['ref']."'") or die('query failed');
                    $sentencia->execute();
                    $list_propiedadesOperacion = $sentencia->fetchAll();                         
                    foreach($list_propiedadesOperacion as $propiedad){
                        $editarRef = $propiedad['referencia_interna'];
                        $editarOperacion = $propiedad['operacion_id'];
                        $editarPropiedad = $propiedad['tipo_propiedad_id'];
                        $editarCodPostal = $propiedad['cod_postal'];
                        $editarTipoCalle = $propiedad['tipo_calle_id'];
                        $editarCalle = $propiedad['calle'];
                        $editarAltura = $propiedad['altura'];
                        $editarCiudad = $propiedad['ciudad_id'];
                        $editarZona = $propiedad['zona_id'];
                        $editarPiso = $propiedad['piso'];
                        $editarPuerta = $propiedad['puerta'];
                        $editarBloque = $propiedad['bloque'];
                        $editarOcupada = $propiedad['ocupada'];
                        $editarCoordenadas = $propiedad['coordenadas'];
                        $editarNroToilettes = $propiedad['nro_toilettes'];
                        $editarNroPlantas = $propiedad['nro_plantas'];
                        $editarMetrosUtiles = $propiedad['metros_utiles'];
                        $editarSuperficieConstruida = $propiedad['supeficie_construida'];
                        $editarNroBanios = $propiedad['nro_banios'];
                        $editarAnioConstruccion = $propiedad['anio_contruccion'];
                        $editarMetrosCocina = $propiedad['mts_cocina'];
                        $editarCantHabitaciones = $propiedad['cant_habitaciones'];
                        $editarExpensas = $propiedad['expensas'];
                        $editarCantAmbientes = $propiedad['cant_ambientes'];
                        $editarMetrosComedor = $propiedad['mts_comendor'];
                        $editarMetrosLiving = $propiedad['mts_living'];
                        $editarMetrosLote = $propiedad['mts_lote'];
                        $editarPlantaBaja = $propiedad['planta_baja'];
                        $editarEstadoGeneral = $propiedad['estado_general_id'];
                        $editarEstadoCarpinteriaExt = $propiedad['estado_carpinteria_externa_id'];
                        $editarTipoSuelo = $propiedad['tipo_suelo_id'];
                        $editarOrientacion = $propiedad['orientacion'];
                        $editarAguaCaliente = $propiedad['agua_caliente_id'];
                        $editarEstadoCarpinteriaInt = $propiedad['estado_carpinteria_interna_id'];
                        $editarTipoCalefaccion = $propiedad['tipo_calefaccion_id'];
                        $editarTipoCocina = $propiedad['tipo_cocina_id'];
                        $editarAlarma = $propiedad['alarma'];
                        $editarAgua = $propiedad['agua'];
                        $editarAireAcondicionadoCentral = $propiedad['aire_acondicionado_central'];
                        $editarAireAcondicionado = $propiedad['aire_acondicionado'];
                        $editarBar = $propiedad['bar'];
                        $editarAlarmaIncendio = $propiedad['alarma_incendio'];
                        $editarAlarmaRobo = $propiedad['alarma_robo'];
                        $editarAltillo = $propiedad['altillo'];
                        $editarCajaFuerte = $propiedad['caja_fuerte'];
                        $editarParrilla = $propiedad['parrilla'];
                        $editarAscensor = $propiedad['asensor'];
                        $editarBalcon = $propiedad['balcon'];
                        $editarChimenea = $propiedad['chimenea'];
                        $editarElectrodomesticos = $propiedad['electrodomesticos'];
                        $editarCalefaccionFrioCalor = $propiedad['calefaccion_frio_calor'];
                        $editarCentrico = $propiedad['centrico'];
                        $editarGaraje = $propiedad['garaje'];
                        $editarGarajeDoble = $propiedad['garaje_doble'];
                        $editarGasNatural = $propiedad['gas_natural'];
                        $editargaleria = $propiedad['galeria'];
                        $editarHabJuegos = $propiedad['hab_juegos'];
                        $editarhidromasaje = $propiedad['hidromasaje'];
                        $editarLineaTelefonica = $propiedad['linea_telefonica'];
                        $editarGimnasio = $propiedad['gimnacio'];
                        $editarJardin = $propiedad['jardin'];
                        $editarLavadero = $propiedad['lavadero'];
                        $editarPatio = $propiedad['patio'];
                        $editarJacuzzi = $propiedad['jacuzzi'];
                        $editarLuz = $propiedad['luz'];
                        $editarSauna = $propiedad['sauna'];
                        $editarPreinstAacc = $propiedad['preinst_aacc'];
                        $editarLuminoso = $propiedad['luminoso'];
                        $editarPiletaPropia = $propiedad['pileta_propia'];
                        $editarPiletaCompartida = $propiedad['pileta_compartida'];
                        $editarRiegoAutomatico = $propiedad['riego_automatico'];
                        $editarAmueblado = $propiedad['amueblado'];
                        $editarPuertaBlindada = $propiedad['puerta_blindada'];
                        $editarPortonAutomatico = $propiedad['porton_automatico'];
                        $editarSolarium = $propiedad['solarium'];
                        $editarPergola = $propiedad['pergola'];
                        $editarTv = $propiedad['tv'];
                        $editarVideoPortero = $propiedad['videoportero'];
                        $editarSatelite = $propiedad['satelite'];
                        $editarVestuario = $propiedad['vestuario'];
                        $editarBuardilla = $propiedad['buardilla'];
                        $editarHabitacionServicio = $propiedad['habitacion_servicio'];
                        $editarArboles = $propiedad['arboles'];
                        $editarAutobuses = $propiedad['autobuses'];
                        $editarCentroComercial = $propiedad['centro_comercial'];
                        $editarColegios = $propiedad['colegios'];
                        $editarCosta = $propiedad['costa'];
                        $editarGolf = $propiedad['golf'];
                        $editarHospitales = $propiedad['hospitales'];
                        $editarSubte = $propiedad['subte'];
                        $editarMontania = $propiedad['montania'];
                        $editarUrbanizacion = $propiedad['urbanizacion'];
                        $editarRural = $propiedad['rural'];
                        $editarVistaMar = $propiedad['vista_al_mar'];
                        $editarTren = $propiedad['tren'];
                        $editarZonasInfantiles = $propiedad['zonas_infantiles'];
                        $editarResidencial = $propiedad['residencial'];
                        $editarBarrioCerrado = $propiedad['barrio_cerrado'];
                        $editarDescripcionCorta = $propiedad['descripcion_corta'];
                        $editarDescripcionCompleta = $propiedad['descripcion_completa'];
                        $editarFotoPortada = $propiedad['foto_portada'];
                        $editarGaleriaFotos = $propiedad['galeria_fotos'];
                        $editarDescripcionMediana = $propiedad['descripcion_mediana'];
                        $editarCaptadoPor = $propiedad['captado_por'];
                        $editarContactadoPor = $propiedad['contactado_por'];
                        $editarOficina = $propiedad['oficina_id'];
                        $editarLlavero = $propiedad['llavero'];
                        $editarPrecioPropietario = $propiedad['precio_propietario'];
                        $editarPorcentajeComision = $propiedad['porcentaje_comision'];
                        $editarComisionFija = $propiedad['comision_fija'];
                        $editarPrecioAnterior = $propiedad['precio_anterior'];
                        $editarTasacion = $propiedad['tasacion'];
                        $editarParcela = $propiedad['parcela'];
                        $editarLote = $propiedad['lote'];
                        $editarTomo = $propiedad['tomo'];
                        $editarLibro = $propiedad['libro'];
                        $editarFolio = $propiedad['folio'];
                        $editarRegistro = $propiedad['registro'];
                        $editarRefCatastral = $propiedad['ref_catastral'];
                        $editarValorCatastral = $propiedad['valor_catastral'];                  
                        $editarContactoId = $propiedad['propietarios'];                  
                    }

                    $sentencia2 = $connect->prepare("SELECT * FROM `wp_contactos` WHERE id= $editarContactoId") or die('query failed');
                    $sentencia2->execute();
                    $list_contactos = $sentencia2->fetchAll();                         
                    foreach($list_contactos as $contacto){
                        $editarContactoNombre = trim($contacto['nombre']).' '.trim($contacto['apellido']);
                    }

                ?>            
                    <form class="form__busqueda-propiedad form" name="form" method="POST" action="backend/editarpropiedad.php?ref=<?php echo $editarRef;?>" enctype="multipart/form-data">
                        <h2 class="main__h2">Caracteristicas</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ref</label>
                                <span type="text" class="form__text content__text"><?php echo $editarRef;?></span>                                
                            </div>
                            <div class="form__bloque__content content"> 
                                <label  class="form__label content__label" for="">Operación</label>
                                <select class="form__select content__select" name="operacion" id="">                                             
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_operacion` WHERE id = '".$editarOperacion."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarOperacion;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_operacion` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $idPropiedad = $propiedad['id'];
                                        $propiedadNombre = $propiedad['nombre'];
                                        if($editarOperacion != $idPropiedad){?>
                                    <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de propiedad</label>
                                <select class="form__select content__select" name="tipo" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE id = '".$editarPropiedad."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarPropiedad;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $idPropiedad = $propiedad['id'];
                                        $propiedadNombre = $propiedad['nombre'];
                                        if($editarPropiedad != $idPropiedad){?>?>
                                    <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Codigo postal</label>
                                <input type="text" class="form__text content__text" name="codigopostal" id="" value="<?php echo $editarCodPostal;?>">                                  
                            </div>
                        </div>                   
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Tipo de calle</label>
                                    <select class="form__select content__select" name="tipocalle" id="">    
                                        <?php
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_tipo_calle` WHERE id = '".$editarTipoCalle."'") or die('query failed');
                                            $sentencia->execute();
                                            $list_situaciones = $sentencia->fetchAll();                         
                                            foreach($list_situaciones as $situacion){
                                            $propiedadNombre = $situacion['nombre'];?>
                                            <option value="<?php echo $editarTipoCalle;?>"><?php echo $propiedadNombre;?></option>
                                        <?php };?>                              
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_tipo_calle` WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_tipo_calle = $sentencia->fetchAll();                         
                                            foreach($list_tipo_calle as $tipoCalle){
                                            $idTipoCalle = $tipoCalle['id'];
                                            $tipoCalleNombre = $tipoCalle['nombre'];
                                            if($editarTipoCalle != $idTipoCalle){?>?>
                                        <option value="<?php echo $idTipoCalle?>"><?php echo $tipoCalleNombre?></option>
                                    <?php };};?>
                                    </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Calle</label>
                                <input type="text" class="form__text content__text" name="calle" id="" value="<?php echo $editarCalle;?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Altura</label>
                                <input type="text" class="form__text content__text" name="altura" id="" value="<?php echo $editarAltura;?>">                                  
                            </div>  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ciudad</label>
                                <select class="form__select content__select" name="ciudad" id="" value="<?php echo $editarCiudad;?>">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE id = '".$editarCiudad."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarCiudad;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_ciudades = $sentencia->fetchAll();                         
                                        foreach($list_ciudades as $ciudad){
                                        $idCiudad = $ciudad['id'];
                                        $ciudadNombre = $ciudad['nombre'];
                                        if($editarCiudad != $idCiudad){?>
                                    <option value="<?php echo $idCiudad?>"><?php echo $ciudadNombre?></option>
                                <?php };};?>
                                </select>
                            </div>                                                     
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zona</label>
                                <select class="form__select content__select" name="zona" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE id = '".$editarZona."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarZona;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE habilitada=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_zonas = $sentencia->fetchAll();                         
                                        foreach($list_zonas as $zona){
                                        $idZona = $zona['id'];
                                        $zonaNombre = $zona['nombre'];
                                        if($editarZona != $idZona){?>
                                    <option value="<?php echo $idZona?>"><?php echo $zonaNombre?></option>
                                <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Piso</label>
                                <input type="text" class="form__text content__text" name="piso" id="" value="<?php echo $editarPiso;?>">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Puerta</label>
                                <input type="text" class="form__text content__text" name="puerta" id="" value="<?php echo $editarPuerta;?>">                                  
                            </div>                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Bloque</label>
                                <input type="text" class="form__text content__text" name="bloque" id="" value="<?php echo $editarBloque;?>">                                  
                            </div>                                                     
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Ocupada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="ocupada" value="1" <?php if($editarOcupada==1){ echo 'checked="check"';}?>>
                            </div>    
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Coordenadas</label>
                                <input type="text" class="form__text content__text" name="coordenadas" id="">                                                     
                            </div>
                        </div>
                        <h2 class="main__h2">Distribucion, superficie y otros datos</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nro toilettes</label>
                                <input type="text" class="form__text content__text" name="toilettes" id="" value="<?php echo $editarNroToilettes;?>">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nro plantas</label>
                                <input type="text" class="form__text content__text" name="plantas" id="" value="<?php echo $editarNroPlantas;?>">                                  
                            </div>                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros útiles</label>
                                <input type="text" class="form__text content__text" name="metrosutiles" id="" value="<?php echo $editarMetrosUtiles;?>">                                  
                            </div>                                                     
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Superficie construida</label>
                                <input type="text" class="form__text content__text" name="supconstruida" id="" value="<?php echo $editarSuperficieConstruida;?>">                                  
                            </div>                                                                                                                                
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nro baños</label>
                                <input type="text" class="form__text content__text" name="banios" id="" value="<?php echo $editarNroBanios;?>">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Año de construccion</label>
                                <input type="text" class="form__text content__text" name="anioconstruccion" id="" value="<?php echo $editarAnioConstruccion;?>">                                  
                            </div>                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros cocina</label>
                                <input type="text" class="form__text content__text" name="mtscocina" id="" value="<?php echo $editarMetrosCocina;?>">                                  
                            </div>                                                     
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Cant. Habitaciones</label>
                                <input type="text" class="form__text content__text" name="habitaciones" id="" value="<?php echo $editarCantHabitaciones;?>">                                  
                            </div>                                                                                                                                
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Expensas</label>
                                <input type="text" class="form__text content__text" name="expensas" id="" value="<?php echo $editarExpensas;?>">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Cant. Ambientes</label>
                                <input type="text" class="form__text content__text" name="ambientes" id="" value="<?php echo $editarCantAmbientes;?>">                                  
                            </div>                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros comedor</label>
                                <input type="text" class="form__text content__text" name="comedor" id="" value="<?php echo $editarMetrosComedor;?>">                                  
                            </div>                                                     
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros living</label>
                                <input type="text" class="form__text content__text" name="living" id="" value="<?php echo $editarMetrosLiving;?>">                                  
                            </div>                                                                                                                                
                        </div> 
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros lote</label>
                                <input type="text" class="form__text content__text" name="metros_lote" id="" value="<?php echo $editarMetrosLote;?>">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">¿Es en planta baja?</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="plantabaja" value="1" <?php if($editarPlantaBaja==1){ echo 'checked="check"';}?>>                               
                            </div>                                                                                                                                                        
                        </div>
                        <h2 class="main__h2">Datos de la propiedad</h2>  
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado general</label>
                                <select class="form__select content__select" name="estadogeneral" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades_estados` WHERE id = '".$editarEstadoGeneral."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarEstadoGeneral;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades_estados` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_estados = $sentencia->fetchAll();                         
                                        foreach($list_estados as $estado){
                                        $idEstado = $estado['id'];
                                        $estadoNombre = $estado['nombre'];
                                        if($editarEstadoGeneral != $idEstado){?>
                                    <option value="<?php echo $idEstado?>"><?php echo $estadoNombre?></option>
                                <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Carpinteria ext.</label>
                                <select class="form__select content__select" name="carpinteriaext" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_carpinteria` WHERE id = '".$editarEstadoCarpinteriaExt."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarEstadoCarpinteriaExt;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_carpinteria`") or die('query failed');
                                        $sentencia->execute();
                                        $list_carpinterias = $sentencia->fetchAll();                         
                                        foreach($list_carpinterias as $carpinteria){
                                        $idCarpinteria = $carpinteria['id'];
                                        $carpinteriaNombre = $carpinteria['nombre'];
                                        if($editarEstadoCarpinteriaExt != $idCarpinteria){?>
                                    <option value="<?php echo $idCarpinteria?>"><?php echo $carpinteriaNombre?></option>
                                <?php };};?>
                                </select>
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de suelo</label>
                                <input type="text" class="form__text content__text" name="suelo" id="" value="<?php if($editarTipoSuelo!=0){echo $editarTipoSuelo;};?>">                                  
                            </div> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Orientacion</label>
                                <select class="form__select content__select" name="orientacion" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_orientaciones` WHERE id = '".$editarOrientacion."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarOrientacion;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_orientaciones`") or die('query failed');
                                        $sentencia->execute();
                                        $list_orientaciones = $sentencia->fetchAll();                         
                                        foreach($list_orientaciones as $orientacion){
                                        $idOrientacion = $orientacion['id'];
                                        $orientacionNombre = $orientacion['nombre'];
                                        if($editarOrientacion != $idOrientacion){?>
                                    <option value="<?php echo $idOrientacion?>"><?php echo $orientacionNombre?></option>
                                <?php };};?>
                                </select>
                            </div>                                                                                                                                                                             
                        </div>
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Agua caliente</label>
                                <select class="form__select content__select" name="aguacaliente" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_agua_caliente` WHERE id = '".$editarAguaCaliente."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarAguaCaliente;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_agua_caliente` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_Aguas = $sentencia->fetchAll();                         
                                        foreach($list_Aguas as $agua){
                                        $idAgua = $agua['id'];
                                        $aguaNombre = $agua['nombre'];
                                        if($editarAguaCaliente != $idAgua){?>
                                    <option value="<?php echo $idAgua?>"><?php echo $aguaNombre?></option>
                                <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Carpinteria int.</label>
                                <select class="form__select content__select" name="carpinteriaint" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_caracteristicas_estados` WHERE id = '".$editarEstadoCarpinteriaInt."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarEstadoCarpinteriaInt;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_caracteristicas_estados` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_carpinterias = $sentencia->fetchAll();                         
                                        foreach($list_carpinterias as $carpinteria){
                                        $idCarpinteria = $carpinteria['id'];
                                        $carpinteriaNombre = $carpinteria['nombre'];
                                        if($editarEstadoCarpinteriaInt != $idCarpinteria){?>
                                    <option value="<?php echo $idCarpinteria?>"><?php echo $carpinteriaNombre?></option>
                                <?php };};?>
                                </select>
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de calefacción</label>
                                <select class="form__select content__select" name="calefaccion" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_calefaccion` WHERE id = '".$editarTipoCalefaccion."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarTipoCalefaccion;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_calefaccion` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_calefacciones = $sentencia->fetchAll();                         
                                        foreach($list_calefacciones as $calefaccion){
                                        $idCalefaccion = $calefaccion['id'];
                                        $calefaccionNombre = $calefaccion['nombre'];
                                        if($editarTipoCalefaccion != $idCalefaccion){?>
                                    <option value="<?php echo $idCalefaccion?>"><?php echo $calefaccionNombre?></option>
                                <?php };};?>
                                </select>
                            </div>                                                                                                                                                                             
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de cocina</label>
                                <select class="form__select content__select" name="tipococina" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_cocina` WHERE id = '".$editarTipoCocina."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarTipoCocina;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_cocina` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_cocinas = $sentencia->fetchAll();                         
                                        foreach($list_cocinas as $cocina){
                                        $idCocina= $cocina['id'];
                                        $cocinaNombre = $cocina['nombre'];
                                        if($editarTipoCocina != $idCocina){?>
                                    <option value="<?php echo $idCocina?>"><?php echo $cocinaNombre?></option>
                                <?php };};?>
                                </select>
                            </div>                                                                                                                                                                                               
                        </div>
                        <h2 class="main__h2">Calidez</h2>
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Alarma</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="alarma" value="1" <?php if($editarAlarma==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Agua</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="agua" value="1" <?php if($editarAgua==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Aire acondicionado central</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="aireacondicionadocentral" value="1" <?php if($editarAireAcondicionadoCentral==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Aire acondicionado</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="aireacondicionado" value="1" <?php if($editarAireAcondicionado==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Bar</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="bar" value="1" <?php if($editarBar==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Alarma c/incendio</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="alarmaincendio" value="1" <?php if($editarAlarmaIncendio==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Alarma c/Robo</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="alarmarobo" value="1" <?php if($editarAlarmaRobo==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Altillo</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="altillo" value="1" <?php if($editarAltillo==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Caja fuerte</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="cajafuerte" value="1" <?php if($editarCajaFuerte==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Parrilla</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="parrilla" value="1" <?php if($editarParrilla==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ascensor</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="asensor" value="1" <?php if($editarAscensor==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Balcon</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="balcon" value="1" <?php if($editarBalcon==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Chimenea</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="chimenea" value="1" <?php if($editarChimenea==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Electrodomésticos</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="electrodomesticos" value="1" <?php if($editarElectrodomesticos==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Calefacción frio/calor</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="calefaccionfriocalor" value="1" <?php if($editarCalefaccionFrioCalor==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Centrico</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="centrico" value="1" <?php if($editarCentrico==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Garaje</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="garaje" value="1" <?php if($editarGaraje==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Garaje doble</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="garajedoble" value="1" <?php if($editarGarajeDoble==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Gas natural</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="gasnatural" value="1" <?php if($editarGasNatural==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Galería</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="galeria" value="1" <?php if($editargaleria==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hab. juegos</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="habjuegos" value="1" <?php if($editarHabJuegos==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hidromasaje</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="hidromasaje" value="1" <?php if($editarhidromasaje==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Línea telefónica</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="lineatelefonica" value="1" <?php if($editarLineaTelefonica==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Gimnasio</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="gimnasio" value="1" <?php if($editarGimnasio==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Jardín</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="jardin" value="1" <?php if($editarJardin==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Lavadero</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="lavadero" value="1" <?php if($editarLavadero==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Patio</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="patio" value="1" <?php if($editarPatio==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Jacuzzi</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="jacuzzi" value="1" <?php if($editarJacuzzi==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Luz</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="luz" value="1" <?php if($editarLuz==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Sauna</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="sauna" value="1" <?php if($editarSauna==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Preinst. AACC</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="preinstaacc" value="1" <?php if($editarPreinstAacc==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Luminoso</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="luminoso" value="1" <?php if($editarLuminoso==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Pileta propia</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="piletapropia" value="1" <?php if($editarPiletaPropia==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Pileta compartida</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="piletacompartida" value="1" <?php if($editarPiletaCompartida==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Riego automático</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="riegoautomatico" value="1" <?php if($editarRiegoAutomatico==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Amueblado</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="amueblado" value="1" <?php if($editarAmueblado==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Puerta blindada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="puertablindada" value="1" <?php if($editarPuertaBlindada==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Portón automático</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="portonautomatico" value="1" <?php if($editarPortonAutomatico==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Solarium</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="solarium" value="1" <?php if($editarSolarium==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Pérgola</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="pergola" value="1" <?php if($editarPergola==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">TV</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="tv" value="1" <?php if($editarTv==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Video portero</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="videoportero" value="1" <?php if($editarVideoPortero==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Satelite</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="satelite" value="1" <?php if($editarSatelite==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Vestuario</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="vestuario" value="1" <?php if($editarVestuario==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Buardilla</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="buardilla" value="1" <?php if($editarBuardilla==1){ echo 'checked="check"';}?>>                             
                            </div>                      
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Habitación de servicio</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="habitacionservicio" value="1" <?php if($editarHabitacionServicio==1){ echo 'checked="check"';}?>>                             
                            </div>                      
                        </div>   
                        <h2 class="main__h2">Tipo de entorno</h2>
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Árboles</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="arboles" value="1" <?php if($editarArboles==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Autobuses</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="autobuses" value="1" <?php if($editarAutobuses==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Centro comercial</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="centrocomercial" value="1" <?php if($editarCentroComercial==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Colegios</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="colegios" value="1" <?php if($editarColegios==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Costa</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="costa" value="1" <?php if($editarCosta==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Golf</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="golf" value="1" <?php if($editarGolf==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hospitales</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="hospitales" value="1" <?php if($editarHospitales==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Subte</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="subte" value="1" <?php if($editarSubte==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Montaña</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="montania" value="1" <?php if($editarMontania==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Urbanización</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="urbanizacion" value="1" <?php if($editarUrbanizacion==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Rural</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="rural" value="1" <?php if($editarRural==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Vista al mar</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="vistamar" value="1" <?php if($editarVistaMar==1){ echo 'checked="check"';}?>>                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tren</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="tren" value="1" <?php if($editarTren==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zonas infantiles</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="zonasinfantiles" value="1" <?php if($editarZonasInfantiles==1){ echo 'checked="check"';}?>>                           
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Residencial</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="residencial" value="1" <?php if($editarResidencial==1){ echo 'checked="check"';}?>>                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Barrio cerrado</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="barriocerrado" value="1" <?php if($editarBarrioCerrado==1){ echo 'checked="check"';}?>>                             
                            </div>                           
                        </div>                  
                        <h2 class="main__h2">Descripcion General</h2>
                        <div class="form__bloque">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Descripcion corta</label>
                                <input type="text" class="form__text content__text form__text--propiedad" name="descripcioncorta" id="" value="<?php echo $editarDescripcionCorta;?>">                                  
                            </div>
                        </div>   
                        <script type="text/javascript">
                            tinymce.init({
                                selector: '#tinymce'
                            });
                        </script>   
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Descripcion completa</label>
                                <textarea name="descripcionlarga" id="tinymce"><?php echo $editarDescripcionCompleta;?></textarea>
                            </div>                                                                                                                                                                                                      
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Foto de portada</label>
                            <input type="file" class="" name="fotoportada" id="">                                  
                        </div> 
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Galeria de fotos</label>
                            <input type="file" class="" name="galeriafotos" id="">                                  
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Descripcion mediana</label>
                            <textarea name="descripcionmediana"><?php echo $editarDescripcionMediana;?></textarea>                                 
                        </div>
                        <h2 class="main__h2">Captación</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Captado por</label>
                                <select class="form__select" name="captadopor" id="">                               
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE user_id = '".$editarCaptadoPor."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                            $propiedadNombre = $situacion['nombre'];
                                            $propiedadApellido = $situacion['apellido'];?>
                                        <option value="<?php echo $editarCaptadoPor;?>"><?php echo $propiedadNombre.' '.$propiedadApellido;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $agentes = $sentencia->fetchAll();                         
                                            foreach($agentes as $agente){
                                            $idAgente = $agente['user_id'];
                                            $agenteNombre = $agente['nombre'];
                                            $agenteApellido = $agente['apellido'];
                                            if($editarCaptadoPor != $idAgente){?>
                                        <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Contactado por</label>
                                <select class="form__select" name="contactadopor" id="">                               
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE user_id = '".$editarContactadoPor."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                            $propiedadNombre = $situacion['nombre'];
                                            $propiedadApellido = $situacion['apellido'];?>
                                        <option value="<?php echo $editarContactadoPor;?>"><?php echo $propiedadNombre.' '.$propiedadApellido;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $agentes = $sentencia->fetchAll();                         
                                        foreach($agentes as $agente){
                                        $idAgente = $agente['user_id'];
                                        $agenteNombre = $agente['nombre'];
                                        $agenteApellido = $agente['apellido'];
                                        if($editarContactadoPor != $idAgente){?>
                                    <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };};?>
                                </select>
                            </div>                                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Oficina</label>
                                <select class="form__select content__select" name="oficina" id="">    
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_oficinas` WHERE id = '".$editarOficina."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarOficina;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_oficinas` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_oficinas = $sentencia->fetchAll();                         
                                        foreach($list_oficinas as $oficina){
                                        $idOficina = $oficina['id'];
                                        $oficinaNombre = $oficina['nombre'];
                                        if($editarOficina != $idOficina){?>
                                    <option value="<?php echo $idOficina?>"><?php echo $oficinaNombre?></option>
                                <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Llavero</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="llavero" value="si" <?php if($editarLlavero=='si'){ echo 'checked="check"';}?>>                             
                            </div>                                                                                                          
                        </div>
                        <h2 class="main__h2">Venta</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio del propietario</label>
                                <input type="text" class="form__text content__text" name="preciopropietario" id="" value="<?php echo round($editarPrecioPropietario)?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Porcentaje sobre compra</label>
                                <input type="text" class="form__text content__text" name="porcentajesobrecompra" id="" value="<?php echo round($editarPorcentajeComision)?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Comisión fija</label>
                                <input type="text" class="form__text content__text" name="comisionfija" id="" value="<?php echo round($editarComisionFija)?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio anterior</label>
                                <input type="text" class="form__text content__text" name="precioanterior" id="" value="<?php echo round($editarPrecioAnterior)?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tasación</label>
                                <input type="text" class="form__text content__text" name="tasacion" id="" value="<?php echo round($editarTasacion)?>">                                  
                            </div>                        
                        </div>
                        <h2 class="main__h2">Datos catastrales</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Parcela</label>
                                <input type="text" class="form__text content__text" name="parcela" id="" value="<?php echo $editarParcela?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Lote</label>
                                <input type="text" class="form__text content__text" name="lote" id="" value="<?php echo $editarLote?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tomo</label>
                                <input type="text" class="form__text content__text" name="tomo" id="" value="<?php echo $editarTomo?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Libro</label>
                                <input type="text" class="form__text content__text" name="libro" id="" value="<?php echo $editarLibro?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Folio</label>
                                <input type="text" class="form__text content__text" name="folio" id="" value="<?php echo $editarFolio?>">                                  
                            </div>                        
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Registro</label>
                                <input type="text" class="form__text content__text" name="registro" id="" value="<?php echo $editarRegistro?>">                                  
                            </div>                        
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ref. catastral</label>
                                <input type="text" class="form__text content__text" name="ref_catastral" id="" value="<?php echo $editarRefCatastral?>">                                  
                            </div>                        
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Valor catastral</label>
                                <input type="text" class="form__text content__text" name="valor_catastral" id="" value="<?php echo $editarValorCatastral?>">                                  
                            </div>                        
                        </div>                
                        <h2 class="main__h2">Propietarios</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                            <input type="text" class="form__text content__text" name="buscadorcontactos" id="buscadorcontactos" value="<?php echo $editarContactoNombre?>" autocomplete="off"> 
                            <input type="hidden" class="form__text content__text" name="contacto_id" id="contacto_id" value="<?php echo $editarContactoId?>"> 
                            <ul class="content_ul" id="listaContactos"></ul>                
                            </div>                          
                        </div>                 
                                          
                        <div class="main__decoration"></div>
                        <input type="submit" class="form__button form__bloque__button" value="Agregar propiedad">                                                                 
                    </form>
                </div>
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