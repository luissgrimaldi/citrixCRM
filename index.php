<?php include 'header.php' ?>
<?php  $sentencia = $connect->prepare("SELECT * FROM `wp_consultas`") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 20;
        $consultasTotales = $sentencia->rowCount();
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
        if(!isset($_POST['tipo'])){$_POST['tipo'] = '1';}; if(!isset($_POST['agente'])){$_POST['agente'] = $idAgente;}; if(!isset($_POST['fecha'])){$_POST['fecha'] = '';}; if(!isset($_POST['asunto'])){$_POST['asunto'] = '';};
        if(!$_GET || $_GET["pagina"]<1){header('Location:index.php?pagina=1&tipo='.$_POST['tipo'].'&agente='.$_POST['agente'].'&fecha='.$_POST['fecha'].'&asunto='.$_POST['asunto']);}elseif($_GET['pagina']>$paginas){header('Location:index.php?pagina=1&tipo='.$_POST['tipo'].'&agente='.$_POST['agente'].'&fecha='.$_POST['fecha'].'&asunto='.$_POST['asunto']);}
        else if (!isset($_GET['tipo']) || !isset($_GET['agente'])|| !isset($_GET['fecha'])|| !isset($_GET['asunto'])){header('Location:index.php?pagina=1&tipo='.$_POST['tipo'].'&agente='.$_POST['agente'].'&fecha='.$_POST['fecha'].'&asunto='.$_POST['asunto']);};
        ?>
