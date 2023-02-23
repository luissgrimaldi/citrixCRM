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
$NEWtelefono = $_POST['celular'];
$NEWdireccion = $_POST['contrasenia'];
$NEWnoEmails = $_POST['repetircontrasenia'];
$NEWobservaciones = $_POST['rol'];
$NEWhabilitado = $_POST['habilitar'];

if($NEWnickname != $editarNickname OR $NEWnombre != $editarNombre OR $NEWapellido != $editarApellido OR $NEWemail != $editarEmail OR $NEWtelefono != $editarCelular OR $NEWdireccion != '' OR $NEWnoEmails != '' OR $NEWobservaciones != $editarRol OR $NEWhabilitado != $editarHabilitado){  
        
    if($NEWdireccion == $NEWnoEmails){       
        $NEWdireccion = hash('SHA512', $NEWdireccion);
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
        if($NEWtelefono != $editarCelular){
            $update .= ", celular = '".$NEWtelefono."'";
        }
        if($NEWdireccion != $editarContrasenia){
            $update .= ", pass = '".$NEWdireccion."'";
        }
        if($NEWobservaciones != $editarRol){
            $update .= ", rol = '".$NEWobservaciones."'";
        }
        // Hago el update en la DB //
        $query = $connect-> prepare ("UPDATE usuarios SET $update WHERE user_id= '".$_GET['id']."'");
        $query->execute();
    
        if($query){
            echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=usuario"; </script>';
        }else{
            echo '<script> alert("Ha ocurrido un error al editar el usuario"); window.location = "../controladmin.php?page=usuario";</script>';
        }
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

    if($query){
        echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=ciudad"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al editar la ciudad"); window.location = "../controladmin.php?page=ciudad";</script>';
    }

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

    if($query){
        echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=zona"; </script>';
    }else{
        echo '<script> alert("Ha ocurrido un error al editar la zona"); window.location = "../controladmin.php?page=zona";</script>';
    }

}else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=zona"; </script>';}
          
}

if($_GET['page']=='contacto'){
    if(!isset($_POST['nombre'])){$_POST['nombre']= '';};
    if(!isset($_POST['apellido'])){$_POST['apellido']= '';};
    if(!isset($_POST['telefono'])){$_POST['telefono']= '';};
    if(!isset($_POST['email'])){$_POST['email']= '';};
    if(!isset($_POST['direccion'])){$_POST['direccion']= '';};
    if(!isset($_POST['no_emails'])){$_POST['no_emails']= '1';};
    if(!isset($_POST['observaciones'])){$_POST['observaciones']='';};
        
    $sentencia = $connect->prepare("SELECT * FROM `wp_contactos` WHERE id= '".$_GET['id']."'") or die('query failed');
        $sentencia->execute();
        $list_consultas = $sentencia->fetchAll();                         
        foreach($list_consultas as $consulta){
            $editarNombre = $consulta['nombre'];
            $editarApellido = $consulta['apellido'];
            $editarTelefono = $consulta['telefono'];
            $editarEmail = $consulta['email'];
            $editarDireccion = $consulta['direccion'];
            $editarNoEmails = $consulta['no_emails'];
            $editarObservaciones = $consulta['observaciones'];         
        }  
        
    $NEWnombre = $_POST['nombre'];
    $NEWapellido = $_POST['apellido'];
    $NEWtelefono = $_POST['telefono'];
    $NEWemail = $_POST['email'];
    $NEWdireccion = $_POST['direccion'];
    $NEWnoEmails = $_POST['no_emails'];
    $NEWobservaciones = $_POST['observaciones'];
    
    if($NEWnombre != $editarNombre OR $NEWapellido != $editarApellido OR $NEWtelefono != $editarTelefono OR $NEWemail != $editarEmail OR $NEWdireccion != $editarDireccion OR $NEWnoEmails != $editarNoEmails OR $NEWobservaciones != $editarObservaciones){  
                

            $update = " localidad = NULL";
        
            if($NEWnombre != $editarNombre){
                $update .= ", nombre = '".$NEWnombre."'";
            }
            if($NEWapellido != $editarApellido){
                $update .= ", apellido = '".$NEWapellido."'";
            }
            if($NEWtelefono != $editarTelefono){
                $update .= ", telefono = '".$NEWtelefono."'";
            }
            if($NEWemail != $editarEmail){
                $update .= ", email = '".$NEWemail."'";
            }
            if($NEWdireccion != $editarDireccion){
                $update .= ", direccion = '".$NEWdireccion."'";
            }
            if($NEWnoEmails != $editarNoEmails){
                $update .= ", no_emails = '".$NEWnoEmails."'";
            }
            if($NEWobservaciones != $editarObservaciones){
                $update .= ", observaciones = '".$NEWobservaciones."'";
            }

            // Hago el update en la DB //
            $query = $connect-> prepare ("UPDATE wp_contactos SET $update WHERE id= '".$_GET['id']."'");
            $query->execute();
        
            if($query){
                echo '<script> alert("Cambios Realizados con éxito"); window.location = "../controladmin.php?page=contacto"; </script>';
            }else{
                echo '<script> alert("Ha ocurrido un error al editar el contacto"); window.location = "../controladmin.php?page=contacto";</script>';
            }
    
    
    
    }else{echo '<script> alert("No se han realizado cambios"); window.location = "../controladmin.php?page=contacto"; </script>';}
        
    };
?>
