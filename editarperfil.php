<?php include 'header.php' ?>
<?php if(!isset($_GET) || $_GET["pagina"]==''){header('Location:editarperfil.php?pagina=info');}?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-user main__h1--emoji"></i><h1 class="main__h1">Editar perfil</h1></div>
                    <div class="main__buttons">
                        <a class="main__buttons__button <?php if($_GET['pagina']== 'info'){ echo 'main__buttons__button--active';}?>" href="editarperfil.php">Información</a>
                        <a class="main__buttons__button <?php if($_GET['pagina']== 'contrasena'){ echo 'main__buttons__button--active';}?>" href="editarperfil.php?pagina=contrasena">Contraseña</a>
                        <a class="main__buttons__button <?php if($_GET['pagina']== 'agenda'){ echo 'main__buttons__button--active';}?>" href="editarperfil.php?pagina=agenda">Preferencias</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <?php if($_GET['pagina']== 'info'){?>
                    <div class="main__perfil">                   
                        <form autocomplete="off" class="main__perfil__container" method="POST" action="backend/editar.php?page=perfilinformacion">
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Username</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="nickname" class="perfil__bloque__content__username" value="<?php echo $nickname?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Nombre</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="nombre" class="perfil__bloque__content__nombre" value="<?php echo $nombreAgente?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Apellido</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="apellido" class="perfil__bloque__content__apellido" value="<?php echo $apellidoAgente?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Email</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="email" class="perfil__bloque__content__email"  value="<?php echo $emailAgente?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Telefono celular</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="celular" class="perfil__bloque__content__telefono-celular" value="<?php echo $celularAgente?>">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Sobre mi</span>
                                <div class="perfil__bloque__content">
                                    <textarea class="form__textarea content__textarea" name="sobre_mi" id=""><?php echo $sobreMiAgente;?></textarea>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <label class="perfil__bloque__content__submit" for="foto">Seleccionar foto de perfil</label>
                                <input style="display:none" type="file" id="foto" name="foto">
                                <p id="files-area" class="files-area">
                                    <span id="filesListPortada">
                                        <span id="files-namesPortada" class="files-names">
                                        <?php if(!empty($fotoAgente)){?>
                                            <span class="file-block" id="file-block2" data-nombreeliminar="<?php echo $fotoAgente;?>">
                                                <span class="file-delete file-deleteEliminar2">
                                                    <span data-nombreeliminar="<?php echo $fotoAgente;?>">x</span>
                                                </span>
                                                <span id="nameEliminar" class="name"><?php echo $fotoAgente;?></span>
                                            </span>
                                        <?php ;}?>
                                        </span>
                                    </span>
                                </p>                                
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--submit">
                                    <input type="submit" class="perfil__bloque__content__submit" name="submit" value="Guardar">                            
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" onclick="return confirm('Seguro que quieres salir sin guardar?');" href="perfil.php">Salir sin guardar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php }?>
                <?php if($_GET['pagina']== 'contrasena'){?>
                    <div class="main__perfil">                   
                        <form autocomplete="off" class="main__perfil__container" method="POST" action="backend/editar.php?page=perfilcontrasena">
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Contraseña Actual</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="passwordActual" class="perfil__bloque__content__username" placeholder="Ingrese su contraseña actual" required>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Contraseña nueva</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="passwordNew" class="perfil__bloque__content__nombre" placeholder="Ingrese su contraseña nueva" required>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Contraseña nueva</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="passwordNewRep" class="perfil__bloque__content__apellido" placeholder="Reingrese su contraseña nueva" required>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--submit">
                                    <input type="submit" class="perfil__bloque__content__submit" name="submit" value="Guardar">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" onclick="return confirm('Seguro que quieres salir sin guardar?');" href="perfil.php">Salir sin guardar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php }?>
                <?php if($_GET['pagina']== 'agenda'){?>
                    <div class="main__perfil">                 
                        <?php
                        $sentencia = $connect->prepare("SELECT a.id, a.nombre,
                        b.tipo_tarea_id, b.color_background, b.user_id,
                        a.id as a_id, a.nombre as a_nombre,
                        b.tipo_tarea_id as b_tipo_tarea_id, b.color_background as b_color_background, b.user_id as b_user_id
                        FROM wp_agenda_tipo_tarea a
                        LEFT JOIN wp_agenda_tipo_tarea_custom_colors b ON a.id = b.tipo_tarea_id
                        WHERE b.user_id = '".$idAgente."'") or die('query failed');
                        $sentencia->execute();
                        $list_consultas = $sentencia->fetchAll();
                        if($list_consultas){?>
                        <form autocomplete="off" class="main__perfil__container" method="POST" action="backend/editar.php?page=perfilagenda">
                        <?php   foreach($list_consultas as $consulta){
                                $id = $consulta['b_tipo_tarea_id'];
                                $nombre = ucfirst($consulta['a_nombre']);
                                $color = $consulta['b_color_background'];?>                                                          
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label--color"><?php echo $nombre;?></span>
                                <div class="perfil__bloque__content--color">
                                    <input type="color" name="color[]" value="<?php echo $color;?>" class="perfil__bloque__content__color">
                                </div>
                            </div>
                            <?php };
                            }else{?>
                            <form autocomplete="off" class="main__perfil__container" method="POST" action="backend/agregar.php?page=perfilagenda">
                            <?php $sentencia = $connect->prepare("SELECT * FROM wp_agenda_tipo_tarea") or die('query failed');
                                $sentencia->execute();
                                $list_consultas = $sentencia->fetchAll();
                                foreach($list_consultas as $consulta){
                                    $id = $consulta['id'];
                                    $nombre = ucfirst($consulta['nombre']);
                                    $color = $consulta['color_background_default'];?>                                                          
                                <div class="perfil__bloque">
                                    <span class="perfil__bloque__fake-label--color"><?php echo $nombre;?></span>
                                    <div class="perfil__bloque__content--color">
                                    <input type="color" name="color[]" value="<?php echo $color;?>" class="perfil__bloque__content__color">
                                    </div>
                                </div>
                            <?php }; };?>                    
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--submit">
                                    <input type="submit" class="perfil__bloque__content__submit" name="submit" value="Guardar">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" onclick="return confirm('Seguro que quieres salir sin guardar?');" href="perfil.php">Salir sin guardar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php }?>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
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
        const botonesEliminar2 = document.querySelectorAll('.file-deleteEliminar2');
        botonesEliminar2.forEach(boton => {
        boton.addEventListener('click', (event) => {
            const nombreArchivo2 = event.target.getAttribute('data-nombreeliminar');
            eliminarArchivo2(nombreArchivo2);
        });
        });
        function eliminarArchivo2(nombre) {
            const fileBlock2 = document.querySelector(`#file-block2[data-nombreeliminar="${nombre}"]`);
            fileBlock2.remove();
        }
    </script>
</body>
</html>