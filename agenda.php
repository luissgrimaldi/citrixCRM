<?php include 'header.php' ?>
<?php 
    if(!isset($_POST['tipoSearch'])){$_POST['tipoSearch'] = '0';}; if(!isset($_POST['agenteSearch'])){$_POST['agenteSearch'] = $idAgente;}; if(!isset($_POST['realizadasSearch'])){$_POST['realizadasSearch'] = '0';}; if(!isset($_POST['asuntoSearch'])){$_POST['asuntoSearch'] = '';};
    if(!$_GET){header('Location:agenda.php?tipo='.$_POST['tipoSearch'].'&agente='.$_POST['agenteSearch'].'&realizadas='.$_POST['realizadasSearch'].'&asunto='.$_POST['asuntoSearch']);}
    else if (!isset($_GET['tipo']) || !isset($_GET['agente'])|| !isset($_GET['realizadas'])|| !isset($_GET['asunto'])){header('Location:agenda.php?tipo='.$_POST['tipoSearch'].'&agente='.$_POST['agenteSearch'].'&realizadas='.$_POST['realizadasSearch'].'&asunto='.$_POST['asuntoSearch']);};
?>
<?php include 'sidebar.php' ?>
<?php $getTipo= $_GET['tipo'];?>
<?php $getAgente= $_GET['agente'];?>
<?php $getRealizadas= $_GET['realizadas'];?>
<?php $getAsunto= $_GET['asunto'];?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div class="main__container">
                <i class="fa-solid fa-address-book main__h1--emoji"></i><h1 class="main__h1">Agenda</h1>
                <div class="main__decoration"></div>
                <div class="main__busqueda-agenda">
                    <form id="form_busqueda_agenda" method="POST" action="agenda.php" class="form__busqueda-agenda form">
                        <div class="form__container-left">
                            <button class="form__container-left__button">Nueva Actividad</button>
                        </div>
                        <div class="form__container-right">
                            <div class="form__container-right--bloque">
                                <div class="form__container-right--bloque__content">
                                    <label  class="form__container-right__label" for="">Agente</label>
                                    <select class="form__container-right__select" name="agenteSearch" id="">
                                    <?php                          
                                    $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                                    $sentencia->execute();
                                    $agentes = $sentencia->fetchAll();                         
                                    foreach($agentes as $agente){
                                        $idAgente = $agente['user_id'];
                                        $agenteNombre = $agente['nombre'];
                                        $agenteApellido = $agente['apellido'];
                                    ?>
                                <option <?php if($getAgente == $idAgente){echo 'selected';};?> value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                            <?php };?>
                                    </select>
                                </div>
                                <div class="form__container-right--bloque__content">
                                    <label class="form__container-right__label" for="">Tipo de tarea</label>
                                    <select class="form__container-right__select" name="tipoSearch" id="">
                                    <option value="0">Todas</option>
                                            <?php                          
                                                $sentencia = $connect->prepare("SELECT * FROM `wp_agenda_tipo_tarea`  WHERE habilitada=1") or die('query failed');
                                                $sentencia->execute();
                                                $agentes = $sentencia->fetchAll();                         
                                                foreach($agentes as $agente){
                                                $id = $agente['id'];
                                                $nombre = $agente['nombre'];
                                                ?>
                                            <option <?php if($getTipo == $id){echo 'selected';};?> value="<?php echo $id?>"><?php echo $nombre;?></option>
                                        <?php };?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form__container-right--bloque">
                                <div class="form__container-right--bloque__content">
                                    <label class="form__container-right__label" for="">Asunto / Observaciones</label>
                                    <input class="form__container-right__text" type="text" name="asuntoSearch" value="<?php echo $getAsunto?>" id="">
                                </div>
                                <div class="form__container-right--bloque__content">
                                    <label class="form__container-right__label" for="">Solo activas</label>
                                    <input class="form__container-right__checkbox" name="realizadasSearch" value="1" <?php if($getRealizadas==1){echo 'checked="check"';}?> type="checkbox">
                                </div>                 
                                <div class="form__container-right--bloque__content">
                                    <button class="form__container-right__button" >Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="main__decoration"></div>
                <div id="calendar"></div>

                <div id="modal" class="modal">            
                    <form class="form__busqueda-propiedad form" id="formEvento" name="form" method="POST">
                            <h2 class="main__h2">Evento</h2> 
                            <div class="form__bloque">
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Tipo de tarea</label>
                                    <select class="form__select" name="tipo_tarea_id" id="">                               
                                            <option value></option>
                                            <?php                          
                                                $sentencia = $connect->prepare("SELECT * FROM `wp_agenda_tipo_tarea`  WHERE habilitada=1") or die('query failed');
                                                $sentencia->execute();
                                                $agentes = $sentencia->fetchAll();                         
                                                foreach($agentes as $agente){
                                                $id = $agente['id'];
                                                $nombre = $agente['nombre'];
                                                ?>
                                            <option value="<?php echo $id?>"><?php echo $nombre;?></option>
                                        <?php };?>
                                    </select>
                                </div>                 
                            <div class="form__bloque">
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Asunto</label>
                                    <input type="text" class="form__text content__text" name="asunto" id="">                                  
                                </div>
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Fecha</label>
                                    <input type="date" class="form__text content__text" name="fecha" id="fecha">                                  
                                </div>
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Observaciones</label>
                                    <textarea name="observaciones" class="form__textarea content__textarea" ></textarea>                                 
                                </div>
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Hora de inicio</label>
                                    <input type="time" class="form__text content__text" name="hora_inicio" id="">                                  
                                </div>
                                <div class="form__bloque__content content">  
                                    <label  class="form__label content__label" for="">Terminada</label>
                                    <input class="form__checkbox content__checkbox" type="checkbox" name="tarea_terminada" value="1">
                                </div>  
                            </div> 
                            
                            <div class="main__decoration"></div>
                            <input type="submit" class="form__button" value="Agregar evento">  
                            <button type="button" class="form__button form__button--salir" id="salir">Salir</button>                                                          
                        </form>
                    </div>
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js"></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:'es',
          events: 'backend/agenda.php',
          headerToolbar:{
            left:'prev,next,today',
            center:'title',
            right:'dayGridMonth,timeGridWeek,listWeek',
          },
          dateClick: function(date){
            let modal = document.getElementById('modal');
            let fecha = document.getElementById('fecha');
            let agenda = document.getElementById('calendar');
            modal.style.display='block';
            console.log(date);
            fecha.value=date.dateStr;
            agenda.style.pointerEvents ='none';

          }
        });
        calendar.render();
      });

      $(document).on("click",function(e) {
                    
            var modal = $("#modal");
            var salir = $("#salir");
            var agenda = $("#calendar");
            
            if (salir.is(e.target)) { 
                modal.removeAttr('style');  
                agenda.removeAttr('style');  
                          
            }
            if (!modal.is(e.target) && modal.has(e.target).length === 0) { 
                modal.removeAttr('style');             
                agenda.removeAttr('style');             
            }
        });
        let formEvento= document.getElementById('formEvento')
        formEvento.addEventListener("submit", function(e){
            e.preventDefault();
            let url = 'backend/agregarevento.php';
            let datos = new FormData(formEvento);
            var modal = $("#modal");
            var agenda = $("#calendar");

            fetch(url, {
                method:'POST',
                body: datos,
                mode: "cors" //Default cors, no-cors, same-origin
            }).then(response => response.json())
            .then(data => {
                alert(data);
                formEvento.reset();
                modal.removeAttr('style');             
                agenda.removeAttr('style');    
            })
            .catch(err => console.log(err))
            
        });
    </script>
</body>
</html>