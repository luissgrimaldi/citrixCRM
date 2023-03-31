<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
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
    $editarFotoPortada = strval($propiedad['foto_portada']);
    $editarFotoPortada = str_replace('"', '', $editarFotoPortada);;
    $editarFotoPortada = str_replace("[", "", $editarFotoPortada);
    $editarFotoPortada = str_replace("]", "", $editarFotoPortada);
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
                    
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-building main__h1--emoji"></i><h1 class="main__h1">Propiedad #<?php echo $_GET['ref'];?></h1></div>
                    <div class="main__buttons">
                        <a href="editarpropiedad.php?ref=<?php echo $_GET['ref'];?>" class="main__buttons__button">Editar propiedad</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__user">
                    <div class="main__user__content">
                        <div class="main__user__content__bloque">
                            <div class="main__user__content__bloque__content">
                                <img class="main__user__content__bloque__content__img" src="https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__<?php echo $editarFotoPortada;?>" alt="">
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span><?php echo $editarDescripcionCorta.' ('.$editarCalle.' '.$editarAltura.')'?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Dueño:<span class="main__user__content__bloque__content__respuesta">
                                <?php 
                                $sentencia = $connect->prepare("SELECT * FROM `wp_contactos` WHERE id =?") or die('query failed');
                                $sentencia->execute([$editarContactoId]);
                                $contactos = $sentencia->fetchAll();
                                if(!$editarContactoId){
                                    echo 'No se encontraron propietarios';
                                }else{                  
                                    foreach($contactos as $contacto){
                                    $contactoNombre = $contacto['nombre'];
                                    $contactoApellido = $contacto['apellido'];
                                    ?>
                                    <a href="contactosinfo.php?contacto=<?php echo $editarContactoId;?>"><?php 
                                    echo $contactoNombre.' '.$contactoApellido;}?>
                                </a>
                                    <?php ;}?>
                                </span></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span class="main__user__content__bloque__content__respuesta">U$S <?php echo number_format($editarPrecioPropietario,0,",", ".")?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Superfice construida: <span class="main__user__content__bloque__content__respuesta"><?php echo $editarSuperficieConstruida;?>m2</span></span>
                            </div>                      
                            <div class="main__user__content__bloque__content">
                                <span>Habitaciones: <span class="main__user__content__bloque__content__respuesta"><?php echo $editarCantHabitaciones;?></span></span>
                            </div>                      
                            <div class="main__user__content__bloque__content">
                                <span>Baños: <span class="main__user__content__bloque__content__respuesta"><?php echo $editarNroBanios;?></span></span>
                            </div>                      
                            <div class="main__user__content__bloque__content">
                                <?php if($editarPlantaBaja == 1){?><span>Planta baja: <span class="main__user__content__bloque__content__respuesta"><i class="fa-solid fa-check"></i></span></span><?php ;}?>
                                <?php if($editarGaraje == 1){?><span>Garaje: <span class="main__user__content__bloque__content__respuesta"><i class="fa-solid fa-check"></i></span></span><?php ;}?>
                                <?php if($editarGarajeDoble == 1){?><span>Garaje doble: <span class="main__user__content__bloque__content__respuesta"><i class="fa-solid fa-check"></i></span></span><?php ;}?>
                                <?php if($editarAmueblado == 1){?><span>Amueblada: <span class="main__user__content__bloque__content__respuesta"><i class="fa-solid fa-check"></i></span></span><?php ;}?>
                                <?php if($editarBalcon == 1){?><span>Balcon: <span class="main__user__content__bloque__content__respuesta"><i class="fa-solid fa-check"></i></span></span><?php ;}?>
                                <?php if($editarPiletaPropia == 1){?><span>Pileta propia: <span class="main__user__content__bloque__content__respuesta"><i class="fa-solid fa-check"></i></span></span><?php ;}?>
                                <?php if($editarPiletaCompartida == 1){?><span>Pileta compartida: <span class="main__user__content__bloque__content__respuesta"><i class="fa-solid fa-check"></i></span></span><?php ;}?>
                            </div>                      
                        </div>
                    </div>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js?<?php echo time(); ?>"></script>
</body>
</html>
