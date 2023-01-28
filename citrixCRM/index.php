<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <i class="fa-solid fa-home-user main__h1--emoji"></i><h1 class="main__h1">Inicio</h1>
                <div class="main__decoration"></div>
                <div class="main__atajos atajos">
                    <div class="atajos__atajo">
                        <i class="fa-solid fa-building atajo__emoji"></i>
                        <h2 class="atajo__h2">Propiedades</h2>
                        <button type="button" class="atajo__button">Nueva propiedad</button>
                    </div>
                    <div class="atajos__atajo">
                        <i class="fa-solid fa-envelope atajo__emoji"></i>
                        <h2 class="atajo__h2">Mail</h2>
                        <button type="button" class="atajo__button">Nuevo mail</button>
                    </div>
                    <div class="atajos__atajo">
                        <i class="fa-solid fa-address-book atajo__emoji"></i>
                        <h2 class="atajo__h2">Agenda</h2>
                        <button type="button" class="atajo__button">Nueva cita</button>
                    </div>
                    <div class="atajos__atajo">
                        <i class="fa-solid fa-circle-question atajo__emoji"></i>
                        <h2 class="atajo__h2">Consultas</h2>
                        <button type="button" class="atajo__button">Nueva consulta</button>
                    </div>
                </div>
                <div class="main__decoration"></div>
                <div class="main__tareas tareas">
                    <form id="form_home" class="tareas__form">
                        <select name="estado" class="tareas__select">
                            <option value="1">Pendientes</option>
                            <option value="2">Cerradas</option>
                            <option value="0">Todas</option>
                        </select>
                        <select name="user_id" class="tareas__select">
                            <option value="1">Fulanito 1</option>
                            <option value="2">Fulanito 2</option>
                            <option value="3">Fulanito 3</option>
                        </select>
                        <select name="rango_dias" class="tareas__select">
                            <option value="1">Hoy</option>
                            <option value="2">Esta semana</option>
                            <option value="3">Este mes</option>
                        </select>
                
                        <input type="text" class="tareas__search"  name="busqueda" placeholder="Asunto / Observaciones" />
                        <button type="button" onClick="crm_inmobiliaria_completar_tareas_buscador2()" class="tareas__search--btn"><i class="fa fa-search"></i></button>
                        <input type="hidden" name="action" value="ps_crm_get_tareas_home" />
                    </form>
                    <div class="tareas--pendientes">
                        <h4 class="tareas--pendientes__h4 titulo_busqueda" id="TituloTareas">Tareas pendientes</h4>
                        <form action="" class="tareas--pendientes__form">
                        <ul class="tareas--pendientes__list">
                            <li class="tareas--pendientes__li"><div class="tareas--pendientes__tarea"><span class="tareas--pendientes__tarea__tipo">Visita</span><h4>tarea de ejemplo 1</h4><span>10/07/2023</span><span>13:40hs</span></div><h5 class="tareas--pendientes__nombre">Fulanito 1</h5><input class="tareas--pendientes__checkbox" type="checkbox"></li>
                            <li class="tareas--pendientes__li"><div class="tareas--pendientes__tarea"><span class="tareas--pendientes__tarea__tipo">Cita</span><h4>tarea de ejemplo 2</h4><span>13/01/2023</span><span>18:15hs</span></div><h5 class="tareas--pendientes__nombre">Fulanito 2</h5><input class="tareas--pendientes__checkbox" type="checkbox"></li>
                            <li class="tareas--pendientes__li"><div class="tareas--pendientes__tarea"><span class="tareas--pendientes__tarea__tipo">Captación</span><h4>tarea de ejemplo 3</h4><span>5/03/2023</span><span>16:20hs</span></div><h5 class="tareas--pendientes__nombre">Fulanito 3</h5><input class="tareas--pendientes__checkbox" type="checkbox"></li>
                        </ul>
                        <input type="hidden" name="action" value="ps_crm_set_terminadas" />
                        </form>
                        <button type="button" id="boton_realizadas" onClick="crm_inmobiliaria_pasar_a_terminada_masivo()" class="tareas--pendientes__btn">Pasar a realizada</button>
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