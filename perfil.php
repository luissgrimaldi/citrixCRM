<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-user main__h1--emoji"></i><h1 class="main__h1">Mi perfil</h1></div>
                    <div class="main__buttons">
                        <a class="main__buttons__button" href="editarperfil.php">Editar perfil</a>
                    </div>
                </div>
                <div class="main__decoration"></div>
                    <div class="main__perfil">
                        <div class="main__perfil__container">
                        <div class="perfil__bloque">
                            <span class="perfil__bloque__fake-label">Username</span>
                            <div class="perfil__bloque__content">
                                <span class="perfil__bloque__content__username"><?php echo $nickname?></span>
                            </div>
                        </div>
                        <div class="perfil__bloque">
                            <span class="perfil__bloque__fake-label">Nombre</span>
                            <div class="perfil__bloque__content">
                                <span class="perfil__bloque__content__nombre"><?php echo $nombreAgente?></span>
                            </div>
                        </div>
                        <div class="perfil__bloque">
                            <span class="perfil__bloque__fake-label">Apellido</span>
                            <div class="perfil__bloque__content">
                                <span class="perfil__bloque__content__apellido"><?php echo $apellidoAgente?></span>
                            </div>
                        </div>
                        <div class="perfil__bloque">
                            <span class="perfil__bloque__fake-label">Email</span>
                            <div class="perfil__bloque__content">
                                <span class="perfil__bloque__content__email"><?php echo $emailAgente?></span>
                            </div>
                        </div>
                        <div class="perfil__bloque">
                            <span class="perfil__bloque__fake-label">Telefono celular</span>
                            <div class="perfil__bloque__content">
                                <span class="perfil__bloque__content__telefono-celular"><?php echo $celularAgente?></span>
                        </div>
                        </div>                  
                        <div class="perfil__bloque">
                            <span class="perfil__bloque__fake-label">Sobre mi</span>
                            <textarea class="form__textarea content__textarea" readonly name="sobre_mi" id=""><?php echo $sobreMiAgente;?></textarea>
                        </div>                                      
                    </div>
                </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js?<?php echo citrixCRMversion;?>"></script>
</body>
</html>
