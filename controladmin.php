<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-user main__h1--emoji"></i><h1 class="main__h1">Usuarios</h1></div>
                    <div class="main__buttons">
                        <a class="main__buttons__button" href="adminagregar.php?page=usuario">Agregar usuario</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                    <div class="main__perfil">
                        <div class="main__perfil__container">                         
                            <ul class="propiedades__ul">
                            <?php           
                                $sentencia = $connect->prepare("SELECT us.user_id, us.nombre, us.apellido, us.nickname, us.pass, us.habilitado, us.rol, us.foto, us.celular, us.email, 
                                rol.role_id, rol.name,
                                us.user_id as us_user_id, us.nombre as us_nombre, us.apellido as us_apellido, us.nickname as us_nickname, us.pass as us_pass, us.habilitado as us_habilitado, us.rol as us_rol, us.foto as us_foto, us.celular as us_celular, us.email as us_email,
                                rol.role_id as rol_role_id, rol.name as rol_name                          
                                FROM usuarios us 
                                LEFT JOIN roles rol ON  us.rol = rol.role_id
                                WHERE us.nombre != ' ' AND us.apellido != ' ' ORDER BY us.nombre ASC") or die('query failed');
                                $sentencia->execute();
                                $list_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                                foreach($list_usuarios as $usuario){
                                    $nombre = $usuario['us_nombre'];                                                             
                                    $apellido = $usuario['us_apellido'];                                                             
                                    $celular = $usuario['us_celular'];                                                             
                                    $email = $usuario['us_email'];                                                             
                                    $rol = $usuario['rol_role_id'];                                                             
                                ?> 
                                <li class="propiedades__li">
                                    <div class="propiedades__nombre-detalles-precio">
                                        <span class="propiedades__nombre"><?php echo $nombre.' '.$apellido;?></span>
                                        <span class="propiedades__detalles"><?php echo '('.$email.' -'.$celular. ') '?></span>
                                    </div>            
                                    <div class="propiedades__edit-hide">
                                        <a href=""><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                        <a href=""><i class="propiedades__accion fa-solid fa-trash"></i></a>
                                    </div>
                                </li> 
                                <?php };?>
                            </ul>     
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