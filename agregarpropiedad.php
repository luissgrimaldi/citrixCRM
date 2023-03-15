<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-building main__h1--emoji"></i><h1 class="main__h1">Agregar propiedad</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">             
                    <form autocomplete="off" class="form__busqueda-propiedad form" name="form" method="POST" action="backend/agregar.php?page=propiedad" enctype="multipart/form-data">
                        <h2 class="main__h2">Caracteristicas</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ref</label>
                                <span type="text" class="form__text content__text">&nbsp</span>                                  
                            </div>
                            <div class="form__bloque__content content"> 
                                <label  class="form__label content__label" for="">Operación</label>
                                <select class="form__select content__select" name="operacion" id="">                                             
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_operacion` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $idPropiedad = $propiedad['id'];
                                        $propiedadNombre = $propiedad['nombre'];
                                        ?>
                                    <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de propiedad</label>
                                <select class="form__select content__select" name="tipo" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_propiedades = $sentencia->fetchAll();                         
                                        foreach($list_propiedades as $propiedad){
                                        $idPropiedad = $propiedad['id'];
                                        $propiedadNombre = $propiedad['nombre'];
                                        ?>
                                    <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Codigo postal</label>
                                <input type="text" class="form__text content__text" name="codigopostal" id="">                                  
                            </div>
                        </div>                   
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Tipo de calle</label>
                                    <select class="form__select content__select" name="tipocalle" id="">    
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_tipo_calle` WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_tipo_calle = $sentencia->fetchAll();                         
                                            foreach($list_tipo_calle as $tipoCalle){
                                            $idTipoCalle = $tipoCalle['id'];
                                            $tipoCalleNombre = $tipoCalle['nombre'];
                                            ?>
                                        <option value="<?php echo $idTipoCalle?>"><?php echo $tipoCalleNombre?></option>
                                    <?php };?>
                                    </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Calle</label>
                                <input type="text" class="form__text content__text" name="calle" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Altura</label>
                                <input type="text" class="form__text content__text" name="altura" id="">                                  
                            </div>  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ciudad</label>
                                <select class="form__select content__select" name="ciudad" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_ciudades = $sentencia->fetchAll();                         
                                        foreach($list_ciudades as $ciudad){
                                        $idCiudad = $ciudad['id'];
                                        $ciudadNombre = $ciudad['nombre'];
                                        ?>
                                    <option value="<?php echo $idCiudad?>"><?php echo $ciudadNombre?></option>
                                <?php };?>
                                </select>
                            </div>                                                     
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zona</label>
                                <select class="form__select content__select" name="zona" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE habilitada=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_zonas = $sentencia->fetchAll();                         
                                        foreach($list_zonas as $zona){
                                        $idZona = $zona['id'];
                                        $zonaNombre = $zona['nombre'];
                                        ?>
                                    <option value="<?php echo $idZona?>"><?php echo $zonaNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Piso</label>
                                <input type="text" class="form__text content__text" name="piso" id="">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Puerta</label>
                                <input type="text" class="form__text content__text" name="puerta" id="">                                  
                            </div>                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Bloque</label>
                                <input type="text" class="form__text content__text" name="bloque" id="">                                  
                            </div>                                                     
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Ocupada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="ocupada" value="1">
                            </div>    
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Coordenadas</label>
                                <input type="text" class="form__text content__text" name="coordenadas" id="coordinates-input" readonly>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--map">
                            <div class="form__bloque__content content form__bloque__content--map">
                                <input type="text" class="form__text content__text content__text--map" id="address-input" placeholder="Buscar...">
                            </div>
                            <div id="map"></div>                                           
                        </div>
                        <h2 class="main__h2">Distribucion, superficie y otros datos</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nro toilettes</label>
                                <input type="text" class="form__text content__text" name="toilettes" id="">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nro plantas</label>
                                <input type="text" class="form__text content__text" name="plantas" id="">                                  
                            </div>                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros útiles</label>
                                <input type="text" class="form__text content__text" name="metrosutiles" id="">                                  
                            </div>                                                     
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Superficie construida</label>
                                <input type="text" class="form__text content__text" name="supconstruida" id="">                                  
                            </div>                                                                                                                                
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nro baños</label>
                                <input type="text" class="form__text content__text" name="banios" id="">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Año de construccion</label>
                                <input type="text" class="form__text content__text" name="anioconstruccion" id="">                                  
                            </div>                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros cocina</label>
                                <input type="text" class="form__text content__text" name="mtscocina" id="">                                  
                            </div>                                                     
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Cant. Habitaciones</label>
                                <input type="text" class="form__text content__text" name="habitaciones" id="">                                  
                            </div>                                                                                                                                
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Expensas</label>
                                <input type="text" class="form__text content__text" name="expensas" id="">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Cant. Ambientes</label>
                                <input type="text" class="form__text content__text" name="ambientes" id="">                                  
                            </div>                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros comedor</label>
                                <input type="text" class="form__text content__text" name="comedor" id="">                                  
                            </div>                                                     
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros living</label>
                                <input type="text" class="form__text content__text" name="living" id="">                                  
                            </div>                                                                                                                                
                        </div> 
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Metros lote</label>
                                <input type="text" class="form__text content__text" name="metros_lote" id="">                                  
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">¿Es en planta baja?</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="plantabaja" value="1">                               
                            </div>                                                                                                                                                        
                        </div>
                        <h2 class="main__h2">Datos de la propiedad</h2>  
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado general</label>
                                <select class="form__select content__select" name="estadogeneral" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades_estados` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_estados = $sentencia->fetchAll();                         
                                        foreach($list_estados as $estado){
                                        $idEstado = $estado['id'];
                                        $estadoNombre = $estado['nombre'];
                                        ?>
                                    <option value="<?php echo $idEstado?>"><?php echo $estadoNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Carpinteria ext.</label>
                                <select class="form__select content__select" name="carpinteriaext" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_carpinteria`") or die('query failed');
                                        $sentencia->execute();
                                        $list_carpinterias = $sentencia->fetchAll();                         
                                        foreach($list_carpinterias as $carpinteria){
                                        $idCarpinteria = $carpinteria['id'];
                                        $carpinteriaNombre = $carpinteria['nombre'];
                                        ?>
                                    <option value="<?php echo $idCarpinteria?>"><?php echo $carpinteriaNombre?></option>
                                <?php };?>
                                </select>
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Orientacion</label>
                                <select class="form__select content__select" name="orientacion" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_orientaciones`") or die('query failed');
                                        $sentencia->execute();
                                        $list_orientaciones = $sentencia->fetchAll();                         
                                        foreach($list_orientaciones as $orientacion){
                                        $idOrientacion = $orientacion['id'];
                                        $orientacionNombre = $orientacion['nombre'];
                                        ?>
                                    <option value="<?php echo $idOrientacion?>"><?php echo $orientacionNombre?></option>
                                <?php };?>
                                </select>
                            </div>                                                                                                                                                                             
                        </div>
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Agua caliente</label>
                                <select class="form__select content__select" name="aguacaliente" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_agua_caliente` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_Aguas = $sentencia->fetchAll();                         
                                        foreach($list_Aguas as $agua){
                                        $idAgua = $agua['id'];
                                        $aguaNombre = $agua['nombre'];
                                        ?>
                                    <option value="<?php echo $idAgua?>"><?php echo $aguaNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Carpinteria int.</label>
                                <select class="form__select content__select" name="carpinteriaint" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_caracteristicas_estados` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_carpinterias = $sentencia->fetchAll();                         
                                        foreach($list_carpinterias as $carpinteria){
                                        $idCarpinteria = $carpinteria['id'];
                                        $carpinteriaNombre = $carpinteria['nombre'];
                                        ?>
                                    <option value="<?php echo $idCarpinteria?>"><?php echo $carpinteriaNombre?></option>
                                <?php };?>
                                </select>
                            </div>                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de calefacción</label>
                                <select class="form__select content__select" name="calefaccion" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_calefaccion` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_calefacciones = $sentencia->fetchAll();                         
                                        foreach($list_calefacciones as $calefaccion){
                                        $idCalefaccion = $calefaccion['id'];
                                        $calefaccionNombre = $calefaccion['nombre'];
                                        ?>
                                    <option value="<?php echo $idCalefaccion?>"><?php echo $calefaccionNombre?></option>
                                <?php };?>
                                </select>
                            </div>                                                                                                                                                                             
                        </div>
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de cocina</label>
                                <select class="form__select content__select" name="tipococina" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_tipos_cocina` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_cocinas = $sentencia->fetchAll();                         
                                        foreach($list_cocinas as $cocina){
                                        $idCocina= $cocina['id'];
                                        $cocinaNombre = $cocina['nombre'];
                                        ?>
                                    <option value="<?php echo $idCocina?>"><?php echo $cocinaNombre?></option>
                                <?php };?>
                                </select>
                            </div>                                                                                                                                                                                               
                        </div>
                        <h2 class="main__h2">Calidez</h2>
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Alarma</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="alarma" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Agua</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="agua" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Aire acondicionado central</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="aireacondicionadocentral" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Aire acondicionado</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="aireacondicionado" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Bar</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="bar" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Alarma c/incendio</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="alarmaincendio" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Alarma c/Robo</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="alarmarobo" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Altillo</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="altillo" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Caja fuerte</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="cajafuerte" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Parrilla</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="parrilla" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ascensor</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="asensor" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Balcon</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="balcon" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Chimenea</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="chimenea" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Electrodomésticos</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="electrodomesticos" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Calefacción frio/calor</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="calefaccionfriocalor" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Centrico</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="centrico" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Garaje</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="garaje" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Garaje doble</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="garajedoble" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Gas natural</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="gasnatural" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Galería</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="galeria" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hab. juegos</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="habjuegos" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hidromasaje</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="hidromasaje" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Línea telefónica</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="lineatelefonica" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Gimnasio</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="gimnasio" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Jardín</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="jardin" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Lavadero</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="lavadero" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Patio</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="patio" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Jacuzzi</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="jacuzzi" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Luz</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="luz" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Sauna</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="sauna" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Preinst. AACC</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="preinstaacc" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Luminoso</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="luminoso" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Pileta propia</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="piletapropia" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Pileta compartida</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="piletacompartida" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Riego automático</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="riegoautomatico" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Amueblado</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="amueblado" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Puerta blindada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="puertablindada" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Portón automático</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="portonautomatico" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Solarium</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="solarium" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Pérgola</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="pergola" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">TV</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="tv" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Video portero</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="videoportero" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Satelite</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="satelite" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Vestuario</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="vestuario" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Buardilla</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="buardilla" value="1">                             
                            </div>                      
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Habitación de servicio</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="habitacionservicio" value="1">                             
                            </div>                      
                        </div>   
                        <h2 class="main__h2">Tipo de entorno</h2>
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Árboles</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="arboles" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Autobuses</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="autobuses" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Centro comercial</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="centrocomercial" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Colegios</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="colegios" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Costa</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="costa" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Golf</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="golf" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hospitales</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="hospitales" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Subte</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="subte" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Montaña</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="montania" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Urbanización</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="urbanizacion" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Rural</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="rural" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Vista al mar</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="vistamar" value="1">                             
                            </div>
                        </div>   
                        <div class="form__bloque form__bloque--checkbox">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tren</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="tren" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zonas infantiles</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="zonasinfantiles" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Residencial</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="residencial" value="1">                             
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Barrio cerrado</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="barriocerrado" value="1">                             
                            </div>                           
                        </div>                  
                        <h2 class="main__h2">Descripcion General</h2>
                        <div class="form__bloque">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Descripcion corta</label>
                                <input type="text" class="form__text content__text form__text--propiedad" name="descripcioncorta" id="">                                  
                            </div>
                        </div>   
                        <script type="text/javascript">
                            tinymce.init({
                                selector: '#tinymce'
                            });
                        </script>   
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Descripcion completa</label>
                                <textarea name="descripcionlarga" id="tinymce"></textarea>
                            </div>                                                                                                                                                                                                      
                        </div>
                        <div class="form__bloque__content content content--fotoportada">
                            <label  class="form__label content__label" for="">Foto de portada</label>
                            <input type="file" class="content--fotoportada__fotoportada" name="fotoportada" id="">                                  
                        </div> 
                        <div class="form__bloque__content content content--galeriafotos">
                            <label  class="form__label content__label" for="">Galeria de fotos</label>
                            <input type="file" class="content--galeriafotos__galeriafotos" name="galeriafotos[]" id="" multiple>                                  
                        </div>
                        <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Descripcion mediana</label>
                            <textarea class="form__textarea content__textarea" name="descripcionmediana" id=""></textarea>                                   
                        </div>
                        <h2 class="main__h2">Captación</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Captado por</label>
                                <select class="form__select" name="captadopor" id="">                               
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $agentes = $sentencia->fetchAll();                         
                                            foreach($agentes as $agente){
                                            $idAgente = $agente['user_id'];
                                            $agenteNombre = $agente['nombre'];
                                            $agenteApellido = $agente['apellido'];
                                            ?>
                                        <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Contactado por</label>
                                <select class="form__select" name="contactadopor" id="">                               
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $agentes = $sentencia->fetchAll();                         
                                        foreach($agentes as $agente){
                                        $idAgente = $agente['user_id'];
                                        $agenteNombre = $agente['nombre'];
                                        $agenteApellido = $agente['apellido'];
                                        ?>
                                    <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };?>
                                </select>
                            </div>                                          
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Oficina</label>
                                <select class="form__select content__select" name="oficina" id="">    
                                    <option value></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `wp_oficinas` WHERE habilitado=1") or die('query failed');
                                        $sentencia->execute();
                                        $list_oficinas = $sentencia->fetchAll();                         
                                        foreach($list_oficinas as $oficina){
                                        $idOficina = $oficina['id'];
                                        $oficinaNombre = $oficina['nombre'];
                                        ?>
                                    <option value="<?php echo $idOficina?>"><?php echo $oficinaNombre?></option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Llavero</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="llavero" value="si">                             
                            </div>                                                                                                          
                        </div>
                        <h2 class="main__h2">Venta</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio del propietario</label>
                                <input type="text" class="form__text content__text" name="preciopropietario" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Porcentaje sobre compra</label>
                                <input type="text" class="form__text content__text" name="porcentajesobrecompra" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Comisión fija</label>
                                <input type="text" class="form__text content__text" name="comisionfija" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio anterior</label>
                                <input type="text" class="form__text content__text" name="precioanterior" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tasación</label>
                                <input type="text" class="form__text content__text" name="tasacion" id="">                                  
                            </div>                        
                        </div>
                        <h2 class="main__h2">Datos catastrales</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Parcela</label>
                                <input type="text" class="form__text content__text" name="parcela" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Lote</label>
                                <input type="text" class="form__text content__text" name="lote" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tomo</label>
                                <input type="text" class="form__text content__text" name="tomo" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Libro</label>
                                <input type="text" class="form__text content__text" name="libro" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Folio</label>
                                <input type="text" class="form__text content__text" name="folio" id="">                                  
                            </div>                        
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Registro</label>
                                <input type="text" class="form__text content__text" name="registro" id="">                                  
                            </div>                        
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ref. catastral</label>
                                <input type="text" class="form__text content__text" name="ref_catastral" id="">                                  
                            </div>                        
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Valor catastral</label>
                                <input type="text" class="form__text content__text" name="valor_catastral" id="">                                  
                            </div>                        
                        </div> 
                        <h2 class="main__h2">Propietarios</h2>
                        <div class="form__bloque">
                            <a target="_blank" href="adminagregar.php?page=contacto"><i class="fa-solid fa-user-plus add-user"></i></a>         
                            <div class="form__bloque__content content">
                            <input type="text" class="form__text content__text" placeholder="Ingrese nombre del propietario" name="buscadorcontactos" id="buscadorcontactos" autocomplete="off"> 
                            <ul class="content_ul" id="listaContactos"></ul>                
                            </div>
                        </div>                               
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                            <input type="text" class="form__text content__text" name="inputContacto" id="inputContacto" readonly="readonly"> 
                            <input type="hidden" class="form__text content__text" name="contacto_id" id="contacto_id">
                            </div>                          
                        </div>
                        <div class="main__decoration"></div>
                        <input type="submit" name="submit" class="form__button form__bloque__button" value="Agregar propiedad">                                                             
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
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEVUedCZ0UVFBtM7LaeIQPvRJEx1DCsBQ&libraries=places&callback=initMap">
</script>
<script>
    let map, marker;

    function initMap() {
        const input = document.getElementById("address-input");
        const autocomplete = new google.maps.places.Autocomplete(input);
        const geocoder = new google.maps.Geocoder();
        const mapElement = document.getElementById("map");

        map = new google.maps.Map(mapElement, {
          center: { lat: -34.603722, lng: -58.381592 },
          zoom: 13,
        });

        marker = new google.maps.Marker({
          map,
        });

        autocomplete.addListener("place_changed", () => {
          const place = autocomplete.getPlace();

          if (!place.geometry) {
            console.error("La dirección seleccionada no tiene una ubicación válida");
            return;
          }

          const location = place.geometry.location;
          const lat = location.lat();
          const lng = location.lng();
          const coordinates = { "lat": lat, "lng": lng };
          const coordinatesJSON = JSON.stringify(coordinates);

          marker.setPosition(location);
          map.setCenter(location);

          const address = place.formatted_address;

          document.getElementById("coordinates-input").value = coordinatesJSON;

          marker.addListener("click", () => {
            infoWindow.open(map, marker);
          });
        });
    }
</script>

</body>
</html>