<?php               
                    $whereFecha=" AND con.created BETWEEN ".$_GET['fechadesde']."AND".$_GET['fechahasta'];         
                    $whereCliente=" AND con.nombre OR con.apellido OR con.email OR con.telefono LIKE '%".$_GET['cliente']."%'";
                    $whereCanal=" AND canal.id = ".$_GET['canal'];
                    $whereOp=" AND op.id = ".$_GET['op'];
                    $whereTipo=" AND tipo.id = ".$_GET['tipo'];
                    $wherePropiedad=" AND prop.referencia_interna OR prop.calle OR prop.altura OR prop.descripcion_corta LIKE '%".$_GET['propiedad']."%'";
                    $whereZona=" AND zona.id = ".$_GET['zona'];
                    $whereEstado=" AND canal.id = ".$_GET['estado'];
                    if($_GET['op'] == '' AND $_GET['tipo'] == '' AND $_GET['ciudad'] == '' AND $_GET['zona'] == '' AND $_GET['preciodesde'] == '' AND $_GET['habitacionesdesde'] == '' AND $_GET['domicilio'] == '' AND $_GET['ref'] == '' AND $_GET['pileta'] == '' AND $_GET['llaves'] == '' AND $_GET['ocupada'] == '' AND $_GET['plantabaja'] == '' AND $_GET['estado'] == ''){$filtro = '';}else{ 
                        
                        $filtro = "WHERE status_id= 1 ";

                        if($_GET['fechadesde'] != ''){$filtro .= $whereFecha;};
                        if($_GET['cliente'] != ''){$filtro .= $whereCliente;};
                        if($_GET['canal'] != ''){$filtro .= $whereCanal;};
                        if($_GET['op'] != ''){$filtro .= $whereOp;};
                        if($_GET['tipo'] != ''){$filtro .= $whereTipo;};
                        if($_GET['propiedad'] != ''){$filtro .= $wherePropiedad;};
                        if($_GET['zona'] != ''){$filtro .= $whereZona;};
                        if($_GET['estado'] != ''){$filtro .= $whereEstado;};
                        