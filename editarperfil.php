<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
<?php if(!isset($_GET) || $_GET["pagina"]==''){header('Location:editarperfil.php?pagina=info');}?>
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
                        <a class="main__buttons__button <?php if($_GET['pagina']== 'agenda'){ echo 'main__buttons__button--active';}?>" href="editarperfil.php?pagina=agenda">Agenda</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <?php if($_GET['pagina']== 'info'){?>
                    <div class="main__perfil">                   
                        <form class="main__perfil__container" method="POST" action="backend/editarperfilinformacion.php">
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
                            <!-- <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Telefono de linea</span>
                                <div class="perfil__bloque__content">
                                    <span class="perfil__bloque__content__telefono-hogar"></span>
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Telefono de oficina</span>
                                <div class="perfil__bloque__content">
                                    <span class="perfil__bloque__content__telefono-oficina"></span>
                                </div>
                            </div> -->
                            <!-- <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Sobre mi</span>
                                <div class="perfil__bloque__content">
                                    <textarea rows="3" ><?php echo $sobreMiAgente?></textarea>
                                </div> -->
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--submit">
                                    <input type="submit" class="perfil__bloque__content__submit" value="Guardar">                            
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" onclick="return confirm('Seguro que quieres salir sin guardar?');" href="perfil.php">Salir sin guardar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php if($_GET['pagina']== 'contrasena'){?>
                    <div class="main__perfil">                   
                        <form class="main__perfil__container" method="POST" action="backend/editarperfilcontrasena.php">
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Contraseña Actual</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="passwordActual" class="perfil__bloque__content__username" placeholder="Ingrese su contraseña actual">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Contraseña nueva</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="passwordNew" class="perfil__bloque__content__nombre" placeholder="Ingrese su contraseña nueva">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <span class="perfil__bloque__fake-label">Contraseña nueva</span>
                                <div class="perfil__bloque__content">
                                    <input type="password" name="passwordNewRep" class="perfil__bloque__content__apellido" placeholder="Reingrese su contraseña nueva">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--submit">
                                    <input type="submit" class="perfil__bloque__content__submit" value="Guardar">
                                </div>
                            </div>
                            <div class="perfil__bloque">
                                <div class="perfil__bloque__content--notsubmit">
                                <a class="perfil__bloque__content__notsubmit" onclick="return confirm('Seguro que quieres salir sin guardar?');" href="perfil.php">Salir sin guardar</a>
                                </div>
                            </div>
                        </div>
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
</body>
</html>