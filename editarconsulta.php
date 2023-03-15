<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-envelope main__h1--emoji"></i><h1 class="main__h1">Editar consulta</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">             
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
                    $editarBuscarZona = $propiedad['zonas'];
                    $editarBuscarZona = explode ( "," , $editarBuscarZona);
                    $editarBuscarTipo = $propiedad['tipos_propiedad'];
                    $editarBuscarTipo = explode ( "," , $editarBuscarTipo);
                    }
                ?>
                    <form class="form__busqueda-propiedad form" autocomplete="off" name="form" method="POST" action="backend/editar.php?page=consulta&consulta=<?php echo $editarId;?>">
                        <h2 class="main__h2">Datos de contacto</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <input type="text" placeholder="Ingrese nombre de contacto" class="form__text content__text" name="buscadorcontactos" id="buscadorcontactos2" autocomplete="off"> 
                                <input type="hidden" class="form__text content__text" name="contacto_id" id="contacto_id"> 
                                <ul class="content_ul" id="listaContactos"></ul>                
                            </div>  
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nombre</label>
                                <input type="text" class="form__text content__text" name="nombre" id="inputNombre" value="<?php echo $editarNombre;?>" readonly="readonly">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Apellido</label>
                                <input type="text" class="form__text content__text" name="apellido" id="inputApellido" value="<?php echo $editarApellido;?>" readonly="readonly">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Email</label>
                                <input type="email" class="form__text content__text" name="email" id="inputEmail" value="<?php echo $editarEmail;?>" readonly="readonly">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Teléfono</label>
                                <input type="text" class="form__text content__text" name="telefono" id="inputTelefono" value="<?php echo $editarTelefono;?>" readonly="readonly">                                  
                            </div>
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <input type="text" class="form__text content__text form__text--propiedad" placeholder="Ingrese nombre de propiedad" name="buscadorpropiedad" id="buscadorpropiedad" autocomplete="off">                                                                                      
                                <ul class="content_ul" id="listaPropiedades"></ul>
                            </div>
                        </div>               
                        <div class="form__bloque">
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Propiedad</label>
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
                                    ?>
                                    <input type="text" class="form__text content__text form__text--propiedad" name="propiedadnombre" id="inputPropiedadNombre" value="<?php if($editarPropiedad != '0' or $editarPropiedad != NULL){ echo 'REF '.$propiedadRef.': '.$propiedadTitulo.' ('.$propiedadNombre.' '.$propiedadAltura.')';};?>">  
                                    <input type="hidden" class="form__text content__text form__text--propiedad" name="propiedad" id="inputPropiedad" value="<?php echo $editarPropiedad;?>">                                              
                            </div>
                        </div>
                        <div class="form__bloque">
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Observaciones</label>
                                    <textarea class="form__textarea content__textarea" name="observaciones" id=""><?php echo $editarObservaciones;?></textarea>                                                    
                            </div>
                        </div>
                        <div class="form__bloque">
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Consulta</label>
                                    <textarea class="form__textarea content__textarea" name="consulta" id=""><?php echo $editarConsulta;?></textarea>                                                       
                            </div>
                        </div>
                        <h2 class="main__h2">Captura</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado</label>
                                <select class="form__select" name="estado" id=""> 
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_molt_multiform_status` WHERE status_id = '".$editarEstado."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $propiedadNombre = $propiedad['name'];?>
                                        <option value="<?php echo $editarEstado;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_molt_multiform_status` WHERE table_id=3") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                        foreach($list_propiedadesOperacion as $propiedad){
                                        $idPropiedad = $propiedad['status_id'];
                                        $propiedadNombre = $propiedad['name'];
                                        if($editarEstado!=$idPropiedad){?>
                                    <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Situacion</label>
                                <select class="form__select" name="situacion" id="">         
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_situaciones` WHERE id = '".$editarSituacion."'") or die('query failed');
                                        $sentencia->execute();
                                        $list_situaciones = $sentencia->fetchAll();                         
                                        foreach($list_situaciones as $situacion){
                                        $propiedadNombre = $situacion['nombre'];?>
                                        <option value="<?php echo $editarSituacion;?>"><?php echo $propiedadNombre;?></option>
                                    <?php };?>                              
                                    <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_situaciones`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_situaciones = $sentencia->fetchAll();                         
                                            foreach($list_situaciones as $situacion){
                                            $idSituacion = $situacion['id'];
                                            $situacionNombre = $situacion['nombre'];
                                            if($editarSituacion!=$idSituacion){?>
                                        <option value="<?php echo $idSituacion?>"><?php echo $situacionNombre?></option>
                                    <?php };};?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Captado por</label>
                                <select class="form__select" name="captadopor" id="">                               
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE user_id = '".$editarCaptado."'") or die('query failed');
                                        $sentencia->execute();
                                        $agentes = $sentencia->fetchAll();                         
                                        foreach($agentes as $agente){
                                        $agenteNombre = $agente['nombre'];
                                        $agenteApellido = $agente['apellido'];
                                        ?>
                                    <option value="<?php echo $editarCaptado?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
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
                                            if($editarCaptado!=$idAgente){?>
                                        <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };};?>
                                </select>
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Medio de contacto</label>
                                <select class="form__select" name="mediodecontacto" id="">                               
                                    <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_medios_contacto` WHERE id = '".$editarMedio."'") or die('query failed');
                                        $sentencia->execute();
                                        $medios = $sentencia->fetchAll();                         
                                        foreach($medios as $medio){
                                            $idMedio = $medio['id'];
                                            $medioNombre = $medio['nombre'];
                                        ?>
                                    <option value="<?php echo $editarMedio?>"><?php echo $medioNombre ?></option>
                                    <?php };?>                              
                                    <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_medios_contacto`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $medios = $sentencia->fetchAll();                         
                                            foreach($medios as $medio){
                                            $idMedio = $medio['id'];
                                            $medioNombre = $medio['nombre'];
                                            if($editarMedio!=$idMedio){?>?>
                                        <option value="<?php echo $idMedio?>"><?php echo $medioNombre ?></option>
                                    <?php };};?>
                                </select>
                            </div>                                     
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Asignado a</label>
                                <select class="form__select" name="asignadoa" id="">                               
                                <?php
                                        $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE user_id = '".$editarAsignar."'") or die('query failed');
                                        $sentencia->execute();
                                        $agentes = $sentencia->fetchAll();                         
                                        foreach($agentes as $agente){
                                        $agenteNombre = $agente['nombre'];
                                        $agenteApellido = $agente['apellido'];
                                        ?>
                                    <option value="<?php echo $editarAsignar?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
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
                                            if($editarAsignar !=$idAgente){?>
                                        <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };};?>
                                </select>
                            </div>                 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Llamar desde</label>
                                <select class="form__select" name="llamardesde" id="">                               
                                    <option value="<?php echo $editarLlamarDesde?>"><?php echo $editarLlamarDesde?></option>
                                    <option value></option>
                                    <?php if($editarLlamarDesde!='08:00'){?><option value="08:00">08:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='08:30'){?><option value="08:30">08:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='09:00'){?><option value="09:00">09:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='09:30'){?><option value="09:30">09:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='10:00'){?><option value="10:00">10:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='10:30'){?><option value="10:30">10:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='11:00'){?><option value="11:00">11:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='11:30'){?><option value="11:30">11:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='12:00'){?><option value="12:00">12:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='12:30'){?><option value="12:30">12:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='13:00'){?><option value="13:00">13:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='13:30'){?><option value="13:30">13:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='14:00'){?><option value="14:00">14:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='14:30'){?><option value="14:30">14:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='15:00'){?><option value="15:00">15:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='15:30'){?><option value="15:30">15:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='16:00'){?><option value="16:00">16:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='16:30'){?><option value="16:30">16:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='17:00'){?><option value="17:00">17:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='17:30'){?><option value="17:30">17:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='18:00'){?><option value="18:00">18:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='18:30'){?><option value="18:30">18:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='19:00'){?><option value="19:00">19:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='19:30'){?><option value="19:30">19:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='20:00'){?><option value="20:00">20:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='20:30'){?><option value="20:30">20:30</option><?php };?>
                                    <?php if($editarLlamarDesde!='21:00'){?><option value="21:00">21:00</option><?php };?>
                                    <?php if($editarLlamarDesde!='21:30'){?><option value="21:30">21:30</option><?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Llamar hasta</label>
                                <select class="form__select" name="llamarhasta" id="">                               
                                    <option value="<?php echo $editarLlamarHasta?>"><?php echo $editarLlamarHasta?></option>
                                    <option value></option>
                                    <?php if($editarLlamarHasta!='08:00'){?><option value="08:00">08:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='08:30'){?><option value="08:30">08:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='09:00'){?><option value="09:00">09:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='09:30'){?><option value="09:30">09:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='10:00'){?><option value="10:00">10:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='10:30'){?><option value="10:30">10:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='11:00'){?><option value="11:00">11:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='11:30'){?><option value="11:30">11:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='12:00'){?><option value="12:00">12:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='12:30'){?><option value="12:30">12:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='13:00'){?><option value="13:00">13:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='13:30'){?><option value="13:30">13:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='14:00'){?><option value="14:00">14:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='14:30'){?><option value="14:30">14:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='15:00'){?><option value="15:00">15:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='15:30'){?><option value="15:30">15:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='16:00'){?><option value="16:00">16:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='16:30'){?><option value="16:30">16:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='17:00'){?><option value="17:00">17:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='17:30'){?><option value="17:30">17:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='18:00'){?><option value="18:00">18:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='18:30'){?><option value="18:30">18:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='19:00'){?><option value="19:00">19:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='19:30'){?><option value="19:30">19:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='20:00'){?><option value="20:00">20:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='20:30'){?><option value="20:30">20:30</option><?php };?>
                                    <?php if($editarLlamarHasta!='21:00'){?><option value="21:00">21:00</option><?php };?>
                                    <?php if($editarLlamarHasta!='21:30'){?><option value="21:30">21:30</option><?php };?>
                                </select>
                            </div>                                                             
                        </div>                        
                        <h2 class="main__h2">Requisitos del cliente</h2>
                        <span  class="form__span content__span" for="">Tipo de propiedad</span>      
                        <div class="form__bloque"> 
                            <?php                          
                                $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE habilitado=1") or die('query failed');
                                $sentencia->execute();
                                $list_propiedadesTipo = $sentencia->fetchAll();                         
                                foreach($list_propiedadesTipo as $propiedad){
                                $idPropiedad = $propiedad['id'];
                                $propiedadNombre = $propiedad['nombre'];                             
                            
                            ?>
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for=""><?php echo $propiedadNombre?></label>
                                    <input class="form__checkbox content__checkbox" <?php foreach($editarBuscarTipo as $tipo){ if($idPropiedad == $tipo){echo 'checked=check';} };?> type="checkbox" name="buscarTipo[]" value="<?php echo $idPropiedad?>">
                                </div> 
                            <?php };?>                                                                            
                        </div>                       
                        <span  class="form__span content__span" for="">Zonas</span>                           
                        <div class="form__bloque"> 
                            <?php                          
                                $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE habilitada=1 AND nombre !=''  ORDER BY nombre ASC") or die('query failed');
                                $sentencia->execute();
                                $list_propiedadesTipo = $sentencia->fetchAll();                         
                                foreach($list_propiedadesTipo as $propiedad){
                                $idPropiedad = $propiedad['id'];
                                $propiedadNombre = $propiedad['nombre'];
                            ?>
                                <div class="form__bloque__content content">  
                                    <label  class="form__label content__label" for=""><?php echo $propiedadNombre?></label>
                                    <input class="form__checkbox content__checkbox" <?php foreach($editarBuscarZona as $zona){ if($idPropiedad == $zona){echo 'checked=check';} };?> type="checkbox" name="buscarZona[]" value="<?php echo $idPropiedad?>">
                                </div> 
                            <?php };?>                                                                            
                        </div>
                        <h2 class="main__h2">Preferencias</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Superficie construida desde</label>
                                <input type="text" class="form__text content__text" name="superficiedesde" id="" value="<?php echo $editarSupDesde;?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Superficie construida hasta</label>
                                <input type="text" class="form__text content__text" name="superficiehasta" id="" value="<?php echo $editarSupHasta;?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio desde</label>
                                <input type="text" class="form__text content__text" name="preciodesde" id="" value="<?php echo $editarPrecioDesde;?>">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio hasta</label>
                                <input type="text" class="form__text content__text" name="preciohasta" id="" value="<?php echo $editarprecioHasta;?>">                                  
                            </div>
                        </div> 
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Planta baja</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="plantabaja" value="1" <?php if($editarPlantaBaja==1){ echo 'checked="check"';}?>>
                            </div>  
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Garaje</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="garage" value="1" <?php if($editarGaraje==1){ echo 'checked="check"';}?>>
                            </div>                                                                             
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Garaje doble</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="garagedoble" value="1" <?php if($editargarajeDoble==1){ echo 'checked="check"';}?>>
                            </div>                                                                             
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Amueblada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="amueblada" value="1" <?php if($editarAmueblada==1){ echo 'checked="check"';}?>>
                            </div>                                                                             
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Balcón</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="balcon" value="1" <?php if($editarBalcon==1){ echo 'checked="check"';}?>>
                            </div>                                                                             
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Pileta</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="pileta" value="1" <?php if($editarPileta==1){ echo 'checked="check"';}?>>
                            </div>                                                                             
                        </div>
                        <div class="main__decoration"></div>
                        <input type="submit" name="submit"  class="form__button form__bloque__button" value="Guardar cambios">                                                                 
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