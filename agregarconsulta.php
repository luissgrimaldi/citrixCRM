<?php include 'header.php' ?>
<?php include 'sidebar.php' ?>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <main class="main" id="main">
            <div id="modal" class="modal-BG">
                <div class="modal">            
                    <form autocomplete="off" class="form__busqueda-propiedad form" id="formAddContacto" name="form" method="POST">
                        <h2 class="main__h2">Agregar contacto</h2>               
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nombre</label>
                                <input type="text" class="form__text content__text" name="nombre" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Apellido</label>
                                <input type="text" class="form__text content__text" name="apellido" id="fecha">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Telefono</label>
                                <input type="text" class="form__text content__text" name="telefono" id="fecha">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Email</label>
                                <input type="text" class="form__text content__text" name="email" id="fecha">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Dirección</label>
                                <input type="text" class="form__text content__text" name="direccion" id="fecha">                                  
                            </div>
                            <div class="form__bloque__content content form__bloque__content--observaciones--modal">
                                <label  class="form__label content__label" for="">Observaciones</label>
                                <textarea name="observaciones" class="form__textarea content__textarea" ></textarea>                                 
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Conyuge</label>
                                <input type="text" class="form__text content__text" name="conyuge" id="fecha">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Telefono conyuge</label>
                                <input type="text" class="form__text content__text" name="telefono_conyuge" id="fecha">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Email conyuge</label>
                                <input type="text" class="form__text content__text" name="email_conyuge" id="fecha">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Agente asignado</label>
                                <select class="form__select" name="agente_asignado_id" id="">                               
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $agentes = $sentencia->fetchAll();                         
                                            foreach($agentes as $agente){
                                            $idAgente = $agente['user_id'];
                                            $agenteNombre = $agente['nombre'];
                                            $agenteApellido = $agente['apellido'];
                                            ?>
                                        <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Enviar emails</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="no_emails" value="0">
                            </div>  
                            <input type="hidden" name="submit">
                        </div>                                     
                        <div class="main__decoration"></div>
                        <input type="submit" class="form__button" value="Agregar contacto">  
                        <button type="button" class="form__button form__button--salir" id="salir">Salir</button>                                                          
                    </form>
                </div>
            </div>
            <div class="main__container">
                <div class="main__container__top">
                    <div class="main__title"><i class="fa-solid fa-envelope main__h1--emoji"></i><h1 class="main__h1">Agregar consulta</h1></div>                    
                </div>
                <div class="main__decoration"></div>
                <div class="main__busqueda-propiedad">             
                    <form autocomplete="off" class="form__busqueda-propiedad form" name="form" method="POST" action="backend/agregar.php?page=consulta">
                        <h2 class="main__h2">Datos de contacto</h2> 
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <input type="text" placeholder="Ingrese nombre de contacto" class="form__text content__text" name="buscadorcontactos2" id="buscadorcontactos2" autocomplete="off"> 
                                <input type="hidden" class="form__text content__text" name="contacto_id" id="contacto_id"> 
                                <ul class="content_ul" id="listaContactos"></ul>                
                            </div>  
                            <a id="nuevoContacto"><i class="fa-solid fa-user-plus add-user"></i></a>
                        </div>
                        <div class="form__bloque">  
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Nombre</label>
                                <input type="text" class="form__text content__text form__text--nombre" name="nombre" id="inputNombre" readonly="readonly">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Apellido</label>
                                <input type="text" class="form__text content__text form__text--nombre" name="apellido" id="inputApellido" readonly="readonly">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Email</label>
                                <input type="email" class="form__text content__text" name="email" id="inputEmail" readonly="readonly">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Teléfono</label>
                                <input type="text" class="form__text content__text" name="telefono" id="inputTelefono" readonly="readonly">                                  
                            </div>
                        </div>                   
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <input type="text" class="form__text content__text form__text--propiedad" placeholder="Ingrese nombre de propiedad" name="buscadorpropiedad" id="buscadorpropiedad" autocomplete="off">                                                                                      
                                <ul class="content_ul" id="listaPropiedades"></ul>
                            </div>
                        </div>
                        <div class="form__bloque">
                                <div class="form__bloque__content content">                                                   
                                    <label  class="form__label content__label" for="">Propiedad</label>
                                    <input type="text" class="form__text content__text form__text--propiedad" name="propiedadnombre" id="inputPropiedadNombre" readonly="readonly" autocomplete="off">                                                    
                                    <input type="hidden" class="form__text content__text form__text--propiedad" name="propiedad" id="inputPropiedad">                                                 
                            </div>
                        </div>
                        <div class="form__bloque">
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Observaciones</label>
                                    <textarea class="form__textarea content__textarea" name="observaciones" id=""></textarea>                                                    
                            </div>
                        </div>
                        <div class="form__bloque">
                                <div class="form__bloque__content content">
                                    <label  class="form__label content__label" for="">Consulta</label>
                                    <textarea class="form__textarea content__textarea" name="consulta" id=""></textarea>                                                       
                            </div>
                        </div>
                        <div class="main__decoration"></div>
                        <h2 class="main__h2">Captura</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Estado</label>
                                <select class="form__select" name="estado" id="">                               
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_molt_multiform_status` WHERE table_id=3") or die('query failed');
                                            $sentencia->execute();
                                            $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                            foreach($list_propiedadesOperacion as $propiedad){
                                            $idPropiedad = $propiedad['status_id'];
                                            $propiedadNombre = $propiedad['name'];
                                            ?>
                                        <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                            <label  class="form__label content__label" for="">Situacion</label>
                                <select class="form__select" name="situacion" id="">                               
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_situaciones`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $list_propiedadesOperacion = $sentencia->fetchAll();                         
                                            foreach($list_propiedadesOperacion as $propiedad){
                                            $idPropiedad = $propiedad['id'];
                                            $propiedadNombre = $propiedad['nombre'];
                                            ?>
                                        <option value="<?php echo $idPropiedad?>"><?php echo $propiedadNombre?></option>
                                    <?php };?>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Captado por</label>
                                <select class="form__select" name="captadopor" id="">                               
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $agentes = $sentencia->fetchAll();                         
                                            foreach($agentes as $agente){
                                            $idAgente = $agente['user_id'];
                                            $agenteNombre = $agente['nombre'];
                                            $agenteApellido = $agente['apellido'];
                                            ?>
                                        <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };?>
                                </select>
                            </div>   
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Medio de contacto</label>
                                <select class="form__select" name="mediodecontacto" id="">                               
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `wp_medios_contacto`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $medios = $sentencia->fetchAll();                         
                                            foreach($medios as $medio){
                                            $idMedio = $medio['id'];
                                            $medioNombre = $medio['nombre'];
                                            ?>
                                        <option value="<?php echo $idMedio?>"><?php echo $medioNombre ?></option>
                                    <?php };?>
                                </select>
                            </div>                                     
                        </div>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Asignado a</label>
                                <select class="form__select" name="asignadoa" id="">                               
                                        <option value></option>
                                        <?php                          
                                            $sentencia = $connect->prepare("SELECT * FROM `usuarios`  WHERE habilitado=1") or die('query failed');
                                            $sentencia->execute();
                                            $agentes = $sentencia->fetchAll();                         
                                            foreach($agentes as $agente){
                                            $idAgente = $agente['user_id'];
                                            $agenteNombre = $agente['nombre'];
                                            $agenteApellido = $agente['apellido'];
                                            ?>
                                        <option value="<?php echo $idAgente?>"><?php echo $agenteNombre.' '.$agenteApellido ?></option>
                                    <?php };?>
                                </select>
                            </div>                 
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Llamar desde</label>
                                <select class="form__select" name="llamardesde" id="">                               
                                    <option value></option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                </select>
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Llamar hasta</label>
                                <select class="form__select" name="llamarhasta" id="">                               
                                    <option value></option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                </select>
                            </div>                                                             
                        </div>
                        <div class="main__decoration"></div>
                        <h2 class="main__h2">Requisitos del cliente</h2>
                        <span  class="form__span content__span" for="">Tipo de propiedad</span>      
                        <div class="form__bloque"> 
                            <?php                          
                                $sentencia = $connect->prepare("SELECT * FROM `wp_propiedad_tipo` WHERE habilitado=1") or die('query failed');
                                $sentencia->execute();
                                $list_propiedadesTipo = $sentencia->fetchAll();                         
                                foreach($list_propiedadesTipo as $propiedad){
                                $idPropiedad = $propiedad['id'];
                                $propiedadNombre = $propiedad['nombre'];
                            ?>
                                <div class="form__bloque__content content">  
                                    <label  class="form__label content__label" for=""><?php echo $propiedadNombre?></label>
                                    <input class="form__checkbox content__checkbox" type="checkbox" name="buscarTipo[]" value="<?php echo $idPropiedad?>">
                                </div> 
                            <?php };?>                                                                            
                        </div>                       
                        <span  class="form__span content__span" for="">Zonas</span>                           
                        <div class="form__bloque form__bloque--checkbox"> 
                            <?php                          
                                $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE habilitada=1 AND nombre !=''  ORDER BY nombre ASC") or die('query failed');
                                $sentencia->execute();
                                $list_propiedadesTipo = $sentencia->fetchAll();                         
                                foreach($list_propiedadesTipo as $propiedad){
                                $idPropiedad = $propiedad['id'];
                                $propiedadNombre = $propiedad['nombre'];
                            ?>
                                <div class="form__bloque__content content">  
                                    <label  class="form__label content__label" for=""><?php echo $propiedadNombre?></label>
                                    <input class="form__checkbox content__checkbox" type="checkbox" name="buscarZona[]" value="<?php echo $idPropiedad?>">
                                </div> 
                            <?php };?>                                                                            
                        </div>
                        <div class="main__decoration"></div>
                        <h2 class="main__h2">Preferencias</h2>
                        <div class="form__bloque">
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Superficie construida desde</label>
                                <input type="text" class="form__text content__text" name="superficiedesde" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Superficie construida hasta</label>
                                <input type="text" class="form__text content__text" name="superficiehasta" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio desde</label>
                                <input type="text" class="form__text content__text" name="preciodesde" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio hasta</label>
                                <input type="text" class="form__text content__text" name="preciohasta" id="">                                  
                            </div>
                        </div> 
                        <div class="form__bloque">                           
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio alquiler desde</label>
                                <input type="text" class="form__text content__text" name="precioalquilerdesde" id="">                                  
                            </div>
                            <div class="form__bloque__content content">
                                <label  class="form__label content__label" for="">Precio alquiler hasta</label>
                                <input type="text" class="form__text content__text" name="precioalquilerhasta" id="">                                  
                            </div>
                        </div> 
                        <div class="form__bloque"> 
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Planta baja</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="plantabaja" value="1">
                            </div>  
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Garaje</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="garage" value="1">
                            </div>                                                                             
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Garaje doble</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="garagedoble" value="1">
                            </div>                                                                             
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Amueblada</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="amueblada" value="1">
                            </div>                                                                             
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Balcón</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="balcon" value="1">
                            </div>                                                                             
                            <div class="form__bloque__content content">  
                                <label  class="form__label content__label" for="">Pileta</label>
                                <input class="form__checkbox content__checkbox" type="checkbox" name="pileta" value="1">
                            </div>                                                                             
                        </div>
                        <div class="main__decoration"></div>
                        <input type="submit" class="form__button form__bloque__button" name="submit" value="Agregar consulta">                                                                 
                    </form>
                </div>
                </div>                
            </div>  
        </main>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End Main */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    </div>
    <script src="index.js"></script>
    <script>
        let nuevoContacto = document.getElementById('nuevoContacto')
        nuevoContacto.addEventListener ("click", function(){
            let modal = document.getElementById('modal');            
            modal.style.display='block';
        }) 
    
        let salir = document.getElementById('salir');
        salir.addEventListener("click", function(){
                    
            let modal = document.getElementById('modal');
            let formAddContacto= document.getElementById('formAddContacto');

            modal.removeAttribute('style');  
            agenda.removeAttribute('style');
            formAddContacto.reset();

        });

        let formAddContacto= document.getElementById('formAddContacto');
        formAddContacto.addEventListener("submit", function(e){
            e.preventDefault();
            let url = 'backend/agregar.php?page=contactoFetch';
            let datos = new FormData(formAddContacto);
            let modal = $("#modal");
            

            fetch(url, {
                method:'POST',
                body: datos,
                mode: "cors" //Default cors, no-cors, same-origin
            }).then(response => response.json())
            .then(data => {
                alert(data);
                formAddContacto.reset();
                modal.removeAttr('style');             
                
            })
            .catch(err => console.log(err))
                    
        });
    </script>
</body>
</html>