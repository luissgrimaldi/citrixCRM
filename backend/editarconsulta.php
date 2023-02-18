<?php 
include 'connect.php';

if(!isset($_POST['nombre'])){$_POST['nombre']= ' ';};
if(!isset($_POST['apellido'])){$_POST['apellido']= ' ';};
if(!isset($_POST['email'])){$_POST['email']= ' ';};
if(!isset($_POST['telefono'])){$_POST['telefono']= ' ';};
if(!isset($_POST['propiedad'])){$_POST['propiedad']= ' ';};
if(!isset($_POST['observaciones'])){$_POST['observaciones']= ' ';};
if(!isset($_POST['consulta'])){$_POST['consulta']= ' ';};
if(!isset($_POST['estado'])){$_POST['estado']= ' ';};
if(!isset($_POST['situacion'])){$_POST['situacion']= ' ';};
if(!isset($_POST['captadopor'])){$_POST['captadopor']= ' ';};
if(!isset($_POST['mediodecontacto'])){$_POST['mediodecontacto']= ' ';};
if(!isset($_POST['asignadoa'])){$_POST['asignadoa']= ' ';};
if(!isset($_POST['llamardesde'])){$_POST['llamardesde']= ' ';};
if(!isset($_POST['llamarhasta'])){$_POST['llamarhasta']= ' ';};
if($_POST['superficiedesde'] == ''){$_POST['superficiedesde']= NULL;};
if($_POST['superficiehasta'] == ''){$_POST['superficiehasta']= NULL;};
if($_POST['preciodesde'] == ''){$_POST['preciodesde']=NULL;};
if($_POST['preciohasta'] == ''){$_POST['preciohasta']=NULL;};
if(!isset($_POST['plantabaja'])){$_POST['plantabaja']= ' ';};
if(!isset($_POST['garage'])){$_POST['garage']= ' ';};
if(!isset($_POST['garagedoble'])){$_POST['garagedoble']= ' ';};
if(!isset($_POST['amueblada'])){$_POST['amueblada']= ' ';};
if(!isset($_POST['balcon'])){$_POST['balcon']= ' ';};
if(!isset($_POST['pileta'])){$_POST['pileta']= ' ';};
                
    $sentencia = $connect->prepare("SELECT * FROM `wp_consultas` WHERE id= '".$_GET['consulta']."'") or die('query failed');
    $sentencia->execute();
    $list_consultas = $sentencia->fetchAll();                         
    foreach($list_consultas as $consulta){
        $editarNombre = $consulta['nombre'];
        $editarApellido = $consulta['apellido'];
        $editarEmail = $consulta['email'];
        $editarTelefono = $consulta['telefono'];
        $editarPropiedad = $consulta['propiedad_id'];
        $editarObservaciones = $consulta['observaciones'];
        $editarConsulta = $consulta['consulta'];
        $editarEstado = $consulta['status_id'];
        $editarSituacion = $consulta['situacion'];
        $editarCaptadoPor = $consulta['captado_por'];
        $editarMedioContacto = $consulta['canal_id'];
        $editarAsignadoA = $consulta['asignado_a'];
        $editarLlamarDesde = $consulta['llamar_desde'];
        $editarLlamarHasta = $consulta['llamar_hasta'];
        $editarSuperficieDesde = $consulta['superficie_construida_desde'];
        $editarSuperficieHasta = $consulta['superficie_construida_hasta'];
        $editarPrecioDesde = $consulta['precio_venta_desde'];
        $editarPrecioHasta = $consulta['precio_venta_hasta'];
        $editarPlantaBaja = $consulta['planta_baja'];
        $editargaraje = $consulta['garaje'];
        $editargarajeDoble = $consulta['garaje_doble'];
        $editarAmueblada = $consulta['amueblada'];
        $editarBalcon = $consulta['balcon'];
        $editarPileta = $consulta['pileta'];           
    }         

    // Variables de sección información //
$NEWnombre = $_POST['nombre'];
$NEWapellido = $_POST['apellido'];
$NEWemail = $_POST['email'];
$NEWtelefono = $_POST['telefono'];
$NEWpropiedad = $_POST['propiedad'];
$NEWobservaciones = $_POST['observaciones'];
$NEWconsulta = $_POST['consulta'];
$NEWestado = $_POST['estado'];
$NEWsituacion = $_POST['situacion'];
$NEWcaptadoPor = $_POST['captadopor'];
$NEWmedioContacto = $_POST['mediodecontacto'];
$NEWasignadoA = $_POST['asignadoa'];
$NEWllamarDesde = $_POST['llamardesde'];
$NEWllamarHasta = $_POST['llamarhasta'];
$NEWsuperficieDesde = $_POST['superficiedesde'];
$NEWsuperficieHasta = $_POST['superficiehasta'];
$NEWprecioDesde = $_POST['preciodesde'];
$NEWprecioHasta = $_POST['preciohasta'];
$NEWplantaBaja = $_POST['plantabaja'];
$NEWgaraje = $_POST['garage'];
$NEWgarajeDoble = $_POST['garagedoble'];
$NEWamueblada = $_POST['amueblada'];
$NEWbalcon = $_POST['balcon'];
$NEWpileta = $_POST['pileta'];


