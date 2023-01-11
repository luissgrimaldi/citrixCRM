<?php session_start();
$nickname= $_SESSION['nickname'];
unset($nickname);
session_destroy();
header("location: ../login.php"); ?>