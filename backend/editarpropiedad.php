<?php 
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){

    if(!isset($_POST['operacion'])){$_POST['operacion']= ' ';};
if(!isset($_POST['tipo'])){$_POST['tipo']= ' ';};
if(!isset($_POST['codigopostal'])){$_POST['codigopostal']= ' ';};
if(!isset($_POST['tipocalle'])){$_POST['tipocalle']= ' ';};
if(!isset($_POST['calle'])){$_POST['calle']= ' ';};
if(!isset($_POST['altura'])){$_POST['altura']= ' ';};
if(!isset($_POST['ciudad'])){$_POST['ciudad']= ' ';};
if(!isset($_POST['zona'])){$_POST['zona']= ' ';};
if(!isset($_POST['piso'])){$_POST['piso']= ' ';};
if(!isset($_POST['puerta'])){$_POST['puerta']= ' ';};
if(!isset($_POST['bloque'])){$_POST['bloque']= ' ';};
if(!isset($_POST['ocupada'])){$_POST['ocupada']= ' ';};
if(!isset($_POST['coordenadas'])){$_POST['coordenadas']= ' ';};
if(!isset($_POST['toilettes'])){$_POST['toilettes']= ' ';};
if(!isset($_POST['plantas'])){$_POST['plantas']= ' ';};
if($_POST['metrosutiles'] == ''){$_POST['metrosutiles']= '1';};
if(!isset($_POST['supconstruida'])){$_POST['supconstruida']= ' ';};
if(!isset($_POST['banios'])){$_POST['banios']= ' ';};
if(!isset($_POST['anioconstruccion'])){$_POST['anioconstruccion']= ' ';};
if(!isset($_POST['mtscocina'])){$_POST['mtscocina']= ' ';};
if(!isset($_POST['habitaciones'])){$_POST['habitaciones']= ' ';};
if(!isset($_POST['expensas'])){$_POST['expensas']= ' ';};
if(!isset($_POST['ambientes'])){$_POST['ambientes']= ' ';};
if(!isset($_POST['comedor'])){$_POST['comedor']= ' ';};
if(!isset($_POST['living'])){$_POST['living']= ' ';};
if(!isset($_POST['metros_lote'])){$_POST['metros_lote']= ' ';};
if(!isset($_POST['plantabaja'])){$_POST['plantabaja']= ' ';};
if(!isset($_POST['estadogeneral'])){$_POST['estadogeneral']= ' ';};
if(!isset($_POST['carpinteriaext'])){$_POST['carpinteriaext']= ' ';};
if(!isset($_POST['suelo'])){$_POST['suelo']= ' ';};
if(!isset($_POST['orientacion'])){$_POST['orientacion']= ' ';};
if(!isset($_POST['aguacaliente'])){$_POST['aguacaliente']= ' ';};
if(!isset($_POST['carpinteriaint'])){$_POST['carpinteriaint']= ' ';};
if(!isset($_POST['calefaccion'])){$_POST['calefaccion']= ' ';};
if(!isset($_POST['tipococina'])){$_POST['tipococina']= ' ';};
if(!isset($_POST['alarma'])){$_POST['alarma']= ' ';};
if(!isset($_POST['agua'])){$_POST['agua']= ' ';};
if(!isset($_POST['aireacondicionadocentral'])){$_POST['aireacondicionadocentral']= ' ';};
if(!isset($_POST['aireacondicionado'])){$_POST['aireacondicionado']= ' ';};
if(!isset($_POST['bar'])){$_POST['bar']= ' ';};
if(!isset($_POST['alarmaincendio'])){$_POST['alarmaincendio']= ' ';};
if(!isset($_POST['alarmarobo'])){$_POST['alarmarobo']= ' ';};
if(!isset($_POST['altillo'])){$_POST['altillo']= ' ';};
if(!isset($_POST['cajafuerte'])){$_POST['cajafuerte']= ' ';};
if(!isset($_POST['parrilla'])){$_POST['parrilla']= ' ';};
if(!isset($_POST['asensor'])){$_POST['asensor']= ' ';};
if(!isset($_POST['balcon'])){$_POST['balcon']= ' ';};
if(!isset($_POST['chimenea'])){$_POST['chimenea']= ' ';};
if(!isset($_POST['electrodomesticos'])){$_POST['electrodomesticos']= ' ';};
if(!isset($_POST['calefaccionfriocalor'])){$_POST['calefaccionfriocalor']= ' ';};
if(!isset($_POST['centrico'])){$_POST['centrico']= ' ';};
if(!isset($_POST['garaje'])){$_POST['garaje']= ' ';};
if(!isset($_POST['garajedoble'])){$_POST['garajedoble']= ' ';};
if(!isset($_POST['gasnatural'])){$_POST['gasnatural']= ' ';};
if(!isset($_POST['galeria'])){$_POST['galeria']= ' ';};
if(!isset($_POST['habjuegos'])){$_POST['habjuegos']= ' ';};
if(!isset($_POST['hidromasaje'])){$_POST['hidromasaje']= ' ';};
if(!isset($_POST['lineatelefonica'])){$_POST['lineatelefonica']= ' ';};
if(!isset($_POST['gimnasio'])){$_POST['gimnasio']= ' ';};
if(!isset($_POST['jardin'])){$_POST['jardin']= ' ';};
if(!isset($_POST['lavadero'])){$_POST['lavadero']= ' ';};
if(!isset($_POST['patio'])){$_POST['patio']= ' ';};
if(!isset($_POST['jacuzzi'])){$_POST['jacuzzi']= ' ';};
if(!isset($_POST['luz'])){$_POST['luz']= ' ';};
if(!isset($_POST['sauna'])){$_POST['sauna']= ' ';};
if(!isset($_POST['preinstaacc'])){$_POST['preinstaacc']= ' ';};
if(!isset($_POST['luminoso'])){$_POST['luminoso']= ' ';};
if(!isset($_POST['piletapropia'])){$_POST['piletapropia']= ' ';};
if(!isset($_POST['piletacompartida'])){$_POST['piletacompartida']= ' ';};
if(!isset($_POST['riegoautomatico'])){$_POST['riegoautomatico']= ' ';};
if(!isset($_POST['amueblado'])){$_POST['amueblado']= ' ';};
if(!isset($_POST['puertablindada'])){$_POST['puertablindada']= ' ';};
if(!isset($_POST['portonautomatico'])){$_POST['portonautomatico']= ' ';};
if(!isset($_POST['solarium'])){$_POST['solarium']= ' ';};
if(!isset($_POST['pergola'])){$_POST['pergola']= ' ';};
if(!isset($_POST['tv'])){$_POST['tv']= ' ';};
if(!isset($_POST['videoportero'])){$_POST['videoportero']= ' ';};
if(!isset($_POST['satelite'])){$_POST['satelite']= ' ';};
if(!isset($_POST['vestuario'])){$_POST['vestuario']= ' ';};
if(!isset($_POST['buardilla'])){$_POST['buardilla']= ' ';};
if(!isset($_POST['habitacionservicio'])){$_POST['habitacionservicio']= ' ';};
if(!isset($_POST['arboles'])){$_POST['arboles']= ' ';};
if(!isset($_POST['autobuses'])){$_POST['autobuses']= ' ';};
if(!isset($_POST['centrocomercial'])){$_POST['centrocomercial']= ' ';};
if(!isset($_POST['colegios'])){$_POST['colegios']= ' ';};
if(!isset($_POST['costa'])){$_POST['costa']= ' ';};
if(!isset($_POST['golf'])){$_POST['golf']= ' ';};
if(!isset($_POST['hospitales'])){$_POST['hospitales']= ' ';};
if(!isset($_POST['subte'])){$_POST['subte']= ' ';};
if(!isset($_POST['montania'])){$_POST['montania']= ' ';};
if(!isset($_POST['urbanizacion'])){$_POST['urbanizacion']= ' ';};
if(!isset($_POST['rural'])){$_POST['rural']= ' ';};
if(!isset($_POST['vistamar'])){$_POST['vistamar']= ' ';};
if(!isset($_POST['tren'])){$_POST['tren']= ' ';};
if(!isset($_POST['zonasinfantiles'])){$_POST['zonasinfantiles']= ' ';};
if(!isset($_POST['residencial'])){$_POST['residencial']= ' ';};
if(!isset($_POST['barriocerrado'])){$_POST['barriocerrado']= ' ';};
if(!isset($_POST['descripcioncorta'])){$_POST['descripcioncorta']= ' ';};
if(!isset($_POST['descripcionlarga'])){$_POST['descripcionlarga']= ' ';};
if(!isset($_POST['fotoportada'])){$_POST['fotoportada']= ' ';};
if(!isset($_POST['galeriafotos'])){$_POST['galeriafotos']= ' ';};
if(!isset($_POST['descripcionmediana'])){$_POST['descripcionmediana']= ' ';};
if(!isset($_POST['captadopor'])){$_POST['captadopor']= ' ';};
if(!isset($_POST['contactadopor'])){$_POST['contactadopor']= ' ';};
if(!isset($_POST['oficina'])){$_POST['oficina']= ' ';};
if(!isset($_POST['llavero'])){$_POST['llavero']= ' ';};
if($_POST['preciopropietario'] == ''){$_POST['preciopropietario']= 0;};
if($_POST['porcentajesobrecompra'] == ''){$_POST['porcentajesobrecompra']= 0;};
if($_POST['comisionfija'] == ''){$_POST['comisionfija']= 0;};
if($_POST['precioanterior'] == ''){$_POST['precioanterior']= 0;};
if($_POST['tasacion'] == ''){$_POST['tasacion']= 0;};
if($_POST['parcela'] == ''){$_POST['parcela']= 0;};
if($_POST['lote'] == ''){$_POST['lote']= 0;};
if($_POST['tomo'] == ''){$_POST['tomo']= 0;};
if($_POST['libro'] == ''){$_POST['libro']= 0;};
if($_POST['folio'] == ''){$_POST['folio']= 0;};
if($_POST['registro'] == ''){$_POST['registro']= 0;};
if($_POST['ref_catastral'] == ''){$_POST['ref_catastral']= 0;};
if($_POST['valor_catastral'] == ''){$_POST['valor_catastral']= 0;};
if($_POST['contacto_id'] == ''){$_POST['contacto_id']= 0;};
                
    $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE referencia_interna= '".$_GET['ref']."'") or die('query failed');
    $sentencia->execute();
    $list_propiedadesOperacion = $sentencia->fetchAll();                         
    foreach($list_propiedadesOperacion as $propiedad){
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

    // Variables de sección información //
    $NEWoperacion = $_POST['operacion'];
    $NEWtipo = $_POST['tipo'];
    $NEWcodigoPostal = $_POST['codigopostal'];
    $NEWtipoCalle = $_POST['tipocalle'];
    $NEWcalle = $_POST['calle'];
    $NEWaltura = $_POST['altura'];
    $NEWciudad = $_POST['ciudad'];
    $NEWzona = $_POST['zona'];
    $NEWpiso = $_POST['piso'];
    $NEWpuerta = $_POST['puerta'];
    $NEWbloque = $_POST['bloque'];
    $NEWocupada = $_POST['ocupada'];
    $NEWcoordenadas = $_POST['coordenadas'];
    $NEWtoilettes = $_POST['toilettes'];
    $NEWplantas = $_POST['plantas'];
    $NEWmetrosUtiles = $_POST['metrosutiles'];
    $NEWsupConstruida = $_POST['supconstruida'];
    $NEWrebaniosf = $_POST['banios'];
    $NEWanioConstruccion = $_POST['anioconstruccion'];
    $NEWmtsCocina = $_POST['mtscocina'];
    $NEWhabitaciones = $_POST['habitaciones'];
    $NEWexpensas = $_POST['expensas'];
    $NEWambientes = $_POST['ambientes'];
    $NEWcomedor = $_POST['comedor'];
    $NEWliving = $_POST['living'];
    $NEWmetroslote = $_POST['metros_lote'];
    $NEWplantaBaja = $_POST['plantabaja'];
    $NEWestadoGeneral = $_POST['estadogeneral'];
    $NEWcarpinteriaExt = $_POST['carpinteriaext'];
    $NEWsuelo = $_POST['suelo'];
    $NEWorientacion = $_POST['orientacion'];
    $NEWaguacaliente = $_POST['aguacaliente'];
    $NEWcarpinteriaint = $_POST['carpinteriaint'];
    $NEWcalefaccion = $_POST['calefaccion'];
    $NEWtipoCocina = $_POST['tipococina'];
    $NEWalarma = $_POST['alarma'];
    $NEWagua = $_POST['agua'];
    $NEWaireAcondicionadoCentral = $_POST['aireacondicionadocentral'];
    $NEWaireAcondicionado = $_POST['aireacondicionado'];
    $NEWbar = $_POST['bar'];
    $NEWalarmaIncendio = $_POST['alarmaincendio'];
    $NEWalarmaRobo = $_POST['alarmarobo'];
    $NEWaltillo = $_POST['altillo'];
    $NEWcajaFuerte = $_POST['cajafuerte'];
    $NEWparrilla = $_POST['parrilla'];
    $NEWasensor = $_POST['asensor'];
    $NEWbalcon = $_POST['balcon'];
    $NEWchimenea = $_POST['chimenea'];
    $NEWelectroDomesticos = $_POST['electrodomesticos'];
    $NEWcalefaccionFrioCalor = $_POST['calefaccionfriocalor'];
    $NEWcentrico = $_POST['centrico'];
    $NEWgaraje = $_POST['garaje'];
    $NEWgarajeDoble = $_POST['garajedoble'];
    $NEWgasNatural = $_POST['gasnatural'];
    $NEWgaleria = $_POST['galeria'];
    $NEWhabJuegos = $_POST['habjuegos'];
    $NEWhidroMasaje = $_POST['hidromasaje'];
    $NEWlineaTelefonica = $_POST['lineatelefonica'];
    $NEWgimnasio = $_POST['gimnasio'];
    $NEWjardin = $_POST['jardin'];
    $NEWlavadero = $_POST['lavadero'];
    $NEWpatio = $_POST['patio'];
    $NEWjacuzzi = $_POST['jacuzzi'];
    $NEWluz = $_POST['luz'];
    $NEWsauna = $_POST['sauna'];
    $NEWpreinstaacc = $_POST['preinstaacc'];
    $NEWluminoso = $_POST['luminoso'];
    $NEWpiletapropia = $_POST['piletapropia'];
    $NEWpiletacompartida = $_POST['piletacompartida'];
    $NEWriegoautomatico = $_POST['riegoautomatico'];
    $NEWamueblado = $_POST['amueblado'];
    $NEWpuertaBlindada = $_POST['puertablindada'];
    $NEWportonAutomatico = $_POST['portonautomatico'];
    $NEWsolarium = $_POST['solarium'];
    $NEWpergola = $_POST['pergola'];
    $NEWtv = $_POST['tv'];
    $NEWvideoPortero = $_POST['videoportero'];
    $NEWsatelite = $_POST['satelite'];
    $NEWvestuario = $_POST['vestuario'];
    $NEWbuardilla = $_POST['buardilla'];
    $NEWhabitacionServicio = $_POST['habitacionservicio'];
    $NEWarboles = $_POST['arboles'];
    $NEWautobuses = $_POST['autobuses'];
    $NEWcentroComercial = $_POST['centrocomercial'];
    $NEWcolegios = $_POST['colegios'];
    $NEWcosta = $_POST['costa'];
    $NEWgolf = $_POST['golf'];
    $NEWhospitales = $_POST['hospitales'];
    $NEWsubte = $_POST['subte'];
    $NEWmontania = $_POST['montania'];
    $NEWurbanizacion = $_POST['urbanizacion'];
    $NEWrural = $_POST['rural'];
    $NEWvistaMar = $_POST['vistamar'];
    $NEWtren = $_POST['tren'];
    $NEWzonasInfantiles = $_POST['zonasinfantiles'];
    $NEWresidencial = $_POST['residencial'];
    $NEWbarrioCerrado = $_POST['barriocerrado'];
    $NEWdescripcionCorta = $_POST['descripcioncorta'];
    $NEWdescripcionLarga = $_POST['descripcionlarga'];
    $NEWfotoPortada = $_POST['fotoportada'];
    $NEWgaleriaFotos = $_POST['galeriafotos'];
    $NEWdescripcionMediana = $_POST['descripcionmediana'];
    $NEWcaptadoPor = $_POST['captadopor'];
    $NEWcontactadoPor = $_POST['contactadopor'];
    $NEWoficina = $_POST['oficina'];
    $NEWllavero = $_POST['llavero'];
    $NEWprecioproPietario = $_POST['preciopropietario'];
    $NEWporcentajeSobreCompra = $_POST['porcentajesobrecompra'];
    $NEWcomisionFija = $_POST['comisionfija'];
    $NEWprecioAnterior = $_POST['precioanterior'];
    $NEWtasacion = $_POST['tasacion'];
    $NEWparcela = $_POST['parcela'];
    $NEWlote = $_POST['lote'];
    $NEWtomo = $_POST['tomo'];
    $NEWlibro = $_POST['libro'];
    $NEWfolio = $_POST['folio'];
    $NEWregistro = $_POST['registro'];
    $NEWrefCatastral = $_POST['ref_catastral'];
    $NEWvalorCatastral = $_POST['valor_catastral'];
    $NEWcontactoId = $_POST['contacto_id'];


// IF para ver si cumple los requisitos //
if($NEWoperacion != $editarOperacion OR $NEWtipo != $editarPropiedad OR $NEWcodigoPostal != $editarCodPostal OR $NEWtipoCalle != $editarTipoCalle OR $NEWcalle != $editarCalle OR $NEWaltura != $editarAltura OR $NEWciudad != $editarOperacion OR $NEWzona != $editarZona OR $NEWpiso != $editarPiso OR $NEWpuerta != $editarPuerta OR $NEWbloque != $editarBloque OR $NEWocupada != $editarOcupada OR $NEWcoordenadas != $editarCoordenadas OR $NEWtoilettes != $editarNroToilettes OR $NEWplantas != $editarNroPlantas OR $NEWmetrosUtiles != $editarMetrosUtiles OR $NEWsupConstruida != $editarSuperficieConstruida OR $NEWrebaniosf != $editarNroBanios OR $NEWanioConstruccion != $editarAnioConstruccion OR $NEWmtsCocina != $editarMetrosCocina OR $NEWhabitaciones != $editarCantHabitaciones OR $NEWexpensas != $editarExpensas OR $NEWambientes != $editarCantAmbientes OR $NEWcomedor != $editarMetrosComedor OR $NEWliving != $editarMetrosLiving OR $NEWlote != $editarMetrosLote OR $NEWplantaBaja != $editarPlantaBaja OR $NEWestadoGeneral != $editarEstadoGeneral OR $NEWcarpinteriaExt != $editarEstadoCarpinteriaExt OR $NEWsuelo != $editarTipoSuelo OR $NEWorientacion != $editarOrientacion OR $NEWaguacaliente != $editarAguaCaliente OR $NEWcarpinteriaint != $editarEstadoCarpinteriaInt OR $NEWcalefaccion != $editarTipoCalefaccion OR $NEWtipoCocina != $editarTipoCocina OR $NEWalarma != $editarAlarma OR $NEWagua != $editarAgua OR $NEWaireAcondicionadoCentral != $editarAireAcondicionadoCentral OR $NEWaireAcondicionado != $editarAireAcondicionado OR $NEWbar != $editarBar OR $NEWalarmaIncendio != $editarAlarmaIncendio OR $NEWalarmaRobo != $editarAlarmaRobo OR $NEWaltillo != $editarAltillo OR $NEWcajaFuerte != $editarCajaFuerte OR $NEWparrilla != $editarParrilla OR $NEWasensor != $editarAscensor OR $NEWbalcon != $editarBalcon OR $NEWchimenea != $editarChimenea OR $NEWelectroDomesticos != $editarElectrodomesticos OR $NEWcalefaccionFrioCalor != $editarCalefaccionFrioCalor OR $NEWcentrico != $editarCentrico OR $NEWgaraje != $editarGaraje OR $NEWgarajeDoble != $editarGarajeDoble OR $NEWgasNatural != $editarGasNatural OR $NEWgaleria != $editargaleria OR $NEWhabJuegos != $editarHabJuegos OR $NEWhidroMasaje != $editarhidromasaje OR $NEWlineaTelefonica != $editarLineaTelefonica OR $NEWgimnasio != $editarGimnasio OR $NEWjardin != $editarJardin OR $NEWlavadero != $editarLavadero OR $NEWpatio != $editarPatio OR $NEWjacuzzi != $editarJacuzzi OR $NEWluz != $editarLuz OR $NEWsauna != $editarSauna OR $NEWpreinstaacc != $editarPreinstAacc OR $NEWluminoso != $editarLuminoso OR $NEWpiletapropia != $editarPiletaPropia OR $NEWpiletacompartida != $editarPiletaCompartida OR $NEWriegoautomatico != $editarRiegoAutomatico OR $NEWamueblado != $editarAmueblado OR $NEWpuertaBlindada != $editarPuertaBlindada OR $NEWportonAutomatico != $editarPortonAutomatico OR $NEWsolarium != $editarSolarium OR $NEWpergola != $editarPergola OR $NEWtv != $editarTv OR $NEWvideoPortero != $editarVideoPortero OR $NEWsatelite != $editarSatelite OR $NEWvestuario != $editarVestuario OR $NEWbuardilla != $editarBuardilla OR $NEWhabitacionServicio != $editarHabitacionServicio OR $NEWarboles != $editarArboles OR $NEWautobuses != $editarAutobuses OR $NEWcentroComercial != $editarCentroComercial OR $NEWcolegios != $editarColegios OR $NEWcosta != $editarCosta OR $NEWgolf != $editarGolf OR $NEWhospitales != $editarHospitales OR $NEWsubte != $editarSubte OR $NEWmontania != $editarMontania OR $NEWurbanizacion != $editarUrbanizacion OR $NEWrural != $editarRural OR $NEWvistaMar != $editarVistaMar OR $NEWtren != $editarTren OR $NEWzonasInfantiles != $editarZonasInfantiles OR $NEWresidencial != $editarResidencial OR $NEWbarrioCerrado != $editarBarrioCerrado OR $NEWdescripcionCorta != $editarDescripcionCorta OR $NEWdescripcionLarga != $editarDescripcionCompleta OR $NEWfotoPortada != $editarFotoPortada OR $NEWgaleriaFotos != $editarGaleriaFotos OR $NEWdescripcionMediana != $editarOperacion OR $NEWcaptadoPor != $editarCaptadoPor OR $NEWcontactadoPor != $editarContactadoPor OR $NEWoficina != $editarOficina OR $NEWllavero != $editarLlavero OR $NEWprecioproPietario != $editarPrecioPropietario OR $NEWporcentajeSobreCompra != $editarPorcentajeComision OR $NEWcomisionFija != $editarComisionFija OR $NEWprecioAnterior != $editarPrecioAnterior OR $NEWtasacion != $editarTasacion OR $NEWparcela != $editarParcela OR $NEWlote != $editarLote OR $NEWtomo != $editarTomo OR $NEWlibro != $editarLibro OR $NEWfolio != $editarFolio OR $NEWregistro != $editarRegistro OR $NEWrefCatastral != $editarRefCatastral OR $NEWvalorCatastral != $editarValorCatastral OR $NEWcontactoId != $editarContactoId){  
        

    // Update en mi información //
    $update = " status_id = 1";

    if($NEWoperacion != $editarOperacion){
        $update .= ", operacion_id = '".$NEWoperacion."'";
    }
    if($NEWtipo != $editarPropiedad){
        $update .= ", tipo_propiedad_id = '".$NEWtipo."'";
    }
    if($NEWcodigoPostal != $editarCodPostal){
        $update .= ", cod_postal = '".$NEWcodigoPostal."'";
    }
    if($NEWtipoCalle != $editarTipoCalle){
        $update .= ", tipo_calle_id = '".$NEWtipoCalle."'";
    }
    if($NEWcalle != $editarCalle){
        $update .= ", calle = '".$NEWcalle."'";
    }
    if($NEWaltura != $editarAltura){
        $update .= ", altura = '".$NEWaltura."'";
    }
    if($NEWciudad != $editarOperacion){
        $update .= ", ciudad_id = '".$NEWciudad."'";
    }
    if($NEWzona != $editarZona){
        $update .= ", zona_id = '".$NEWzona."'";
    }
    if($NEWpiso != $editarPiso){
        $update .= ", piso = '".$NEWpiso."'";
    }
    if($NEWpuerta != $editarPuerta){
        $update .= ", puerta = '".$NEWpuerta."'";
    }
    if($NEWbloque != $editarBloque){
        $update .= ", bloque = '".$NEWbloque."'";
    }
    if($NEWocupada != $editarOcupada){
        $update .= ", ocupada = '".$NEWocupada."'";
    }
    if($NEWcoordenadas != $editarCoordenadas){
        $update .= ", coordenadas = '".$NEWcoordenadas."'";
    }
    if($NEWtoilettes != $editarNroToilettes){
        $update .= ", nro_toilettes = '".$NEWtoilettes."'";
    }
    if($NEWplantas != $editarNroPlantas){
        $update .= ", nro_plantas = '".$NEWplantas."'";
    }
    if($NEWmetrosUtiles != $editarMetrosUtiles){
        $update .= ", metros_utiles = '".$NEWmetrosUtiles."'";
    }
    if($NEWsupConstruida != $editarSuperficieConstruida){
        $update .= ", supeficie_construida = '".$NEWsupConstruida."'";
    }
    if($NEWrebaniosf != $editarNroBanios){
        $update .= ", nro_banios = '".$NEWrebaniosf."'";
    }
    if($NEWanioConstruccion != $editarAnioConstruccion){
        $update .= ", anio_contruccion = '".$NEWanioConstruccion."'";
    }
    if($NEWmtsCocina != $editarMetrosCocina){
        $update .= ", mts_cocina = '".$NEWmtsCocina."'";
    }
    if($NEWhabitaciones != $editarCantHabitaciones){
        $update .= ", cant_habitaciones = '".$NEWhabitaciones."'";
    }
    if($NEWexpensas != $editarExpensas){
        $update .= ", expensas = '".$NEWexpensas."'";
    }
    if($NEWambientes != $editarCantAmbientes){
        $update .= ", cant_ambientes = '".$NEWambientes."'";
    }
    if($NEWcomedor != $editarMetrosComedor){
        $update .= ", mts_comendor = '".$NEWcomedor."'";
    }
    if($NEWliving != $editarMetrosLiving){
        $update .= ", mts_living = '".$NEWliving."'";
    }
    if($NEWmetroslote != $editarMetrosLote){
        $update .= ", mts_lote = '".$NEWmetroslote."'";
    }
    if($NEWplantaBaja != $editarPlantaBaja){
        $update .= ", planta_baja = '".$NEWplantaBaja."'";
    }
    if($NEWestadoGeneral != $editarEstadoGeneral){
        $update .= ", estado_general_id = '".$NEWestadoGeneral."'";
    }
    if($NEWcarpinteriaExt != $editarEstadoCarpinteriaExt){
        $update .= ", estado_carpinteria_externa_id = '".$NEWcarpinteriaExt."'";
    }
    if($NEWsuelo != $editarTipoSuelo){
        $update .= ", tipo_suelo_id = '".$NEWsuelo."'";
    }
    if($NEWorientacion != $editarOrientacion){
        $update .= ", orientacion = '".$NEWorientacion."'";
    }
    if($NEWaguacaliente != $editarAguaCaliente){
        $update .= ", agua_caliente_id = '".$NEWaguacaliente."'";
    }
    if($NEWcarpinteriaint != $editarEstadoCarpinteriaInt){
        $update .= ", estado_carpinteria_interna_id = '".$NEWcarpinteriaint."'";
    }
    if($NEWcalefaccion != $editarTipoCalefaccion){
        $update .= ", tipo_calefaccion_id = '".$NEWcalefaccion."'";
    }
    if($NEWtipoCocina != $editarTipoCocina){
        $update .= ", tipo_cocina_id = '".$NEWtipoCocina."'";
    }
    if($NEWalarma != $editarAlarma){
        $update .= ", alarma = '".$NEWalarma."'";
    }
    if($NEWagua != $editarAgua){
        $update .= ", agua = '".$NEWagua."'";
    }
    if($NEWaireAcondicionadoCentral != $editarAireAcondicionadoCentral){
        $update .= ", aire_acondicionado_central = '".$NEWaireAcondicionadoCentral."'";
    }
    if($NEWaireAcondicionado != $editarAireAcondicionado){
        $update .= ", aire_acondicionado = '".$NEWaireAcondicionado."'";
    }
    if($NEWbar != $editarBar){
        $update .= ", bar = '".$NEWbar."'";
    }
    if($NEWalarmaIncendio != $editarAlarmaIncendio){
        $update .= ", alarma_incendio = '".$NEWalarmaIncendio."'";
    }
    if($NEWalarmaRobo != $editarAlarmaRobo){
        $update .= ", alarma_robo = '".$NEWalarmaRobo."'";
    }
    if($NEWaltillo != $editarAltillo){
        $update .= ", altillo = '".$NEWaltillo."'";
    }
    if($NEWcajaFuerte != $editarCajaFuerte){
        $update .= ", caja_fuerte = '".$NEWcajaFuerte."'";
    }
    if($NEWparrilla != $editarParrilla){
        $update .= ", parrilla = '".$NEWparrilla."'";
    }
    if($NEWasensor != $editarAscensor){
        $update .= ", asensor = '".$NEWasensor."'";
    }
    if($NEWbalcon != $editarBalcon){
        $update .= ", balcon = '".$NEWbalcon."'";
    }
    if($NEWchimenea != $editarChimenea){
        $update .= ", chimenea = '".$NEWchimenea."'";
    }
    if($NEWelectroDomesticos != $editarElectrodomesticos){
        $update .= ", electrodomesticos = '".$NEWelectroDomesticos."'";
    }
    if($NEWcalefaccionFrioCalor != $editarCalefaccionFrioCalor){
        $update .= ", calefaccion_frio_calor = '".$NEWcalefaccionFrioCalor."'";
    }
    if($NEWcentrico != $editarCentrico){
        $update .= ", centrico = '".$NEWcentrico."'";
    }
    if($NEWgaraje != $editarGaraje){
        $update .= ", garaje = '".$NEWgaraje."'";
    }
    if($NEWgarajeDoble != $editarGarajeDoble){
        $update .= ", garaje_doble = '".$NEWgarajeDoble."'";
    }
    if($NEWgasNatural != $editarGasNatural){
        $update .= ", gas_natural = '".$NEWgasNatural."'";
    }
    if($NEWgaleria != $editargaleria){
        $update .= ", galeria = '".$NEWgaleria."'";
    }
    if($NEWhabJuegos != $editarHabJuegos){
        $update .= ", hab_juegos = '".$NEWhabJuegos."'";
    }
    if($NEWhidroMasaje != $editarhidromasaje){
        $update .= ", hidromasaje = '".$NEWhidroMasaje."'";
    }
    if($NEWlineaTelefonica != $editarLineaTelefonica){
        $update .= ", linea_telefonica = '".$NEWlineaTelefonica."'";
    }
    if($NEWgimnasio != $editarGimnasio){
        $update .= ", gimnacio = '".$NEWgimnasio."'";
    }
    if($NEWjardin != $editarJardin){
        $update .= ", jardin = '".$NEWjardin."'";
    }
    if($NEWlavadero != $editarLavadero){
        $update .= ", lavadero = '".$NEWlavadero."'";
    }
    if($NEWpatio != $editarPatio){
        $update .= ", patio = '".$NEWpatio."'";
    }
    if($NEWjacuzzi != $editarJacuzzi){
        $update .= ", jacuzzi = '".$NEWjacuzzi."'";
    }
    if($NEWluz != $editarLuz){
        $update .= ", luz = '".$NEWluz."'";
    }
    if($NEWsauna != $editarSauna){
        $update .= ", sauna = '".$NEWsauna."'";
    }
    if($NEWpreinstaacc != $editarPreinstAacc){
        $update .= ", preinst_aacc = '".$NEWpreinstaacc."'";
    }
    if($NEWluminoso != $editarLuminoso){
        $update .= ", luminoso = '".$NEWluminoso."'";
    }
    if($NEWpiletapropia != $editarPiletaPropia){
        $update .= ", pileta_propia = '".$NEWpiletapropia."'";
    }
    if($NEWpiletacompartida != $editarPiletaCompartida){
        $update .= ", pileta_compartida = '".$NEWpiletacompartida."'";
    }
    if($NEWriegoautomatico != $editarRiegoAutomatico){
        $update .= ", riego_automatico = '".$NEWriegoautomatico."'";
    }
    if($NEWamueblado != $editarAmueblado){
        $update .= ", amueblado = '".$NEWamueblado."'";
    }
    if($NEWpuertaBlindada != $editarPuertaBlindada){
        $update .= ", puerta_blindada = '".$NEWpuertaBlindada."'";
    }
    if($NEWportonAutomatico != $editarPortonAutomatico){
        $update .= ", porton_automatico = '".$NEWportonAutomatico."'";
    }
    if($NEWsolarium != $editarSolarium){
        $update .= ", solarium = '".$NEWsolarium."'";
    }
    if($NEWpergola != $editarPergola){
        $update .= ", pergola = '".$NEWpergola."'";
    }
    if($NEWtv != $editarTv){
        $update .= ", tv = '".$NEWtv."'";
    }
    if($NEWvideoPortero != $editarVideoPortero){
        $update .= ", videoportero = '".$NEWvideoPortero."'";
    }
    if($NEWsatelite != $editarSatelite){
        $update .= ", satelite = '".$NEWsatelite."'";
    }
    if($NEWvestuario != $editarVestuario){
        $update .= ", vestuario = '".$NEWvestuario."'";
    }
    if($NEWbuardilla != $editarBuardilla){
        $update .= ", buardilla = '".$NEWbuardilla."'";
    }
    if($NEWhabitacionServicio != $editarHabitacionServicio){
        $update .= ", habitacion_servicio = '".$NEWhabitacionServicio."'";
    }
    if($NEWarboles != $editarArboles){
        $update .= ", arboles = '".$NEWarboles."'";
    }
    if($NEWautobuses != $editarAutobuses){
        $update .= ", autobuses = '".$NEWautobuses."'";
    }
    if($NEWcentroComercial != $editarCentroComercial){
        $update .= ", centro_comercial = '".$NEWcentroComercial."'";
    }
    if($NEWcolegios != $editarColegios){
        $update .= ", colegios = '".$NEWcolegios."'";
    }
    if($NEWcosta != $editarCosta){
        $update .= ", costa = '".$NEWcosta."'";
    }
    if($NEWgolf != $editarGolf){
        $update .= ", golf = '".$NEWgolf."'";
    }
    if($NEWhospitales != $editarHospitales){
        $update .= ", hospitales = '".$NEWhospitales."'";
    }
    if($NEWsubte != $editarSubte){
        $update .= ", subte = '".$NEWsubte."'";
    }
    if($NEWmontania != $editarMontania){
        $update .= ", montania = '".$NEWmontania."'";
    }
    if($NEWurbanizacion != $editarUrbanizacion){
        $update .= ", urbanizacion = '".$NEWurbanizacion."'";
    }
    if($NEWrural != $editarRural){
        $update .= ", rural = '".$NEWrural."'";
    }
    if($NEWvistaMar != $editarVistaMar){
        $update .= ", vista_al_mar = '".$NEWvistaMar."'";
    }
    if($NEWtren != $editarTren){
        $update .= ", tren = '".$NEWtren."'";
    }
    if($NEWzonasInfantiles != $editarZonasInfantiles){
        $update .= ", zonas_infantiles = '".$NEWzonasInfantiles."'";
    }
    if($NEWresidencial != $editarResidencial){
        $update .= ", residencial = '".$NEWresidencial."'";
    }
    if($NEWbarrioCerrado != $editarBarrioCerrado){
        $update .= ", barrio_cerrado = '".$NEWbarrioCerrado."'";
    }
    if($NEWdescripcionCorta != $editarDescripcionCorta){
        $update .= ", descripcion_corta = '".$NEWdescripcionCorta."'";
    }
    if($NEWdescripcionLarga != $editarDescripcionCompleta){
        $update .= ", descripcion_completa = '".$NEWdescripcionLarga."'";
    }
    if($NEWfotoPortada != $editarFotoPortada){
        $update .= ", foto_portada = '".$NEWfotoPortada."'";
    }
    if($NEWgaleriaFotos != $editarGaleriaFotos){
        $update .= ", galeria_fotos = '".$NEWgaleriaFotos."'";
    }
    if($NEWdescripcionMediana != $editarOperacion){
        $update .= ", descripcion_mediana = '".$NEWdescripcionMediana."'";
    }
    if($NEWcaptadoPor != $editarCaptadoPor){
        $update .= ", captado_por = '".$NEWcaptadoPor."'";
    }
    if($NEWcontactadoPor != $editarContactadoPor){
        $update .= ", contactado_por = '".$NEWcontactadoPor."'";
    }
    if($NEWoficina != $editarOficina){
        $update .= ", oficina_id = '".$NEWoficina."'";
    }
    if($NEWllavero != $editarLlavero){
        $update .= ", llavero = '".$NEWllavero."'";
    }
    if($NEWprecioproPietario != $editarPrecioPropietario){
        $update .= ", precio_propietario = '".$NEWprecioproPietario."'";
    }
    if($NEWporcentajeSobreCompra != $editarPorcentajeComision){
        $update .= ", porcentaje_comision = '".$NEWporcentajeSobreCompra."'";
    }
    if($NEWcomisionFija != $editarComisionFija){
        $update .= ", comision_fija = '".$NEWcomisionFija."'";
    }
    if($NEWprecioAnterior != $editarPrecioAnterior){
        $update .= ", precio_anterior = '".$NEWprecioAnterior."'";
    }
    if($NEWtasacion != $editarTasacion){
        $update .= ", tasacion = '".$NEWtasacion."'";
    }
    if($NEWparcela != $editarParcela){
        $update .= ", parcela = '".$NEWparcela."'";
    }
    if($NEWlote != $editarLote){
        $update .= ", lote = '".$NEWlote."'";
    }
    if($NEWtomo != $editarTomo){
        $update .= ", tomo = '".$NEWtomo."'";
    }
    if($NEWlibro != $editarLibro){
        $update .= ", libro = '".$NEWlibro."'";
    }
    if($NEWfolio != $editarFolio){
        $update .= ", folio = '".$NEWfolio."'";
    }
    if($NEWregistro != $editarRegistro){
        $update .= ", registro = '".$NEWregistro."'";
    }
    if($NEWrefCatastral != $editarRefCatastral){
        $update .= ", ref_catastral = '".$NEWrefCatastral."'";
    }
    if($NEWvalorCatastral != $editarValorCatastral){
        $update .= ", valor_catastral = '".$NEWvalorCatastral."'";
    }
    if($NEWcontactoId != $editarContactoId){
        $update .= ", propietarios = '".$NEWcontactoId."'";
    }
    

    // Hago el update en la DB //
    $query = $connect-> prepare ("UPDATE wp_propiedades SET $update WHERE referencia_interna= '".$_GET['ref']."'");
    $query->execute();

    echo '<script> alert("Cambios Realizados con éxito"); window.location = "../propiedades.php"; </script>';

}else{echo '<script> alert("No se han realizado cambios"); window.location = "../propiedades.php"; </script>';}






}else{echo '<script> alert("Para ingresar a la pagina debe tener una sesión iniciada"); window.location = "../login.php"; </script>';};
?>
