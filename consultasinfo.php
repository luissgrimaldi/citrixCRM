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
                            $created = $situacion['created'];
                        }; }else{
                            $contactoDireccion ='';
                            $contactoConyuge = '';
                            $contactoConyugeEmail = '';
                            $contactoConyugeCelular = '';
                            $contactoConyugeTelefono = '';
                            $emails = '';
                        };

                        $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE user_id = '".$editarCaptado."'") or die('query failed');
                        $sentencia->execute();
                        $agentes = $sentencia->fetchAll();                         
                        foreach($agentes as $agente){
                            $agenteNombre = $agente['nombre'];
                            $agenteApellido = $agente['apellido'];
                        }

                        $sentencia = $connect->prepare("SELECT * FROM `wp_medios_contacto` WHERE id = '".$editarMedio."'") or die('query failed');
                        $sentencia->execute();
                        $medios = $sentencia->fetchAll();                         
                        foreach($medios as $medio){
                            $medioNombre = $medio['nombre'];
                        }
           
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
                                <span>Cliente:</span><span class="main__user__content__bloque__content__respuesta"><?php echo $editarNombre.' '.$editarApellido;?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Situacion:</span><span class="main__user__content__bloque__content__respuesta <?php if(!empty($editarSituacion)){echo 'main__user__content__bloque__content__respuesta--situacion';}?>"><?php if(!empty($editarSituacion)){echo $situacionNombre;}else{echo 'No se establecio ninguna situacion';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Precio:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarPrecioDesde != '' or $editarPrecioDesde != NULL){echo 'De '?><span class="main__user__content__bloque__content__respuesta--precio"><?php echo '$'.number_format($editarPrecioDesde,0,",", ".");?></span> a <span class="main__user__content__bloque__content__respuesta--precio"><?php echo '$'.number_format($editarprecioHasta,0,",", ".");?></span><?php }else{echo 'No se estableció ningun precio';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Fecha de alta:</span><span class="main__user__content__bloque__content__respuesta"><?php {echo $created;}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>LLamar desde:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarLlamarDesde != '0' or $editarLlamarDesde != NULL){ echo $editarLlamarDesde;};?></span>
                            </div>
                        </div>                  
                        <div class="main__user__content__bloque">
                            <div class="main__user__content__bloque__content">
                                <span>Medio de contacto:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($editarMedio)){echo $medioNombre;}else{echo 'No se estableció ningun medio';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Captado por:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($editarCaptado)){echo $agenteNombre.' '.$agenteApellido;}else{echo 'No se estableció ningun agente';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Consulta:</span><span class="main__user__content__bloque__content__respuesta"><?php echo $editarConsulta?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Enviar emails:</span><span class="main__user__content__bloque__content__respuesta"><?php if($emails != ''){if($emails == '0' ){echo 'Si';}else if($emails == '1'){echo 'No';};}else{echo 'No establecido';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>LLamar hasta:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarLlamarHasta != '00:00' or $editarLlamarHasta != NULL){ echo $editarLlamarHasta;};?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main__seguimiento">
                    <div class="main__buttons">
                        <a class="main__buttons__button"><i class="fa-solid fa-plus"></i> Nuevo seguimiento</a>
                    </div>
                    <div class="main__container__top main__container__top--seguimiento">
                        <div class="main__title"><i class="fa-solid fa-signal main__h1--emoji"></i><h1 class="main__h1">Listado de seguimientos</h1></div>
                    </div>
                    <div class="main__decoration"></div>
                    <ul class="tareas--pendientes__list">
                    <?php           
                        $sentencia = $connect->prepare("SELECT t.id, t.user_id, t.fecha, t.asunto, t.tipo_tarea_id, t.hora_inicio, t.tarea_terminada,t.observaciones,t.cliente_id,
                        g.id, g.nombre,
                        a.user_id, a.nombre, a.apellido,
                        t.id as t_id, t.user_id as t_user_id, t.fecha as t_fecha, t.asunto as t_asunto, t.tipo_tarea_id as t_tipo_tarea, t.hora_inicio as t_hora_inicio, t.observaciones as t_observaciones,
                        g.id as g_id, g.nombre as g_nombre,
                        a.user_id as a_user_id, a.nombre as a_nombre, a.apellido as a_apellido
                        FROM wp_agenda t 
                        LEFT JOIN wp_agenda_tipo_tarea g ON  t.tipo_tarea_id =g.id
                        LEFT JOIN usuarios a ON  t.user_id=a.user_id
                        WHERE t.cliente_id=$editarContacto ORDER BY t.id DESC") or die('query failed');
                        $sentencia->execute();
                        $tareas = $sentencia->fetchAll();                        
                            foreach($tareas as $tarea){
                                $tareaId = $tarea['t_id'];
                                $agenteNombre = $tarea['a_nombre'];
                                $agenteApellido = $tarea['a_apellido'];
                                $tareaFecha = $tarea['t_fecha'];               
                                $tareaFecha = date("d-m-Y", strtotime($tareaFecha));              
                                $tareaAsunto = $tarea['t_asunto'];
                                $tareaMotivo = $tarea['g_nombre'];
                                $tareaHora = $tarea['t_hora_inicio'];
                                $tareaHora = substr($tareaHora, 0, -3);
                                $tareaObservaciones = $tarea['t_observaciones'];                
                    ?>
                                <li class="tareas--pendientes__li">
                                    <div class="tareas--pendientes__tarea">
                                        <h4><?php echo $tareaAsunto;?></h4>
                                        <span><?php echo $tareaFecha;?></span>
                                        <span><?php echo $tareaHora;?></span>
                                        <span><?php echo 'Agente: '.$agenteNombre.' '.$agenteApellido;?></span>
                                    </div>
                                    <span class="tareas--pendientes__tarea__tipo"><?php echo $tareaMotivo;?></span>
                                    <h5 class="tareas--pendientes__nombre"><?php echo $agenteNombre.' '.$agenteApellido;?></h5>
                                </li>                         
                            <?php };?>
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