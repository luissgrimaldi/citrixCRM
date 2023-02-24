<?php
// Agregar propiedad //
function agregarPropiedad($connect): void{   
    if(!isset($_POST['operacion'])){$_POST['operacion']= '';};
    if(!isset($_POST['tipo'])){$_POST['tipo']= '';};
    if(!isset($_POST['codigopostal'])){$_POST['codigopostal']= '';};
    if(!isset($_POST['tipocalle'])){$_POST['tipocalle']= '';};
    if(!isset($_POST['calle'])){$_POST['calle']= '';};
    if(!isset($_POST['altura'])){$_POST['altura']= '';}; 
    if(!isset($_POST['ciudad'])){$_POST['ciudad']= '';};
    if(!isset($_POST['zona'])){$_POST['zona']= '';}; 
    if(!isset($_POST['piso'])){$_POST['piso']= '';};
    if(!isset($_POST['puerta'])){$_POST['puerta']= '';};
    if(!isset($_POST['bloque'])){$_POST['bloque']= '';};
    if(!isset($_POST['ocupada'])){$_POST['ocupada']= '';};
    if(!isset($_POST['coordenadas'])){$_POST['coordenadas']= '';};
    if(!isset($_POST['toilettes'])){$_POST['toilettes']= '';};
    if(!isset($_POST['plantas'])){$_POST['plantas']= '';};
    if($_POST['metrosutiles'] == ''){$_POST['metrosutiles']= '1';};
    if(!isset($_POST['supconstruida'])){$_POST['supconstruida']= '';};
    if(!isset($_POST['banios'])){$_POST['banios']= '';};
    if(!isset($_POST['anioconstruccion'])){$_POST['anioconstruccion']= '';};
    if(!isset($_POST['mtscocina'])){$_POST['mtscocina']= '';};
    if(!isset($_POST['habitaciones'])){$_POST['habitaciones']= '';};
    if(!isset($_POST['expensas'])){$_POST['expensas']= '';};
    if(!isset($_POST['ambientes'])){$_POST['ambientes']= '';};
    if(!isset($_POST['comedor'])){$_POST['comedor']= '';};
    if(!isset($_POST['living'])){$_POST['living']= '';};
    if(!isset($_POST['metros_lote'])){$_POST['metros_lote']= '';};
    if(!isset($_POST['plantabaja'])){$_POST['plantabaja']= '';};
    if(!isset($_POST['estadogeneral'])){$_POST['estadogeneral']= '';};
    if(!isset($_POST['carpinteriaext'])){$_POST['carpinteriaext']= '';};
    if(!isset($_POST['suelo'])){$_POST['suelo']= '';};
    if(!isset($_POST['orientacion'])){$_POST['orientacion']= '';};
    if(!isset($_POST['aguacaliente'])){$_POST['aguacaliente']= '';};
    if(!isset($_POST['carpinteriaint'])){$_POST['carpinteriaint']= '';};
    if(!isset($_POST['calefaccion'])){$_POST['calefaccion']= '';};
    if(!isset($_POST['tipococina'])){$_POST['tipococina']= '';};
    if(!isset($_POST['alarma'])){$_POST['alarma']= '';};
    if(!isset($_POST['agua'])){$_POST['agua']= '';};
    if(!isset($_POST['aireacondicionadocentral'])){$_POST['aireacondicionadocentral']= '';};
    if(!isset($_POST['aireacondicionado'])){$_POST['aireacondicionado']= '';};
    if(!isset($_POST['bar'])){$_POST['bar']= '';};
    if(!isset($_POST['alarmaincendio'])){$_POST['alarmaincendio']= '';};
    if(!isset($_POST['alarmarobo'])){$_POST['alarmarobo']= '';};
    if(!isset($_POST['altillo'])){$_POST['altillo']= '';};
    if(!isset($_POST['cajafuerte'])){$_POST['cajafuerte']= '';};
    if(!isset($_POST['parrilla'])){$_POST['parrilla']= '';};
    if(!isset($_POST['asensor'])){$_POST['asensor']= '';};
    if(!isset($_POST['balcon'])){$_POST['balcon']= '';};
    if(!isset($_POST['chimenea'])){$_POST['chimenea']= '';};
    if(!isset($_POST['electrodomesticos'])){$_POST['electrodomesticos']= '';};
    if(!isset($_POST['calefaccionfriocalor'])){$_POST['calefaccionfriocalor']= '';};
    if(!isset($_POST['centrico'])){$_POST['centrico']= '';};
    if(!isset($_POST['garaje'])){$_POST['garaje']= '';};
    if(!isset($_POST['garajedoble'])){$_POST['garajedoble']= '';};
    if(!isset($_POST['gasnatural'])){$_POST['gasnatural']= '';};
    if(!isset($_POST['galeria'])){$_POST['galeria']= '';};
    if(!isset($_POST['habjuegos'])){$_POST['habjuegos']= '';};
    if(!isset($_POST['hidromasaje'])){$_POST['hidromasaje']= '';};
    if(!isset($_POST['lineatelefonica'])){$_POST['lineatelefonica']= '';};
    if(!isset($_POST['gimnasio'])){$_POST['gimnasio']= '';};
    if(!isset($_POST['jardin'])){$_POST['jardin']= '';};
    if(!isset($_POST['lavadero'])){$_POST['lavadero']= '';};
    if(!isset($_POST['patio'])){$_POST['patio']= '';};
    if(!isset($_POST['jacuzzi'])){$_POST['jacuzzi']= '';};
    if(!isset($_POST['luz'])){$_POST['luz']= '';};
    if(!isset($_POST['sauna'])){$_POST['sauna']= '';};
    if(!isset($_POST['preinstaacc'])){$_POST['preinstaacc']= '';};
    if(!isset($_POST['luminoso'])){$_POST['luminoso']= '';};
    if(!isset($_POST['piletapropia'])){$_POST['piletapropia']= '';};
    if(!isset($_POST['piletacompartida'])){$_POST['piletacompartida']= '';};
    if(!isset($_POST['riegoautomatico'])){$_POST['riegoautomatico']= '';};
    if(!isset($_POST['amueblado'])){$_POST['amueblado']= '';};
    if(!isset($_POST['puertablindada'])){$_POST['puertablindada']= '';};
    if(!isset($_POST['portonautomatico'])){$_POST['portonautomatico']= '';};
    if(!isset($_POST['solarium'])){$_POST['solarium']= '';};
    if(!isset($_POST['pergola'])){$_POST['pergola']= '';};
    if(!isset($_POST['tv'])){$_POST['tv']= '';};
    if(!isset($_POST['videoportero'])){$_POST['videoportero']= '';};
    if(!isset($_POST['satelite'])){$_POST['satelite']= '';};
    if(!isset($_POST['vestuario'])){$_POST['vestuario']= '';};
    if(!isset($_POST['buardilla'])){$_POST['buardilla']= '';};
    if(!isset($_POST['habitacionservicio'])){$_POST['habitacionservicio']= '';};
    if(!isset($_POST['arboles'])){$_POST['arboles']= '';};
    if(!isset($_POST['autobuses'])){$_POST['autobuses']= '';};
    if(!isset($_POST['centrocomercial'])){$_POST['centrocomercial']= '';};
    if(!isset($_POST['colegios'])){$_POST['colegios']= '';};
    if(!isset($_POST['costa'])){$_POST['costa']= '';};
    if(!isset($_POST['golf'])){$_POST['golf']= '';};
    if(!isset($_POST['hospitales'])){$_POST['hospitales']= '';};
    if(!isset($_POST['subte'])){$_POST['subte']= '';};
    if(!isset($_POST['montania'])){$_POST['montania']= '';};
    if(!isset($_POST['urbanizacion'])){$_POST['urbanizacion']= '';};
    if(!isset($_POST['rural'])){$_POST['rural']= '';};
    if(!isset($_POST['vistamar'])){$_POST['vistamar']= '';};
    if(!isset($_POST['tren'])){$_POST['tren']= '';};
    if(!isset($_POST['zonasinfantiles'])){$_POST['zonasinfantiles']= '';};
    if(!isset($_POST['residencial'])){$_POST['residencial']= '';};
    if(!isset($_POST['barriocerrado'])){$_POST['barriocerrado']= '';};
    if(!isset($_POST['descripcioncorta'])){$_POST['descripcioncorta']= '';};
    if(!isset($_POST['descripcionlarga'])){$_POST['descripcionlarga']= '';};
    if(!isset($_POST['fotoportada'])){$_POST['fotoportada']= '';};
    if(!isset($_POST['galeriafotos'])){$_POST['galeriafotos']= '';};
    if(!isset($_POST['descripcionmediana'])){$_POST['descripcionmediana']= '';};
    if(!isset($_POST['captadopor'])){$_POST['captadopor']= '';};
    if(!isset($_POST['contactadopor'])){$_POST['contactadopor']= '';};
    if(!isset($_POST['oficina'])){$_POST['oficina']= '';};
    if(!isset($_POST['llavero'])){$_POST['llavero']= '';};
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

    do{
        $caracteres_permitidos1 = 'ABFGHIJKLMNOPQRSUVYZ';
        $caracteres_permitidos2 = '0123456789';
        $longitudLetra = 1;
        $longitudNumero = 4;
        $refLetra = substr(str_shuffle($caracteres_permitidos1), 0, $longitudLetra);
        $refNumero = substr(str_shuffle($caracteres_permitidos2), 0, $longitudNumero);
        $ref = $refLetra.$refNumero;
        $verRef = $connect-> prepare ("SELECT `referencia_interna` FROM `wp_propiedades` WHERE referencia_interna = ?");
        $verRef->execute ([$ref]);
        $refExiste = $verRef->fetchColumn();
    }while ($refExiste > 0);



    $operacion = $_POST['operacion'];
    $tipo = $_POST['tipo'];
    $codigoPostal = $_POST['codigopostal'];
    $tipoCalle = $_POST['tipocalle'];
    $calle = $_POST['calle'];
    $altura = $_POST['altura'];
    $ciudad = $_POST['ciudad'];
    $zona = $_POST['zona'];
    $piso = $_POST['piso'];
    $puerta = $_POST['puerta'];
    $bloque = $_POST['bloque'];
    $ocupada = $_POST['ocupada'];
    $coordenadas = $_POST['coordenadas'];
    $toilettes = $_POST['toilettes'];
    $plantas = $_POST['plantas'];
    $metrosUtiles = $_POST['metrosutiles'];
    $supConstruida = $_POST['supconstruida'];
    $rebaniosf = $_POST['banios'];
    $anioConstruccion = $_POST['anioconstruccion'];
    $mtsCocina = $_POST['mtscocina'];
    $habitaciones = $_POST['habitaciones'];
    $expensas = $_POST['expensas'];
    $ambientes = $_POST['ambientes'];
    $comedor = $_POST['comedor'];
    $living = $_POST['living'];
    $metrosLote = $_POST['metros_lote'];
    $plantaBaja = $_POST['plantabaja'];
    $estadoGeneral = $_POST['estadogeneral'];
    $carpinteriaExt = $_POST['carpinteriaext'];
    $suelo = $_POST['suelo'];
    $orientacion = $_POST['orientacion'];
    $aguacaliente = $_POST['aguacaliente'];
    $carpinteriaint = $_POST['carpinteriaint'];
    $calefaccion = $_POST['calefaccion'];
    $tipoCocina = $_POST['tipococina'];
    $alarma = $_POST['alarma'];
    $agua = $_POST['agua'];
    $aireAcondicionadoCentral = $_POST['aireacondicionadocentral'];
    $aireAcondicionado = $_POST['aireacondicionado'];
    $bar = $_POST['bar'];
    $alarmaIncendio = $_POST['alarmaincendio'];
    $alarmaRobo = $_POST['alarmarobo'];
    $altillo = $_POST['altillo'];
    $cajaFuerte = $_POST['cajafuerte'];
    $parrilla = $_POST['parrilla'];
    $asensor = $_POST['asensor'];
    $balcon = $_POST['balcon'];
    $chimenea = $_POST['chimenea'];
    $electroDomesticos = $_POST['electrodomesticos'];
    $calefaccionFrioCalor = $_POST['calefaccionfriocalor'];
    $centrico = $_POST['centrico'];
    $garaje = $_POST['garaje'];
    $garajeDoble = $_POST['garajedoble'];
    $gasNatural = $_POST['gasnatural'];
    $galeria = $_POST['galeria'];
    $habJuegos = $_POST['habjuegos'];
    $hidroMasaje = $_POST['hidromasaje'];
    $lineaTelefonica = $_POST['lineatelefonica'];
    $gimnasio = $_POST['gimnasio'];
    $jardin = $_POST['jardin'];
    $lavadero = $_POST['lavadero'];
    $patio = $_POST['patio'];
    $jacuzzi = $_POST['jacuzzi'];
    $luz = $_POST['luz'];
    $sauna = $_POST['sauna'];
    $preinstaacc = $_POST['preinstaacc'];
    $luminoso = $_POST['luminoso'];
    $piletapropia = $_POST['piletapropia'];
    $piletacompartida = $_POST['piletacompartida'];
    $riegoautomatico = $_POST['riegoautomatico'];
    $amueblado = $_POST['amueblado'];
    $puertaBlindada = $_POST['puertablindada'];
    $portonAutomatico = $_POST['portonautomatico'];
    $solarium = $_POST['solarium'];
    $pergola = $_POST['pergola'];
    $tv = $_POST['tv'];
    $videoPortero = $_POST['videoportero'];
    $satelite = $_POST['satelite'];
    $vestuario = $_POST['vestuario'];
    $buardilla = $_POST['buardilla'];
    $habitacionServicio = $_POST['habitacionservicio'];
    $arboles = $_POST['arboles'];
    $autobuses = $_POST['autobuses'];
    $centroComercial = $_POST['centrocomercial'];
    $colegios = $_POST['colegios'];
    $costa = $_POST['costa'];
    $golf = $_POST['golf'];
    $hospitales = $_POST['hospitales'];
    $subte = $_POST['subte'];
    $montania = $_POST['montania'];
    $urbanizacion = $_POST['urbanizacion'];
    $rural = $_POST['rural'];
    $vistaMar = $_POST['vistamar'];
    $tren = $_POST['tren'];
    $zonasInfantiles = $_POST['zonasinfantiles'];
    $residencial = $_POST['residencial'];
    $barrioCerrado = $_POST['barriocerrado'];
    $descripcionCorta = $_POST['descripcioncorta'];
    $descripcionLarga = $_POST['descripcionlarga'];
    if($fotoPortadaNombre = $_FILES['fotoportada']['name'] != NULL){
        $fotoPortadaNombre = $_FILES['fotoportada']['name'];
        $fotoPortada = '["'.$fotoPortadaNombre.'"]';
        $fotoPortadaIMG = $_FILES['fotoportada']['tmp_name'];
    }else{
        $fotoPortada = '';
    }
    $galeriaFotos = $_POST['galeriafotos'];
    $descripcionMediana = $_POST['descripcionmediana'];
    $captadoPor = $_POST['captadopor'];
    $contactadoPor = $_POST['contactadopor'];
    $oficina = $_POST['oficina'];
    $llavero = $_POST['llavero'];
    $precioproPietario = $_POST['preciopropietario'];
    $porcentajeSobreCompra = $_POST['porcentajesobrecompra'];
    $comisionFija = $_POST['comisionfija'];
    $precioAnterior = $_POST['precioanterior'];
    $tasacion = $_POST['tasacion'];
    $parcela = $_POST['tasacion'];
    $lote = $_POST['lote'];
    $tomo = $_POST['tomo'];
    $libro = $_POST['libro'];
    $folio = $_POST['folio'];
    $registro = $_POST['registro'];
    $refCatastral = $_POST['ref_catastral'];
    $valorCatastral = $_POST['valor_catastral'];
    $contactoId = $_POST['contacto_id'];

    $query = $connect-> prepare ("INSERT INTO wp_propiedades (referencia_interna, operacion_id, tipo_propiedad_id, cod_postal, tipo_calle_id, calle, altura, ciudad_id, zona_id, piso, puerta, bloque, ocupada, coordenadas, nro_toilettes, nro_plantas, metros_utiles, supeficie_construida, nro_banios, anio_contruccion, mts_cocina, cant_habitaciones, expensas, cant_ambientes, mts_comendor, mts_living, mts_lote, planta_baja, estado_general_id, estado_carpinteria_externa_id, tipo_suelo_id, orientacion, agua_caliente_id, estado_carpinteria_interna_id, tipo_calefaccion_id, tipo_cocina_id, alarma, agua, aire_acondicionado_central, aire_acondicionado, bar, alarma_incendio, alarma_robo, altillo, caja_fuerte, parrilla, asensor, balcon, chimenea, electrodomesticos, calefaccion_frio_calor, centrico, garaje, garaje_doble, gas_natural, galeria, hab_juegos, hidromasaje, linea_telefonica, gimnacio, jardin, lavadero, patio, jacuzzi, luz, sauna, preinst_aacc, luminoso, pileta_propia, pileta_compartida, riego_automatico, amueblado, puerta_blindada, porton_automatico, solarium, pergola, tv, videoportero, satelite, vestuario, buardilla, habitacion_servicio, arboles, autobuses, centro_comercial, colegios, costa, golf, hospitales, subte, montania, urbanizacion, rural, vista_al_mar, tren, zonas_infantiles, residencial, barrio_cerrado, descripcion_corta, descripcion_completa, foto_portada, galeria_fotos, descripcion_mediana, captado_por, contactado_por, oficina_id, llavero, precio_propietario, porcentaje_comision, comision_fija, precio_anterior, tasacion, parcela, lote, tomo, libro, folio, registro, ref_catastral, valor_catastral, propietarios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$ref, $operacion, $tipo, $codigoPostal, $tipoCalle, $calle, $altura, $ciudad, $zona, $piso, $puerta, $bloque, $ocupada, $coordenadas, $toilettes, $plantas, $metrosUtiles, $supConstruida, $rebaniosf, $anioConstruccion, $mtsCocina, $habitaciones, $expensas, $ambientes, $comedor, $living, $metrosLote, $plantaBaja, $estadoGeneral, $carpinteriaExt, $suelo, $orientacion, $aguacaliente, $carpinteriaint, $calefaccion, $tipoCocina, $alarma, $agua, $aireAcondicionadoCentral, $aireAcondicionado, $bar, $alarmaIncendio, $alarmaRobo, $altillo, $cajaFuerte, $parrilla, $asensor, $balcon, $chimenea, $electroDomesticos, $calefaccionFrioCalor, $centrico, $garaje, $garajeDoble, $gasNatural, $galeria, $habJuegos, $hidroMasaje, $lineaTelefonica, $gimnasio, $jardin, $lavadero, $patio, $jacuzzi, $luz, $sauna, $preinstaacc, $luminoso, $piletapropia, $piletacompartida, $riegoautomatico, $amueblado, $puertaBlindada, $portonAutomatico, $solarium, $pergola, $tv, $videoPortero, $satelite, $vestuario, $buardilla, $habitacionServicio, $arboles, $autobuses, $centroComercial, $colegios, $costa, $golf, $hospitales, $subte, $montania, $urbanizacion, $rural, $vistaMar, $tren, $zonasInfantiles, $residencial, $barrioCerrado, $descripcionCorta, $descripcionLarga, $fotoPortada, $galeriaFotos, $descripcionMediana, $captadoPor, $contactadoPor, $oficina, $llavero, $precioproPietario, $porcentajeSobreCompra, $comisionFija, $precioAnterior, $tasacion, $parcela, $lote, $tomo, $libro, $folio, $registro, $refCatastral, $valorCatastral, $contactoId]);
    if($query){
        if($fotoPortadaNombre = $_FILES['fotoportada']['name'] != NULL){
            move_uploaded_file($fotoPortadaIMG,'../content/'.$fotoPortadaNombre);
        }
        echo '<script> alert("Propiedad agregada con exito"); window.location = "../propiedades.php"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al agregar la propiedad"); window.location = "../propiedades.php"; </script>';
    }
}

// Agregar consulta//
function agregarConsulta($connect) : void{
    if(!isset($_POST['contacto_id'])){$_POST['contacto_id']= '';};
    if(!isset($_POST['nombre'])){$_POST['nombre']= '';};
    if(!isset($_POST['apellido'])){$_POST['apellido']= '';};
    if(!isset($_POST['email'])){$_POST['email']= '';};
    if(!isset($_POST['telefono'])){$_POST['telefono']= '';};
    if(!isset($_POST['propiedad'])){$_POST['propiedad']= '';};
    if(!isset($_POST['observaciones'])){$_POST['observaciones']= '';};
    if(!isset($_POST['consulta'])){$_POST['consulta']= '';};
    if(!isset($_POST['estado'])){$_POST['estado']= '';};
    if(!isset($_POST['situacion'])){$_POST['situacion']= '';};
    if(!isset($_POST['captadopor'])){$_POST['captadopor']= '';};
    if(!isset($_POST['mediodecontacto'])){$_POST['mediodecontacto']= '';};
    if(!isset($_POST['asignadoa'])){$_POST['asignadoa']= '';};
    if(!isset($_POST['llamardesde'])){$_POST['llamardesde']= '';};
    if(!isset($_POST['llamarhasta'])){$_POST['llamarhasta']= '';};
    if($_POST['superficiedesde'] == ''){$_POST['superficiedesde']= NULL;};
    if($_POST['superficiehasta'] == ''){$_POST['superficiehasta']= NULL;};
    if($_POST['preciodesde'] == ''){$_POST['preciodesde']=NULL;};
    if($_POST['preciohasta'] == ''){$_POST['preciohasta']=NULL;};
    if(!isset($_POST['plantabaja'])){$_POST['plantabaja']= '';};
    if(!isset($_POST['garage'])){$_POST['garage']= '';};
    if(!isset($_POST['garagedoble'])){$_POST['garagedoble']= '';};
    if(!isset($_POST['amueblada'])){$_POST['amueblada']= '';};
    if(!isset($_POST['balcon'])){$_POST['balcon']= '';};
    if(!isset($_POST['pileta'])){$_POST['pileta']= '';};


    $contactoId = $_POST['contacto_id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $propiedad = $_POST['propiedad'];
    $observaciones = $_POST['observaciones'];
    $consulta = $_POST['consulta'];
    $estado = $_POST['estado'];
    $situacion = $_POST['situacion'];
    $captadoPor = $_POST['captadopor'];
    $medioContacto = $_POST['mediodecontacto'];
    $asignadoA = $_POST['asignadoa'];
    $llamarDesde = $_POST['llamardesde'];
    $llamarHasta = $_POST['llamarhasta'];
    $superficieDesde = $_POST['superficiedesde'];
    $superficieHasta = $_POST['superficiehasta'];
    $precioDesde = $_POST['preciodesde'];
    $precioHasta = $_POST['preciohasta'];
    $plantaBaja = $_POST['plantabaja'];
    $garage = $_POST['garage'];
    $garageDoble = $_POST['garagedoble'];
    $amueblada = $_POST['amueblada'];
    $balcon = $_POST['balcon'];
    $pileta = $_POST['pileta'];


    $query = $connect-> prepare ("INSERT INTO wp_consultas (nombre, apellido , email, telefono, propiedad_id, observaciones, consulta, status_id, situacion, captado_por, canal_id, asignado_a, llamar_desde, llamar_hasta, superficie_construida_desde, superficie_construida_hasta, precio_venta_desde, precio_venta_hasta, planta_baja, garaje, garaje_doble, amueblada, balcon, pileta, contacto_id) VALUES (?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$nombre, $apellido, $email, $telefono, $propiedad, $observaciones, $consulta, $estado, $situacion, $captadoPor, $medioContacto, $asignadoA, $llamarDesde, $llamarHasta, $superficieDesde, $superficieHasta, $precioDesde, $precioHasta, $plantaBaja, $garage, $garageDoble, $amueblada, $balcon, $pileta, $contactoId]);

    if($query){
        echo '<script> alert("Consulta agregada con exito"); window.location = "../consultas.php"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al agregar la consulta"); window.location = "../consultas.php"; </script>';
    }
}

// Agregar usuario //
function agregarUsuario($connect) : void{
    if(!isset($_POST['nickname'])){$_POST['nickname']= '';};
    if(!isset($_POST['nombre'])){$_POST['nombre']= '';};
    if(!isset($_POST['apellido'])){$_POST['apellido']= '';};
    if(!isset($_POST['email'])){$_POST['email']= '';};
    if(!isset($_POST['celular'])){$_POST['celular']= '';};
    if(!isset($_POST['contrasenia'])){$_POST['contrasenia']= '';};
    if(!isset($_POST['repetircontrasenia'])){$_POST['repetircontrasenia']= '';};
    if(!isset($_POST['rol'])){$_POST['rol']=0;};
    if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};
    
    // Variables //
    $nickname = $_POST['nickname'];
    $nombreAgente = $_POST['nombre'];
    $apellidoAgente = $_POST['apellido'];
    $emailAgente = $_POST['email'];
    $celularAgente = $_POST['celular'];
    $contraseña =  $_POST['contrasenia'];
    $Repetircontraseña =  $_POST['repetircontrasenia'];
    $rolAgente =  $_POST['rol'];
    $habilitar = $_POST['habilitar'];
    
    
    // IF para ver si cumple los requisitos //
    if($contraseña != $Repetircontraseña){
        echo '<script> alert("Las contraseñas no coinciden"); window.location = "../adminagregar.php=page=usuario; </script>';
    }

    // Hago el insert en la DB //
    $contraseña = hash('SHA512', $contraseña);
    $query = $connect-> prepare ("INSERT INTO usuarios (nombre, apellido, nickname, pass, rol, celular, email, habilitado) values (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$nombreAgente, $apellidoAgente, $nickname, $contraseña, $rolAgente, $celularAgente, $emailAgente, $habilitar]);
    
    if($query){
        echo '<script> alert("Usuario Agregado con éxito"); window.location = "../controladmin.php?page=usuario"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al agregar usuario"); window.location = "../controladmin.php?page=usuario"; </script>';
    }
}

// Agregar ciudad //
function agregarCiudad($connect) : void{
    if(!isset($_POST['ciudad'])){$_POST['ciudad']= '';};
    if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};
        
    // Variables de sección ciudad //
    $ciudad = $_POST['ciudad'];
    $habilitar = $_POST['habilitar'];
    
    // IF para ver si cumple los requisitos //

    // Hago el insert en la DB //
    $query = $connect-> prepare ("INSERT INTO wp_ciudades (nombre, habilitado) values (?, ?)");
    $query->execute([$ciudad, $habilitar]);
    
    if($query){
        echo '<script> alert("Ciudad agregada con exito"); window.location = "../controladmin.php?page=ciudad"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al agregar la ciudad"); window.location = "../controladmin.php?page=ciudad"; </script>';
    }
}
// Agregar zona //
function agregarZona($connect) : void{
    if(!isset($_POST['zona'])){$_POST['zona']= '';};
    if(!isset($_POST['ciudad'])){$_POST['ciudad']= '';};
    if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};
        
    // Variables de sección información //
    $zona = $_POST['zona'];
    $ciudad = $_POST['ciudad'];
    $habilitar = $_POST['habilitar'];
    
    // IF para ver si cumple los requisitos //

    // Hago el insert en la DB //
    $query = $connect-> prepare ("INSERT INTO wp_zonas (nombre, habilitada, ciudad_id) values (?, ?, ?)");
    $query->execute([$zona, $habilitar, $ciudad]);

    if($query){
        echo '<script> alert("Zona agregada con exito"); window.location = "../controladmin.php?page=zona"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al agregar la zona"); window.location = "../controladmin.php?page=zona"; </script>';
    }      
}
// Agregar contacto //
function agregarContacto($connect) : void{
    if(!isset($_POST['nombre'])){$_POST['nombre']= '';};
    if(!isset($_POST['apellido'])){$_POST['apellido']= '';};
    if(!isset($_POST['telefono'])){$_POST['telefono']= '';};
    if(!isset($_POST['email'])){$_POST['email']= '';};
    if(!isset($_POST['direccion'])){$_POST['direccion']= '';};
    if(!isset($_POST['no_emails'])){$_POST['no_emails']= '1';};
    if(!isset($_POST['observaciones'])){$_POST['observaciones']='';};
    
    // Variables de sección información //
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion =  $_POST['direccion'];
    $no_emails =  $_POST['no_emails'];
    $observaciones =  $_POST['observaciones'];
    
    // IF para ver si cumple los requisitos //

    // Hago el insert en la DB //
    $query = $connect-> prepare ("INSERT INTO wp_contactos (nombre, apellido, telefono, email, direccion, no_emails, observaciones) values (?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$nombre, $apellido, $telefono, $email, $direccion, $no_emails, $observaciones]);
    
    if($query){
        echo '<script> alert("Contacto Agregado con éxito"); window.location = "../controladmin.php?page=contacto"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al agregar contacto"); window.location = "../controladmin.php?page=usuario"; </script>';
    }        
}

// Agregar evento //
function agregarEvento($connect) : void{
    if(!isset($_POST['tipo_tarea_id'])){$_POST['tipo_tarea_id']= '1';};
    if(!isset($_POST['asunto'])){$_POST['asunto']= 'No se establecio asunto';};
    if(!isset($_POST['fecha'])){$_POST['fecha']= ' ';};
    if(!isset($_POST['observaciones'])){$_POST['observaciones']= ' ';};
    if(!isset($_POST['hora_inicio'])){$_POST['hora_inicio']= ' ';};
    if(!isset($_POST['tarea_terminada']) || $_POST['tarea_terminada'] == ''){$_POST['tarea_terminada']= 0;};

    $tipoTareaId = $_POST['tipo_tarea_id'];
    $asiganadaPor = $_SESSION['usuario'];
    $userId = $_SESSION['usuario'];
    $asunto = $_POST['asunto'];
    $fecha = $_POST['fecha'];
    $observaciones = $_POST['observaciones'];
    $horaInicio = $_POST['hora_inicio'];
    $tareaTerminada = $_POST['tarea_terminada'];

    $query = $connect-> prepare ("INSERT INTO wp_agenda (tipo_tarea_id, asunto, fecha, observaciones, hora_inicio, tarea_terminada, asignada_por, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute([$tipoTareaId, $asunto, $fecha, $observaciones, $horaInicio, $tareaTerminada, $asiganadaPor, $userId]);
    if($query){
        echo json_encode("Evento agregado con exito");
    }else{
        echo json_encode("Ha ocurrido un error al agregar el evento");
    }
}

// Agregar perfil agenda //
function agregarPerfilAgenda($connect) : void{
    $userId = $_SESSION['usuario'];
    $arr = $_POST['color'];
    foreach ($arr as $i => $color) {
        $query = $connect-> prepare ("INSERT INTO wp_agenda_tipo_tarea_custom_colors (color_background, tipo_tarea_id, user_id) VALUES (?, ?, ?)");
        $query->execute([$color, ($i+1), $userId]);
    }
    if($query){
        echo '<script>alert("Cambios realizados con éxito"); window.location = "../perfil.php"</script>';
    }else{
        echo '<script>alert("Ha ocurrido un error al editar la agenda"); window.location = "../perfil.php"</script>';
    }
}






// Editar propiedad //
function editarPropiedad($connect): void{   
    if(!isset($_POST['operacion'])){$_POST['operacion']= '';};
    if(!isset($_POST['tipo'])){$_POST['tipo']= '';};
    if(!isset($_POST['codigopostal'])){$_POST['codigopostal']= '';};
    if(!isset($_POST['tipocalle'])){$_POST['tipocalle']= '';};
    if(!isset($_POST['calle'])){$_POST['calle']= '';};
    if(!isset($_POST['altura'])){$_POST['altura']= '';};
    if(!isset($_POST['ciudad'])){$_POST['ciudad']= '';};
    if(!isset($_POST['zona'])){$_POST['zona']= '';};
    if(!isset($_POST['piso'])){$_POST['piso']= '';};
    if(!isset($_POST['puerta'])){$_POST['puerta']= '';};
    if(!isset($_POST['bloque'])){$_POST['bloque']= '';};
    if(!isset($_POST['ocupada'])){$_POST['ocupada']= '';};
    if(!isset($_POST['coordenadas'])){$_POST['coordenadas']= '';};
    if(!isset($_POST['toilettes'])){$_POST['toilettes']= '';};
    if(!isset($_POST['plantas'])){$_POST['plantas']= '';};
    if($_POST['metrosutiles'] == ''){$_POST['metrosutiles']= '1';};
    if(!isset($_POST['supconstruida'])){$_POST['supconstruida']= '';};
    if(!isset($_POST['banios'])){$_POST['banios']= '';};
    if(!isset($_POST['anioconstruccion'])){$_POST['anioconstruccion']= '';};
    if(!isset($_POST['mtscocina'])){$_POST['mtscocina']= '';};
    if(!isset($_POST['habitaciones'])){$_POST['habitaciones']= '';};
    if(!isset($_POST['expensas'])){$_POST['expensas']= '';};
    if(!isset($_POST['ambientes'])){$_POST['ambientes']= '';};
    if(!isset($_POST['comedor'])){$_POST['comedor']= '';};
    if(!isset($_POST['living'])){$_POST['living']= '';};
    if(!isset($_POST['metros_lote'])){$_POST['metros_lote']= '';};
    if(!isset($_POST['plantabaja'])){$_POST['plantabaja']= '';};
    if(!isset($_POST['estadogeneral'])){$_POST['estadogeneral']= '';};
    if(!isset($_POST['carpinteriaext'])){$_POST['carpinteriaext']= '';};
    if(!isset($_POST['suelo'])){$_POST['suelo']= '';};
    if(!isset($_POST['orientacion'])){$_POST['orientacion']= '';};
    if(!isset($_POST['aguacaliente'])){$_POST['aguacaliente']= '';};
    if(!isset($_POST['carpinteriaint'])){$_POST['carpinteriaint']= '';};
    if(!isset($_POST['calefaccion'])){$_POST['calefaccion']= '';};
    if(!isset($_POST['tipococina'])){$_POST['tipococina']= '';};
    if(!isset($_POST['alarma'])){$_POST['alarma']= '';};
    if(!isset($_POST['agua'])){$_POST['agua']= '';};
    if(!isset($_POST['aireacondicionadocentral'])){$_POST['aireacondicionadocentral']= '';};
    if(!isset($_POST['aireacondicionado'])){$_POST['aireacondicionado']= '';};
    if(!isset($_POST['bar'])){$_POST['bar']= '';};
    if(!isset($_POST['alarmaincendio'])){$_POST['alarmaincendio']= '';};
    if(!isset($_POST['alarmarobo'])){$_POST['alarmarobo']= '';};
    if(!isset($_POST['altillo'])){$_POST['altillo']= '';};
    if(!isset($_POST['cajafuerte'])){$_POST['cajafuerte']= '';};
    if(!isset($_POST['parrilla'])){$_POST['parrilla']= '';};
    if(!isset($_POST['asensor'])){$_POST['asensor']= '';};
    if(!isset($_POST['balcon'])){$_POST['balcon']= '';};
    if(!isset($_POST['chimenea'])){$_POST['chimenea']= '';};
    if(!isset($_POST['electrodomesticos'])){$_POST['electrodomesticos']= '';};
    if(!isset($_POST['calefaccionfriocalor'])){$_POST['calefaccionfriocalor']= '';};
    if(!isset($_POST['centrico'])){$_POST['centrico']= '';};
    if(!isset($_POST['garaje'])){$_POST['garaje']= '';};
    if(!isset($_POST['garajedoble'])){$_POST['garajedoble']= '';};
    if(!isset($_POST['gasnatural'])){$_POST['gasnatural']= '';};
    if(!isset($_POST['galeria'])){$_POST['galeria']= '';};
    if(!isset($_POST['habjuegos'])){$_POST['habjuegos']= '';};
    if(!isset($_POST['hidromasaje'])){$_POST['hidromasaje']= '';};
    if(!isset($_POST['lineatelefonica'])){$_POST['lineatelefonica']= '';};
    if(!isset($_POST['gimnasio'])){$_POST['gimnasio']= '';};
    if(!isset($_POST['jardin'])){$_POST['jardin']= '';};
    if(!isset($_POST['lavadero'])){$_POST['lavadero']= '';};
    if(!isset($_POST['patio'])){$_POST['patio']= '';};
    if(!isset($_POST['jacuzzi'])){$_POST['jacuzzi']= '';};
    if(!isset($_POST['luz'])){$_POST['luz']= '';};
    if(!isset($_POST['sauna'])){$_POST['sauna']= '';};
    if(!isset($_POST['preinstaacc'])){$_POST['preinstaacc']= '';};
    if(!isset($_POST['luminoso'])){$_POST['luminoso']= '';};
    if(!isset($_POST['piletapropia'])){$_POST['piletapropia']= '';};
    if(!isset($_POST['piletacompartida'])){$_POST['piletacompartida']= '';};
    if(!isset($_POST['riegoautomatico'])){$_POST['riegoautomatico']= '';};
    if(!isset($_POST['amueblado'])){$_POST['amueblado']= '';};
    if(!isset($_POST['puertablindada'])){$_POST['puertablindada']= '';};
    if(!isset($_POST['portonautomatico'])){$_POST['portonautomatico']= '';};
    if(!isset($_POST['solarium'])){$_POST['solarium']= '';};
    if(!isset($_POST['pergola'])){$_POST['pergola']= '';};
    if(!isset($_POST['tv'])){$_POST['tv']= '';};
    if(!isset($_POST['videoportero'])){$_POST['videoportero']= '';};
    if(!isset($_POST['satelite'])){$_POST['satelite']= '';};
    if(!isset($_POST['vestuario'])){$_POST['vestuario']= '';};
    if(!isset($_POST['buardilla'])){$_POST['buardilla']= '';};
    if(!isset($_POST['habitacionservicio'])){$_POST['habitacionservicio']= '';};
    if(!isset($_POST['arboles'])){$_POST['arboles']= '';};
    if(!isset($_POST['autobuses'])){$_POST['autobuses']= '';};
    if(!isset($_POST['centrocomercial'])){$_POST['centrocomercial']= '';};
    if(!isset($_POST['colegios'])){$_POST['colegios']= '';};
    if(!isset($_POST['costa'])){$_POST['costa']= '';};
    if(!isset($_POST['golf'])){$_POST['golf']= '';};
    if(!isset($_POST['hospitales'])){$_POST['hospitales']= '';};
    if(!isset($_POST['subte'])){$_POST['subte']= '';};
    if(!isset($_POST['montania'])){$_POST['montania']= '';};
    if(!isset($_POST['urbanizacion'])){$_POST['urbanizacion']= '';};
    if(!isset($_POST['rural'])){$_POST['rural']= '';};
    if(!isset($_POST['vistamar'])){$_POST['vistamar']= '';};
    if(!isset($_POST['tren'])){$_POST['tren']= '';};
    if(!isset($_POST['zonasinfantiles'])){$_POST['zonasinfantiles']= '';};
    if(!isset($_POST['residencial'])){$_POST['residencial']= '';};
    if(!isset($_POST['barriocerrado'])){$_POST['barriocerrado']= '';};
    if(!isset($_POST['descripcioncorta'])){$_POST['descripcioncorta']= '';};
    if(!isset($_POST['descripcionlarga'])){$_POST['descripcionlarga']= '';};
    if(!isset($_POST['fotoportada'])){$_POST['fotoportada']= '';};
    if(!isset($_POST['galeriafotos'])){$_POST['galeriafotos']= '';};
    if(!isset($_POST['descripcionmediana'])){$_POST['descripcionmediana']= '';};
    if(!isset($_POST['captadopor'])){$_POST['captadopor']= '';};
    if(!isset($_POST['contactadopor'])){$_POST['contactadopor']= '';};
    if(!isset($_POST['oficina'])){$_POST['oficina']= '';};
    if(!isset($_POST['llavero'])){$_POST['llavero']= '';};
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
        $NEWfotoPortadaNombre = $_FILES['fotoportada']['name'];
        if($NEWfotoPortadaNombre != '' or $NEWfotoPortadaNombre != ''){
            $NEWfotoPortada = '["'.$NEWfotoPortadaNombre.'"]';
            $NEWfotoPortadaIMG = $_FILES['fotoportada']['tmp_name'];    
        }
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
        if($NEWfotoPortadaNombre = $_FILES['fotoportada']['name'] != NULL){  
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
    
        if($query){
            if($NEWfotoPortadaNombre = $_FILES['fotoportada']['name'] != NULL){
                move_uploaded_file($NEWfotoPortadaIMG,'../content/'.$NEWfotoPortadaNombre);
            }
            echo '<script> alert("Cambios Realizados con éxito"); window.location = "../propiedades.php"; </script>';
        }else{
            echo '<script> alert("Ha ocurrido un error al editar la propiedad"); window.location = "../propiedades.php"; </script>';
        }
    
    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../propiedades.php"; </script>';}
}

// Editar consulta//
function editarConsulta($connect) : void{
    if(!isset($_POST['contacto_id'])){$_POST['contacto_id']= '';};
    if(!isset($_POST['nombre'])){$_POST['nombre']= '';};
    if(!isset($_POST['apellido'])){$_POST['apellido']= '';};
    if(!isset($_POST['email'])){$_POST['email']= '';};
    if(!isset($_POST['telefono'])){$_POST['telefono']= '';};
    if(!isset($_POST['propiedad'])){$_POST['propiedad']= '';};
    if(!isset($_POST['observaciones'])){$_POST['observaciones']= '';};
    if(!isset($_POST['consulta'])){$_POST['consulta']= '';};
    if(!isset($_POST['estado'])){$_POST['estado']= '';};
    if(!isset($_POST['situacion'])){$_POST['situacion']= '';};
    if(!isset($_POST['captadopor'])){$_POST['captadopor']= '';};
    if(!isset($_POST['mediodecontacto'])){$_POST['mediodecontacto']= '';};
    if(!isset($_POST['asignadoa'])){$_POST['asignadoa']= '';};
    if(!isset($_POST['llamardesde'])){$_POST['llamardesde']= '';};
    if(!isset($_POST['llamarhasta'])){$_POST['llamarhasta']= '';};
    if($_POST['superficiedesde'] == ''){$_POST['superficiedesde']= NULL;};
    if($_POST['superficiehasta'] == ''){$_POST['superficiehasta']= NULL;};
    if($_POST['preciodesde'] == ''){$_POST['preciodesde']=NULL;};
    if($_POST['preciohasta'] == ''){$_POST['preciohasta']=NULL;};
    if(!isset($_POST['plantabaja'])){$_POST['plantabaja']= '';};
    if(!isset($_POST['garage'])){$_POST['garage']= '';};
    if(!isset($_POST['garagedoble'])){$_POST['garagedoble']= '';};
    if(!isset($_POST['amueblada'])){$_POST['amueblada']= '';};
    if(!isset($_POST['balcon'])){$_POST['balcon']= '';};
    if(!isset($_POST['pileta'])){$_POST['pileta']= '';};
                    
    $sentencia = $connect->prepare("SELECT * FROM `wp_consultas` WHERE id= '".$_GET['consulta']."'") or die('query failed');
    $sentencia->execute();
    $list_consultas = $sentencia->fetchAll();                         
    foreach($list_consultas as $consulta){
        $editarContactoId = $consulta['contacto_id'];
        $editarNombre = $consulta['nombre'];
        $editarApellido = $consulta['apellido'];
        $editarEmail = $consulta['email'];
        $editarTelefono = $consulta['telefono'];
        $editarPropiedad = $consulta['propiedad_id'];
        $editarObservaciones = $consulta['observaciones'];
        $editarConsulta = $consulta['consulta'];
        $editarEstado = $consulta['status_id'];
        $editarSituacion = $consulta['situacion'];
        $editarCaptadoPor = $consulta['captado_por'];
        $editarMedioContacto = $consulta['canal_id'];
        $editarAsignadoA = $consulta['asignado_a'];
        $editarLlamarDesde = $consulta['llamar_desde'];
        $editarLlamarHasta = $consulta['llamar_hasta'];
        $editarSuperficieDesde = $consulta['superficie_construida_desde'];
        $editarSuperficieHasta = $consulta['superficie_construida_hasta'];
        $editarPrecioDesde = $consulta['precio_venta_desde'];
        $editarPrecioHasta = $consulta['precio_venta_hasta'];
        $editarPlantaBaja = $consulta['planta_baja'];
        $editargaraje = $consulta['garaje'];
        $editargarajeDoble = $consulta['garaje_doble'];
        $editarAmueblada = $consulta['amueblada'];
        $editarBalcon = $consulta['balcon'];
        $editarPileta = $consulta['pileta'];           
    }         
    
    // Variables de sección información //
    $NEWcontactoId = $_POST['contacto_id'];
    $NEWnombre = $_POST['nombre'];
    $NEWapellido = $_POST['apellido'];
    $NEWemail = $_POST['email'];
    $NEWtelefono = $_POST['telefono'];
    $NEWpropiedad = $_POST['propiedad'];
    $NEWobservaciones = $_POST['observaciones'];
    $NEWconsulta = $_POST['consulta'];
    $NEWestado = $_POST['estado'];
    $NEWsituacion = $_POST['situacion'];
    $NEWcaptadoPor = $_POST['captadopor'];
    $NEWmedioContacto = $_POST['mediodecontacto'];
    $NEWasignadoA = $_POST['asignadoa'];
    $NEWllamarDesde = $_POST['llamardesde'];
    $NEWllamarHasta = $_POST['llamarhasta'];
    $NEWsuperficieDesde = $_POST['superficiedesde'];
    $NEWsuperficieHasta = $_POST['superficiehasta'];
    $NEWprecioDesde = $_POST['preciodesde'];
    $NEWprecioHasta = $_POST['preciohasta'];
    $NEWplantaBaja = $_POST['plantabaja'];
    $NEWgaraje = $_POST['garage'];
    $NEWgarajeDoble = $_POST['garagedoble'];
    $NEWamueblada = $_POST['amueblada'];
    $NEWbalcon = $_POST['balcon'];
    $NEWpileta = $_POST['pileta'];
    
    
    // IF para ver si cumple los requisitos //
    if($NEWnombre != $editarNombre OR $NEWapellido != $editarApellido OR $NEWemail != $editarEmail OR $NEWtelefono != $editarTelefono OR $NEWpropiedad != $editarPropiedad OR $NEWobservaciones != $editarObservaciones OR $NEWconsulta != $editarConsulta OR $NEWestado != $editarEstado OR $NEWsituacion != $editarSituacion OR $NEWcaptadoPor != $editarCaptadoPor OR $NEWmedioContacto != $editarMedioContacto OR $NEWasignadoA != $editarAsignadoA OR $NEWllamarDesde != $editarLlamarDesde OR $NEWllamarHasta != $editarLlamarHasta OR $NEWsuperficieDesde != $editarSuperficieDesde OR $NEWsuperficieHasta != $editarSuperficieHasta OR $NEWprecioDesde != $editarPrecioDesde OR $NEWprecioHasta != $editarPrecioHasta OR $NEWplantaBaja != $editarPlantaBaja OR $NEWgaraje != $editargaraje OR $NEWgarajeDoble != $editargarajeDoble OR $NEWamueblada != $editarAmueblada OR $NEWbalcon != $editarBalcon OR $NEWpileta != $editarPileta OR $NEWcontactoId != $editarContactoId){  
            
        // Update en mi información //
        $update = " casilla_email_destino = NULL";
    
        if($NEWcontactoId != $editarContactoId){
            $update .= ", contacto_id = '".$NEWcontactoId."'";
        }
        if($NEWnombre != $editarNombre){
            $update .= ", nombre = '".$NEWnombre."'";
        }
        if($NEWapellido != $editarApellido){
            $update .= ", apellido = '".$NEWapellido."'";
        }
        if($NEWemail != $editarEmail){
            $update .= ", email = '".$NEWemail."'";
        }
        if($NEWtelefono != $editarTelefono){
            $update .= ", telefono = '".$NEWtelefono."'";
        }
        if($NEWpropiedad != $editarPropiedad){
            $update .= ", propiedad_id = '".$NEWpropiedad."'";
        }
        if($NEWobservaciones != $editarObservaciones){
            $update .= ", observaciones = '".$NEWobservaciones."'";
        }
        if($NEWconsulta != $editarConsulta){
            $update .= ", consulta = '".$NEWconsulta."'";
        }
        if($NEWestado != $editarEstado){
            $update .= ", status_id = '".$NEWestado."'";
        }
        if($NEWsituacion != $editarSituacion){
            $update .= ", situacion = '".$NEWsituacion."'";
        }
        if($NEWcaptadoPor != $editarCaptadoPor){
            $update .= ", captado_por = '".$NEWcaptadoPor."'";
        }
        if($NEWmedioContacto != $editarMedioContacto){
            $update .= ", canal_id = '".$NEWmedioContacto."'";
        }
        if($NEWasignadoA != $editarAsignadoA){
            $update .= ", asignado_a = '".$NEWasignadoA."'";
        }
        if($NEWllamarDesde != $editarLlamarDesde){
            $update .= ", llamar_desde = '".$NEWllamarDesde."'";
        }
        if($NEWllamarHasta != $editarLlamarHasta){
            $update .= ", llamar_hasta = '".$NEWllamarHasta."'";
        }
        if($NEWsuperficieDesde != $editarSuperficieDesde){
            $update .= ", superficie_construida_desde = '".$NEWsuperficieDesde."'";
        }
        if($NEWsuperficieHasta != $editarSuperficieHasta){
            $update .= ", superficie_construida_hasta = '".$NEWsuperficieHasta."'";
        }
        if($NEWprecioDesde != $editarPrecioDesde){
            $update .= ", precio_venta_desde = '".$NEWprecioDesde."'";
        }
        if($NEWprecioHasta != $editarPrecioHasta){
            $update .= ", precio_venta_hasta = '".$NEWprecioHasta."'";
        }
        if($NEWplantaBaja != $editarPlantaBaja){
            $update .= ", planta_baja = '".$NEWplantaBaja."'";
        }
        if($NEWgaraje != $editargaraje){
            $update .= ", garaje = '".$NEWgaraje."'";
        }
        if($NEWgarajeDoble != $editargarajeDoble){
            $update .= ", garaje_doble = '".$NEWgarajeDoble."'";
        }
        if($NEWamueblada != $editarAmueblada){
            $update .= ", amueblada = '".$NEWamueblada."'";
        }
        if($NEWbalcon != $editarBalcon){
            $update .= ", balcon = '".$NEWbalcon."'";
        }
        if($NEWpileta != $editarPileta){
            $update .= ", pileta = '".$NEWpileta."'";
        }  
    
        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE wp_consultas SET $update WHERE id= '".$_GET['consulta']."'");
        $query->execute();
    
        if($query){
            echo '<script> alert("Cambios Realizados con éxito"); window.location = "../consultas.php"; </script>';
        }else{
            echo '<script> alert("Ha ocurrido un error al editar la consulta"); window.location = "../consultas.php"; </script>';
        }
    
    
    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../consultas.php"; </script>';}
}

// Editar usuario //
function editarUsuario($connect) : void{

    if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};
    
    $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE user_id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_consultas = $sentencia->fetchAll();                         
    foreach($list_consultas as $consulta){
        $editarNickname = $consulta['nickname'];
        $editarNombre = $consulta['nombre'];
        $editarApellido = $consulta['apellido'];
        $editarEmail = $consulta['email'];
        $editarCelular = $consulta['celular'];
        $editarContrasenia = $consulta['pass'];
        $editarRol = $consulta['rol'];
        $editarHabilitado = $consulta['habilitado'];         
    }  
    
    $NEWnickname = $_POST['nickname'];
    $NEWnombre = $_POST['nombre'];
    $NEWapellido = $_POST['apellido'];
    $NEWemail = $_POST['email'];
    $NEWcelular = $_POST['celular'];
    $NEWcontrasenia = $_POST['contrasenia'];
    $NEWrepetircontrasenia = $_POST['repetircontrasenia'];
    $NEWrol = $_POST['rol'];
    $NEWhabilitado = $_POST['habilitar'];

    if($NEWnickname != $editarNickname OR $NEWnombre != $editarNombre OR $NEWapellido != $editarApellido OR $NEWemail != $editarEmail OR $NEWcelular != $editarCelular OR $NEWcontrasenia != '' OR $NEWrepetircontrasenia != '' OR $NEWrol != $editarRol OR $NEWhabilitado != $editarHabilitado){  
        
        if($NEWcontrasenia == $NEWrepetircontrasenia){       
            $NEWcontrasenia = hash('SHA512', $NEWcontrasenia);
            // Update en mi información //
            $update = " habilitado = '".$NEWhabilitado."'";
        
            if($NEWnickname != $editarNickname){
                $update .= ", nickname = '".$NEWnickname."'";
            }
            if($NEWnombre != $editarNombre){
                $update .= ", nombre = '".$NEWnombre."'";
            }
            if($NEWapellido != $editarApellido){
                $update .= ", apellido = '".$NEWapellido."'";
            }
            if($NEWemail != $editarEmail){
                $update .= ", email = '".$NEWemail."'";
            }
            if($NEWcelular != $editarCelular){
                $update .= ", celular = '".$NEWcelular."'";
            }
            if($NEWcontrasenia != $editarContrasenia){
                $update .= ", pass = '".$NEWcontrasenia."'";
            }
            if($NEWrol != $editarRol){
                $update .= ", rol = '".$NEWrol."'";
            }
            // Hago el update en la DB //
            $query = $connect-> prepare ("UPDATE usuarios SET $update WHERE user_id= '".$_GET['id']."'");
            $query->execute();
        
            if($query){
                echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=usuario"; </script>';
            }else{
                echo '<script> alert("Ha ocurrido un error al editar el usuario"); window.location = "../controladmin.php?page=usuario";</script>';
            }
        }else{echo '<script> alert("Las contraseñas no coinciden"); window.location = "../admineditar.php?page=usuario&id='.$_GET['id'].'"; </script>';}



    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=usuario"; </script>';}
}

// Editar ciudad //
function editarCiudad($connect) : void{
    if(!isset($_POST['ciudad'])){$_POST['ciudad']= '';};
    if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};

    $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_ciudades = $sentencia->fetchAll();                         
    foreach($list_ciudades as $ciudad){
        $editarCiudad = $ciudad['nombre'];       
        $editarHabilitado = $ciudad['habilitado'];
    }  
    
    $NEWciudad = $_POST['ciudad'];
    $NEWhabilitado = $_POST['habilitar'];

    if($NEWciudad != $editarCiudad OR $NEWhabilitado != $editarHabilitado){  
        
        $update = " habilitado = '".$NEWhabilitado."'";

        if($NEWciudad != $editarCiudad){
            $update .= ", nombre = '".$NEWciudad."'";
        }
    

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE wp_ciudades SET $update WHERE id= '".$_GET['id']."'");
        $query->execute();

        if($query){
            echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=ciudad"; </script>';
        }else{
            echo '<script> alert("Ha ocurrido un error al editar la ciudad"); window.location = "../controladmin.php?page=ciudad";</script>';
        }

    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=ciudad"; </script>';}
}
// Editar zona //
function editarZona($connect) : void{
    if(!isset($_POST['zona'])){$_POST['zona']= ' ';};
    if(!isset($_POST['ciudad'])){$_POST['ciudad']= ' ';};
    if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};

    $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_zonas = $sentencia->fetchAll();                         
    foreach($list_zonas as $zona){
        $editarZona = $zona['nombre'];       
        $editarCiudad= $zona['ciudad_id'];
        $editarHabilitada = $zona['habilitada'];
    }  
        
    $NEWzona = $_POST['zona'];
    $NEWciudad = $_POST['ciudad'];
    $NEWhabilitada = $_POST['habilitar'];

    if($NEWzona != $editarZona OR $NEWciudad != $editarCiudad OR $NEWhabilitada != $editarHabilitada){  
        
        $update = " habilitada = '".$NEWhabilitada."'";

        if($NEWzona != $editarZona){
            $update .= ", nombre = '".$NEWzona."'";
        }
        if($NEWciudad != $editarCiudad){
            $update .= ", ciudad_id = '".$NEWciudad."'";
        }
    

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE wp_zonas SET $update WHERE id= '".$_GET['id']."'");
        $query->execute();

        if($query){
            echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=zona"; </script>';
        }else{
            echo '<script> alert("Ha ocurrido un error al editar la zona"); window.location = "../controladmin.php?page=zona";</script>';
        }

    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=zona"; </script>';}
}
// Editar contacto //
function editarContacto($connect) : void{
    if(!isset($_POST['nombre'])){$_POST['nombre']= '';};
    if(!isset($_POST['apellido'])){$_POST['apellido']= '';};
    if(!isset($_POST['telefono'])){$_POST['telefono']= '';};
    if(!isset($_POST['email'])){$_POST['email']= '';};
    if(!isset($_POST['direccion'])){$_POST['direccion']= '';};
    if(!isset($_POST['no_emails'])){$_POST['no_emails']= '1';};
    if(!isset($_POST['observaciones'])){$_POST['observaciones']='';};
        
    $sentencia = $connect->prepare("SELECT * FROM `wp_contactos` WHERE id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_consultas = $sentencia->fetchAll();                         
    foreach($list_consultas as $consulta){
        $editarNombre = $consulta['nombre'];
        $editarApellido = $consulta['apellido'];
        $editarTelefono = $consulta['telefono'];
        $editarEmail = $consulta['email'];
        $editarDireccion = $consulta['direccion'];
        $editarNoEmails = $consulta['no_emails'];
        $editarObservaciones = $consulta['observaciones'];         
    }  
        
    $NEWnombre = $_POST['nombre'];
    $NEWapellido = $_POST['apellido'];
    $NEWtelefono = $_POST['telefono'];
    $NEWemail = $_POST['email'];
    $NEWdireccion = $_POST['direccion'];
    $NEWnoEmails = $_POST['no_emails'];
    $NEWobservaciones = $_POST['observaciones'];
    
    if($NEWnombre != $editarNombre OR $NEWapellido != $editarApellido OR $NEWtelefono != $editarTelefono OR $NEWemail != $editarEmail OR $NEWdireccion != $editarDireccion OR $NEWnoEmails != $editarNoEmails OR $NEWobservaciones != $editarObservaciones){  
                
            $update = " localidad = NULL";
        
            if($NEWnombre != $editarNombre){
                $update .= ", nombre = '".$NEWnombre."'";
            }
            if($NEWapellido != $editarApellido){
                $update .= ", apellido = '".$NEWapellido."'";
            }
            if($NEWtelefono != $editarTelefono){
                $update .= ", telefono = '".$NEWtelefono."'";
            }
            if($NEWemail != $editarEmail){
                $update .= ", email = '".$NEWemail."'";
            }
            if($NEWdireccion != $editarDireccion){
                $update .= ", direccion = '".$NEWdireccion."'";
            }
            if($NEWnoEmails != $editarNoEmails){
                $update .= ", no_emails = '".$NEWnoEmails."'";
            }
            if($NEWobservaciones != $editarObservaciones){
                $update .= ", observaciones = '".$NEWobservaciones."'";
            }

            // Hago el update en la DB //
            $query = $connect-> prepare ("UPDATE wp_contactos SET $update WHERE id= '".$_GET['id']."'");
            $query->execute();
        
            if($query){
                echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=contacto"; </script>';
            }else{
                echo '<script> alert("Ha ocurrido un error al editar el contacto"); window.location = "../controladmin.php?page=contacto";</script>';
            }
       
    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=contacto"; </script>';}
}

// Editar evento //
function editarEvento($connect) : void{
    if(!isset($_POST['tareaEditar'])){$_POST['tareaEditar']= '';};
    if(!isset($_POST['asuntoEditar'])){$_POST['asuntoEditar']= '';};
    if(!isset($_POST['fechaEditar'])){$_POST['fechaEditar']= '';};
    if(!isset($_POST['observacionesEditar'])){$_POST['observacionesEditar']= '';};
    if(!isset($_POST['horaEditar'])){$_POST['horaEditar']= '';};
    if(!isset($_POST['finalizadaEditar'])){$_POST['finalizadaEditar']= '0';};

    // Variables generales de la sesión //
    $idEditar= $_POST['idEditar'];
    $datos= $connect-> prepare ("SELECT * FROM wp_agenda WHERE id = ?");
    $datos->execute([$idEditar]);
    $eventos = $datos->fetchAll();                         
    foreach($eventos as $evento){
        $tarea = $evento['tipo_tarea_id'];
        $asunto = $evento['asunto'];
        $fecha = $evento['fecha'];
        $observaciones = $evento['observaciones'];
        $hora = $evento['hora_inicio'];
        $finalizada = $evento['tarea_terminada'];
    }

    // Variables del formulario //
    $tareaNuevo = $_POST['tareaEditar'];
    $asuntoNuevo = $_POST['asuntoEditar'];
    $fechaNuevo = $_POST['fechaEditar'];
    $observacionesNuevo = $_POST['observacionesEditar'];
    $horaNuevo = $_POST['horaEditar'];
    $finalizadaNuevo = $_POST['finalizadaEditar']; 


   // IF para ver si cumple los requisitos //
    if($tareaNuevo != $tarea AND $tareaNuevo!= '' AND $tareaNuevo!=NULL OR $asuntoNuevo != $asunto AND $asuntoNuevo!= '' AND $asuntoNuevo!=NULL OR $fechaNuevo != $fecha AND $fechaNuevo!= '' AND $fechaNuevo!=NULL OR $observacionesNuevo != $observaciones AND $observacionesNuevo!= '' AND $observacionesNuevo!=NULL OR $horaNuevo != $hora AND $horaNuevo!= '' AND $horaNuevo!=NULL OR $finalizadaNuevo != $finalizada AND $finalizadaNuevo!= '' AND $finalizadaNuevo!=NULL){  
        

        // Update en mi información //
        $update = " titulo = NULL";

        if($tareaNuevo != $tarea AND $tareaNuevo!= '' AND $tareaNuevo!=NULL){
            $update .= ", tipo_tarea_id = '".$tareaNuevo."'";
        }
        if($asuntoNuevo != $asunto AND $asuntoNuevo!= '' AND $asuntoNuevo!=NULL){
            $update .= ", asunto = '".$asuntoNuevo."'";
        }
        if($fechaNuevo != $fecha AND $fechaNuevo!= '' AND $fechaNuevo!=NULL){
            $update .= ", fecha = '".$fechaNuevo."'";
        }
        if($observacionesNuevo != $observaciones AND $observacionesNuevo!= '' AND $observacionesNuevo!=NULL){
            $update .= ", observaciones = '".$observacionesNuevo."'";
        }
        if($horaNuevo != $hora AND $horaNuevo!= '' AND $horaNuevo!=NULL){
            $update .= ", hora_inicio = '".$horaNuevo."'";
        }
        if($finalizadaNuevo != $finalizada AND $finalizadaNuevo!= '' AND $finalizadaNuevo!=NULL){
            $update .= ", tarea_terminada = '".$finalizadaNuevo."'";
        }

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE wp_agenda SET $update WHERE id = $idEditar");
        $query->execute();

        if($query){
            echo json_encode("Cambios Realizados con éxito");
        }else{
            echo json_encode("Ha ocurrido un error");
        }

    }else{echo json_encode ("No se han realizado cambios");}  
}

// Editar perfil agenda //
function editarPerfilAgenda($connect) : void{
    $userId = $_SESSION['usuario'];
    $arr = $_POST['color'];
    foreach ($arr as $i => $color) {
        $query = $connect-> prepare ("UPDATE wp_agenda_tipo_tarea_custom_colors SET color_background = ? WHERE tipo_tarea_id = ? AND user_id = ?");
        $query->execute([$color, ($i+1), $userId]);
    }
    if($query){
        echo '<script>alert("Cambios realizados con éxito"); window.location = "../perfil.php"</script>';
    }else{
        echo '<script>alert("Ha ocurrido un error al editar la agenda"); window.location = "../perfil.php"</script>';
    }
}

// Editar perfil contraseña //
function editarPerfilContrasena($connect) : void{
    
    // Variables generales de la sesión //
    $idAgente= $_SESSION['usuario'];
    $datos= $connect-> prepare ("SELECT * FROM usuarios WHERE user_id = ?");
    $datos->execute([$idAgente]);
    $agente = $datos->fetch();
    $nickname = $agente['nickname'];
    $nombreAgente = $agente['nombre'];
    $apellidoAgente = $agente['apellido'];
    $rolAgente = $agente['rol'];
    $fotoAgente = $agente['foto'];
    $sucursalId = $agente['sucursal_id'];
    $celularAgente = $agente['celular'];
    $emailAgente = $agente['email'];
    $sobreMiAgente = $agente['sobre_mi'];

    // Variables de sección Contraseña //
    $query = $connect-> prepare ("SELECT * FROM usuarios WHERE user_id = ?");
    $query->execute([$idAgente]);
    $row = $query->fetch();
    $password = $row['pass'];
    $passwordActual = $_POST['passwordActual'];
    $passwordActual = hash('SHA512', $passwordActual);
    $passwordNew = $_POST['passwordNew'];
    $passwordNewRep = $_POST['passwordNewRep']; 

    // IF para ver si cumple los requisitos //
    if($passwordActual==$password AND $passwordNew == $passwordNewRep){
        
        // Hasheo la contraseña actual //
        $passwordNew = hash('SHA512', $passwordNew);

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE usuarios SET pass = ? WHERE user_id = $idAgente");
        $query->execute([$passwordNew]);
        if($query){
            echo '<script> alert("Cambios Realizados con éxito"); window.location = "../login.php"; </script>';
        }else{
            echo '<script> alert("Ha ocurrido un error al editar la contraseña"); window.location = "../editarperfil.php?pagina=contrasena";</script>';
        }
    }else{
        echo '<script> alert("Ha ocurrido un error al editar la contraseña"); window.location = "../editarperfil.php?pagina=contrasena";</script>';
    }
    
}

// Editar perfil informacion //
function editarPerfilInformacion($connect) : void{

    // Variables generales de la sesión //
    $idAgente= $_SESSION['usuario'];
    $datos= $connect-> prepare ("SELECT * FROM usuarios WHERE user_id = ?");
    $datos->execute([$idAgente]);
    $agente = $datos->fetch();
    $nickname = $agente['nickname'];
    $nombreAgente = $agente['nombre'];
    $apellidoAgente = $agente['apellido'];
    $rolAgente = $agente['rol'];
    $fotoAgente = $agente['foto'];
    $sucursalId = $agente['sucursal_id'];
    $celularAgente = $agente['celular'];
    $emailAgente = $agente['email'];
    $sobreMiAgente = $agente['sobre_mi'];

    // Variables de sección información //
    $nicknameNuevo = $_POST['nickname'];
    $nombreAgenteNuevo = $_POST['nombre'];
    $apellidoAgenteNuevo = $_POST['apellido'];
    $emailAgenteNuevo = $_POST['email'];
    $celularAgenteNuevo = $_POST['celular'];  

    // IF para ver si cumple los requisitos //
    if($nicknameNuevo != $nickname AND $nicknameNuevo!= '' AND $nicknameNuevo!=NULL OR $nombreAgenteNuevo != $nombreAgente AND $nombreAgenteNuevo!= '' AND $nombreAgenteNuevo!=NULL OR $apellidoAgenteNuevo != $apellidoAgente AND $apellidoAgenteNuevo!= '' AND $apellidoAgenteNuevo!=NULL OR $emailAgenteNuevo != $emailAgente AND $emailAgenteNuevo!= '' AND $emailAgenteNuevo!=NULL OR $celularAgenteNuevo != $celularAgente AND $celularAgenteNuevo!= '' AND $celularAgenteNuevo!=NULL){  
        

        // Update en mi información //
        $update = " habilitado = 1";

        if($nicknameNuevo != $nickname AND $nicknameNuevo!= '' AND $nicknameNuevo!=NULL){
            $update .= ", nickname = '".$nicknameNuevo."'";
        }
        if($nombreAgenteNuevo != $nombreAgente AND $nombreAgenteNuevo!= '' AND $nombreAgenteNuevo!=NULL){
            $update .= ", nombre = '".$nombreAgenteNuevo."'";
        }
        if($apellidoAgenteNuevo != $apellidoAgente AND $apellidoAgenteNuevo!= '' AND $apellidoAgenteNuevo!=NULL){
            $update .= ", apellido = '".$apellidoAgenteNuevo."'";
        }
        if($emailAgenteNuevo != $emailAgente AND $emailAgenteNuevo!= '' AND $emailAgenteNuevo!=NULL){
            $update .= ", email = '".$emailAgenteNuevo."'";
        }
        if($celularAgenteNuevo != $celularAgente AND $celularAgenteNuevo!= '' AND $celularAgenteNuevo!=NULL){
            $update .= ", celular = '".$celularAgenteNuevo."'";
        }

        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE usuarios SET $update WHERE user_id = $idAgente");
        $query->execute();

        if($query){
            echo '<script> alert("Cambios Realizados con éxito"); window.location = "../perfil.php"; </script>';
        }else{
            echo '<script> alert("Ha ocurrido un error al editar el perfil"); window.location = "../perfil.php"; </script>';
        }

    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../perfil.php"; </script>';}
    

}





// Eliminar propiedad //
function eliminarPropiedad($connect) : void{
    $id = $_GET['id'];
    $query = $connect-> prepare ("DELETE FROM wp_propiedades WHERE id=?");
    $query->execute([$id]);
}

// Eliminar consulta //
function eliminarConsulta($connect) : void{
    $id = $_GET['id'];
    $query = $connect-> prepare ("DELETE FROM wp_consultas WHERE id=?");
    $query->execute([$id]);
}

// Eliminar usuario //
function eliminarUsuario($connect) : void{
    $id = $_GET['id'];
    $query = $connect-> prepare ("DELETE FROM usuarios WHERE user_id=?");
    $query->execute([$id]);
}

// Eliminar ciudad //
function eliminarCiudad($connect) : void{
    $id = $_GET['id'];
    $query = $connect-> prepare ("DELETE FROM wp_ciudades WHERE id=?");
    $query->execute([$id]);
}

// Eliminar zona //
function eliminarZona($connect) : void{
    $id = $_GET['id'];  
    $query = $connect-> prepare ("DELETE FROM wp_zonas WHERE id=?");
    $query->execute([$id]);
}

// Eliminar contacto //
function eliminarContacto($connect) : void{
    $id = $_GET['id']; 
    $query = $connect-> prepare ("DELETE FROM wp_contactos WHERE id=?");
    $query->execute([$id]);
}

?>