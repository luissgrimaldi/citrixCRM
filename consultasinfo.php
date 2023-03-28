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
                    $editarCreated = $propiedad['created'];
                    $editarCreated = date("d-m-Y", strtotime($editarCreated));
                    $editarModified = $propiedad['modified'];
                    if(!empty($editarModified)){
                        $editarModified = date("d-m-Y", strtotime($editarModified));
                    }
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

                    if((!empty($editarBuscarZona))AND(!empty($editarBuscarTipo))AND(!empty($editarPrecioDesde))AND(!empty($editarSupDesde))AND(!empty($editarPlantaBaja))AND(!empty($editarGaraje))AND(!empty($editargarajeDoble))AND(!empty($editarAmueblada))AND(!empty($editarBalcon))AND(!empty($editarPileta))){$filtro = '';}else{
                        $filtro = "WHERE id > 0 ";
                        if(!empty($editarBuscarZona)){$filtro .= $whereZonas;};
                        if(!empty($editarBuscarTipo)){$filtro .= $whereTipo;};
                        if(!empty($editarPrecioDesde)){$filtro .= $wherePrecio;};
                        if(!empty($editarSupDesde)){$filtro .= $whereSuperficie;};
                        if(!empty($editarPlantaBaja)){$filtro .= $wherePlantaBaja;};
                        if(!empty($editarGaraje)){$filtro .= $whereGaraje;};
                        if(!empty($editargarajeDoble)){$filtro .= $whereGarajeDoble;};
                        if(!empty($editarAmueblada)){$filtro .= $whereAmueblada;};
                        if(!empty($editarBalcon)){$filtro .= $whereBalcon;};
                        if(!empty($editarPileta)){$filtro .= $wherePileta;};           
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
                            $modified = $situacion['modified'];
                            if(!empty($modified)){
                                $modified = date("d-m-Y", strtotime($modified));
                            }
                        }; }else{
                            $contactoDireccion ='';
                            $contactoConyuge = '';
                            $contactoConyugeEmail = '';
                            $contactoConyugeCelular = '';
                            $contactoConyugeTelefono = '';
                            $emails = '';
                            $modified = '';
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
                <form class="form__busqueda-propiedad form" id="formSeguimiento" name="form" method="POST" autocomplete="off">
                    <h2 class="main__h2">Nuevo seguimiento</h2> 
                    <div class="form__bloque">               
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Tipo de tarea</label>
                            <select class="form__select" name="tipo_tarea_id" required>                               
                                    <option></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_agenda_tipo_tarea`  WHERE habilitada=1") or die('query failed');
                                        $sentencia->execute();
                                        $agentes = $sentencia->fetchAll();                         
                                        foreach($agentes as $agente){
                                        $id = $agente['id'];
                                        $nombre = $agente['nombre'];
                                        ?>
                                    <?php if($id !=5){?><option value="<?php echo $id?>"><?php echo $nombre;?></option><?php };
                                };?>
                            </select>
                        </div>
                    </div>                
                    <div class="form__bloque">
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Asunto</label>
                            <input type="text" class="form__text content__text" name="asunto" value="Seguimiento de <?php echo $editarNombre.' '.$editarApellido;?>">                                  
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Fecha</label>
                            <input type="date" class="form__text content__text" name="fecha" value="<?php echo date("Y-m-d");?>">                                  
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Observaciones</label>
                            <textarea name="observaciones" class="form__textarea content__textarea" ></textarea>                                 
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Hora de inicio</label>
                            <input type="time" class="form__text content__text" name="hora_inicio" >                                  
                        </div>
                        <div class="form__bloque__content content">  
                            <label  class="form__label content__label" for="">Terminada</label>
                            <input class="form__checkbox content__checkbox" type="checkbox" name="tarea_terminada" value="1">
                        </div>  
                        <input type="hidden" name="submit">
                    </div>
                    <input type="hidden" class="form__text content__text" name="consulta_id" value="<?php echo $editarId?>">
                    <input type="hidden" class="form__text content__text" name="usuario" value="<?php echo $idAgente?>">                                     
                    <div class="main__decoration"></div>
                    <input type="submit" class="form__button" value="Agregar seguimiento">  
                    <button type="button" onclick="sacarSeguimiento();" class="form__button form__button--salir" id="salir">Salir</button>                                                          
                </form>
            </div>
        </div>
        <div id="modalVisita" class="modal-BG">
            <div class="modal">            
                <form class="form__busqueda-propiedad form" id="formVisita" name="form" method="POST" autocomplete="off">
                    <h2 class="main__h2">Nueva visita</h2> 
                    <div class="form__bloque">               
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Tipo de tarea</label>
                            <select class="form__select" name="tipo_tarea_id" required>                               
                                    <option value="5">Visita</option>
                            </select>
                        </div>
                    </div>                
                    <div class="form__bloque">
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Asunto</label>
                            <input type="text" class="form__text content__text" name="asunto" value="Visita de <?php echo $editarNombre.' '.$editarApellido;?>">                                  
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Fecha</label>
                            <input type="date" class="form__text content__text" name="fecha" value="<?php echo date("Y-m-d");?>">                                  
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Observaciones</label>
                            <textarea name="observaciones" class="form__textarea content__textarea" ></textarea>                                 
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Hora de inicio</label>
                            <input type="time" class="form__text content__text" name="hora_inicio">                                  
                        </div>
                        <div class="form__bloque__content content">  
                            <label  class="form__label content__label" for="">Terminada</label>
                            <input class="form__checkbox content__checkbox" type="checkbox" name="tarea_terminada" value="1">
                        </div>  
                        <input type="hidden" name="submit">
                    </div>
                    <div class="form__bloque">
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Propiedad</label>
                            <input type="text" class="form__text content__text" name="buscadorpropiedad3" id="buscadorpropiedad3">
                            <input type="hidden" class="form__text content__text" name="propiedad_id" id="editar_propiedad_id">  
                            <ul class="content_ul" id="listaPropiedadesEditar"></ul>                                                          
                        </div>
                        <input type="hidden" class="form__text content__text" name="consulta_id" value="<?php echo $editarId?>">
                        <input type="hidden" class="form__text content__text" name="usuario" value="<?php echo $idAgente?>">
                    </div>                                      
                    <div class="main__decoration"></div>
                    <input type="submit" class="form__button" value="Agregar visita">  
                    <button type="button" onclick="sacarVisita();" class="form__button form__button--salir" id="salir2">Salir</button>                                                          
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
                                <span>Fecha de alta:</span><span class="main__user__content__bloque__content__respuesta"><?php echo $editarCreated;?></span>
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
                                <span>LLamar desde:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarLlamarDesde != '0' or $editarLlamarDesde != NULL){ echo $editarLlamarDesde;};?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>LLamar hasta:</span><span class="main__user__content__bloque__content__respuesta"><?php if($editarLlamarHasta != '00:00' or $editarLlamarHasta != NULL){ echo $editarLlamarHasta;};?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Actualizado:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($editarModified)){echo $editarModified ;}else{echo 'No se ha actualizado';};?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel__segumiento-visita">
                    <a href="consultasinfo.php?consulta=<?php echo $_GET['consulta'];?>&page=seguimiento" class="panel__segumiento-visita__button <?php if($_GET["page"] == 'seguimiento'){echo 'panel__segumiento-visita__button--active';}?>" type="button"><i class="fa-solid fa-signal"></i> Seguimiento</a>
                    <a href="consultasinfo.php?consulta=<?php echo $_GET['consulta'];?>&page=informacion" class="panel__segumiento-visita__button <?php if($_GET["page"] == 'informacion'){echo 'panel__segumiento-visita__button--active';}?>" type="button"><i class="fa-solid fa-info"></i> Informacion</a>
                    <a href="consultasinfo.php?consulta=<?php echo $_GET['consulta'];?>&page=visita" class="panel__segumiento-visita__button <?php if($_GET["page"] == 'visita'){echo 'panel__segumiento-visita__button--active';}?>" type="button"><i class="fa-solid fa-envelope"></i> Visita</a>
                    <a href="consultasinfo.php?consulta=<?php echo $_GET['consulta'];?>&page=documento" class="panel__segumiento-visita__button <?php if($_GET["page"] == 'documento'){echo 'panel__segumiento-visita__button--active';}?>" type="button"><i class="fa-solid fa-file"></i> Documentos</a>
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
                    <div class="consulta">
                        <span class="consulta__span"><?php echo $editarConsulta;?></span>
                    </div>             
                    <?php           
                        $sentencia = $connect->prepare("SELECT t.id, t.user_id, t.fecha, t.asunto, t.tipo_tarea_id, t.hora_inicio, t.tarea_terminada,t.observaciones, t.consulta_id, t.asignada_el,
                        g.id, g.nombre,
                        a.user_id, a.nombre, a.apellido,
                        t.id as t_id, t.user_id as t_user_id, t.fecha as t_fecha, t.asunto as t_asunto, t.tipo_tarea_id as t_tipo_tarea, t.hora_inicio as t_hora_inicio, t.observaciones as t_observaciones, t.asignada_el as t_asignada_el,
                        g.id as g_id, g.nombre as g_nombre,
                        a.user_id as a_user_id, a.nombre as a_nombre, a.apellido as a_apellido
                        FROM wp_agenda t 
                        LEFT JOIN wp_agenda_tipo_tarea g ON  t.tipo_tarea_id =g.id
                        LEFT JOIN usuarios a ON  t.user_id=a.user_id
                        WHERE t.consulta_id=$editarId AND t.tipo_tarea_id != 5 ORDER BY t.id DESC") or die('query failed');
                        $sentencia->execute();
                        $seguimientos = $sentencia->rowCount();
                        if($seguimientos > 0){?>
                        <?php ;};
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
                <?php if ($_GET['page']== 'visita'){?>
                <div class="main__seguimiento">
                    <div class="main__buttons">
                        <button onclick="nuevaVisita();" type="button" class="main__buttons__button"><i class="fa-solid fa-plus"></i> Nueva visita</button>
                    </div>
                    <div class="main__container__top main__container__top--seguimiento">
                        <div class="main__title"><i class="fa-solid fa-envelope main__h1--emoji"></i><h1 class="main__h1">Listado de visitas</h1></div>
                    </div>
                    <div class="main__decoration"></div>                  
                    <ul class="tareas--pendientes__list">
                    <div class="consulta">
                        <span class="consulta__span"><?php echo $editarConsulta;?></span>
                    </div>   
                    <?php           
                        $sentencia = $connect->prepare("SELECT t.id, t.user_id, t.fecha, t.asunto, t.tipo_tarea_id, t.hora_inicio, t.tarea_terminada,t.observaciones, t.consulta_id, t.asignada_el, t.propiedad_id,
                        g.id, g.nombre,
                        a.user_id, a.nombre, a.apellido,
                        p.id, p.referencia_interna, p.zona_id, p.foto_portada, p.precio_propietario,
                        z.id , z.nombre,
                        t.id as t_id, t.user_id as t_user_id, t.fecha as t_fecha, t.asunto as t_asunto, t.tipo_tarea_id as t_tipo_tarea, t.hora_inicio as t_hora_inicio, t.observaciones as t_observaciones, t.asignada_el as t_asignada_el, t.propiedad_id as t_propiedad_id,
                        g.id as g_id, g.nombre as g_nombre,
                        a.user_id as a_user_id, a.nombre as a_nombre, a.apellido as a_apellido,
                        p.id as p_id, p.referencia_interna as p_referencia_interna, p.zona_id as p_zona_id, p.foto_portada as p_foto_portada, p.precio_propietario as p_precio_propietario,
                        z.id as z_id, z.nombre as z_nombre
                        FROM wp_agenda t 
                        LEFT JOIN wp_agenda_tipo_tarea g ON  t.tipo_tarea_id =g.id
                        LEFT JOIN usuarios a ON  t.user_id=a.user_id
                        LEFT JOIN wp_propiedades p ON  t.propiedad_id=p.id
                        LEFT JOIN wp_zonas z ON  p.zona_id=z.id
                        WHERE t.consulta_id=$editarId AND t.tipo_tarea_id = 5  ORDER BY t.id DESC") or die('query failed');
                        $sentencia->execute();
                        $visitas = $sentencia->rowCount();
                        if($visitas > 0){?>
                        <?php ;};
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
                                $refPropiedad = $tarea['p_referencia_interna'];          
                                $zonaPropiedad = $tarea['z_nombre'];          
                                $precioPropiedad = $tarea['p_precio_propietario']; 
                                $precioPropiedad = number_format($precioPropiedad,0,",", ".");
                                $imgPropiedad = strval($tarea['p_foto_portada']);
                                $imgPropiedad = str_replace('"', '', $imgPropiedad);;
                                $imgPropiedad = str_replace("[", "", $imgPropiedad);
                                $imgPropiedad = str_replace("]", "", $imgPropiedad);         
                    ?>
                                <li class="tareas--pendientes__li">
                                    <div class="tareas--pendientes__tarea">
                                        <span class="tareas--pendientes__tarea--bold"><?php echo $tareaFecha;?></span>
                                        <span class="tareas--pendientes__tarea--bold"><?php echo $tareaHora;?></span>
                                        <span><span class="tareas--pendientes__tarea--bold">Agente: </span><?php echo $agenteNombre.' '.$agenteApellido;?></span>
                                    </div>
                                    <div class="tareas--pendientes__tarea">                                
                                        <img class="visitas__img" src="<?php echo 'https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__'.$imgPropiedad?>" alt="">                               
                                    </div>
                                    <div class="tareas--pendientes__tarea tareas--pendientes__tarea">
                                        <span>U$S: <?php echo $precioPropiedad;?></span>
                                        <span class="generico"><i class="fa-solid fa-location-dot"></i> <?php echo $zonaPropiedad;?></span>
                                        <span class="generico"><span class="tareas--pendientes__tarea--bold">Observacion: </span><?php echo $tareaObservaciones;?></span>
                                    </div>
                                </li>                         
                            <?php };?>
                    </ul>
                </div>
                <?php ;}?>
                <?php if ($_GET['page']== 'informacion'){?>
                <div class="main__seguimiento">
                    <div class="main__user">
                        <div class="main__user__content">
                            <div class="main__user__content__bloque">
                                <div class="main__user__content__bloque__content">
                                    <span>Fecha de alta:</span><span class="main__user__content__bloque__content__respuesta"><?php echo $created;?></span>
                                </div>
                                <div class="main__user__content__bloque__content">
                                    <span>Ultima actualizacion:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($modified)){echo $modified ;}else{echo 'No se ha actualizado';};?></span>
                                </div>
                                <div class="main__user__content__bloque__content">
                                    <span>Conyuge:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($contactoConyuge)){echo $contactoConyuge;}else{echo 'No se estableció ningun conyuge';}?></span>
                                </div>
                            </div>                  
                            <div class="main__user__content__bloque">
                                <div class="main__user__content__bloque__content">
                                    <span>Enviar emails:</span><span class="main__user__content__bloque__content__respuesta"><?php if($emails != ''){if($emails == '0' ){echo 'Si';}else if($emails == '1'){echo 'No';};}else{echo 'No establecido';}?></span>
                                </div>
                                <div class="main__user__content__bloque__content">
                                    <span>Celular Conyuge:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($contactoConyugeCelular)){echo $contactoConyugeCelular;}else{echo 'No se estableció ningun celular de conyuge';}?></span>
                                </div>
                                <div class="main__user__content__bloque__content">
                                    <span>Email Conyuge:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($contactoConyugeEmail)){echo $contactoConyugeEmail;}else{echo 'No se estableció ningun email de conyuge';}?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php ;}?>
                <?php if ($_GET['page']== 'documento'){?>
                <div class="main__seguimiento">
                    <form action="backend/agregar.php?page=documento&consulta=<?php echo $_GET['consulta'];?>" class="documentos__form" method="POST" enctype="multipart/form-data">
                        <div class="documentos__form__content">
                            <label class="main__buttons__button" for="fotodocumento">Seleccionar documento</label>
                            <input style="display:none" type="file" name="fotodocumento" id="fotodocumento">  
                            <p id="files-area" class="files-area">
                                <span id="filesListDocumento">
                                    <span id="files-namesDocumento" class="files-names"></span>
                                </span>
                            </p>                   
                            <input name="submit" class="main__buttons__button" type="submit" value="Subir documento">
                        </div>
                    </form>
                    <div class="main__container__top main__container__top--seguimiento">
                        <div class="main__title"><i class="fa-solid fa-file main__h1--emoji"></i><h1 class="main__h1">Listado de documentos</h1></div>
                    </div>
                    <div class="main__decoration"></div>  
                    <?php
                        $sentencia = $connect->prepare("SELECT * FROM wp_consulta_documento WHERE consulta_id=$editarId  ORDER BY id ASC") or die('query failed');
                        $sentencia->execute();
                        $visitas = $sentencia->rowCount();
                        if($visitas > 0){?>                
                    <ul class="tareas--pendientes__list documentos__ul">
                    <?php           

                        $tareas = $sentencia->fetchAll();                        
                            foreach($tareas as $tarea){
                                $documentoId = $tarea['id'];
                                $documentoNombreOLD = $tarea['archivo'];                               
                                $documentoNombre = $tarea['archivo_real'];                               
                    ?>
                                <li class="tareas--pendientes__li tareas--pendientes__li--documentos" id="li<?php echo$documentoId;?>">
                                    <div class="tareas--pendientes__tarea tareas--pendientes__tarea--documento">
                                        <span class="tareas--pendientes__tarea--bold"><?php echo $documentoNombreOLD;?></span>
                                    </div>                                                      
                                    <div class="tareas--pendientes__tarea tareas--pendientes__tarea--ver-eliminar"> 
                                        <a class="consultas__edit-search-reload__content" href="content/<?php echo $documentoNombre?>"><i class="consultas__accion fa-solid fa-pencil"></i><span>Ver</span></a>
                                        <a onclick="if(confirm('¿Seguro que quieres eliminar este documento?')) delDocumento(<?php echo $documentoId?>)" class="consultas__edit-search-reload__content"><i class="consultas__accion fa-solid fa-trash"></i><span>Eliminar</span></a>
                                    </div>                                                   
                                </li>                         
                            <?php };?>
                        </ul>
                        <?php ;};?>
                </div>
                <?php ;}?>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js"></script>
    <script>
        let formSeguimiento= document.getElementById('formSeguimiento');
        formSeguimiento.addEventListener("submit", function(e){
            e.preventDefault();
            let url = 'backend/agregar.php?page=evento';
            let datos = new FormData(formSeguimiento);
            let modal = $("#modal");
            

            fetch(url, {
                method:'POST',
                body: datos,
                mode: "cors" //Default cors, no-cors, same-origin
            }).then(response => response.json())
            .then(data => {
                alert(data);
                formSeguimiento.reset();
                modal.removeAttr('style');             
                
            })
            .catch(err => console.log(err))
                    
        });

        let formVisita= document.getElementById('formVisita');
        formVisita.addEventListener("submit", function(e){
            e.preventDefault();
            let url = 'backend/agregar.php?page=evento';
            let datos = new FormData(formVisita);
            let modal = $("#modalVisita");
            

            fetch(url, {
                method:'POST',
                body: datos,
                mode: "cors" //Default cors, no-cors, same-origin
            }).then(response => response.json())
            .then(data => {
                alert(data);
                formVisita.reset();
                modal.removeAttr('style');             
                
            })
            .catch(err => console.log(err))
                    
        });

        const dt2 = new DataTransfer(); // Manejar los archivos del input
        $("#fotodocumento").on('change', function(e){
        // Vaciar la lista de archivos
        $("#filesListDocumento > #files-namesDocumento").empty();
        // Actualizar el objeto dt2 con el archivo seleccionado
        dt2.items.clear();
        dt2.items.add(this.files[0]);
    
        let fileBlock = $('<span/>', {class: 'file-block'}),
        fileName = $('<span/>', {id:'namePortada', class: 'name', text: this.files[0].name});
        fileBlock.append('<span id="file-deleteDocumento" class="file-delete"><span>x</span></span>')
        .append(fileName);
        $("#filesListDocumento > #files-namesDocumento").append(fileBlock);
    
        // Eliminar archivo
        $('span#file-deleteDocumento').click(function(){
        let name = $(this).next('span#namePortada').text();
        // Eliminar el nombre del archivo
        $(this).parent().remove();
        for(let i = 0; i < dt2.items.length; i++){
            // Verifica si coincide el archivo y el nombre
            if(name === dt2.items[i].getAsFile().name){
            // Elimina el archivo en el DataTransfer
            dt2.items.remove(i);
            continue;
            }
        }
        // Actualizar los archivos del input luego de eliminarlos
        document.getElementById('fotodocumento').files = dt2.files;
        });
    });
    </script>
</body>
</html>