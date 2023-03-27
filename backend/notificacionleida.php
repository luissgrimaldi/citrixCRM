<?php
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $query = $connect-> prepare ("UPDATE wp_notificaciones SET seen = 1 WHERE id = ?");
        $query->execute([$id]);
        if(!$query){
            echo json_encode("Ha ocurrido un error");
        }
    }else{
        echo json_encode("Ha ocurrido un error");
    }

}else{
    echo '<script>alert("Debes Iniciar sesión"); window.location = "../login.php"</script>';
}
?>