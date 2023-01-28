<?php session_start();
$idAgente= $_SESSION['usuario'];
unset($idAgente);
session_destroy();
header("location: ../login.php"); ?>