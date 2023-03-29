<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php if($_GET["page"]=='usuario'){
    if($rolAgente == 1 or $rolAgente == 3){?>

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-user main__h1--emoji"></i><h1 class="main__h1">Agregar usuario</h1></div>
                </div>
                <div class="main__decoration"></div>
                    <div class="main__perfil">                   
                        <form autocomplete="off" class="main__perfil__container" method="POST" action="backend/agregar.php?page=usuario" enctype="multipart/form-data">
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Username</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="nickname" class="perfil__bloque__content__username" required>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Nombre</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="nombre" class="perfil__bloque__content__nombre" required>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Apellido</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="apellido" class="perfil__bloque__content__apellido" required>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Email</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="email" class="perfil__bloque__content__email">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Telefono celular</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="celular" class="perfil__bloque__content__telefono-celular">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Contraseña</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="contrasenia" class="perfil__bloque__content__nombre" required>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Repetir Contraseña</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="repetircontrasenia" class="perfil__bloque__content__apellido" required>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Sobre mi</span>
                                <textarea class="form__textarea content__textarea" name="sobre_mi" id=""></textarea>
                            </div>
                            <div class="perfil__bloque">
                                <label class="perfil__bloque__content__submit" for="foto">Seleccionar foto de perfil</label>
                                <input style="display:none" type="file" id="foto" name="foto">
                                <p id="files-area" class="files-area">
                                    <span id="filesListPortada">
                                        <span id="files-namesPortada" class="files-names">                                   
                                        </span>
                                    </span>
                                </p>                                
                            </div>
                            <div class="perfil__bloque"> 
                                <span class="perfil__bloque__fake-label">Rol</span>
                                <select class="perfil__select content__select" name="rol" id="">                                             
                                    <option value="0"></option>
                                    <?php                          
                                        $sentencia = $connect->prepare("SELECT * FROM `roles`") or die('query failed');
                                        $sentencia->execute();
                                        $list_roles = $sentencia->fetchAll();                         
                                        foreach($list_roles as $roles){
                                            $idRoles = $roles['role_id'];
                                            $rolesNombre = $roles['name'];
                                            ?>
                                    <option value="<?php echo $idRoles?>"><?php echo ucfirst($rolesNombre)?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="perfil__bloque">
                                <label class="perfil__bloque__label">Habilitado</span>
                                <div class="perfil__bloque__content--submit">
                                    <input class="form__checkbox content__checkbox" type="checkbox" name="habilitar" value="1" checked="check">                          
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--submit">
                                    <input type="submit" class="perfil__bloque__content__submit" name="submit" value="Agregar usuario">                            
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" href="controladmin.php?page=usuario">Volver al control de usuarios</a>
                            </div>
                    </div>
                        </div>
                    </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>



<?php if($_GET["page"]=='ciudad'){
    if($rolAgente == 1 or $rolAgente == 3){?>

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--/* Main */-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <main class="main" id="main">
        <div class="main__container">
            <div class="main__container__top">
                <div class="main__title"><i class="fa-solid fa-city main__h1--emoji"></i><h1 class="main__h1">Agregar ciudad</h1></div>
            </div>
            <div class="main__decoration"></div>
                <div class="main__perfil">                   
                    <form autocomplete="off" class="main__perfil__container" method="POST" action="backend/agregar.php?page=ciudad">
                        <div class="perfil__bloque">
                            <span class="perfil__bloque__fake-label">Ciudad</span>
                            <div class="perfil__bloque__content">
                                <input type="text" name="ciudad" class="perfil__bloque__content__username" required>
                            </div>                 
                        </div>                                                                 
                        <div class="perfil__bloque">
                            <label class="perfil__bloque__label">Habilitada</span>
                            <div class="perfil__bloque__content--submit">
                                <input class="form__checkbox content__checkbox" type="checkbox" name="habilitar" value="1" checked="check">                          
                            </div>
                        </div>
                        <div class="perfil__bloque">
                            <div class="perfil__bloque__content--submit">
                                <input type="submit" class="perfil__bloque__content__submit" name="submit" value="Agregar ciudad">                         
                            </div>
                        </div>
                        <div class="perfil__bloque">
                            <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" href="controladmin.php?page=ciudad">Volver al control de ciudades</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>  
    </main>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--/* End Main */-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>


<?php if($_GET["page"]=='zona'){

    if($rolAgente == 1 or $rolAgente == 3){?>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--/* Main */-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <main class="main" id="main">
        <div class="main__container">
            <div class="main__container__top">
                <div class="main__title"><i class="fa-solid fa-road main__h1--emoji"></i><h1 class="main__h1">Agregar zona</h1></div>
            </div>
            <div class="main__decoration"></div>
                <div class="main__perfil">                   
                    <form autocomplete="off" class="main__perfil__container" method="POST" action="backend/agregar.php?page=zona">
                        <div class="perfil__bloque">
                            <span class="perfil__bloque__fake-label">Zona</span>
                            <div class="perfil__bloque__content">
                                <input type="text" name="zona" class="perfil__bloque__content__username" required>
                            </div>                 
                        </div>
                        <div class="perfil__bloque"> 
                            <span class="perfil__bloque__fake-label">Ciudad a la que pertenece</span>
                            <select class="perfil__select content__select" name="ciudad" id="">                                             
                                <option value ="0"></option>
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
                        <div class="perfil__bloque">
                            <label class="perfil__bloque__label">Habilitada</span>
                            <div class="perfil__bloque__content--submit">
                                <input class="form__checkbox content__checkbox" type="checkbox" name="habilitar" value="1" checked="check">                          
                            </div>
                        </div>                                                                    
                        <div class="perfil__bloque">
                            <div class="perfil__bloque__content--submit">
                                <input type="submit" class="perfil__bloque__content__submit" name="submit" value="Agregar zona">                            
                            </div>
                        </div>
                        <div class="perfil__bloque">
                            <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" href="controladmin.php?page=zona">Volver al control de zonas</a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>  
    </main>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--/* End Main */-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php ;}else{echo '<script> alert("Acceso denegado"); window.location = "controladmin.php"; </script>';} ;};?>

<?php if($_GET["page"]=='contacto'){?>


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--/* Main */-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<main class="main" id="main">
    <div class="main__container">
        <div class="main__container__top">
            <div class="main__title"><i class="fa-solid fa-address-book main__h1--emoji"></i><h1 class="main__h1">Agregar contacto</h1></div>
        </div>
        <div class="main__decoration"></div>
            <div class="main__perfil">                   
                <form autocomplete="off" class="main__perfil__container" method="POST" action="backend/agregar.php?page=contacto">
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Nombre</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="nombre" class="perfil__bloque__content__nombre" required>
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Apellido</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="apellido" class="perfil__bloque__content__apellido">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Telefono</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="telefono" class="perfil__bloque__content__telefono-celular">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Email</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="email" class="perfil__bloque__content__email">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Direccion</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="direccion" class="perfil__bloque__content__nombre">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Observaciones</span>
                        <div class="perfil__bloque__content--observaciones">
                            <textarea class="form__textarea content__textarea" name="observaciones" id=""></textarea>
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Conyuge</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="conyuge" class="perfil__bloque__content__nombre">
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Telefono conyuge</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="telefono_conyuge" class="perfil__bloque__content__nombre">
                        </div>
                    </div>               
                    <div class="perfil__bloque">
                        <span class="perfil__bloque__fake-label">Email conyuge</span>
                        <div class="perfil__bloque__content">
                            <input type="text" name="email_conyuge" class="perfil__bloque__content__nombre">
                        </div>
                    </div>
                    <div class="perfil__bloque"> 
                        <span class="perfil__bloque__fake-label">Agente asignado</span>
                        <select class="perfil__select content__select" name="agente_asignado_id" id="">                                             
                            <option value ="0"></option>
                            <?php                          
                                $sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE habilitado=1") or die('query failed');
                                $sentencia->execute();
                                $list_agentes = $sentencia->fetchAll();                         
                                foreach($list_agentes as $agente){
                                    $idAgente = $agente['user_id'];
                                    $agenteNombre = $agente['nombre'].' '.$agente['apellido'];
                                    ?>
                            <option value="<?php echo $idAgente?>"><?php echo $agenteNombre?></option>
                            <?php };?>
                        </select>
                    </div>               
                    <div class="perfil__bloque">
                        <label class="perfil__bloque__label">Enviar emails</span>
                        <div class="perfil__bloque__content--submit">
                            <input class="form__checkbox content__checkbox" type="checkbox" name="no_emails" value="0">                          
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <div class="perfil__bloque__content--submit">
                            <input type="submit" name="submit" class="perfil__bloque__content__submit" value="Agregar contacto">                            
                        </div>
                    </div>
                    <div class="perfil__bloque">
                        <div class="perfil__bloque__content--notsubmit">
                        <a class="perfil__bloque__content__notsubmit" href="controladmin.php?page=contacto">Volver al control de usuarios</a>
                    </div>
            </div>
                </div>
            </div>
    </div>  
</main>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--/* End Main */-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<?php };?>

    </div>
    <script src="index.js"></script>
    <script>
        const dt2 = new DataTransfer(); // Manejar los archivos del input
  
        $("#foto").on('change', function(e){
            // Vaciar la lista de archivos
            $("#filesListPortada > #files-namesPortada").empty();
            // Actualizar el objeto dt2 con el archivo seleccionado
            dt2.items.clear();
            dt2.items.add(this.files[0]);
            let fileBlock = $('<span/>', {class: 'file-block'}),
            fileName = $('<span/>', {id:'namePortada', class: 'name', text: this.files[0].name});
            fileBlock.append('<span id="file-deletePortada" class="file-delete"><span>x</span></span>')
            .append(fileName);
            $("#filesListPortada > #files-namesPortada").append(fileBlock); 
            // Eliminar archivo
            $('span#file-deletePortada').click(function(){
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
            document.getElementById('foto').files = dt2.files;
            });
        });
    </script>
</body>
</html>