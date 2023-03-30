<?php
include 'connect.php';
include 'connect2.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = $connect-> prepare ("UPDATE wp_propiedades SET visible_web = 0 WHERE id = ?");
        $query->execute([$id]);
        if(!$query){
            echo '<script> alert("Ha ocurrido un error"); window.location = "../propiedades.php"; </script>';
        }else{
            $query = $connect2-> prepare ("UPDATE wpry_propiedades SET visible_web = 0 WHERE id = ?");
            $query->execute([$id]);
            if(!$query){
                echo '<script> alert("Ha ocurrido un error"); window.location = "../propiedades.php"; </script>';
            }else{
                echo '<script> alert("Cambios guardados exitosamente"); window.location = "../propiedades.php"; </script>';
            }
        }
    }else{
        echo '<script> alert("Ha ocurrido un error"); window.location = "../propiedades.php"; </script>';
    }

}else{
    echo '<script>alert("Debes Iniciar sesión"); window.location = "../login.php"</script>';
}
?>