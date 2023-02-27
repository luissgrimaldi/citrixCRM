<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php                          

       
                    $sentencia = $connect->prepare("SELECT * FROM `wp_consultas` WHERE id= '".$_GET['consulta']."'") or die('query failed');
                    $sentencia->execute();
                    $list_propiedadesOperacion = $sentencia->fetchAll();                         
                    foreach($list_propiedadesOperacion as $propiedad){
                    $editarId = $propiedad['id'];
                    $editarNombre = $propiedad['nombre'];
                    $editarApellido = $propiedad['apellido'];
                    $editarEmail = $propiedad['email'];
                    $editarTelefono = $propiedad['telefono'];
                    $editarPropiedad = $propiedad['propiedad_id'];
                    $editarObservaciones = $propiedad['observaciones'];
                    $editarConsulta = $propiedad['consulta'];
                    $editarEstado = $propiedad['status_id'];
                    $editarSituacion = $propiedad['situacion'];
                    $editarCaptado = $propiedad['captado_por'];
                    $editarMedio = $propiedad['canal_id'];
                    $editarAsignar= $propiedad['asignado_a'];
                    $editarLlamarDesde = substr($propiedad['llamar_desde'],0,-3);
                    $editarLlamarHasta = substr($propiedad['llamar_hasta'],0,-3);
                    $editarSupDesde = $propiedad['superficie_construida_desde'];
                    $editarSupHasta = $propiedad['superficie_construida_hasta'];
                    $editarPrecioDesde = $propiedad['precio_venta_desde'];
                    $editarprecioHasta = $propiedad['precio_venta_hasta'];
                    $editarPlantaBaja = $propiedad['planta_baja'];
                    $editarGaraje = $propiedad['garaje'];
                    $editargarajeDoble = $propiedad['garaje_doble'];
                    $editarAmueblada = $propiedad['amueblada'];
                    $editarBalcon = $propiedad['balcon'];
                    $editarPileta = $propiedad['pileta'];
                    $editarContacto = $propiedad['contacto_id'];
                    $editarBuscarZona = $propiedad['zonas'];               
                    $editarBuscarTipo = $propiedad['tipos_propiedad'];
                    }
                    $whereZonas=" AND zona_id in(".$editarBuscarZona.")";         
                    $whereTipo=" AND tipo_propiedad_id in(".$editarBuscarTipo.")";
                    $wherePrecio=" AND precio_propietario BETWEEN '".$editarPrecioDesde."' AND '".$editarprecioHasta."'";
                    $whereSuperficie=" AND supeficie_construida BETWEEN '".$editarSupDesde."' AND '".$editarSupHasta."'";
                    $wherePlantaBaja=" AND planta_baja = ".$editarPlantaBaja;
                    $whereGaraje=" AND garaje = ".$editarGaraje;
                    $whereGarajeDoble=" AND garaje_doble = ".$editargarajeDoble;
                    $whereAmueblada=" AND amueblado = ".$editarAmueblada;
                    $whereBalcon=" AND balcon = ".$editarBalcon;
                    $wherePileta=" AND pileta_propia = ('".$editarPileta."' OR  pileta_compartida ='".$editarPileta."')";

                    if(($editarBuscarZona == NULL AND $editarBuscarZona =="")AND($editarBuscarTipo ==NULL AND $editarBuscarTipo =="")AND($editarPrecioDesde ==NULL AND $editarPrecioDesde =="")AND($editarSupDesde ==NULL AND $editarSupDesde =="")AND($editarPlantaBaja ==NULL AND $editarPlantaBaja =="")AND($editarGaraje ==NULL AND $editarGaraje =="")AND($editargarajeDoble ==NULL AND $editargarajeDoble =="")AND($editarAmueblada ==NULL AND $editarAmueblada =="")AND($editarBalcon ==NULL AND $editarBalcon =="")AND($editarPileta ==NULL AND $editarPileta =="")){$filtro = '';}else{
                        $filtro = "WHERE id > 0 ";
                        if($editarBuscarZona !=NULL AND $editarBuscarZona !=""){$filtro .= $whereZonas;};
                        if($editarBuscarTipo !=NULL AND $editarBuscarTipo !=""){$filtro .= $whereTipo;};
                        if($editarPrecioDesde !=NULL AND $editarPrecioDesde !="" AND $editarprecioHasta !=NULL AND $editarprecioHasta !="" ){$filtro .= $wherePrecio;};
                        if($editarSupDesde !=NULL AND $editarSupDesde !="" AND $editarSupHasta !=NULL AND $editarSupHasta !=""){$filtro .= $whereSuperficie;};
                        if($editarPlantaBaja !=NULL AND $editarPlantaBaja !=""){$filtro .= $wherePlantaBaja;};
                        if($editarGaraje !=NULL AND $editarGaraje !=""){$filtro .= $whereGaraje;};
                        if($editargarajeDoble !=NULL AND $editargarajeDoble !=""){$filtro .= $whereGarajeDoble;};
                        if($editarAmueblada !=NULL AND $editarAmueblada !=""){$filtro .= $whereAmueblada;};
                        if($editarBalcon !=NULL AND $editarBalcon !=""){$filtro .= $whereBalcon;};
                        if($editarPileta !=NULL AND $editarPileta !=""){$filtro .= $wherePileta;};
                        
                    }
                ?>
                <?php 

                    if($editarPropiedad !='0' or $editarPropiedad != NULL){                  
                        $sentencia = $connect->prepare("SELECT con.propiedad_id,
                        prop.id, prop.referencia_interna, prop.calle, prop.altura, prop.descripcion_corta,
                        prop.id as prop_id, prop.referencia_interna as prop_referencia_interna, prop.calle as prop_calle, prop.altura as prop_altura, prop.descripcion_corta as prop_descripcion_corta
                        FROM wp_consultas con 
                        LEFT JOIN wp_propiedades prop ON  con.propiedad_id=prop.id
                        WHERE con.propiedad_id = $editarPropiedad") or die('query failed');
                        $sentencia->execute();
                        $list_propiedadesOperacion = $sentencia->fetchAll();                         
                        foreach($list_propiedadesOperacion as $propiedad){
                        $idPropiedad = $propiedad['id'];
                        $propiedadRef = $propiedad['prop_referencia_interna'];
                        $propiedadTitulo = $propiedad['prop_descripcion_corta'];
                        $propiedadNombre = $propiedad['prop_calle'];
                        $propiedadAltura = $propiedad['prop_altura'];
                        };
                    };

                        $sentencia = $connect->prepare("SELECT * FROM `wp_situaciones` WHERE id = '".$editarSituacion."'") or die('query failed');
                        $sentencia->execute();
                        $list_situaciones = $sentencia->fetchAll();
                        if($list_situaciones){
                            foreach($list_situaciones as $situacion){
                            $situacionNombre = $situacion['nombre'];}
                        }else{
                            $situacionNombre = 'No se estableció ninguna situación';
                        }           

                        $sentencia = $connect->prepare("SELECT * FROM `wp_contactos` WHERE id = '".$editarContacto."'") or die('query failed');
                        $sentencia->execute();
                        $list_situaciones = $sentencia->fetchAll();
                        if($list_situaciones){
                            foreach($list_situaciones as $situacion){
                            $contactoDireccion = $situacion['direccion'];
                            $contactoConyuge = $situacion['conyuge'];
                            $contactoConyugeEmail = $situacion['conyuge_email'];
                            $contactoConyugeCelular = $situacion['conyuge_cel'];
                            $contactoConyugeTelefono = $situacion['conyuge_tel'];
                            $emails = $situacion['no_emails'];
                        }; }else{
                            $contactoDireccion ='';
                            $contactoConyuge = '';
                            $contactoConyugeEmail = '';
                            $contactoConyugeCelular = '';
                            $contactoConyugeTelefono = '';
                            $emails = '';
                        };
                    
           
                ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-envelope main__h1--emoji"></i><h1 class="main__h1">Consulta # <?php echo $_GET['consulta'];?></h1></div>
                    <div class="main__buttons">
                        <a href="editarconsulta.php?consulta=<?php echo $_GET['consulta'];?>" class="main__buttons__button">Editar consulta</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__user">
                    <div class="main__user__content">
                        <div class="main__user__content__bloque">
                            <div class="main__user__content__bloque__content">
                                <span>Nombre:</span><span class="main__user__content__bloque__content__respuesta"><?php echo $editarNombre.' '.$editarApellido;?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Situacion:</span><span class="main__user__content__bloque__content__respuesta"><?php if(isset($editarSituacion)){echo $situacionNombre;}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Telefono:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarTelefono != '' and $editarTelefono != NULL and isset($editarTelefono)){echo $editarTelefono;}else{echo 'No se estableció ningun numero de telefono';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Email:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarEmail != '' or $editarEmail != NULL or isset($editarEmail)){echo $editarEmail;}else{echo 'No se estableció ningun email';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Dirección del contacto:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoDireccion != '' and $contactoDireccion != NULL and isset($contactoDireccion)){echo $contactoDireccion;}else{echo 'No se estableció ninguna dirección';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Propiedad:<a href=""></a></span><span class="main__user__content__bloque__content__respuesta"><?php if($editarPropiedad != '0' and $editarPropiedad != NULL and isset($editarPropiedad)){ echo 'REF '.$propiedadRef.': '.$propiedadTitulo.' ('.$propiedadNombre.' '.$propiedadAltura.')';}else{echo 'No se estableció ninguna propiedad';};?></span>
                            </div>
                            <div class="main__user__content__bloque__content main__user__content__bloque__content--cruces">
                                <span>Cruces:</span>
                                <span class="main__user__content__bloque__content__respuesta">
                                <?php 
                                $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` $filtro") or die('query failed');
                                $sentencia->execute();
                                $cruces = $sentencia->fetchAll();
                                if(!$cruces){
                                    echo 'No se encontraron cruces';
                                }else{                  
                                    foreach($cruces as $cruce){
                                    $propiedadRef = $cruce['referencia_interna'];
                                    $coma = ' | ';?>
                                    <a href="propiedadesinfo.php?ref=<?php echo $propiedadRef?>"><?php 
                                    echo $propiedadRef.$coma; }?>
                                </a>
                                    <?php ;}?>
                            </div> 
                        </div>
                        <div class="main__user__content__bloque">
                            <div class="main__user__content__bloque__content">
                                <span>Conyuge:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($contactoConyuge)){echo $contactoConyuge;}else{echo 'No se estableció ningun nombre';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Conyuge telefono:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoConyugeTelefono != '' or $contactoConyugeTelefono != NULL or !isset($contactoConyugeTelefono)){echo $contactoConyugeTelefono;}else{echo 'No se estableció ningun numero de telefono';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Conyuge email:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoConyugeEmail != '' or $contactoConyugeEmail != NULL or !isset($contactoConyugeEmail)){echo $contactoConyugeEmail;}else{echo 'No se estableció ningun email';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Enviar emails:</span><span class="main__user__content__bloque__content__respuesta"><?php if($emails != ''){if($emails == '0' ){echo 'Si';}else if($emails == '1'){echo 'No';};}else{echo 'No establecido';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>LLamar desde:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarLlamarDesde != '0' or $editarLlamarDesde != NULL){ echo $editarLlamarDesde;};?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>LLamar hasta:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarLlamarHasta != '00:00' or $editarLlamarHasta != NULL){ echo $editarLlamarHasta;};?></span>
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
    <script src="index.js"></script>
</body>
</html>