// IF para ver si cumple los requisitos //
if($NEWnombre != $editarNombre OR $NEWapellido != $editarApellido OR $NEWemail != $editarEmail OR $NEWtelefono != $editarTelefono OR $NEWpropiedad != $editarPropiedad OR $NEWobservaciones != $editarObservaciones OR $NEWconsulta != $editarConsulta OR $NEWestado != $editarEstado OR $NEWsituacion != $editarSituacion OR $NEWcaptadoPor != $editarCaptadoPor OR $NEWmedioContacto != $editarMedioContacto OR $NEWasignadoA != $editarAsignadoA OR $NEWllamarDesde != $editarLlamarDesde OR $NEWllamarHasta != $editarLlamarHasta OR $NEWsuperficieDesde != $editarSuperficieDesde OR $NEWsuperficieHasta != $editarSuperficieHasta OR $NEWprecioDesde != $editarPrecioDesde OR $NEWprecioHasta != $editarPrecioHasta OR $NEWplantaBaja != $editarPlantaBaja OR $NEWgaraje != $editargaraje OR $NEWgarajeDoble != $editargarajeDoble OR $NEWamueblada != $editarAmueblada OR $NEWbalcon != $editarBalcon OR $NEWpileta != $editarPileta){  
        

    // Update en mi información //
    $update = " casilla_email_destino = NULL";

    if($NEWnombre != $editarNombre){
        $update .= ", nombre = '".$NEWnombre."'";
    }
    if($NEWapellido != $editarApellido){
        $update .= ", apellido = '".$NEWapellido."'";
    }
    if($NEWemail != $editarEmail){
        $update .= ", email = '".$NEWemail."'";
    }
    if($NEWtelefono != $editarTelefono){
        $update .= ", telefono = '".$NEWtelefono."'";
    }
    if($NEWpropiedad != $editarPropiedad){
        $update .= ", propiedad_id = '".$NEWpropiedad."'";
    }
    if($NEWobservaciones != $editarObservaciones){
        $update .= ", observaciones = '".$NEWobservaciones."'";
    }
    if($NEWconsulta != $editarConsulta){
        $update .= ", consulta = '".$NEWconsulta."'";
    }
    if($NEWestado != $editarEstado){
        $update .= ", status_id = '".$NEWestado."'";
    }
    if($NEWsituacion != $editarSituacion){
        $update .= ", situacion = '".$NEWsituacion."'";
    }
    if($NEWcaptadoPor != $editarCaptadoPor){
        $update .= ", captado_por = '".$NEWcaptadoPor."'";
    }
    if($NEWmedioContacto != $editarMedioContacto){
        $update .= ", canal_id = '".$NEWmedioContacto."'";
    }
    if($NEWasignadoA != $editarAsignadoA){
        $update .= ", asignado_a = '".$NEWasignadoA."'";
    }
    if($NEWllamarDesde != $editarLlamarDesde){
        $update .= ", llamar_desde = '".$NEWllamarDesde."'";
    }
    if($NEWllamarHasta != $editarLlamarHasta){
        $update .= ", llamar_hasta = '".$NEWllamarHasta."'";
    }
    if($NEWsuperficieDesde != $editarSuperficieDesde){
        $update .= ", superficie_construida_desde = '".$NEWsuperficieDesde."'";
    }
    if($NEWsuperficieHasta != $editarSuperficieHasta){
        $update .= ", superficie_construida_hasta = '".$NEWsuperficieHasta."'";
    }
    if($NEWprecioDesde != $editarPrecioDesde){
        $update .= ", precio_venta_desde = '".$NEWprecioDesde."'";
    }
    if($NEWprecioHasta != $editarPrecioHasta){
        $update .= ", precio_venta_hasta = '".$NEWprecioHasta."'";
    }
    if($NEWplantaBaja != $editarPlantaBaja){
        $update .= ", planta_baja = '".$NEWplantaBaja."'";
    }
    if($NEWgaraje != $editargaraje){
        $update .= ", garaje = '".$NEWgaraje."'";
    }
    if($NEWgarajeDoble != $editargarajeDoble){
        $update .= ", garaje_doble = '".$NEWgarajeDoble."'";
    }
    if($NEWamueblada != $editarAmueblada){
        $update .= ", amueblada = '".$NEWamueblada."'";
    }
    if($NEWbalcon != $editarBalcon){
        $update .= ", balcon = '".$NEWbalcon."'";
    }
    if($NEWpileta != $editarPileta){
        $update .= ", pileta = '".$NEWpileta."'";
    }  

    // Hago el update en la DB //
    $query = $connect-> prepare ("UPDATE wp_consultas SET $update WHERE id= '".$_GET['consulta']."'");
    $query->execute();

    if($query){
        echo '<script> alert("Cambios Realizados con éxito"); window.location = "../consultas.php"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al editar la consulta"); window.location = "../consultas.php"; </script>';
    }
    ?>

}else{echo '<script> alert("No se han realizado cambios"); window.location = "../consultas.php"; </script>';}

?>
