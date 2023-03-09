<?php include 'header.php';
if(!$_GET["page"]){header('Location:'.$_SERVER['REQUEST_URI'].'&page=seguimiento');};
?>
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
                            $created = date("d-m-Y", strtotime($created));  
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
        <div id="modal" class="modal-BG">
                <div class="modal">            
                    <form class="form__busqueda-propiedad form" id="formEvento" name="form" method="POST">
                        <h2 class="main__h2">Ficha de agenda</h2> 
                        <div class="form__bloque">               
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de tarea</label>
                                <select class="form__select" name="tipo_tarea_id" id="tareaAgregar" required>                               
                                        <option></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_agenda_tipo_tarea`  WHERE habilitada=1") or die('query failed');
                                            $sentencia->execute();
                                            $agentes = $sentencia->fetchAll();                         
                                            foreach($agentes as $agente){
                                            $id = $agente['id'];
                                            $nombre = $agente['nombre'];
                                            ?>
                                        <option value="<?php echo $id?>"><?php echo $nombre;?></option>
                                    <?php };?>
                                </select>
                            </div>
                        </div>                
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Asunto</label>
                                <input type="text" class="form__text content__text" name="asunto" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Fecha</label>
                                <input type="date" class="form__text content__text" name="fecha" id="fecha">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Observaciones</label>
                                <textarea name="observaciones" class="form__textarea content__textarea" ></textarea>                                 
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hora de inicio</label>
                                <input type="time" class="form__text content__text" name="hora_inicio" id="">                                  
                            </div>
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Terminada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="tarea_terminada" value="1">
                            </div>  
                            <input type="hidden" name="submit">
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <input type="hidden" class="form__text content__text" name="consulta_id" id="consulta_id">                               
                            </div>
                        </div>                                      
                        <div class="main__decoration"></div>
                        <input type="submit" class="form__button" value="Agregar evento">  
                        <button type="button" onclick="sacarSeguimiento();" class="form__button form__button--salir" id="salir">Salir</button>                                                          
                    </form>
                </div>
            </div>
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
                <div class="panel__segumiento-visita">
                    <a href="consultasinfo.php?consulta=<?php echo $_GET['consulta'];?>&page=seguimiento" class="panel__segumiento-visita__button <?php if($_GET["page"] == 'seguimiento'){echo 'panel__segumiento-visita__button--active';}?>" type="button">Seguimiento</a>
                    <a href="consultasinfo.php?consulta=<?php echo $_GET['consulta'];?>&page=visita" class="panel__segumiento-visita__button <?php if($_GET["page"] == 'visita'){echo 'panel__segumiento-visita__button--active';}?>" type="button">Visita</a>
                </div>
                <div class="main__decoration"></div>
                <?php if ($_GET['page']== 'seguimiento'){?>
                <div class="main__seguimiento">
                    <div class="main__buttons">
                        <button onclick="nuevoSeguimiento();" type="button" class="main__buttons__button"><i class="fa-solid fa-plus"></i> Nuevo seguimiento</button>
                    </div>
                    <div class="main__container__top main__container__top--seguimiento">
                        <div class="main__title"><i class="fa-solid fa-signal main__h1--emoji"></i><h1 class="main__h1">Listado de seguimientos</h1></div>
                    </div>
                    <div class="main__decoration"></div>
                    <ul class="tareas--pendientes__list">
                    <?php           
                        $sentencia = $connect->prepare("SELECT t.id, t.user_id, t.fecha, t.asunto, t.tipo_tarea_id, t.hora_inicio, t.tarea_terminada,t.observaciones, t.cliente_id, t.asignada_el,
                        g.id, g.nombre,
                        a.user_id, a.nombre, a.apellido,
                        t.id as t_id, t.user_id as t_user_id, t.fecha as t_fecha, t.asunto as t_asunto, t.tipo_tarea_id as t_tipo_tarea, t.hora_inicio as t_hora_inicio, t.observaciones as t_observaciones, t.asignada_el as t_asignada_el,
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
                                $tareaCreado = $tarea['t_asignada_el'];
                                $tareaCreado=date("d-m-Y H:i:s",strtotime($tareaCreado));                 
                    ?>
                                <li class="tareas--pendientes__li">
                                    <div class="tareas--pendientes__tarea">
                                        <span class="tareas--pendientes__tarea--bold"><?php echo $tareaFecha;?></span>
                                        <span class="tareas--pendientes__tarea--bold"><?php echo $tareaHora;?></span>
                                        <span><span class="tareas--pendientes__tarea--bold">Agente: </span><?php echo $agenteNombre.' '.$agenteApellido;?></span>
                                    </div>
                                    <div class="tareas--pendientes__tarea">                                
                                        <span class="tareas--pendientes__tarea--bold"><?php echo $tareaMotivo;?></span>                                 
                                    </div>
                                    <div class="tareas--pendientes__tarea tareas--pendientes__tarea">
                                        <h4 class="generico"><span class="tareas--pendientes__tarea--bold">Asunto: </span><?php echo $tareaAsunto;?></h4>
                                        <span class="generico"><span class="tareas--pendientes__tarea--bold">Observacion: </span><?php echo $tareaObservaciones;?></span>
                                        <span class="tareas--pendientes__tarea--bold"><?php echo $tareaCreado;?></span>
                                    </div>
                                </li>                         
                            <?php };?>
                    </ul>
                </div>
                <?php ;}?>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js"></script>
</body>
</html>