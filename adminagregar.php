<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php if($_GET["page"]=='usuario'){?>


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
                        <form class="main__perfil__container" method="POST" action="backend/adminagregar.php?page=usuario">
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Username</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="nickname" class="perfil__bloque__content__username">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Nombre</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="nombre" class="perfil__bloque__content__nombre" >
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Apellido</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="apellido" class="perfil__bloque__content__apellido" >
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Email</span>
                                <div class="perfil__bloque__content">
                                    <input type="text" name="email" class="perfil__bloque__content__email" >
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
                                    <input type="password" name="contrasenia" class="perfil__bloque__content__nombre">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Repetir Contraseña</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="repetircontrasenia" class="perfil__bloque__content__apellido">
                                </div>
                            </div>
                            <div class="perfil__bloque"> 
                                <span class="perfil__bloque__fake-label">Repetir Contraseña</span>
                                <div class="perfil__bloque__content">
                                    <select class="perfil__select content__select" name="rol" id="">                                             
                                        <option value></option>
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
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--submit">
                                    <input type="submit" class="perfil__bloque__content__submit" value="Agregar usuario">                            
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
</body>
</html>