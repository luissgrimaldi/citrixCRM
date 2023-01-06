<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php  $sentencia = $connect->prepare("SELECT * FROM `wp_consultas`") or die('query failed');
            $sentencia->execute();
            $list_consultas = $sentencia->fetchAll();
            $consultasXpagina = 40;
            $consultasTotales = $sentencia->rowCount();
            $paginas = $consultasTotales/$consultasXpagina;
            $paginas = ceil($paginas);
            if(!$_GET || $_GET["pagina"]<1){header('Location:consulta.php?pagina=1');}elseif($_GET['pagina']>$paginas){header('Location:consulta.php?pagina='.$paginas);};
?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-circle-question main__h1--emoji"></i><h1 class="main__h1">Consultas</h1></div>
                    <div class="main__buttons">
                        <button class="main__buttons__button">Nueva consulta</button>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-consulta">
                    <form id="form_calc_4" class="form__busqueda-consulta form">
                        <div class="form__bloque form__bloque--1">
                            <div class="form__bloque__fecha fecha">
                                <h2 class="fecha__h2">Fecha</h2>
                                <div class="fecha__container">
                                    <div class="form__bloque__content fecha__container__content">
                                        <label  class="form__label fecha__container__content__label" for="">Desde</label>
                                        <input class="form__text fecha__container__content__text" type="text">
                                    </div>
                                    <div class="form__bloque__content fecha__container__content">
                                        <label  class="form__label fecha__container__content__label" for="">Hasta</label>
                                        <input class="form__text fecha__container__content__text" type="text">
                                    </div>
                                </div>                            
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Cliente</label>
                                <input class="form__text content__text" type="text">
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--2">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Canal</label>
                                <select class="form__select" name="" id="">
                                    <option value></option>
                                    <option value="1">Web</option>
                                    <option value="2">Zonaprop</option>
                                    <option value="3">Argenprop</option>
                                    <option value="4">Mercadolibre</option>
                                    <option value="5">Etc</option>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Operación</label>
                                <select class="form__select" name="" id="">
                                    <option value></option>
                                    <option value="1">Compra/Venta</option>
                                    <option value="2">Alquiler</option>
                                    <option value="3">Leasing</option>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zona</label>
                                <select class="form__select" name="" id="">
                                    <option value></option>
                                    <option value="1">La matanza</option>
                                    <option value="2">El palomar</option>
                                    <option value="3">Morón</option>
                                    <option value="4">Etc</option>
                                </select>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--3">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de propiedad</label>
                                <select class="form__select" name="" id="">
                                    <option value></option>
                                    <option value="1">Casa</option>
                                    <option value="2">Departamento</option>
                                    <option value="3">Emprendimiento</option>
                                    <option value="4">Oficina</option>
                                    <option value="5">Loft</option>
                                    <option value="6">Cochera</option>
                                    <option value="7">Duplex</option>
                                    <option value="8">Lote</option>
                                    <option value="9">PH</option>
                                    <option value="10">Local</option>
                                    <option value="11">Depósito</option>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Propiedad</label>
                                <input class="form__text content__text" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado</label>
                                <select class="form__select" name="" id="">
                                    <option value></option>
                                    <option value="1">Pendiente</option>
                                    <option value="2">Eliminada</option>
                                    <option value="3">Terminada</option>
                                    <option value="4">Respondida</option>
                                </select>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--4">
                            <input type="button" class="form__button form__bloque__button" value="Buscar">
                        </div>
                    </form>
                </div>
                <div class="main__decoration"></div>
                <div class="consultas">
                    <ul class="consultas__ul">
                        <?php
                            $inicioConsultasXpagina = ($_GET['pagina'] - 1)*$consultasXpagina;
                            $sentencia = $connect->prepare("SELECT con.id, con.consulta, con.propiedad_id, con.nombre, con.apellido, con.email, con.telefono, con.created, con.situacion,
                            prop.id, prop.referencia_interna, prop.calle, prop.altura,
                            sit.id, sit.nombre,
                            con.id as con_id, con.consulta as con_consulta, con.nombre as con_nombre, con.apellido as con_apellido, con.email as con_email, con.telefono as con_telefono, con.created as con_created,
                            prop.referencia_interna as prop_referencia_interna, prop.calle as prop_calle, prop.altura as prop_altura,
                            sit.nombre as sit_nombre      
                            FROM wp_consultas con 
                            LEFT JOIN wp_propiedades prop ON  con.propiedad_id =prop.id
                            LEFT JOIN wp_situaciones sit ON  con.situacion=sit.id
                            ORDER BY con_id DESC LIMIT $inicioConsultasXpagina,$consultasXpagina") or die('query failed');
                            $sentencia->execute();
                            $list_consultas = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                            foreach($list_consultas as $consulta){                  
                                $tipoConsulta = $consulta['con_consulta'];
                                $nombreConsulta = $consulta['con_nombre'];
                                $apellidoConsulta = $consulta['con_apellido'];
                                $emailConsulta = $consulta['con_email'];
                                $telefonoConsulta = $consulta['con_telefono'];
                                $fechaConsulta = $consulta['con_created'];
                                $refPropiedad = $consulta['prop_referencia_interna'];
                                $callePropiedad = $consulta['prop_calle'];
                                $alturaPropiedad = $consulta['prop_altura'];
                                $situacionConsulta = $consulta['sit_nombre'];                             
                            ?>                           
                        <li class="consultas__li">
                            <div class="consultas__bloque">
                                <div class="consultas__bloque__content">
                                <span class="consultas__consulta"> <?php echo $tipoConsulta. ' | '. $refPropiedad.' ('.$callePropiedad.' '.$alturaPropiedad.') | '.$fechaConsulta?></span>
                                </div>
                                <div class="consultas__bloque__content">                           
                                <span class="consultas__datos-cliente"><?php echo $nombreConsulta. ' '. $apellidoConsulta. ' ('. $emailConsulta. ' - '. $telefonoConsulta.') | Situación: '.$situacionConsulta?></span>
                                </div>
                            </div>
                            <div class="consultas__bloque">
                                <div class="consultas__bloque__content consultas__edit-search-reload">
                                    <a href=""><i class="consultas__accion fa-solid fa-pencil"></i></a>
                                    <a href=""><i class="consultas__accion fa-solid fa-search"></i></a>
                                    <a href=""><i class="consultas__accion fa-solid fa-rotate"></i></a>
                                </div>   
                            </div>
                        </li>
                        <?php }; ?>
                    </ul>
                </div>
                <div class="pagination">
                    <ul>
                        <a class="<?php if ($_GET['pagina']<=1){echo 'is-disabled';}?>" href="consulta.php?pagina=<?php echo $_GET["pagina"]-1?>"><li><</li></a>
				        <?php for($i=0;$i<$paginas;$i++):?>
                        <a class="<?php if ($_GET['pagina']==$i+1){echo 'is-active';}?>" href="consulta.php?pagina=<?php echo $i+1?>"><li><?php echo $i+1?></li></a>
				        <?php endfor ?>
                        <a class="<?php if ($_GET['pagina']>=$paginas){echo 'is-disabled';}?>" href="consulta.php?pagina=<?php echo $_GET["pagina"]+1?>"><li>></li></a>
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