<?php
include 'connect.php';
if(!isset($_SESSION)) {session_start();};
if (isset($_SESSION['usuario'])){
    if(isset($_POST['fin_id']))
    {
        $arr = $_POST['fin_id'];
        foreach ($arr as $id) {
            $query = $connect-> prepare ("UPDATE wp_agenda SET tarea_terminada = 1 WHERE id = ?");
            $query->execute([$id]);
        }
        if($query){
            echo '<script>alert("Evento/s finalizado/s con éxito"); window.location = "../index.php"</script>';
        }else{
            echo '<script>alert("Ha ocurrido un error al finalizar el/los evento/s"); window.location = "../index.php"</script>';
        }
    }else{
        '<script>alert("Debes seleccionar al menos un evento para finalizarlo"); window.location = "../index.php"</script>';
    }

}else{
    echo '<script>alert("Debes Iniciar sesión"); window.location = "../login.php"</script>';
}
?>