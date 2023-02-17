<?php 
include 'connect.php';

if($_GET['page']=='usuario'){
if(!isset($_POST['nickname'])){$_POST['nickname']= ' ';};
if(!isset($_POST['nombre'])){$_POST['nombre']= ' ';};
if(!isset($_POST['apellido'])){$_POST['apellido']= ' ';};
if(!isset($_POST['email'])){$_POST['email']= ' ';};
if(!isset($_POST['celular'])){$_POST['celular']= ' ';};
if(!isset($_POST['contrasenia'])){$_POST['contrasenia']= '';};
if(!isset($_POST['repetircontrasenia'])){$_POST['repetircontrasenia']= '';};
if(!isset($_POST['rol'])){$_POST['rol']= ' ';};
if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};
    
$sentencia = $connect->prepare("SELECT * FROM `usuarios` WHERE user_id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_consultas = $sentencia->fetchAll();                         
    foreach($list_consultas as $consulta){
        $editarNickname = $consulta['nickname'];
        $editarNombre = $consulta['nombre'];
        $editarApellido = $consulta['apellido'];
        $editarEmail = $consulta['email'];
        $editarCelular = $consulta['celular'];
        $editarContrasenia = $consulta['pass'];
        $editarRol = $consulta['rol'];
        $editarHabilitado = $consulta['habilitado'];         
    }  
    
$NEWnickname = $_POST['nickname'];
$NEWnombre = $_POST['nombre'];
$NEWapellido = $_POST['apellido'];
$NEWemail = $_POST['email'];
$NEWcelular = $_POST['celular'];
$NEWcontrasenia = $_POST['contrasenia'];
$NEWrepetircontrasenia = $_POST['repetircontrasenia'];
$NEWrol = $_POST['rol'];
$NEWhabilitado = $_POST['habilitar'];

if($NEWnickname != $editarNickname OR $NEWnombre != $editarNombre OR $NEWapellido != $editarApellido OR $NEWemail != $editarEmail OR $NEWcelular != $editarCelular OR $NEWcontrasenia != '' OR $NEWrepetircontrasenia != '' OR $NEWrol != $editarRol OR $NEWhabilitado != $editarHabilitado){  
        
    if($NEWcontrasenia == $NEWrepetircontrasenia){       
        $NEWcontrasenia = hash('SHA512', $NEWcontrasenia);
        // Update en mi información //
        $update = " habilitado = '".$NEWhabilitado."'";
    
        if($NEWnickname != $editarNickname){
            $update .= ", nombre = '".$NEWnombre."'";
        }
        if($NEWnombre != $editarNombre){
            $update .= ", nombre = '".$NEWnombre."'";
        }
        if($NEWapellido != $editarApellido){
            $update .= ", apellido = '".$NEWapellido."'";
        }
        if($NEWemail != $editarEmail){
            $update .= ", email = '".$NEWemail."'";
        }
        if($NEWcelular != $editarCelular){
            $update .= ", celular = '".$NEWcelular."'";
        }
        if($NEWcontrasenia != $editarContrasenia){
            $update .= ", pass = '".$NEWcontrasenia."'";
        }
        if($NEWrol != $editarRol){
            $update .= ", rol = '".$NEWrol."'";
        }
        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE usuarios SET $update WHERE user_id= '".$_GET['id']."'");
        $query->execute();
    
        echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=usuario"; </script>';
    }else{echo '<script> alert("Las contraseñas no coinciden"); window.location = "../admineditar.php?page=usuario&id='.$_GET['id'].'"; </script>';}



}else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=usuario"; </script>';}
    
};

if($_GET['page']=='ciudad'){
    if(!isset($_POST['ciudad'])){$_POST['ciudad']= ' ';};
    if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};

    $sentencia = $connect->prepare("SELECT * FROM `wp_ciudades` WHERE id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_ciudades = $sentencia->fetchAll();                         
    foreach($list_ciudades as $ciudad){
        $editarCiudad = $ciudad['nombre'];       
        $editarHabilitado = $ciudad['habilitado'];
    }  
    
$NEWciudad = $_POST['ciudad'];
$NEWhabilitado = $_POST['habilitar'];

if($NEWciudad != $editarCiudad OR $NEWhabilitado != $editarHabilitado){  
        

    $update = " habilitado = '".$NEWhabilitado."'";

    if($NEWciudad != $editarCiudad){
        $update .= ", nombre = '".$NEWciudad."'";
    }
    

    // Hago el update en la DB //
    $query = $connect-> prepare ("UPDATE wp_ciudades SET $update WHERE id= '".$_GET['id']."'");
    $query->execute();

    echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=ciudad"; </script>';

}else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=ciudad"; </script>';}
              
};

if($_GET['page']=='zona'){
    if(!isset($_POST['zona'])){$_POST['zona']= ' ';};
    if(!isset($_POST['ciudad'])){$_POST['ciudad']= ' ';};
    if($_POST['habilitar'] == ''){$_POST['habilitar']= 0;};

    $sentencia = $connect->prepare("SELECT * FROM `wp_zonas` WHERE id= '".$_GET['id']."'") or die('query failed');
    $sentencia->execute();
    $list_zonas = $sentencia->fetchAll();                         
    foreach($list_zonas as $zona){
        $editarZona = $zona['nombre'];       
        $editarCiudad= $zona['ciudad_id'];
        $editarHabilitada = $zona['habilitada'];
    }  
        
$NEWzona = $_POST['zona'];
$NEWciudad = $_POST['ciudad'];
$NEWhabilitada = $_POST['habilitar'];

if($NEWzona != $editarZona OR $NEWciudad != $editarCiudad OR $NEWhabilitada != $editarHabilitada){  
        

    $update = " habilitada = '".$NEWhabilitada."'";

    if($NEWzona != $editarZona){
        $update .= ", nombre = '".$NEWzona."'";
    }
    if($NEWciudad != $editarCiudad){
        $update .= ", ciudad_id = '".$NEWciudad."'";
    }
    

    // Hago el update en la DB //
    $query = $connect-> prepare ("UPDATE wp_zonas SET $update WHERE id= '".$_GET['id']."'");
    $query->execute();

    echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=zona"; </script>';

}else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=zona"; </script>';}
          
}
?>
