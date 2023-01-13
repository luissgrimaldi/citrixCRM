<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-envelope main__h1--emoji"></i><h1 class="main__h1">Agregar propiedad</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">             
                    <form class="form__busqueda-propiedad form" name="form" method="POST" action="backend/agregarconsulta.php">
                        <h2 class="main__h2">Caracteristicas</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Ref</label>
                                <input type="text" class="form__text content__text" name="ref" id="">                                  
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
                                <label  class="form__label content__label" for="">Esta ocupada?</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="ocupada" value="1">
                            </div>    
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Coordenadas</label>
                                <input type="text" class="form__text content__text" name="bloque" id="">                                                     
                            </div>
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
                                <input type="text" class="form__text content__text" name="cocina" id="">                                  
                            </div>                                                     
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Cant. Habitaciones</label>
                                <input type="text" class="form__text content__text" name="habitaciones" id="">                                  
                            </div>                                                                                                                                
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Expensas</label>
                                <input type="text" class="form__text content__text" name="toilettes" id="">                                  
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
                                <input type="text" class="form__text content__text" name="lote" id="">                                  
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
                                <label  class="form__label content__label" for="">Tipo de suelo</label>
                                <input type="text" class="form__text content__text" name="suelo" id="">                                  
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
                                <label  class="form__label content__label" for="">Visitas</label>
                                <input type="text" class="form__text content__text" name="visitas" id="">                                  
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
                                <select class="form__select content__select" name="cocina" id="">    
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
                        <div class="main__decoration"></div>
                        <input type="submit" class="form__button form__bloque__button" value="Agregar propiedad">                                                                 
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