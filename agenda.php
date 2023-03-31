<?php include 'header.php' ?>
<?php 
    if(!isset($_POST['tipoSearch'])){$_POST['tipoSearch'] = '0';}; if(!isset($_POST['agenteSearch'])){$_POST['agenteSearch'] = $idAgente;}; if(!isset($_POST['realizadasSearch'])){$_POST['realizadasSearch'] = '3';}; if(!isset($_POST['asuntoSearch'])){$_POST['asuntoSearch'] = '';};
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
            <div id="modal" class="modal-BG">
                <div class="modal">            
                    <form autocomplete="off" class="form__busqueda-propiedad form" id="formEvento" name="form" method="POST">
                        <h2 class="main__h2">Ficha de agenda</h2> 
                        <div class="form__bloque">
                            <div class="form__bloque__content--radio content">
                                <label  class="form__label content__label" for="">Visita</label>
                                <input type="radio" name="tipoActividad" id="radioVisitaAgregar" onclick=" tipoTarea(1); " value="5" >
                                <label  class="form__label content__label" for="">Tarea</label>
                                <input type="radio" name="tipoActividad" id="radioTareaAgregar" onclick=" tipoTarea(2); " value="19">                               
                            </div>                 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Agente</label>
                                    <select class="form__select" name="usuario" id="">
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
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de tarea</label>
                                <select class="form__select" name="tipo_tarea_id" id="tareaAgregar" required>                               
                                        <option></option>
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
                            <input type="hidden" name="submit">
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content" id="propiedadContent" style="display:none">
                                <label  class="form__label content__label" for="">Propiedad</label>
                                <input type="text" class="form__text content__text" name="buscadorpropiedad2" id="buscadorpropiedad2">
                                <input type="hidden" class="form__text content__text" name="propiedad_id" id="propiedad_id">  
                                <ul class="content_ul" id="listaPropiedades"></ul>
                                                            
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Consulta</label>
                                <input type="text" class="form__text content__text" name="buscadorconsulta" id="buscadorconsulta">
                                <input type="hidden" class="form__text content__text" name="consulta_id" id="consulta_id">   
                                <ul class="content_ul" id="listaConsultas"></ul>                               
                            </div>
                        </div>                                      
                        <div class="main__decoration"></div>
                        <input type="submit" class="form__button" value="Agregar evento">  
                        <button type="button" class="form__button form__button--salir" id="salir">Salir</button>                                                          
                    </form>
                </div>
            </div>
            <div id="modalEditar" class="modal-BG">                                              
                <div class="modal">      
                    <form autocomplete="off" class="form__busqueda-propiedad form" id="formEventoEditar" method="POST">
                        <input type="hidden" value="" id="idEditar" name="idEditar">      
                        <h2 class="main__h2">Ficha de agenda</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content--radio content">
                                <label  class="form__label content__label" for="">Visita</label>
                                    <input type="radio" name="tipoActividad" id="radioVisitaEditar" onclick=" tipoTareaEdit(1); " value="1">
                                    <label  class="form__label content__label" for="">Tarea</label>
                                    <input type="radio" name="tipoActividad" id="radioTareaEditar" onclick=" tipoTareaEdit(2); " value="1">
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Agente</label>
                                    <select class="form__select" name="usuario" id="">
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
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Tipo de tarea</label>
                                <select class="form__select" name="tareaEditar" id="tareaEditar" required>                               
                                        <option></option>
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
                        </div>                 
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Asunto</label>
                                <input type="text" class="form__text content__text" name="asuntoEditar" value="" id="asuntoEditar">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Fecha</label>
                                <input type="date" class="form__text content__text" name="fechaEditar" value="" id="fechaEditar">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Observaciones</label>
                                <textarea class="form__textarea content__textarea" name="observacionesEditar" id="observacionesEditar"></textarea>                                 
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Hora de inicio</label>
                                <input type="time" class="form__text content__text" name="horaEditar" id="horaEditar">                                  
                            </div>
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Terminada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="finalizadaEditar" id="finalizadaEditar" value="1">
                            </div>  
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content" id="propiedadContentEditar" style="display:none">
                                <label  class="form__label content__label" for="">Propiedad</label>
                                <input type="text" class="form__text content__text" name="buscadorpropiedad3" id="buscadorpropiedad3">
                                <input type="hidden" class="form__text content__text" name="editar_propiedad_id" id="editar_propiedad_id">  
                                <ul class="content_ul" id="listaPropiedadesEditar"></ul>
                                                            
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Consulta</label>
                                <input type="text" class="form__text content__text" name="buscadorconsulta2" id="buscadorconsulta2">
                                <input type="hidden" class="form__text content__text" name="editar_consulta_id" id="editar_consulta_id">   
                                <ul class="content_ul" id="listaConsultasEditar"></ul>                               
                            </div>
                        </div>                
                        <input type="hidden" name="submit">
                        <div class="main__decoration"></div>
                        <input type="submit" class="form__button" value="Guardar cambios">  
                        <button type="button" class="form__button form__button--salir" id="salirEditar">Salir</button>                                                          
                    </form>
                </div>
            </div>    
            <div class="main__container">
                <i class="fa-solid fa-address-book main__h1--emoji"></i><h1 class="main__h1">Agenda</h1>
                <div class="main__decoration"></div>
                <div class="main__busqueda-agenda">
                    <form autocomplete="off" id="formBuscarEvento" action="agenda.php" method="POST" class="form__busqueda-agenda form">
                        <div class="form__container-left">
                            <button type="button" id="nuevaActividad" class="form__container-left__button"><i class="fa-solid fa-plus"></i> Nueva Actividad</button> 
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
                                    <select name="realizadasSearch" class="form__container-right__select">
                                        <option value="1" <?php if($getRealizadas == 1){echo 'selected';};?>>Pendientes</option>
                                        <option value="2" <?php if($getRealizadas == 2){echo 'selected';};?>>Realizadas</option>
                                        <option value="3" <?php if($getRealizadas == 3){echo 'selected';};?>>Todas</option>
                                    </select>
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
                
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js?<?php echo time(); ?>"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:'es',
          events: 'backend/agenda.php?<?php echo 'tipo='.$_GET['tipo'].'&agente='.$_GET['agente'].'&realizadas='.$_GET['realizadas'].'&asunto='.$_GET['asunto']?>',
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
            fecha.value=date.dateStr;
            agenda.style.pointerEvents ='none';
            $("#radioTareaAgregar").prop('checked', true);
            $('#tareaAgregar option[value=19]').prop('selected', true);
          },
          eventClick: function(info){
            $('#idEditar').val(info.event.id);
            $('#asuntoEditar').val(info.event.title);
            $('#fechaEditar').val(info.event.extendedProps.fecha);
            $('#horaEditar').val(info.event.extendedProps.hora);
            $('#observacionesEditar').text(info.event.extendedProps.descripcion);
            $('#tareaEditar option[value='+ info.event.extendedProps.tarea_id +']').prop('selected',true);
            let tareaValue = $('#tareaEditar option[value='+ info.event.extendedProps.tarea_id +']')
            tareaValue.click;
            tareaValue = tareaValue.val();
            $('#editar_propiedad_id').val(info.event.extendedProps.e_propiedad_id);
            if(info.event.extendedProps.e_propiedad_id != 0){
                $('#buscadorpropiedad3').val(info.event.extendedProps.p_referencia_interna + ' - ' + info.event.extendedProps.p_calle);
            }
            $('#editar_consulta_id').val(info.event.extendedProps.e_consulta_id);          
            if(info.event.extendedProps.e_consulta_id != 0){
                $('#buscadorconsulta2').val(info.event.extendedProps.c_id + ' - ' + info.event.extendedProps.c_nombre + ' ' + info.event.extendedProps.c_apellido);
            }
            if(tareaValue == 5){
                $('#radioVisitaEditar').prop('checked',true);
                $("#propiedadContentEditar").show();
            }else{
                $('#radioTareaEditar').prop('checked',true);
                $("#propiedadContentEditar").hide();
            }
            if(info.event.extendedProps.tarea_terminada == 1){$('#finalizadaEditar').attr('checked',true);}else{$('#finalizadaEditar').attr('checked',false);};
            let modalEditar = document.getElementById('modalEditar');
            modalEditar.style.display='block';
            
          }
        });
        calendar.render();

        let nuevaActividad = document.getElementById('nuevaActividad')
        nuevaActividad.addEventListener ("click", function(){
            let modal = document.getElementById('modal');
            let fecha = document.getElementById('fecha');
            let agenda = document.getElementById('calendar');              
            let date = new Date();
            let anio = date.getFullYear();
            let mes = (date.getMonth() + 1);
            if(mes < 10 ){
                mes = '0'+mes;
            }
            let dia =date.getDate();
            let today = anio + "-" + mes + "-" + dia;
            modal.style.display='block';
            fecha.value=today;
            $("#radioTareaAgregar").prop('checked', true);
            $('#tareaAgregar option[value=19]').prop('selected', true);
        }) 

        let salir = document.getElementById('salir');
        salir.addEventListener("click", function(){
                    
            let modal = document.getElementById('modal');
            let agenda = document.getElementById('calendar');  
            let formEvento= document.getElementById('formEvento');
            let propiedad = document.getElementById("propiedad_id");
            let consulta = document.getElementById("consulta_id");

            modal.removeAttribute('style');  
            agenda.removeAttribute('style');
            propiedad.removeAttribute('value')
            consulta.removeAttribute('value')
            formEvento.reset();

        });

        let salirEditar = document.getElementById('salirEditar');
        salirEditar.addEventListener("click", function(){
                    
            let modal = document.getElementById('modalEditar');
            let agenda = document.getElementById('calendar');
            let formEventoEditar= document.getElementById('formEventoEditar');
            let propiedad = document.getElementById("editar_propiedad_id");
            let consulta = document.getElementById("editar_consulta_id");

            modal.removeAttribute('style');  
            agenda.removeAttribute('style');
            $('#tareaEditar option').removeAttr('selected')
            propiedad.removeAttribute('value')
            consulta.removeAttribute('value')
            formEventoEditar.reset();

        });


        let formEvento= document.getElementById('formEvento');
        formEvento.addEventListener("submit", function(e){
            e.preventDefault();
            let url = 'backend/agregar.php?page=evento';
            let datos = new FormData(formEvento);
            let modal = $("#modal");
            let agenda = $("#calendar");
            let propiedad = document.getElementById("propiedad_id");
            let consulta = document.getElementById("consulta_id");
            

            fetch(url, {
                method:'POST',
                body: datos,
                mode: "cors" //Default cors, no-cors, same-origin
            }).then(response => response.json())
            .then(data => {
                alert(data);
                calendar.refetchEvents();
                formEvento.reset();
                modal.removeAttr('style');             
                agenda.removeAttr('style');
                propiedad.removeAttribute('value')
                consulta.removeAttribute('value')
                
            })
            .catch(err => console.log(err))
                    
        });

        let formEventoEditar= document.getElementById('formEventoEditar');
        formEventoEditar.addEventListener("submit", function(e){
            e.preventDefault();
            let url = 'backend/editar.php?page=evento';
            let datos = new FormData(formEventoEditar);
            var modal = $("#modalEditar");
            var agenda = $("#calendar");
            let propiedad = document.getElementById("editar_propiedad_id");
            let consulta = document.getElementById("editar_consulta_id");
        
            fetch(url, {
                method:'POST',
                body: datos,
                mode: "cors" //Default cors, no-cors, same-origin
            }).then(response => response.json())
            .then(data => {
                alert(data);
                calendar.refetchEvents();
                formEventoEditar.reset();
                modal.removeAttr('style');             
                agenda.removeAttr('style');  
                propiedad.removeAttribute('value')
                consulta.removeAttribute('value')
            })
            .catch(err => console.log(err))
                    
        });


    });

    </script>
</body>
</html>