<?php include 'sidebar.php' ?>
<?php $getTipo= $_GET['tipo'];?>
<?php $getAgente= $_GET['agente'];?>
<?php $getFecha= $_GET['fecha'];?>
<?php $getAsunto= $_GET['asunto'];?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <i class="fa-solid fa-home-user main__h1--emoji"></i><h1 class="main__h1">Inicio</h1>
                <div class="main__decoration"></div>
                <div class="main__atajos atajos">
                    <div class="atajos__atajo" onClick="window.location='propiedades.php'">
                        <i class="fa-solid fa-building atajo__emoji"></i>
                        <h2 class="atajo__h2">Propiedades</h2>
                        <button type="button" class="atajo__button">Nueva propiedad</button>
                    </div>
                    <div class="atajos__atajo">
                        <i class="fa-solid fa-envelope atajo__emoji"></i>
                        <h2 class="atajo__h2">Mail</h2>
                        <button type="button" class="atajo__button">Nuevo mail</button>
                    </div>
                    <div class="atajos__atajo" onClick="window.location='agenda.php'">
                        <i class="fa-solid fa-address-book atajo__emoji"></i>
                        <h2 class="atajo__h2">Agenda</h2>
                        <button type="button" class="atajo__button">Nueva cita</button>
                    </div>
                    <div class="atajos__atajo" onClick="window.location='consultas.php'">
                        <i class="fa-solid fa-circle-question atajo__emoji"></i>
                        <h2 class="atajo__h2">Consultas</h2>
                        <button type="button" class="atajo__button">Nueva consulta</button>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__tareas tareas">
                    <form id="form_home" class="tareas__form" method="POST" action="index.php">
                        <select name="tipo" class="tareas__select">
                            <option value="1" <?php if($getTipo == 1){echo 'selected';};?>>Pendientes</option>
                            <option value="2" <?php if($getTipo == 2){echo 'selected';};?>>Realizadas</option>
                            <option value="3" <?php if($getTipo == 3){echo 'selected';};?>>Todas</option>
                        </select>
                        <select name="agente" class="tareas__select">
                        <?php                          
                            $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                            $sentencia->execute();
                            $agentes = $sentencia->fetchAll();                         
                            foreach($agentes as $agente){
                                $idAgente = $agente['user_id'];
                                $agenteNombre = $agente['nombre'];
                                $agenteApellido = $agente['apellido'];
                        ?>
                                <option <?php if($getAgente == $idAgente){echo 'selected';};?> value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                            <?php };?>
                        </select>
                        <select name="fecha" class="tareas__select">
                            <option value="0" <?php if($getFecha == ''){echo 'selected';};?>></option>
                            <option value="1" <?php if($getFecha == 1){echo 'selected';};?>>Hoy</option>
                            <option value="3" <?php if($getFecha == 3){echo 'selected';};?>>Este mes</option>
                        </select>
                
                        <input type="text" class="tareas__search"  name="asunto" value="<?php echo $getAsunto;?>" placeholder="Asunto / Observaciones" />
                        <button type="button" onClick="document.getElementById('buscadorSubmit').click()" class="tareas__search--btn"><i class="fa fa-search"></i></button>
                        <input type="submit" id="buscadorSubmit" style="display:none;">
                    </form>
                    <div class="tareas--pendientes">
                        <h4 class="tareas--pendientes__h4 titulo_busqueda" id="TituloTareas"><?php if($getTipo == 1){echo 'Tareas Pendientes';}else if($getTipo == 2){echo 'Tareas Realizadas';}else{ echo 'Todas las tareas';}?></h4>
                        <?php
                    if($getTipo==2){$whereTipo=" AND t.tarea_terminada = 1";}else if($getTipo==1){$whereTipo=" AND t.tarea_terminada != 1";}else{$whereTipo="";};
                    if($getFecha==1){$whereFecha= " AND DAY(t.fecha)=".date('d')." AND MONTH(t.fecha)=".date('m')." AND YEAR(t.fecha)=".date('Y');}else if($getFecha==3){$whereFecha= " AND MONTH(t.fecha)=".date('m')." AND YEAR(t.fecha)=".date('Y');}else{$whereFecha="";};      
                    $whereAsunto=" AND t.asunto LIKE '%".trim($getAsunto)."%'";               
                    if($getTipo == '' AND $getAgente == '' AND $getFecha == '' AND $getAsunto == '' ){$filtro = '';}else{ 
                        
                        $filtro = "WHERE a.user_id=".$getAgente;
                        
                        if($getTipo != ''){$filtro .= $whereTipo;};
                        if($getFecha != ''){$filtro .= $whereFecha;};
                        if($getAsunto != ''){$filtro .= $whereAsunto;};
                        
                    }
                    $sentencia = $connect->prepare("SELECT t.id, t.user_id, t.fecha, t.asunto, t.tipo_tarea_id, t.hora_inicio, t.tarea_terminada,t.observaciones,
                        g.id, g.nombre,
                        a.user_id, a.nombre, a.apellido,
                        t.id as t_id, t.user_id as t_user_id, t.fecha as t_fecha, t.asunto as t_asunto, t.tipo_tarea_id as t_tipo_tarea, t.hora_inicio as t_hora_inicio, t.observaciones as t_observaciones,
                        g.id as g_id, g.nombre as g_nombre,
                        a.user_id as a_user_id, a.nombre as a_nombre, a.apellido as a_apellido
                        FROM wp_agenda t 
                        LEFT JOIN wp_agenda_tipo_tarea g ON  t.tipo_tarea_id =g.id
                        LEFT JOIN usuarios a ON  t.user_id=a.user_id
                        $filtro") or die('query failed');
                        $sentencia->execute();
                        $consultasTotales = $sentencia->rowCount();
                        $paginas = $consultasTotales/$consultasXpagina;
                        $paginas = ceil($paginas);
                        $tareas = $sentencia->fetchAll();
                        if($tareas){?> 
                            <form action="backend/finalizareventos.php" method="POST" class="tareas--pendientes__form">
                                <ul class="tareas--pendientes__list">
                            <?php if($getTipo!=2){?><div class="tareas--pendientes__select-all">
                                <label for="">Seleccionar todas</label>
                                <input class="tareas--pendientes__checkbox" id="chk_all" name="chk_all" value="<?php echo $tareaId;?>" type="checkbox">
                            </div><?php ;};?>
                    <?php           
                        $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;
                        $sentencia = $connect->prepare("SELECT t.id, t.user_id, t.fecha, t.asunto, t.tipo_tarea_id, t.hora_inicio, t.tarea_terminada,t.observaciones,
                        g.id, g.nombre,
                        a.user_id, a.nombre, a.apellido,
                        t.id as t_id, t.user_id as t_user_id, t.fecha as t_fecha, t.asunto as t_asunto, t.tipo_tarea_id as t_tipo_tarea, t.hora_inicio as t_hora_inicio, t.observaciones as t_observaciones,
                        g.id as g_id, g.nombre as g_nombre,
                        a.user_id as a_user_id, a.nombre as a_nombre, a.apellido as a_apellido
                        FROM wp_agenda t 
                        LEFT JOIN wp_agenda_tipo_tarea g ON  t.tipo_tarea_id =g.id
                        LEFT JOIN usuarios a ON  t.user_id=a.user_id
                        $filtro ORDER BY t_id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                        $sentencia->execute();
                        $tareas = $sentencia->fetchAll();                        
                            foreach($tareas as $tarea){
                                $tareaId = $tarea['t_id'];
                                $agenteNombre = $tarea['a_nombre'];
                                $agenteApellido = $tarea['a_apellido'];
                                $tareaFecha = $tarea['t_fecha'];               
                                $tareaFecha = date("d/m/Y", strtotime($tareaFecha));              
                                $tareaAsunto = $tarea['t_asunto'];
                                $tareaMotivo = $tarea['g_nombre'];
                                $tareaHora = $tarea['t_hora_inicio'];
                                $tareaHora = substr($tareaHora, 0, -3);
                                $tareaObservaciones = $tarea['t_observaciones'];                
                        ?>
                            <li class="tareas--pendientes__li"><div class="tareas--pendientes__tarea"><span class="tareas--pendientes__tarea__tipo"><?php echo $tareaMotivo;?></span><h4><?php echo $tareaAsunto;?></h4><span><?php echo $tareaFecha;?></span><span><?php echo $tareaHora;?></span></div><h5 class="tareas--pendientes__nombre"><?php echo $agenteNombre.' '.$agenteApellido;?></h5><input class="tareas--pendientes__checkbox checkbox--fin" name="fin_id[]" value="<?php echo $tareaId;?>" type="checkbox"></li>                         
                        <?php };?>
                    </ul>
                    <input type="submit" style="display:none" id="realizadas_form">
                    </form>
                    <?php if($getTipo!=2){?><button type="button" onClick="document.getElementById('realizadas_form').click()" class="tareas--pendientes__btn">Pasar a realizada</button><?php ;}?>
                    <?php }else{?>
                        <h4 class="no--tareas">No hay tareas</h4>
                        <?php };?>
                    </div>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="index.php?pagina=<?php echo $_GET["pagina"]-1?>&tipo=<?php echo $_GET['tipo']?>&agente=<?php echo $_GET['agente']?>&fecha=<?php echo $_GET['fecha']?>&asunto=<?php echo $_GET['asunto']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="index.php?pagina=<?php echo $i+1?>&tipo=<?php echo $_GET['tipo']?>&agente=<?php echo $_GET['agente']?>&fecha=<?php echo $_GET['fecha']?>&asunto=<?php echo $_GET['asunto']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="index.php?pagina=<?php echo $_GET["pagina"]+1?>&tipo=<?php echo $_GET['tipo']?>&agente=<?php echo $_GET['agente']?>&fecha=<?php echo $_GET['fecha']?>&asunto=<?php echo $_GET['asunto']?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    $('#chk_all').click(function(){
        if(this.checked)
            $(".checkbox--fin").prop("checked", true);
        else
            $(".checkbox--fin").prop("checked", false);
    });
});

</script>
</body>
</html>