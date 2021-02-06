<?php
session_start();
$_SESSION["kullaniciID"]="";
header('Location: kullaniciPaneli.php');
exit;
?>