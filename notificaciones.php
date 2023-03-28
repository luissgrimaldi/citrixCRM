<?php include 'header.php' ?>
<?php  $sentencia = $connect->prepare("SELECT * FROM `wp_notificaciones` WHERE user_id = $idAgente") or die('query failed');
        $sentencia->execute();
        $consultasXpagina = 20;
        $consultasTotales = $sentencia->rowCount();
        if($consultasTotales == 0){$consultasTotales=1;}
        $paginas = $consultasTotales/$consultasXpagina;
        $paginas = ceil($paginas);
        if(!isset($_POST['seen'])){$_POST['seen'] = 0;};
        if(!$_GET ||$_GET["pagina"]<1){header('Location:notificaciones.php?pagina=1&seen='.$_POST['seen']);}elseif($_GET["pagina"]>$paginas){header('Location:notificaciones.php?pagina=1&seen='.$_POST['seen']);}
        else if (!isset($_GET['seen'])){header('Location:notificaciones.php?pagina=1&seen='.$_POST['seen']);};
        ?>
<?php include 'sidebar.php'; ?>
<?php $getSeen= $_GET['seen'];?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <i class="fa-solid fa-bell main__h1--emoji"></i><h1 class="main__h1">Notificaciones</h1>
                <div class="main__decoration"></div>
                <div class="main__tareas tareas">
                    <form autocomplete="off" id="form_notificaciones" class="tareas__form" method="POST" action="notificaciones.php">
                        <label class="form__label content__label" for="">Ordenar por</label>
                        <select id="seen" name="seen" class="tareas__select">
                            <option value="0" <?php if($getSeen == 0){echo 'selected';};?>>Sin leer</option>
                            <option value="1" <?php if($getSeen == 1){echo 'selected';};?>>Leidas</option>
                        </select>                     
                        <input type="submit" id="buscadorSubmit" style="display:none;">
                    </form>
                    <div class="main__decoration"></div>
                    <div class="tareas--pendientes">
                        <h4 class="tareas--pendientes__h4 titulo_busqueda" id="TituloTareas"><?php if($getSeen == 0){echo 'Notificaciones sin leer';}else if($getSeen == 1){echo 'Notificaciones leidas';}else{ echo 'Todas las tareas';}?></h4>
                    <?php
                    $whereSeen=" AND seen = $getSeen";               

                    $filtro = "WHERE user_id=".$idAgente;
                    $filtro .= $whereSeen;
                        
                    $sentencia = $connect->prepare("SELECT * FROM `wp_notificaciones` $filtro") or die('query failed');
                        $sentencia->execute();
                        $consultasTotales = $sentencia->rowCount();
                        $paginas = $consultasTotales/$consultasXpagina;
                        $paginas = ceil($paginas);
                        $tareas = $sentencia->fetchAll();
                        $notificacionesActuales = $sentencia->rowCount();?>
                            <ul class="notificaciones__list">
                            
                    <?php           
                        $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;
                        $sentencia = $connect->prepare("SELECT * FROM `wp_notificaciones` $filtro ORDER BY id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                        $sentencia->execute();
                        $tareas = $sentencia->fetchAll();                        
                            foreach($tareas as $tarea){
                                $id = $tarea['id'];
                                $user_id = $tarea['user_id'];
                                $mensaje = $tarea['mensaje'];
                                $seen = $tarea['seen'];
                                $hora_actual = new DateTime();
                                $fecha_hora_bd = new DateTime($tarea['fecha']);    
                                $diferencia_tiempo = date_diff($hora_actual, $fecha_hora_bd);        
                                // Obtener la diferencia de tiempo en meses, semanas, días, horas, minutos o segundos según corresponda
                                if ($diferencia_tiempo->y >= 1) {
                                    $tiempo_transcurrido = $diferencia_tiempo->y . " " . ($diferencia_tiempo->y == 1 ? "año" : "años");
                                } elseif ($diferencia_tiempo->m >= 1) {
                                    $tiempo_transcurrido = $diferencia_tiempo->m . " " . ($diferencia_tiempo->m == 1 ? "mes" : "meses");
                                } elseif ($diferencia_tiempo->d >= 7) {
                                    $semanas = floor($diferencia_tiempo->d / 7);
                                    $tiempo_transcurrido = $semanas . " " . ($semanas == 1 ? "semana" : "semanas");
                                } elseif ($diferencia_tiempo->d >= 1) {
                                    $tiempo_transcurrido = $diferencia_tiempo->d . " " . ($diferencia_tiempo->d == 1 ? "día" : "días");
                                } elseif ($diferencia_tiempo->h >= 1) {
                                    $tiempo_transcurrido = $diferencia_tiempo->h . " " . ($diferencia_tiempo->h == 1 ? "hora" : "horas");
                                } elseif ($diferencia_tiempo->i >= 1) {
                                    $tiempo_transcurrido = $diferencia_tiempo->i . " " . ($diferencia_tiempo->i == 1 ? "minuto" : "minutos");
                                } elseif ($diferencia_tiempo->s >= 1) {
                                    $tiempo_transcurrido = $diferencia_tiempo->s . " " . ($diferencia_tiempo->s == 1 ? "segundo" : "segundos");
                                } else {
                                    $tiempo_transcurrido = "recién";
                                }
                        ?>
                            <li id="li<?php echo $id;?>" class="notificaciones__li notificaciones">
                                <div class="notificaciones__notificacion">
                                    <div class="notificaciones__bloque--1">
                                        <span>Hace <?php echo $tiempo_transcurrido;?></span>
                                        <span class="notificaciones__mensaje"><?php echo $mensaje;?></span>
                                    </div>
                                    <a class="notificaciones__seen" onclick="<?php if($seen == 0){?>marcarLeido(<?php echo $id;?>)<?php ;}else{?>desmarcarLeido(<?php echo $id;?>)<?php ;}?>">
                                        <i class="fa-solid <?php if($seen == 0){?>fa-eye<?php ;}else{?>fa-eye-slash<?php ;}?>"></i>
                                        <?php if($seen == 0){?><span>Visto</span><?php ;}else{?><span>No visto</span><?php ;}?>
                                    </a>
                                </div>                               
                            </li>                         
                        <?php };?>
                    </ul>
                    <h4 class="no--tareas" style="display:<?php if($notificacionesActuales>0){echo 'none';}else{echo 'block';}?>">No hay notificaciones</h4>   
                    </div>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="index.php?pagina=<?php echo $_GET["pagina"]-1?>&seen=<?php echo $_GET['seen']?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="index.php?pagina=<?php echo $i+1?>&seen=<?php echo $_GET['seen']?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="index.php?pagina=<?php echo $_GET["pagina"]+1?>&seen=<?php echo $_GET['seen']?>"><li>></li></a>
                    </ul>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js"></script>
    <script>
        seen = document.getElementById("seen");
        notificacionesForm = document.getElementById("form_notificaciones");
        seen.addEventListener("change", function(){
            notificacionesForm.submit();
        })
    </script>
</body>
</html>