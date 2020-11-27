<?php

$db = new PDO("mysql:host=localhost;dbname=postane;charset=utf8", "root", "");

$teslim_ad = $_POST['teslim_ad'];
$teslim_soyad = $_POST['teslim_soyad'];
$teslim_tel = $_POST['teslim_tel'];
$teslim_tc = $_POST['teslim_tc'];
$teslim_gonderi_barkod = $_POST['teslim_gonderi_barkod'];
$teslim_teslim_alan = $_POST['teslim_teslim_alan'];

$ekle=$db->prepare("INSERT INTO teslim_bilgi SET teslim_ad = ?, teslim_soyad = ?, teslim_tel = ?, teslim_tc = ?, teslim_gonderi_barkod = ?, teslim_teslim_alan = ?");

$ekle->execute([$teslim_ad, $teslim_soyad, $teslim_tel, $teslim_tc, $teslim_gonderi_barkod, $teslim_teslim_alan]);

if ($ekle){
    header("location:teslimindex.php");
} else {
    echo "Teslim kaydı yapılamadı.";
}

?>