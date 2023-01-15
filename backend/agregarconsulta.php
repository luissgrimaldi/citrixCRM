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


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$propiedad = $_POST['propiedad'];
$observaciones = $_POST['observaciones'];
$consulta = $_POST['consulta'];
$estado = $_POST['estado'];
$situacion = $_POST['situacion'];
$captadoPor = $_POST['captadopor'];
$medioContacto = $_POST['mediodecontacto'];
$asignadoA = $_POST['asignadoa'];
$llamarDesde = $_POST['llamardesde'];
$llamarHasta = $_POST['llamarhasta'];
$superficieDesde = $_POST['superficiedesde'];
$superficieHasta = $_POST['superficiehasta'];
$precioDesde = $_POST['preciodesde'];
$precioHasta = $_POST['preciohasta'];
$plantaBaja = $_POST['plantabaja'];
$garage = $_POST['garage'];
$garageDoble = $_POST['garagedoble'];
$amueblada = $_POST['amueblada'];
$balcon = $_POST['balcon'];
$pileta = $_POST['pileta'];


$registrar = $connect-> prepare ("INSERT INTO wp_consultas (nombre, apellido , email, telefono, propiedad_id, observaciones, consulta, status_id, situacion, captado_por, canal_id, asignado_a, llamar_desde, llamar_hasta, superficie_construida_desde, superficie_construida_hasta, precio_venta_desde, precio_venta_hasta, planta_baja, garaje, garaje_doble, amueblada, balcon, pileta) VALUES (?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$registrar->execute([$nombre, $apellido, $email, $telefono, $propiedad, $observaciones, $consulta, $estado, $situacion, $captadoPor, $medioContacto, $asignadoA, $llamarDesde, $llamarHasta, $superficieDesde, $superficieHasta, $precioDesde, $precioHasta, $plantaBaja, $garage, $garageDoble, $amueblada, $balcon, $pileta]);
?>