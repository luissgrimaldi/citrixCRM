<?php
include 'connect.php';
$created=date("Y-m-d H:i:s");
        $query = $connect-> prepare ("UPDATE wp_notificaciones SET fecha = '".$created."'");
        $query->execute();

?>