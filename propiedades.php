<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-building main__h1--emoji"></i><h1 class="main__h1">Propiedades</h1></div>
                    <div class="main__buttons">
                        <button class="main__buttons__button">Agregar Propiedad</button>
                        <button class="main__buttons__button">Descargar Ficha</button>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">
                    <form id="form_calc_4" class="form__busqueda-propiedad form">
                        <div class="form__bloque">
                            <div class="form__bloque__content content"> 
                                <label  class="form__label content__label" for="">Operación</label>
                                <select class="form__select content__select" name="" id="">
                                    <option value></option>
                                    <option value="1">Compra/Venta</option>
                                    <option value="1">Alquiler</option>
                                    <option value="1">Leasing</option>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo</label>
                                <select class="form__select content__select" name="" id="">
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
                                <label  class="form__label content__label" for="">Ciudad</label>
                            <select class="form__select content__select" name="" id="">
                                <option value></option>
                                <option value="1">Moron</option>
                                <option value="2">Ituzaingo</option>
                                <option value="3">Moreno</option>
                                <option value="4">La matanza</option>
                            </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Zona</label>
                                <input class="form__text content__text" type="text">
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--2">
                            <div class="form__bloque__precio precio">
                                <h2 class="precio__h2">Precio</h2>
                                <div class="precio__container">
                                    <div class="form__bloque__content precio__container__content">
                                        <label  class="form__label precio__container__content__label" for="">Desde</label>
                                    <input class="form__text precio__container__content__text" type="text">
                                    </div>
                                    <div class="form__bloque__content precio__container__content">
                                        <label  class="form__label precio__container__content__label" for="">Hasta</label>
                                        <input class="form__text precio__container__content__text" type="text">
                                    </div>
                                </div>                            
                            </div>
                            <div class="form__bloque__habitaciones habitaciones">
                                <h2 class="habitaciones__h2">Habitaciones</h2>
                                <div class="habitaciones__container">
                                    <div class="form__bloque__content habitaciones__container__content">
                                        <label  class="form__label habitaciones__container__content__label" for="">Desde</label>
                                        <input class="form__text habitaciones__container__content__text" type="text">
                                    </div>
                                    <div class="form__bloque__content habitaciones__container__content">
                                        <label  class="form__label habitaciones__container__content__label" for="">Hasta</label>
                                        <input class="form__text habitaciones__container__content__text" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Domicilio</label>
                                <input class="form__text content__text" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Referencia</label>
                                <input class="form__text content__text text-referencia" type="text">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Pileta</label>
                            <input class="form__checkbox content__checkbox" type="checkbox">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Llaves</label>
                                <input class="form__checkbox content__checkbox" type="checkbox">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Ocupada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox">
                            </div>
                            <div class="form__bloque__content content">
                                <label class="form__label content__label" for="">Planta baja</label>
                                <input class="form__checkbox content__checkbox" type="checkbox">
                            </div>
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado de publicación</label>
                                <select class="form__select" name="" id="">
                                    <option value></option>
                                    <option value="1">Sin publicar</option>
                                    <option value="1">Solo web</option>
                                    <option value="1">Solo en portales</option>
                                    <option value="1">Web + Portales</option>
                                </select>
                            </div>
                        </div>
                        <div class="form__bloque form__bloque--5">
                            <input type="button" class="form__button form__bloque__button" value="Buscar">
                            <input type="button" class="form__button form__bloque__button" value="Guardar filtros">
                            <input class="form__text form__bloque__text" type="text" placeholder="Nombre del filtro">
                            <select class="form__select form__bloque__select" name="" id="">
                                <option value="1">Filtros guardados</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="main__decoration"></div>
                <div class="propiedades">
                    <ul class="propiedades__ul">
                        <li class="propiedades__li">
                            <img class="propiedades__img" src="https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__0__foto_portada__2021_03_05_18_29_29__DSC_1089.jpg" alt="">
                            <div class="propiedades__nombre-detalles-precio">
                                <span class="propiedades__nombre">Casa en Compra / Venta zona Castelar</span>
                                <span class="propiedades__detalles">90m2 | 3 hab| 2 Baños</span>
                                <span class="propiedades__precio">U$S 150.000 | U$S 1666/m2</span>
                            </div>
                            <span class="propiedades__estado">En web</span>
                            <div class="propiedades__edit-hide">
                                <a href=""><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                <a href=""><i class="propiedades__accion fa-solid fa-eye-slash"></i></a>
                            </div>
                        </li>
                        <li class="propiedades__li">
                            <img class="propiedades__img" src="https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__0__foto_portada__2020_12_02_23_12_36__10.png" alt="">
                            <div class="propiedades__nombre-detalles-precio">
                                <span class="propiedades__nombre">Casa en Compra / Venta zona Los Pinguinos</span>
                                <span class="propiedades__detalles">700m2 | 5 hab| 7 Baños</span>
                                <span class="propiedades__precio">U$S 2.500.000 | U$S 3571/m2</span>
                            </div>
                            <span class="propiedades__estado">En web</span>
                            <div class="propiedades__edit-hide">
                                <a href=""><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                <a href=""><i class="propiedades__accion fa-solid fa-eye-slash"></i></a>
                            </div>
                        </li>
                        <li class="propiedades__li">
                            <img class="propiedades__img" src="https://projectandbrokers.com/wp-content/uploads/thumbnails/mediano__1__foto_portada__2020_11_03_14_08_09__imagen c mancha.png" alt="">
                            <div class="propiedades__nombre-detalles-precio">
                                <span class="propiedades__nombre">Emprendimiento en Compra / Venta zona Ituzaingo Norte</span>
                                <span class="propiedades__detalles">150m2 | 3 hab| 2 Baños</span>
                                <span class="propiedades__precio">U$S 250.000 | U$S 1666/m2</span>
                            </div>
                            <span class="propiedades__estado">En web</span>
                            <div class="propiedades__edit-hide">
                                <a href=""><i class="propiedades__accion fa-solid fa-pencil"></i></a>
                                <a href=""><i class="propiedades__accion fa-solid fa-eye-slash"></i></a>
                            </div>
                        </li>
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