<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php                          
    $sentencia = $connect->prepare("SELECT * FROM `wp_consultas` WHERE contacto_id= '".$_GET['contacto']."' ORDER BY id DESC LIMIT 1") or die('query failed');
    $sentencia->execute();
    $consultasTotales = $sentencia->rowCount();
    $list_consultas = $sentencia->fetchAll();
    if($consultasTotales == 0){
        $consultaId = '';
    }else{
        foreach($list_consultas as $consulta){
        $consultaId = $consulta['id'];
        }
    }                 
    

    $sentencia = $connect->prepare("SELECT * FROM `wp_contactos` WHERE id= '".$_GET['contacto']."'") or die('query failed');
    $sentencia->execute();
    $list_contactos = $sentencia->fetchAll();                         
    foreach($list_contactos as $contacto){
    $contactoNombre = $contacto['nombre'];
    $contactoApellido = $contacto['apellido'];
    $contactoTelefono = $contacto['telefono'];
    $contactoEmail = $contacto['email'];
    $contactoConyuge = $contacto['conyuge'];
    $contactoConyugeEmail = $contacto['conyuge_email'];
    $contactoConyugeTelefono = $contacto['conyuge_tel'];
    $contactoNoEmails = $contacto['no_emails'];
    $contactoDireccion = $contacto['direccion'];
    $contactoObservacion = $contacto['observaciones'];
    }

     
?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-envelope main__h1--emoji"></i><h1 class="main__h1">Contacto # <?php echo $_GET['contacto'];?></h1></div>
                    <div class="main__buttons">
                        <a href="admineditar.php?page=contacto&id=<?php echo $_GET['contacto'];?>" class="main__buttons__button">Editar contacto</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__user">
                    <div class="main__user__content">
                        <div class="main__user__content__bloque">
                            <div class="main__user__content__bloque__content">
                                <span>Nombre:</span><span class="main__user__content__bloque__content__respuesta"><?php echo $contactoNombre.' '.$contactoApellido;?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Telefono:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoTelefono != '' and $contactoTelefono != NULL and isset($contactoTelefono)){echo $contactoTelefono;}else{echo 'No se estableció ningun numero de telefono';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Email:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoEmail != '' or $contactoEmail != NULL or isset($contactoEmail)){echo $contactoEmail;}else{echo 'No se estableció ningun email';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Dirección del contacto:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoDireccion != '' and $contactoDireccion != NULL and isset($contactoDireccion)){echo $contactoDireccion;}else{echo 'No se estableció ninguna dirección';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Propiedad:</span>
                                <?php
                                    $sentencia = $connect->prepare("SELECT * FROM `wp_propiedades` WHERE propietarios= '".$_GET['contacto']."'") or die('query failed');
                                    $sentencia->execute();
                                    $propiedadesTotales = $sentencia->rowCount();                  
                                    if($propiedadesTotales == 0){                   
                                        $propiedadCalle = '';
                                        $propiedadAltura = '';
                                        $propiedadRef = '';
                                        $coma = '';  
                                    }else{
                                        $list_propiedades = $sentencia->fetchAll();  
                                        foreach($list_propiedades as $propiedad){
                                            $propiedadCalle = $propiedad['calle'];
                                            $propiedadAltura = $propiedad['altura'];
                                            $propiedadRef = $propiedad['referencia_interna'];
                                            $coma = ' | ';
                                    ?>                         
                                        <span class="main__user__content__bloque__content__respuesta"><?php if($propiedadCalle == ''){?><a href=""><?php echo 'REF '.$propiedadRef.': '.$propiedadCalle.' '.$propiedadAltura.$coma;?></a><?php ;}else{echo 'No se estableció ninguna propiedad';};?>
                                    <?php }; }?>
                                </span>
                            </div>
                        </div>
                        <div class="main__user__content__bloque">
                            <div class="main__user__content__bloque__content">
                                <span>Conyuge:</span><span class="main__user__content__bloque__content__respuesta"><?php if(!empty($contactoConyuge)){echo $contactoConyuge;}else{echo 'No se estableció ningun nombre';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Conyuge telefono:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoConyugeTelefono != '' or $contactoConyugeTelefono != NULL or !isset($contactoTelefono)){echo $contactoConyugeTelefono;}else{echo 'No se estableció ningun numero de telefono';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Conyuge email:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoConyugeEmail != '' or $contactoConyugeEmail != NULL or !isset($contactoConyugeEmail)){echo $contactoConyugeEmail;}else{echo 'No se estableció ningun email';}?></span>
                            </div>
                            <div class="main__user__content__bloque__content">
                                <span>Enviar emails:</span><span class="main__user__content__bloque__content__respuesta"><?php if($contactoNoEmails != ''){if($contactoNoEmails == '0' ){echo 'Si';}else if($contactoNoEmails == '1'){echo 'No';};}else{echo 'No establecido';}?></span>
                            </div>                     
                            <div class="main__user__content__bloque__content">
                                <span>Ultima consulta:</span><span class="main__user__content__bloque__content__respuesta"><?php if($consultaId != ''){?><a  target="_blank" href="consultasinfo.php?consulta=<?php echo $consultaId?>">Consulta #<?php echo $consultaId?></a><?php ;}else{echo 'No hay consultas';}?></span>
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